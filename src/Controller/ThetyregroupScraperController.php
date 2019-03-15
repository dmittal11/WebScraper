<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Http\Client;

include_once "simple_html_dom.php";

/**
 * ThetyregroupScraper Controller
 *
 * @property \App\Model\Table\ThetyregroupScraperTable $ThetyregroupScraper
 *
 * @method \App\Model\Entity\ThetyregroupScraper[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ThetyregroupScraperController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

      $http = new Client();
      //$url = 'http://www.dexel.co.uk';
      //$width = 205;
      //$aspectRatio = 55;
      //$rim = 16;

      $response = $http->get('http://www.thetyregroup.co.uk/', [
        'width' => '205',
        'profile' => '55',
        'rim' => '16',
        'speed' => '',
        'brand' => 'CONTINENTAL',
        'x' => rand(0, 150),
        'y' => rand(0, 30),
      ]);

      /*
          Use the code: $response->isOk(); And $response->getStatusCode(); to make sure get or post request works.
          Status code, as can been seen in the header.. on network in the browser, the status code should be 200. i.e. OK.

          additional information for the form that can be used for post or get request can be obtained from the header shown in network in the browser.  

      */

      usleep(1000000 + rand(0, 4000000));

      $dom = str_get_html($response->body);

      $dom->dump();

      dd('After');





        // $thetyregroupScraper = $this->paginate($this->ThetyregroupScraper);
        //
        // $this->set(compact('thetyregroupScraper'));
    }

    /**
     * View method
     *
     * @param string|null $id Thetyregroup Scraper id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $thetyregroupScraper = $this->ThetyregroupScraper->get($id, [
            'contain' => []
        ]);

        $this->set('thetyregroupScraper', $thetyregroupScraper);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $thetyregroupScraper = $this->ThetyregroupScraper->newEntity();
        if ($this->request->is('post')) {
            $thetyregroupScraper = $this->ThetyregroupScraper->patchEntity($thetyregroupScraper, $this->request->getData());
            if ($this->ThetyregroupScraper->save($thetyregroupScraper)) {
                $this->Flash->success(__('The thetyregroup scraper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The thetyregroup scraper could not be saved. Please, try again.'));
        }
        $this->set(compact('thetyregroupScraper'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Thetyregroup Scraper id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $thetyregroupScraper = $this->ThetyregroupScraper->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $thetyregroupScraper = $this->ThetyregroupScraper->patchEntity($thetyregroupScraper, $this->request->getData());
            if ($this->ThetyregroupScraper->save($thetyregroupScraper)) {
                $this->Flash->success(__('The thetyregroup scraper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The thetyregroup scraper could not be saved. Please, try again.'));
        }
        $this->set(compact('thetyregroupScraper'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Thetyregroup Scraper id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $thetyregroupScraper = $this->ThetyregroupScraper->get($id);
        if ($this->ThetyregroupScraper->delete($thetyregroupScraper)) {
            $this->Flash->success(__('The thetyregroup scraper has been deleted.'));
        } else {
            $this->Flash->error(__('The thetyregroup scraper could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
