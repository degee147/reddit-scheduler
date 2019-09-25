<?php

namespace App\Shell;

use App\Controller\Component\CustomComponent;
use App\Controller\Component\RedditComponent;
use App\Utility\Custom;
use Cake\Console\Shell;
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
        $posts = $this->Posts->find()->where(['Posts.success' => 0])->contain($this->Reddit->postContains())
            ->limit(1000)
            ->toArray();

        if (!empty($posts)) {
            $access = (object) [];
            $current_account = 0;
            foreach ($posts as $key => $post) {
                $this->out('posting ' . $post->title);
                if (empty($access) or $current_account != $post->account_id) {
                    $this->out('requesting access');
                    $accessRequest = $this->Reddit->getAccess($post->account_id);
                    if ($accessRequest != false) {
                        $access = $accessRequest;
                        $this->out('has access');
                        $this->out('access is ' . json_encode($accessRequest));
                        $current_account = $post->account_id;
                    }
                }
                if (!empty($access)) {
                    $time = new \Cake\I18n\Time($post->schedule);
                    $this->out('posting');
                    $this->out('time now is ' . time());
                    $this->out('post time is ' . (int) $time->toUnixString());


                    if ($time->isThisWeek() and time() > (int) $time->toUnixString()) {
                    // if (time() > (int) $time->toUnixString()) {
                        $this->out('time to post');
                        $posted = $this->Reddit->postToReddit($post, $access);
                        $this->out('posted is ' . $posted);
                    }
                }

                sleep(10);
            }
        }
    }
}
