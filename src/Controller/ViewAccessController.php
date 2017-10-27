<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ViewAccess Controller
 *
 * @property \App\Model\Table\ViewAccessTable $ViewAccess
 *
 * @method \App\Model\Entity\ViewAcces[] paginate($object = null, array $settings = [])
 */
class ViewAccessController extends AppController
{

   

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $viewAccess = $this->paginate($this->ViewAccess);

        $this->set(compact('viewAccess'));
        $this->set('_serialize', ['viewAccess']);
    }

    /**
     * View method
     *
     * @param string|null $id View Acces id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $viewAcces = $this->ViewAccess->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('viewAcces', $viewAcces);
        $this->set('_serialize', ['viewAcces']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $viewAcces = $this->ViewAccess->newEntity();
        if ($this->request->is('post')) {
            $viewAcces = $this->ViewAccess->patchEntity($viewAcces, $this->request->getData());
            if ($this->ViewAccess->save($viewAcces)) {
                $this->Flash->success(__('The view acces has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The view acces could not be saved. Please, try again.'));
        }
        $roles = $this->ViewAccess->Roles->find('list', ['limit' => 200]);
        $this->set(compact('viewAcces', 'roles'));
        $this->set('_serialize', ['viewAcces']);
    }

    /**
     * Edit method
     *
     * @param string|null $id View Acces id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $viewAcces = $this->ViewAccess->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $viewAcces = $this->ViewAccess->patchEntity($viewAcces, $this->request->getData());
            if ($this->ViewAccess->save($viewAcces)) {
                $this->Flash->success(__('The view acces has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The view acces could not be saved. Please, try again.'));
        }
        $roles = $this->ViewAccess->Roles->find('list', ['limit' => 200]);
        $this->set(compact('viewAcces', 'roles'));
        $this->set('_serialize', ['viewAcces']);
    }

    /**
     * Delete method
     *
     * @param string|null $id View Acces id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $viewAcces = $this->ViewAccess->get($id);
        if ($this->ViewAccess->delete($viewAcces)) {
            $this->Flash->success(__('The view acces has been deleted.'));
        } else {
            $this->Flash->error(__('The view acces could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
