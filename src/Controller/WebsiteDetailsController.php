<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WebsiteDetails Controller
 *
 * @property \App\Model\Table\WebsiteDetailsTable $WebsiteDetails
 *
 * @method \App\Model\Entity\WebsiteDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WebsiteDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $websiteDetails = $this->paginate($this->WebsiteDetails);

        $this->set(compact('websiteDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Website Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $websiteDetail = $this->WebsiteDetails->get($id, [
            'contain' => ['WebsiteScraper']
        ]);

        $this->set('websiteDetail', $websiteDetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $websiteDetail = $this->WebsiteDetails->newEntity();
        if ($this->request->is('post')) {
            $websiteDetail = $this->WebsiteDetails->patchEntity($websiteDetail, $this->request->getData());
            if ($this->WebsiteDetails->save($websiteDetail)) {
                $this->Flash->success(__('The website detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The website detail could not be saved. Please, try again.'));
        }
        $this->set(compact('websiteDetail'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Website Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $websiteDetail = $this->WebsiteDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $websiteDetail = $this->WebsiteDetails->patchEntity($websiteDetail, $this->request->getData());
            if ($this->WebsiteDetails->save($websiteDetail)) {
                $this->Flash->success(__('The website detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The website detail could not be saved. Please, try again.'));
        }
        $this->set(compact('websiteDetail'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Website Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $websiteDetail = $this->WebsiteDetails->get($id);
        if ($this->WebsiteDetails->delete($websiteDetail)) {
            $this->Flash->success(__('The website detail has been deleted.'));
        } else {
            $this->Flash->error(__('The website detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
