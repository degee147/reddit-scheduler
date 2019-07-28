<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subreddits Controller
 *
 * @property \App\Model\Table\SubredditsTable $Subreddits
 *
 * @method \App\Model\Entity\Subreddit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubredditsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        //$this->loadModel('Departments');
        $this->set('page', "subreddits");
        
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $subreddits = $this->Subreddits->find('all');
        $this->set(compact('subreddits'));
    }

    /**
     * View method
     *
     * @param string|null $id Subreddit id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subreddit = $this->Subreddits->get($id, [
            'contain' => ['Posts']
        ]);

        $this->set('subreddit', $subreddit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subreddit = $this->Subreddits->newEntity();
        if ($this->request->is('post')) {
            $subreddit = $this->Subreddits->patchEntity($subreddit, $this->request->getData());
            if ($this->Subreddits->save($subreddit)) {
                $this->Flash->success(__('The subreddit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subreddit could not be saved. Please, try again.'));
        }
        $this->set(compact('subreddit'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Subreddit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subreddit = $this->Subreddits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subreddit = $this->Subreddits->patchEntity($subreddit, $this->request->getData());
            if ($this->Subreddits->save($subreddit)) {
                $this->Flash->success(__('The subreddit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subreddit could not be saved. Please, try again.'));
        }
        $this->set(compact('subreddit'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Subreddit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subreddit = $this->Subreddits->get($id);
        if ($this->Subreddits->delete($subreddit)) {
            $this->Flash->success(__('The subreddit has been deleted.'));
        } else {
            $this->Flash->error(__('The subreddit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
