<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * Images Controller
 *
 *
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        //$this->loadModel('Departments');
        $this->set('page', "images");
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // $images = $this->paginate($this->Images);

        // $this->set(compact('images'));
    }

    public function review()
    {

    }
    public function deleted()
    {

    }
    public function trash()
    {
        $this->set('page', "trash");
    }
    public function approved()
    {

    }

    public function getImagesAjax($action = null)
    {
        //$request = $_REQUEST; // cakephp doesn't use this
        $request = $this->request->getAttribute('params')['?'];

        $orderByColumnIndex = $request['order'][0]['column']; // index of the sorting column (0 index based - i.e. 0 is the first record)
        //$orderBy = $_REQUEST['columns'][$orderByColumnIndex]['data'];//Get name of the sorting column from its index
        $orderType = strtoupper($request['order'][0]['dir']);

        // dd($orderByColumnIndex);

        if ($orderByColumnIndex == '0') {
            $orderByColumnIndex = "image_id";
            $orderType = "DESC";
        } elseif ($orderByColumnIndex == '1' || $orderByColumnIndex == '2') {
            $orderByColumnIndex = "image_name";
        } elseif ($orderByColumnIndex == '3') {
            $orderByColumnIndex = "image_title";
        } elseif ($orderByColumnIndex == '4') {
            $orderByColumnIndex = "image_uploader_ip";
        }  elseif ($orderByColumnIndex == '5') {
            $orderByColumnIndex = "rapid_response";
        }  elseif ($orderByColumnIndex == '6') {
            $orderByColumnIndex = "api_rating";
        }  elseif ($orderByColumnIndex == '7') {
            $orderByColumnIndex = "api_age";
        } else {
            $orderByColumnIndex = "image_id";
            $orderType = "DESC";
        }

        // dd($request['age']);
        // dd($orderByColumnIndex);

        // dd($request['order'][0]['column']);

        // $query = $this->Items->find('all', [
        //     //'limit' => 500,
        //     'limit' => intval($request['length']),
        //     'offset' => intval($request['start']),
        //     //page,
        // ]);


        $age = !empty($request['age']) ? (int)$request['age']: '';
        $status_one = !empty($request['status_one']) ? $request['status_one']: '';
        $status_two = !empty($request['status_two']) ? $request['status_two']: '';

        $query = $this->ChvImages->find('all');        
        if ($action == 'trash') {
            $query = $this->Custom->getDeletedImages();
        }
        
        if(!empty($status_one)){
            if($status_one == "review"){
                $query = $this->Custom->getPendingImageReviews();
            }
            if($status_one == "approved"){
                $query = $this->Custom->getApprovedImages();
            }
        }
        if(!empty($status_two)){
            if($status_two == "safe"){
                $query->andWhere(['image_nsfw'=> 0]);
            }
            if($status_two == "unsafe"){
                $query->andWhere(['image_nsfw'=> 1]);
            }
        }
        if(!empty($age)){
            $query->andWhere(['api_age <='=> $age]);
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

            $query->andWhere(["MATCH(image_name) AGAINST('{$search_term}' IN BOOLEAN MODE)"]);
            $query->order(["MATCH(image_name) AGAINST('{$search_term}' IN BOOLEAN MODE)" => 'DESC']);

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

            $user = $this->Custom->getImageUploader($item);
            $id = ($index + 1);
            // dd($item);
            $data_array = [
                $id,
                $item['image_name'],
                '<img class="img lazy" src="' . $this->Custom->getImageUrl($item) . '"
                alt="' . $item['image_name'] . '" style="max-height: 100px;">',
                // $item['image_tite'],
                $item['image_uploader_ip'],
                $item['image_nsfw'] == true ? 'NO' : 'YES',
                !empty($item['rapid_response']) ? 'YES' : 'NO',
                !empty($item['api_rating']) ? ucfirst($item['api_rating']) : 'N/A',
                !empty($item['api_age']) ? $item['api_age'] : 'N/A',
                $user->user_username,
                $action != 'deleted' ? '<a href="' . Router::url(['prefix' => false, 'controller' => 'Images', 'action' => 'approveImage', $item['image_id']]) . '"  onclick="return confirm(\'Approve this image?\')" class="btn btn-xs btn btn-raised btn-icon btn-success mr-1 btn-sm" title="Approve this image"><i class="fas fa-check"></i></a>
                <a href="' . Router::url(['prefix' => false, 'controller' => 'Images', 'action' => 'markAsUnsafe', $item['image_id']]) . '"  onclick="return confirm(\'Mark this image as unsafe?\')"  title="Mark as unsafe" class="btn btn-xs btn btn-raised btn-icon btn-danger mr-1 btn-sm"><i class="fas fa-times"></i></a>                
                <a href="' . Router::url(['prefix' => false, 'controller' => 'Images', 'action' => 'deleteImage', $item['image_id']]) . '"  onclick="return confirm(\'Delete this image?\')"  title="Delete this image" class="btn btn-xs btn btn-raised btn-icon btn-danger mr-1 btn-sm"><i class="fas fa-trash-alt"></i></a>

                <a href="' . Router::url(['prefix' => false, 'controller' => 'GeneralSettings', 'action' => 'banUser', $user->user_id]) . '"  onclick="return confirm(\'Are you sure you want to ban this user?\')"  title="Ban this user" class="btn btn-xs btn btn-raised btn-icon btn-warning mr-1 btn-sm"><i class="fa fa-ban" aria-hidden="true"></i></a>
                <a href="' . Router::url(['prefix' => false, 'controller' => 'Images', 'action' => 'banIp', $item['image_id']]) . '"  onclick="return confirm(\'Ban the uploader IP?\')"  title="Ban the uploader\'s IP" class="btn btn-xs btn btn-raised btn-icon btn-danger mr-1 btn-sm"><i class="fa fa-ban" aria-hidden="true"></i></a>
                '
                 :
                 
                 '<a href="' . Router::url(['prefix' => false, 'controller' => 'Images', 'action' => 'restoreImage', $item['image_id']]) . '"  onclick="return confirm(\'Restore this image?\')" class="btn btn-xs btn btn-raised btn-icon btn-success mr-1 btn-sm"><i class="fas fa-undo"></i></a>
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

    public function markAsUnsafe($id = null) //from ajax table
    {
        $item = $this->ChvImages->find()->where(['image_id' => $id])->first();
        $item->image_nsfw = 1;
        $item->reviewed = 1;
        if ($this->ChvImages->save($item)) {
            $this->Flash->success(__('The image has been marked as unsafe.'));
        }else{
            $this->Flash->error(__('The image could not be marked as unsafe. Please, try again.'));
        }
        return $this->redirect($this->referer());
    }

    public function approveImage($id = null) //from ajax table
    {
        $item = $this->ChvImages->find()->where(['image_id' => $id])->first();
        $item->image_nsfw = 0;
        $item->reviewed = 1;
        if ($this->ChvImages->save($item)) {
            $this->Flash->success(__('The image has been approved.'));
        }else{
            $this->Flash->error(__('The image could not be approved. Please, try again.'));
        }
        return $this->redirect($this->referer());
    }

    public function restoreImage($id = null) //from ajax table
    {
        $item = $this->ChvImagesDeleted->find()->where(['image_id' => $id])->first();
        if ($this->ChvImagesDeleted->delete($item)) {
            $chvImage = $this->ChvImages->newEntity();
            $chvImage = $this->ChvImages->patchEntity($chvImage, $item->toArray());
            if ($this->ChvImages->save($chvImage)) {
            }
            $this->Flash->success(__('The image has been restored.'));
            // return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The image could not be restored. Please, try again.'));
        }

        return $this->redirect($this->referer());

    }
    public function deleteImage($id = null) //from ajax table
    {
        $item = $this->ChvImages->find()->where(['image_id' => $id])->first();
        if ($this->ChvImages->delete($item)) {
            $chvImagesDeleted = $this->ChvImagesDeleted->newEntity();
            $chvImagesDeleted = $this->ChvImagesDeleted->patchEntity($chvImagesDeleted, $item->toArray());
            if ($this->ChvImagesDeleted->save($chvImagesDeleted)) {
            }
            $this->Flash->success(__('The image has been deleted.'));
            // return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());

    }

    public function banIp($id)
    {
        $settings = $this->GeneralSettings->get(1);
        $chvImage = $this->ChvImages->find()->where(['image_id' => $id])->first();

        $chvIpBan = $this->ChvIpBans->newEntity();
        // $chvIpBan->ip_ban_date = date("Y-m-d H:i:s");
        $date = new \DateTime();
        $chvIpBan->ip_ban_date = $date;
        $chvIpBan->ip_ban_date_gmt = $date->setTimezone(new \DateTimeZone('GMT'));
        $chvIpBan->ip_ban_ip = $chvImage->image_uploader_ip;
        $chvIpBan->ip_ban_message = "Your IP has been banned. " . $settings->ban_message;
        if ($this->ChvIpBans->save($chvIpBan)) {
            // return true;
            $this->Flash->success(__('The IP has been banned'));
            $chvImage->reviewed = 1;
            if ($this->ChvImages->save($chvImage)) {

            }
        } else {

            $this->Flash->error(__('Could not ban the IP'));
        }
        // return true;
        return $this->redirect($this->referer());
    }

}
