<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Http\Client;


include_once "simple_html_dom.php";

/**
 * Webscraper Controller
 *
 * @property \App\Model\Table\WebscraperTable $Webscraper
 *
 * @method \App\Model\Entity\Webscraper[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WebscraperController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {


        $http = new Client();

        $url = 'http://www.dexel.co.uk';
        $width = 205;
        $aspectRatio = 55;
        $rim = 16;

        /*

        $response = $http->get(
          $url.'/shopping/tyre-results?width='.$width.'&profile='.$aspectRatio.'&rim='.$rim.'&speed=.'
        );

        */

        $response = $http->get(
          $url.'/shopping/tyre-results?width='.$width.'&profile='.$aspectRatio.'&rim='.$rim.'&speed=.'
        );

        usleep(1000000 + rand(0, 4000000));

        if(!$response->isOk()){
          dd($response->isOk());
        }

        $dom = str_get_html($response->body);

        //$x = 'Hello';
        //$x->dump();

        //$dom->dump();

      //  dd($dom);

          foreach($dom->find('script') as $element){
            $element->dump();
          }

        //dd('die');

        // $scripts = $dom->find('script');
        // foreach($scripts as $s) {
        // if(strpos($s->innertext, 'allTyres') !== false) {
        //     $script = $s;
        //     $s->dump();
        // }

        dd('die');
    }





    /**
     * View method
     *
     * @param string|null $id Webscraper id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $webscraper = $this->Webscraper->get($id, [
            'contain' => []
        ]);

        $this->set('webscraper', $webscraper);
    }



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $webscraper = $this->Webscraper->newEntity();
        if ($this->request->is('post')) {
            $webscraper = $this->Webscraper->patchEntity($webscraper, $this->request->getData());
            if ($this->Webscraper->save($webscraper)) {
                $this->Flash->success(__('The webscraper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The webscraper could not be saved. Please, try again.'));
        }
        $this->set(compact('webscraper'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Webscraper id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $webscraper = $this->Webscraper->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $webscraper = $this->Webscraper->patchEntity($webscraper, $this->request->getData());
            if ($this->Webscraper->save($webscraper)) {
                $this->Flash->success(__('The webscraper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The webscraper could not be saved. Please, try again.'));
        }
        $this->set(compact('webscraper'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Webscraper id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $webscraper = $this->Webscraper->get($id);
        if ($this->Webscraper->delete($webscraper)) {
            $this->Flash->success(__('The webscraper has been deleted.'));
        } else {
            $this->Flash->error(__('The webscraper could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
