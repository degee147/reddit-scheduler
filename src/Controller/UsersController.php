<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout', 'login']);
        $this->set('page', "users");
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {        
    }
    public function banned()
    {
        $this->set('page', "user_banned");
    }
    public function bannedIps()
    {
        $this->set('page', "banned_ips");
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if(!$this->Auth->user('sa')){
            // $this->Log->sendLog($this->Auth->user('id'), json_encode($this->request->params), "Tried to view all users");
            return $this->redirect(['controller' => 'dashboard','action' => 'index']);
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function logout()
    {
        /*  $this->Auth->logout();
        return $this->redirect([
        'controller'=> 'Dashboard',
        'action' => 'index'
        ]);*/
        //$this->Custom->sendLog("logged out", 1);
        return $this->redirect($this->Auth->logout());
    }
    public function login()
    {
        

        if ($this->Auth->user('id')) {
            $this->Flash->default(__('You\'re logged in'));
            return $this->redirect([
                'prefix' => false,
                'controller' => 'dashboard',
                'action' => 'index',
            ]);
        }

        if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            if ($user) {

                $this->Auth->setUser($user);

                //dd($this->Auth->user());

                $user = $this->Users->get($this->Auth->user('id'), [
                    'contain' => [],
                ]);

                //dd($user);

                $this->Flash->default(__('Welcome back, ' . ucfirst($user['firstname']) . '.'));
                //$this->Custom->sendLog("logged in", 1, null, null, false);

                //dd($this->Auth->redirectUrl());
                if ($this->Auth->redirectUrl() != '/') {
                    return $this->redirect($this->Auth->redirectUrl());
                }

                return $this->redirect([
                    'prefix' => false,
                    'controller' => 'dashboard',
                    'action' => 'index',
                ]);

            } else {
                $this->Flash->error(__('Username or password is incorrect'), [
                    'key' => 'auth',
                ]);
            }
        }

    }

}
