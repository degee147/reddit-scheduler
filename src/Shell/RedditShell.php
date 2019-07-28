<?php
namespace App\Shell;

use Cake\Console\Shell;
use App\Controller\Component\CustomComponent;
use App\Controller\Component\RedditComponent;
use App\Utility\Custom;
use Cake\Controller\ComponentRegistry;

/**
 * Reddit shell command.
 */
class RedditShell extends Shell
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
        $this->loadModel('Users');
        $this->loadModel('Posts');
        $this->loadModel('Accounts');
        $this->loadModel('Subreddits');

        $this->Cu = new Custom();
        $this->Custom = new CustomComponent(new ComponentRegistry());
        $this->Reddit = new RedditComponent(new ComponentRegistry());
    }


    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        // $this->out($this->OptionParser->help());
        $posts = $this->Posts->find()->where(['Posts.success' => 0])->contain($this->Reddit->postContains())->limit(100)->toArray();

        if(!empty($posts)){
            $access = (object)[];
            $current_account = 0;
            foreach ($posts as $key => $post) {
                if(empty($access) or $current_account != $post->account_id){
                    $accessRequest = $this->Reddit->getAccess($post->account_id);
                    if($accessRequest != false){
                        $access = $accessRequest;     
                        $current_account = $post->account_id;
                    }
                }
                if(!empty($access)){
                    $this->Reddit->postToReddit($post, $access);                
                }
            }

        }

    }
}
