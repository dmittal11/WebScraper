<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NationalScraper Controller
 *
 * @property \App\Model\Table\NationalScraperTable $NationalScraper
 *
 * @method \App\Model\Entity\NationalScraper[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NationalScraperController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $nationalScraper = $this->paginate($this->NationalScraper);

        $this->set(compact('nationalScraper'));
    }

    /**
     * View method
     *
     * @param string|null $id National Scraper id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nationalScraper = $this->NationalScraper->get($id, [
            'contain' => []
        ]);

        $this->set('nationalScraper', $nationalScraper);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nationalScraper = $this->NationalScraper->newEntity();
        if ($this->request->is('post')) {
            $nationalScraper = $this->NationalScraper->patchEntity($nationalScraper, $this->request->getData());
            if ($this->NationalScraper->save($nationalScraper)) {
                $this->Flash->success(__('The national scraper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The national scraper could not be saved. Please, try again.'));
        }
        $this->set(compact('nationalScraper'));
    }

    /**
     * Edit method
     *
     * @param string|null $id National Scraper id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nationalScraper = $this->NationalScraper->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nationalScraper = $this->NationalScraper->patchEntity($nationalScraper, $this->request->getData());
            if ($this->NationalScraper->save($nationalScraper)) {
                $this->Flash->success(__('The national scraper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The national scraper could not be saved. Please, try again.'));
        }
        $this->set(compact('nationalScraper'));
    }

    /**
     * Delete method
     *
     * @param string|null $id National Scraper id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nationalScraper = $this->NationalScraper->get($id);
        if ($this->NationalScraper->delete($nationalScraper)) {
            $this->Flash->success(__('The national scraper has been deleted.'));
        } else {
            $this->Flash->error(__('The national scraper could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
