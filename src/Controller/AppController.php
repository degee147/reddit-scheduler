<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Utility\Custom;
use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    public $Cu; //for use with custom utility
    

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Users');
        $this->loadModel('Posts');
        $this->loadModel('Accounts');
        $this->loadModel('Subreddits');

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Custom');
        $this->loadComponent('Reddit');

        $this->loadComponent('Auth', [
            // 'authorize' => ['Controller'],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        // 'username' => 'email'
                        'username' => 'username_or_email',
                    ],
                    'finder' => 'auth',
                ],
            ],
            'loginAction' => [
                'prefix' => false,
                'controller' => 'users',
                'action' => 'login',
                //  'plugin' => 'Users'
            ],
            'authError' => 'Login to continue.',
            'storage' => 'Session',
        ]);

        $this->viewBuilder()->setLayout('Backend.backend');
        $this->viewBuilder()->setTheme("Backend");

        $this->viewCounts = $this->getViewCounts();
        $this->set("viewCounts", $this->viewCounts);

        $this->Cu = new Custom();

        $accounts = $this->Accounts->find('list', ['limit' => 2000]);
        $subreddits = $this->Subreddits->find('list', ['limit' => 2000]);
        $this->set(compact('accounts', 'subreddits'));


        $this->Reddit->postToReddit();
        // $this->Reddit->getAccess();
        // $str = "degee";
        // debug($str);
        // $en = $this->Reddit->encrypt($str);
        // debug($en);
        // $dc = $this->Reddit->decrypt($en);
        // debug($dc);
        // dd();
        


        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
    private function getViewCounts()
    {
        return [
            'users' => $this->Users->find('all')->count(),
            'accounts' => $this->Accounts->find('all')->count(),
            'posts' => $this->Posts->find('all')->count(),
            'subreddits' => $this->Subreddits->find('all')->count(),
        ];

    }
}
