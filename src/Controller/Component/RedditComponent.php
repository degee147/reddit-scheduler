<?php
namespace App\Controller\Component;

use App\Utility\Custom;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

/**
 * Reddit component
 */
class RedditComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public $components = ['Flash', 'Auth'];
    public $customUtil; //for use with custom utility
    public $security_key = 'HUyAcYRZ5ZPcrRcEmHt7urJAuZ3MaaGcPGmTwRSvNjaqp6Euvu';

    public function postContains()
    {
        return ['Accounts', 'Subreddits'];
    }

    public function postToReddit($post = null, $access = false)
    {
        // $post = $this->Posts->find()->where(['Posts.id' => 4])->contain($this->postContains())->first();
        // dd($post->account->name);
        
        if (!empty($post->account) and !empty($post->subreddit) and $access != false) {
            // dd('User-Agent: '.$post->account->name.':v0.0.1 (by /u/'.$post->account->name.')');
            // dd($post->subreddit->name . ' by /u/' . $post->account->name . ' PhSch 1.0');

            $postData = [
                'url' => $post->url,
                'title' => $post->title,
                'sr' => $post->subreddit->name,
                'flair_id'=> $post->flair,
                'flair_text'=> $post->flair,
                // 'sr' => "science",
                'kind' => 'link',
            ];

            // dd($post->subreddit->name);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://oauth.reddit.com/api/submit');
            // curl_setopt($ch, CURLOPT_URL, 'https://www.reddit.com/api/v1/submit');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_USERAGENT, $post->subreddit->name . ' by /u/' . $post->account->name . ' PhSch 1.0');
            curl_setopt($ch, CURLOPT_USERAGENT, 'User-Agent: '.$post->account->name.':v0.0.1 (by /u/'.$post->account->name.')');
            curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: " . $access->token_type . " " . $access->access_token]);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $data = curl_exec($ch);
            $response = json_decode($data);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            // var_dump($response->success);
            // dd('ss');
            if($httpcode >= 200 && $httpcode < 300){
                $post->success = $response->success;
                $this->Posts->save($post);
                return true;        
            }
        }
        return false;

    }

    public function getAccess($id = 1)
    {

        $account = $this->Accounts->get($id);
        $password = $this->decrypt($account->password);
        $params = [
            'grant_type' => 'password',
            'username' => $account->name,
            'password' => $password,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.reddit.com/api/v1/access_token');
        curl_setopt($ch, CURLOPT_USERPWD, $account->clientid . ':' . $account->client_secret);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        $response = json_decode($data);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        // dd($response);
        return ($httpcode >= 200 && $httpcode < 300) ? $response : false;
        // return ($httpcode >= 200 && $httpcode < 300) ? $data : false;
    }

    public function encrypt($string)
    {
        return $this->encrypt_openssl($string);
        // return \Cake\Utility\Security::encrypt($string, $this->security_key);
    }

    public function decrypt($string)
    {
        return $this->decrypt_openssl($string);
        // return \Cake\Utility\Security::decrypt($string, $this->security_key);
    }

    public function encrypt_openssl($string)
    {
        $key = $this->security_key;
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($string, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $this->security_key, $as_binary = true);
        $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
        return $ciphertext;

    }

    public function decrypt_openssl($string)
    {
        $c = base64_decode($string);
        $key = $this->security_key;
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        if (hash_equals($hmac, $calcmac)) //PHP 5.6+ timing attack safe comparison
        {
            return $original_plaintext;
        }

        return false;
    }

    public function initialize(array $config)
    {
        $this->customUtil = new Custom();

        $this->Users = TableRegistry::get('Users');
        $this->Posts = TableRegistry::get('Posts');
        $this->Accounts = TableRegistry::get('Accounts');
        $this->Subreddits = TableRegistry::get('Subreddits');

    }
}
