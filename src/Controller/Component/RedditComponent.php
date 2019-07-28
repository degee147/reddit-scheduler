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
    public function getAccessToken()
    {

        $account = $this->Accounts->get(1);
        $password = $this->decrypt($account->password);

        dd($password);

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
        dd($response);
        return ($httpcode >= 200 && $httpcode < 300) ? $data : false;

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
