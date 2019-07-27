<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        //$this->loadModel('Departments');
        $this->set('page', "posts");
        $accounts = $this->Posts->Accounts->find('list', ['limit' => 200]);
        $subreddits = $this->Posts->Subreddits->find('list', ['limit' => 200]);
        $this->set(compact('accounts', 'subreddits'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Accounts', 'Subreddits'],
        ]);

        $this->set('post', $post);
    }

    private function postContains(){
        return ['Accounts', 'Subreddits'];
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set('post', $post);
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set('post', $post);
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getPostsAjax($action = null)
    {
        //$request = $_REQUEST; // cakephp doesn't use this
        $request = $this->request->getAttribute('params')['?'];

        $orderByColumnIndex = $request['order'][0]['column']; // index of the sorting column (0 index based - i.e. 0 is the first record)
        //$orderBy = $_REQUEST['columns'][$orderByColumnIndex]['data'];//Get name of the sorting column from its index
        $orderType = strtoupper($request['order'][0]['dir']);

        // dd($orderByColumnIndex);

        if ($orderByColumnIndex == '0') {
            $orderByColumnIndex = "Posts.id";
            $orderType = "DESC";
        } elseif ($orderByColumnIndex == '1') {
            $orderByColumnIndex = "Posts.title";
        } elseif ($orderByColumnIndex == '3') {
            $orderByColumnIndex = "Posts.url";
        } elseif ($orderByColumnIndex == '4') {
            $orderByColumnIndex = "Posts.schedule";
        } elseif ($orderByColumnIndex == '5') {
            $orderByColumnIndex = "Posts.account_id";
        } elseif ($orderByColumnIndex == '6') {
            $orderByColumnIndex = "Posts.subreddit_id";
        } elseif ($orderByColumnIndex == '7') {
            $orderByColumnIndex = "Posts.success";
        } else {
            $orderByColumnIndex = "Posts.id";
            $orderType = "DESC";
        }

        // $age = !empty($request['age']) ? (int)$request['age']: '';
        $account_id = !empty($request['account_id']) ? $request['account_id'] : '';
        $subreddit_id = !empty($request['subreddit_id']) ? $request['subreddit_id'] : '';

        $query = $this->Posts->find('all')->contain($this->postContains());

        if (!empty($account_id)) {
            $query->andWhere(['Posts.account_id' => $account_id]);
        }
        if (!empty($subreddit_id)) {
            $query->andWhere(['Posts.subreddit_id' => $subreddit_id]);
        }

        $query->order([$orderByColumnIndex => $orderType]);

        // dd($_REQUEST['search']['value']);
        if (isset($request['search']['value']) && !empty($request['search']['value'])) {
            $search_term = $this->Custom->escapeString($request['search']['value']);

            // $query->where(['Items.name LIKE' => "%" . $search_term . "%"]);
            $query->where([
                'OR' => [
                    ['Posts.title LIKE' => "%" . $search_term . "%"],
                    ["MATCH(Posts.title) AGAINST('{$search_term}' IN BOOLEAN MODE)"],
                ],
            ]);
            $query->order(["MATCH(Posts.title) AGAINST('{$search_term}' IN BOOLEAN MODE)" => 'DESC']);
        }

        $iTotalRecords = $query->count();

        /*
        we have to do this after the above so as to get the right total number before slicing the result
        however it seems the documentation says The count() method will ignore the limit, offset and page clauses
        https://book.cakephp.org/3.0/en/orm/query-builder.html#returning-the-total-count-of-records
         */
        $query->limit(intval($request['length']))->offset(intval($request['start']));

        $itemsArray = $query->toArray();

        $response["data"] = [];

        $index = intval($request['start']);

        foreach ($itemsArray as $item) {

            $user = $this->Custom->getImageUploader($item);
            $id = ($index + 1);
            // dd($item);
            $data_array = [
                $id,
                $item['title'],
                $item['url'],
                $this->Custom->cakeTime($item['schedule']),
                $item['account']['username'],
                $item['subreddit']['name'],
                $item['success'] ? 'YES' :'NO' ,
                '<a href="' . Router::url(['prefix' => false, 'controller' => 'Post', 'action' => 'edit', $item['id']]) . '"  class="btn btn-xs btn btn-raised btn-icon btn-success mr-1 btn-sm" title="Edit this post"><i class="fas fa-edit"></i></a>
                <a href="' . Router::url(['prefix' => false, 'controller' => 'Posts', 'action' => 'delete', $item['id']]) . '"  onclick="return confirm(\'Delete this post?\')"  title="Delete this post" class="btn btn-xs btn btn-raised btn-icon btn-danger mr-1 btn-sm"><i class="fas fa-trash-alt"></i></a>
                ' ,
            ];

            // debug($data_array);

            // dd($data_array);
            $response["data"][] = $data_array;
            $index++;
        }

        if (isset($request["customActionType"]) && $request["customActionType"] == "group_action") {
            $response["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
            $response["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
        }

        $response["draw"] = intval($request['draw']);
        $response["recordsTotal"] = $iTotalRecords;
        $response["recordsFiltered"] = $iTotalRecords;
        $response["request"] = $request;

        $this->set([
            'response' => $response,
            //'data' => $this->request->getData(),
            '_serialize' => 'response',
        ]);
        $this->RequestHandler->renderAs($this, 'json');

    }

}
