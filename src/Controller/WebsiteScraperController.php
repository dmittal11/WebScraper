<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Http\Client;

include_once "simple_html_dom.php";

/**
 * WebsiteScraper Controller
 *
 * @property \App\Model\Table\WebsiteScraperTable $WebsiteScraper
 *
 * @method \App\Model\Entity\WebsiteScraper[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WebsiteScraperController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {





       $this->webScraping($data[0]);


       dd('die');

        // $this->paginate = [
        //     'contain' => ['TyreDetails', 'WebsiteDetails']
        // ];
        // $websiteScraper = $this->paginate($this->WebsiteScraper);
        //
        // $this->set(compact('websiteScraper'));
    }

    /**
     * View method
     *
     * @param string|null $id Website Scraper id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $websiteScraper = $this->WebsiteScraper->get($id, [
            'contain' => ['TyreDetails', 'WebsiteDetails']
        ]);

        $this->set('websiteScraper', $websiteScraper);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $websiteScraper = $this->WebsiteScraper->newEntity();
        if ($this->request->is('post')) {
            $websiteScraper = $this->WebsiteScraper->patchEntity($websiteScraper, $this->request->getData());
            if ($this->WebsiteScraper->save($websiteScraper)) {
                $this->Flash->success(__('The website scraper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The website scraper could not be saved. Please, try again.'));
        }
        $tyreDetails = $this->WebsiteScraper->TyreDetails->find('list', ['limit' => 200]);
        $websiteDetails = $this->WebsiteScraper->WebsiteDetails->find('list', ['limit' => 200]);
        $this->set(compact('websiteScraper', 'tyreDetails', 'websiteDetails'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Website Scraper id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $websiteScraper = $this->WebsiteScraper->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $websiteScraper = $this->WebsiteScraper->patchEntity($websiteScraper, $this->request->getData());
            if ($this->WebsiteScraper->save($websiteScraper)) {
                $this->Flash->success(__('The website scraper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The website scraper could not be saved. Please, try again.'));
        }
        $tyreDetails = $this->WebsiteScraper->TyreDetails->find('list', ['limit' => 200]);
        $websiteDetails = $this->WebsiteScraper->WebsiteDetails->find('list', ['limit' => 200]);
        $this->set(compact('websiteScraper', 'tyreDetails', 'websiteDetails'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Website Scraper id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $websiteScraper = $this->WebsiteScraper->get($id);
        if ($this->WebsiteScraper->delete($websiteScraper)) {
            $this->Flash->success(__('The website scraper has been deleted.'));
        } else {
            $this->Flash->error(__('The website scraper could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function saveData($data){



      foreach ($data as $get_data) {




        date_default_timezone_set('Europe/London');
        $date = date('d/m/Y h:i:s a', time());

        $websiteScraper = $this->WebsiteScraper->newEntity();

        $websiteScraper->Brand_name = $get_data["Brand_name"];
        $websiteScraper->Pattern_name = $get_data["Pattern_name"];
        $websiteScraper->Tyre_size = $get_data["Width"] .'/'. $get_data["AspectRatio"] .'. ' .$get_data["Rim"] . ' '.$get_data["Speed_rating"].' ('.$get_data["Load_index"].')';
        $websiteScraper->Price = $get_data["Price"];
        $websiteScraper->Url = $get_data["Url"];
        $websiteScraper->Scrape_date = $date;
        $websiteScraper->tyre_detail_id = $get_data["tyre_detail_id"];
        $websiteScraper->website_detail_id = $get_data["website_detail_id"];

        $this->WebsiteScraper->save($websiteScraper);
      }
    }

}
