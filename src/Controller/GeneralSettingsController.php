<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * GeneralSettings Controller
 *
 * @property \App\Model\Table\GeneralSettingsTable $GeneralSettings
 *
 * @method \App\Model\Entity\GeneralSetting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GeneralSettingsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        //$this->loadModel('Departments');
        $this->set('page', "settings");
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $generalSetting = $this->GeneralSettings->get(1);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $generalSetting = $this->GeneralSettings->patchEntity($generalSetting, $this->request->getData());
            if ($this->GeneralSettings->save($generalSetting)) {
                $this->Flash->success(__('The settings have been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The settings could not be saved. Please, try again.'));
        }

        $this->set('generalSetting', $generalSetting);
    }

    public function getUsersAjax($action = "")
    {
        //$request = $_REQUEST; // cakephp doesn't use this
        $request = $this->request->getAttribute('params')['?'];

        $orderByColumnIndex = $request['order'][0]['column']; // index of the sorting column (0 index based - i.e. 0 is the first record)
        //$orderBy = $_REQUEST['columns'][$orderByColumnIndex]['data'];//Get name of the sorting column from its index
        $orderType = strtoupper($request['order'][0]['dir']);

        // dd($orderByColumnIndex);

        if ($orderByColumnIndex == '0') {
            $orderByColumnIndex = "ChvUsers.user_id";
            $orderType = "DESC";
        } elseif ($orderByColumnIndex == '1') {
            $orderByColumnIndex = "ChvUsers.user_username";
        } elseif ($orderByColumnIndex == '2') {
            $orderByColumnIndex = "ChvUsers.user_image_count";
        } elseif ($orderByColumnIndex == '3') {
            $orderByColumnIndex = "ChvUsers.user_album_count";
        } elseif ($orderByColumnIndex == '4') {
            $orderByColumnIndex = "ChvUsers.user_likes";
        } elseif ($orderByColumnIndex == '5') {
            $orderByColumnIndex = "ChvUsers.user_registration_ip";
        } else {
            $orderByColumnIndex = "ChvUsers.image_id";
            $orderType = "DESC";
        }

        // dd($orderByColumnIndex);

        // dd($request['order'][0]['column']);

        // $query = $this->Items->find('all', [
        //     //'limit' => 500,
        //     'limit' => intval($request['length']),
        //     'offset' => intval($request['start']),
        //     //page,
        // ]);

        $query = $this->ChvUsers->find('all');
        if($action == 'banned'){
            $query = $this->ChvUsers->find('all')->where(['user_status'=>'banned']);
        }
       
        //->contain($this->Custom->getItemContains())
        // ->select([
        //     'uploader' => $this->ChvUsers->find()->where(['ChvUsers.user_id'=>'ChvImages.image_user_id'])
        //     // 'uploader' => $query->find()->count('ForumTopicLikes.id')
        // ])
        $query->order([$orderByColumnIndex => $orderType]);

        // dd($_REQUEST['search']['value']);
        if (isset($request['search']['value']) && !empty($request['search']['value'])) {
            $search_term = $this->Custom->escapeString($request['search']['value']);

            $query->where([
                'OR' => [
                    ["MATCH(ChvUsers.user_username) AGAINST('{$search_term}'IN BOOLEAN MODE)"],
                    ['LOWER(ChvUsers.user_username) LIKE' => "%" . $search_term . "%"],        
                ],
            ]);
            // $query->andWhere(["MATCH(ChvUsers.user_username) AGAINST('{$search_term}' IN BOOLEAN MODE)"]);

            $query->order(["MATCH(ChvUsers.user_username) AGAINST('{$search_term}' IN BOOLEAN MODE)" => 'DESC']);

            // $query->where(['Items.name LIKE' => "%" . $search_term . "%"]);
            // $query->where([
            //     'OR' => [
            //         //["MATCH(Items.name, Items.description) AGAINST(:search IN NATURAL LANGUAGE MODE)"],
            //         // ["MATCH(Items.name) AGAINST(:search IN NATURAL LANGUAGE MODE)"],
            //         ['Items.name LIKE' => "%" . $search_term . "%"],
            //         ["MATCH(Items.name) AGAINST('{$search_term}' IN BOOLEAN MODE)"],
            //         // ["MATCH(Items.name) AGAINST(:search_term)"], //HAVING Relevance > 0.2  ORDER BY Relevance DESC
            //     ],
            // ]);
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
                $item['user_username'],                
                number_format($item['user_image_count']),
                number_format($item['user_album_count']),
                number_format($item['user_likes']),
                $item['user_registration_ip'],
                $action == 'banned' ? '<a href="' . Router::url(['prefix' => false, 'controller' => 'GeneralSettings', 'action' => 'unban', $item['user_id']]) . '"  onclick="return confirm(\'Unban this user?\')" class="btn btn-xs btn btn-raised btn-icon btn-success mr-1 btn-sm"><i class="fa fa-undo" aria-hidden="true"></i></a>               
                ' : '<a href="' . Router::url(['prefix' => false, 'controller' => 'GeneralSettings', 'action' => 'banUser', $item['user_id']]) . '"  onclick="return confirm(\'Are you sure you want to ban this user?\')" class="btn btn-xs btn btn-raised btn-icon btn-warning mr-1 btn-sm"><i class="fa fa-ban" aria-hidden="true"></i></a>               
                ',
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
    public function getBannedIpsAjax()
    {
        //$request = $_REQUEST; // cakephp doesn't use this
        $request = $this->request->getAttribute('params')['?'];

        $orderByColumnIndex = $request['order'][0]['column']; // index of the sorting column (0 index based - i.e. 0 is the first record)
        //$orderBy = $_REQUEST['columns'][$orderByColumnIndex]['data'];//Get name of the sorting column from its index
        $orderType = strtoupper($request['order'][0]['dir']);

        // dd($orderByColumnIndex);

        if ($orderByColumnIndex == '0') {
            $orderByColumnIndex = "ip_ban_id";
            $orderType = "DESC";
        } elseif ($orderByColumnIndex == '1') {
            $orderByColumnIndex = "ip_ban_ip";
        } elseif ($orderByColumnIndex == '2') {
            $orderByColumnIndex = "ip_ban_message";
        } elseif ($orderByColumnIndex == '3') {
            $orderByColumnIndex = "ip_ban_date";
        } else {
            $orderByColumnIndex = "ip_ban_id";
            $orderType = "DESC";
        }

        // dd($orderByColumnIndex);

        // dd($request['order'][0]['column']);

        // $query = $this->Items->find('all', [
        //     //'limit' => 500,
        //     'limit' => intval($request['length']),
        //     'offset' => intval($request['start']),
        //     //page,
        // ]);

        $query = $this->ChvIpBans->find('all');
       
        //->contain($this->Custom->getItemContains())
        // ->select([
        //     'uploader' => $this->ChvUsers->find()->where(['ChvUsers.user_id'=>'ChvImages.image_user_id'])
        //     // 'uploader' => $query->find()->count('ForumTopicLikes.id')
        // ])
        $query->order([$orderByColumnIndex => $orderType]);

        // dd($_REQUEST['search']['value']);
        if (isset($request['search']['value']) && !empty($request['search']['value'])) {
            $search_term = $this->Custom->escapeString($request['search']['value']);

            $query->where([
                'OR' => [
                    //["MATCH(ChvUsers.user_username) AGAINST('{$search_term}'IN BOOLEAN MODE)"],
                    ['LOWER(ChvIpBans.ip_ban_ip) LIKE' => "%" . $search_term . "%"],        
                ],
            ]);
            // $query->andWhere(["MATCH(ChvUsers.user_username) AGAINST('{$search_term}' IN BOOLEAN MODE)"]);

            // $query->order(["MATCH(ChvUsers.user_username) AGAINST('{$search_term}' IN BOOLEAN MODE)" => 'DESC']);

            // $query->where(['Items.name LIKE' => "%" . $search_term . "%"]);
            // $query->where([
            //     'OR' => [
            //         //["MATCH(Items.name, Items.description) AGAINST(:search IN NATURAL LANGUAGE MODE)"],
            //         // ["MATCH(Items.name) AGAINST(:search IN NATURAL LANGUAGE MODE)"],
            //         ['Items.name LIKE' => "%" . $search_term . "%"],
            //         ["MATCH(Items.name) AGAINST('{$search_term}' IN BOOLEAN MODE)"],
            //         // ["MATCH(Items.name) AGAINST(:search_term)"], //HAVING Relevance > 0.2  ORDER BY Relevance DESC
            //     ],
            // ]);
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
                $item['ip_ban_ip'],                
                $item['ip_ban_message'],                
                $this->Custom->cakeTime($item['ip_ban_date']),
                '<a href="' . Router::url(['prefix' => false, 'controller' => 'GeneralSettings', 'action' => 'unbanIp', $item['ip_ban_id']]) . 
                '"  onclick="return confirm(\'Are you sure you want to unban this IP?\')" class="btn btn-xs btn btn-raised btn-icon btn-warning mr-1 btn-sm"><i class="fa fa-ban" aria-hidden="true"></i></a>               
                ',
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

    public function unban($id)
    {
        $chvUser = $this->ChvUsers->find()->where(['ChvUsers.user_id' => $id])->first();
        $chvUser->user_status = "valid";
        if ($this->ChvUsers->save($chvUser)) {
            $this->Flash->success(__('The user has been unbanned'));
        }else{
            $this->Flash->error(__('Could not unban the user'));
        }
        return $this->redirect($this->referer());
    }

    public function banUser($id)
    {
        $chvUser = $this->ChvUsers->find()->where(['ChvUsers.user_id' => $id])->first();
        $chvUser->user_status = "banned";
        if ($this->ChvUsers->save($chvUser)) {
            $this->Flash->success(__('The user has been banned'));
        }else{
            $this->Flash->error(__('Could not ban the user'));
        }
        return $this->redirect($this->referer());
    }
    public function unbanIp($id)
    {
        $ip = $this->ChvIpBans->find()->where(['ChvIpBans.ip_ban_id' => $id])->first();
        if ($this->ChvIpBans->delete($ip)) {            
            $this->Flash->success(__('The ip ban has been lifted.'));
            // return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('Could not lift IP ban. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }

}
