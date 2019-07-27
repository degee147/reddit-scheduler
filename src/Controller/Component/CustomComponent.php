<?php
namespace App\Controller\Component;

use App\Utility\Custom;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Custom component
 */
class CustomComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public $components = ['Flash', 'Auth'];
    public $customUtil; //for use with custom utility

    public function getPendingImageReviews(){
        return $this->ChvImages->find('all')->where(['pending_review' => 1, 'reviewed' => 0]);
    }

    public function getApprovedImages(){
        return $this->ChvImages->find('all')->where(['image_nsfw' => 0]);
    }
    public function getDeletedImages(){
        return $this->ChvImagesDeleted->find('all');
    }

    public function getImageUploader($chvImage){
        return $this->ChvUsers->find()->where(['ChvUsers.user_id' => $chvImage->image_user_id])->first();
    }

    public function cakeTime($time)
    {
        $time = new Time($time);
        return $time->timeAgoInwords();
    }

    public function getImageUrl($chvImage)
    {

        $settings = $this->GeneralSettings->get(1);

        $imgUrl = $settings->hostname . '/images/';

        if ($chvImage->image_storage_mode == "datefolder") { //http://img2.local/images/2019/07/17/android_icon_512.png
            // dd($value->image_date->year);
            $month = $chvImage->image_date->i18nFormat('MM');
            $year = $chvImage->image_date->year;
            $day = $chvImage->image_date->day;

            $imgUrl .= $year . '/' . $month . '/' . $day . '/' . $chvImage->image_name . '.' . $chvImage->image_extension;

        } else { //direct http://img2.local/images/511323_04.jpg
            $imgUrl .= $chvImage->image_name . '.' . $chvImage->image_extension;
        }
        return $imgUrl;
    }


    public function escapeString($str)
    {
        $conn = \Cake\Datasource\ConnectionManager::get('default')->config();
        $mysqli = new \mysqli($conn['host'], $conn['username'], $conn['password'], $conn['database']);
        $search_term = mysqli_real_escape_string($mysqli, $str);

        return $search_term;
    }


    public function initialize(array $config)
    {
        $this->customUtil = new Custom();

        $this->Users = TableRegistry::get('Users');
        $this->GeneralSettings = TableRegistry::get('GeneralSettings');
        $this->ChvUsers = TableRegistry::get('ChvUsers');
        $this->ChvImages = TableRegistry::get('ChvImages');
        $this->ChvImagesDeleted = TableRegistry::get('ChvImagesDeleted');

    }
}
