<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

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

    public function getAccountsJson(){

        $this->request->allowMethod('ajax');
        $response = [
            "success" => true,
        ];

        // debug($this->request->getQuery());
        // dd($this->request->getAttribute('params'));

        $query = $this->Accounts->find();

        if (!empty($this->request->getQuery()['q'])) {

            $search_term = $this->Custom->escapeString($this->request->getQuery()['q']);

            $query->where([
                'OR' => [
                    ['Accounts.username LIKE' => "%" . $search_term . "%"],
                ],
            ]);

        }

        $data = $query->toArray();

        // dd($query);

        $query_data = [];
        if (!empty($data)) {
            foreach ($data as $value) {
                $query_data[] = [
                    'id' => $value['id'],
                    'name' => $value['username'],
                ];
            }
        }

        // dd($user_data);

        $response['data'] = $query_data;
        $response['total_count'] = count($data);

        $this->set([
            'response' => $response,
            //'data' => $this->request->getData(),
            '_serialize' => 'response',
        ]);
        $this->RequestHandler->renderAs($this, 'json');


    }

    public function getSubredditsJson(){

        $this->request->allowMethod('ajax');
        $response = [
            "success" => true,
        ];

        // debug($this->request->getQuery());
        // dd($this->request->getAttribute('params'));

        $query = $this->Subreddits->find();

        if (!empty($this->request->getQuery()['q'])) {

            $search_term = $this->Custom->escapeString($this->request->getQuery()['q']);

            $query->where([
                'OR' => [
                    ['Subreddits.name LIKE' => "%" . $search_term . "%"],
                ],
            ]);

        }

        $data = $query->toArray();

        // dd($query);

        $query_data = [];
        if (!empty($data)) {
            foreach ($data as $value) {
                $query_data[] = [
                    'id' => $value['id'],
                    'name' => $value['name'],
                ];
            }
        }

        // dd($user_data);

        $response['data'] = $query_data;
        $response['total_count'] = count($data);

        $this->set([
            'response' => $response,
            //'data' => $this->request->getData(),
            '_serialize' => 'response',
        ]);
        $this->RequestHandler->renderAs($this, 'json');


    }
    public function addAccount()
    {
        $this->request->allowMethod('ajax');
        $response = [
            "success" => false,
        ];
        // dd($this->request->getData());

        $account = $this->Accounts->newEntity();
        if (!empty($this->request->getData()['data'])) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData()['data']);
            // $account->password = null;
            //$department->name = null;
            if ($this->Accounts->save($account)) {
                $response['success'] = true;
                $response['account'] = $account;
            } else {
                // $errors = $supplier->getErrors();
                $message = "An error occured. Please try again";
                $response['success'] = false;
                $response['error'] = true;
                $response['message'] = $message;
                $response['data'] = $this->request->getData()['data'];
            }
            //$this->response->withStringBody(json_encode($response));

        }

        $this->set([
            'response' => $response,
            //'data' => $this->request->getData(),
            '_serialize' => 'response',
        ]);
        $this->RequestHandler->renderAs($this, 'json');


    }
    public function addSubReddit()
    {
        $response = [
            "success" => false,
        ];

        $subreddit = $this->Subreddits->newEntity();
        if (!empty($this->request->getData()['data'])) {
            $subreddit = $this->Subreddits->patchEntity($subreddit, $this->request->getData()['data']);
            if ($this->Subreddits->save($subreddit)) {
                $response['success'] = true;
                $response['subreddit'] = $subreddit;
            } else {
                // $errors = $subreddit->getErrors();
                // dd($subreddit);
                $message = "An error occured. Please try again";
                $response['success'] = false;
                $response['error'] = true;
                $response['message'] = $message;
                $response['data'] = $this->request->getData()['data'];
            }
            //$this->response->withStringBody(json_encode($response));

        }

        $this->set([
            'response' => $response,
            //'data' => $this->request->getData(),
            '_serialize' => 'response',
        ]);
        $this->RequestHandler->renderAs($this, 'json');


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
        // $this->request->allowMethod(['post', 'delete']);
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
                '<a href="' . Router::url(['prefix' => false, 'controller' => 'Posts', 'action' => 'edit', $item['id']]) . '"  class="btn btn-xs btn btn-raised btn-icon btn-success mr-1 btn-sm" title="Edit this post"><i class="fas fa-edit"></i></a>
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
