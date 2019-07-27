<?php
namespace App\Shell;

use App\Controller\Component\CustomComponent;
use App\Utility\Custom;
use Cake\Console\Shell;
use Cake\Controller\ComponentRegistry;

/**
 * Img shell command.
 */
class ImgShell extends Shell
{
    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    public $Cu; //for use with custom utility

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('ChvImages');
        $this->loadModel('ChvIpBans');
        $this->loadModel('GeneralSettings');
        $this->loadModel('ChvUsers');

        $this->Cu = new Custom();
        $this->Custom = new CustomComponent(new ComponentRegistry());
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        //$this->out($this->OptionParser->help());

        $settings = $this->getSettings();

        $chvImages = $this->ChvImages->find()->where(['ChvImages.rapid_response IS NULL'])->limit(100)->toArray();
        \Unirest\Request::verifyPeer(false);

        // $imgUrl = "https://img26.pixhost.to/images/23/89442920_tenshin_sasaki_m04_009.jpg";

        // $response = \Unirest\Request::get("https://mdr8.p.rapidapi.com/api/v2?url=" . $imgUrl,
        //     array(
        //         "X-RapidAPI-Host" => "mdr8.p.rapidapi.com",
        //         "X-RapidAPI-Key" => "34ea86c39dmshfe08097d58720ecp107eecjsn24e939af33d2",
        //         "face" => "true",
        //     )
        // );

        // // $response = \Unirest\Request::get("https://im-api1.webpurify.com/services/rest/?method=webpurify.aim.imgcheck&api_key=1bf12b96e618b1076c729a3379a27b19&format=json&cats=nudity,wad&imgurl=" . $imgUrl);
        // dd((int)$response->headers['Age']);

        if (!empty($chvImages)) {

            foreach ($chvImages as $key => $chvImage) {
                if ($chvImage->image_size > 1200000) { //about 9.6megs
                    $chvImage->pending_review = 1;
                    $chvImage->rapid_response = "large image";
                } else {

                    $imgUrl = $this->Custom->getImageUrl($chvImage);

                    $response = \Unirest\Request::get("https://mdr8.p.rapidapi.com/api/v2?url=" . $imgUrl,
                        array(
                            "X-RapidAPI-Host" => "mdr8.p.rapidapi.com",
                            "X-RapidAPI-Key" => "34ea86c39dmshfe08097d58720ecp107eecjsn24e939af33d2",
                        )
                    );
                    // dd($response->raw_body);
                    // 1200000
                    if ($response->code == 200) {
                        $chvImage->rapid_response = $response->raw_body;
                        $chvImage->api_rating = $response->body->rating_label;
                        $chvImage->api_age = (int) $response->headers['Age'];
                        if ($response->body->rating_label != "everyone" and (int) $response->headers['Age'] < 18) {
                            $chvImage->image_nsfw = 1;
                            $chvImage->pending_review = 1;
                        }
                    } else {
                        $chvImage->pending_review = 1;
                    }
                }

                if ($this->ChvImages->save($chvImage)) {

                } else {
                    $this->out(json_encode($chvImage));
                }
            }
        } else {
            $this->out('no images to scan');
        }

    }

    private function webPurifyRequest($chvImage, $imgUrl)
    {
        // $response = \Unirest\Request::get("https://im-api1.webpurify.com/services/rest/?method=webpurify.aim.imgaccount&api_key=1bf12b96e618b1076c729a3379a27b19&format=json");

        $response = \Unirest\Request::get("https://im-api1.webpurify.com/services/rest/?method=webpurify.aim.imgcheck&api_key=1bf12b96e618b1076c729a3379a27b19&format=json&cats=wad&imgurl=" . $imgUrl);

        if ($response->code == 200) {
            if ((float) $response->body->rsp->weapon > 55) {
                $this->deleteImage($chvImage);
                $this->banUser($chvImage, $imgUrl);
                $this->banIp($chvImage);
            } else {
                $chvImage->webpurify_response = $response->raw_body;
                $this->ChvImages->save($chvImage);
            }
        }
    }

    private function deleteImage($chvImage)
    {
        if ($this->ChvImages->delete($chvImage)) {
            return true;
        }
        return false;
    }

    private function getSettings()
    {

        return $this->GeneralSettings->get(1);
    }

    //old image check code
    // if ($chvImage->image_storage_mode == "datefolder") { //http://img2.local/images/2019/07/17/android_icon_512.png
    //     // dd($chvImage->image_date->year);

    //     $month = $chvImage->image_date->i18nFormat('MM');
    //     $year = $chvImage->image_date->year;
    //     $day = $chvImage->image_date->day;

    //     $imgUrl .= $year . '/' . $month . '/' . $day . '/' . $chvImage->image_name . '.' . $chvImage->image_extension;

    // } else { //direct http://img2.local/images/511323_04.jpg
    // }

    // https://im-api1.webpurify.com/services/rest/?method=webpurify.aim.imgcheck&api_key=1bf12b96e618b1076c729a3379a27b19&format=json&imgurl=http://farm1.static.flickr.com/30/59010752_4d16aca1ec_o.jpg

    //     https://im-api1.webpurify.com/services/rest/?method=webpurify.aim.imgcheck&api_key=1bf12b96e618b1076c729a3379a27b19&format=json&cats=nudity,wad,offensive,celebrities,text&imgurl=http://cdn.hotnakedgirls.net/2019-04-21/580853_02.jpg
    //     https://im-api1.webpurify.com/services/rest/?method=webpurify.aim.imgcheck&api_key=1bf12b96e618b1076c729a3379a27b19&format=json&cats=wad&imgurl=http://cdn.hotnakedgirls.net/2019-04-21/580853_02.jpg

    //         https://im-api1.webpurify.com/services/rest/?method=webpurify.aim.imgaccount&api_key=1bf12b96e618b1076c729a3379a27b19&format=json

    // $imgUrl = "https://images.pexels.com/photos/210019/pexels-photo-210019.jpeg";

    // $response = \Unirest\Request::get("https://im-api1.webpurify.com/services/rest/?method=webpurify.aim.imgcheck&api_key=1bf12b96e618b1076c729a3379a27b19&format=json&cats=wad&imgurl=https://image.shutterstock.com/image-photo/beautiful-sexy-girl-gun-260nw-1020688039.jpg");

    // debug($response->code);
    // debug($response);
    // dd((float) $response->body->rsp->weapon);

    // dd($response);

}
