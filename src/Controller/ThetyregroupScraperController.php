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
        $data[0] =[
          'form' => '1',
          'width' => '205',
          'profile' => '55',
          'rim' => '16',
          'speed' => '',
          'brand' => 'CONTINENTAL',
          'x' => '76',
          'y' => '12'

        ];

        $data[1] =[
          'form' => '1',
          'width' => '210',
          'profile' => '55',
          'rim' => '16',
          'speed' => '',
          'brand' => 'CONTINENTAL',
          'x' => '76',
          'y' => '12'

        ];

        $data[2] =[
          'form' => '1',
          'width' => '215',
          'profile' => '55',
          'rim' => '16',
          'speed' => '',
          'brand' => 'CONTINENTAL',
          'x' => '76',
          'y' => '12'

        ];


         $this->webScraping($data[0]);


         dd('die');



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

    public function webScraping($data){

      $http = new Client();
      //$url = 'http://www.dexel.co.uk';
      //$width = 205;
      //$aspectRatio = 55;
      //$rim = 16;


      $response = $http->get('http://www.thetyregroup.co.uk/tyre-results', $data);

      //  usleep(1000000 + rand(0, 4000000));


        $dom = str_get_html($response->body);

        $element = $dom->find(".result");
        $element1 = $dom->find(".price");

      //  $data = [];


        $n = 0;

        foreach ($element as $ele) {

          $input_data[$n] = [

            "Brand_name" => preg_split('/[\s,]+/', $ele->children(1)->children(0)->children(0)->plaintext)[0],
            "Pattern_name" => preg_split('/[\s,]+/', $ele->children(1)->children(0)->children(0)->plaintext)[1] .' '. preg_split('/[\s,]+/', $ele->children(1)->children(0)->children(0)->plaintext)[2],
            "Price" => $this->preg_match_single('/([0-9]+\.[0-9]+)/', $element1[$n]->plaintext),
            "Width" => $this->preg_match_single('/(\d+)/', $ele->children(1)->children(1)->children(0)->plaintext),
            "AspectRatio" => $this->preg_match_many('/(\d+)/', $ele->children(1)->children(1)->children(0)->plaintext)[0][1][0],
            "Rim" => $this->preg_match_many('/(\d+)/', $ele->children(1)->children(1)->children(0)->plaintext)[0][2][0],
            "Speed_rating" => $this->preg_match_single('/[a-zA-Z]/', $ele->children(1)->children(1)->children(0)->plaintext),
            "Load_index" => $this->preg_match_many('/[0-9]+/', $ele->children(1)->children(0)->children(0)->plaintext)[0][1][0],
            "Url" => "http://www.thetyregroup.co.uk/tyre-results"
          ];

          $n++;


      }

      $this->saveData($input_data);



     }





    public function saveData($data){



      foreach ($data as $get_data) {




        date_default_timezone_set('Europe/London');
        $date = date('d/m/Y h:i:s a', time());

        $thetyregroupScraper = $this->ThetyregroupScraper->newEntity();

        $thetyregroupScraper->Brand_name = $get_data["Brand_name"];
        $thetyregroupScraper->Pattern_name = $get_data["Pattern_name"];
        $thetyregroupScraper->Tyre_size = $get_data["Width"] .'/'. $get_data["AspectRatio"] .'. ' .$get_data["Rim"] . ' '.$get_data["Speed_rating"].' ('.$get_data["Load_index"].')';
        $thetyregroupScraper->Price = $get_data["Price"];
        $thetyregroupScraper->Url = $get_data["Url"];
        $thetyregroupScraper->Scrape_date = $date;

        $this->ThetyregroupScraper->save($thetyregroupScraper);
      }
    }



    public function findValue($parentElement, $childElement, $html){
       $element = $html->find($parentElement, 0)->find($childElement);
          foreach($element as $elem)
          {
             if($elem->getAttribute('selected') === "selected"){

               $result = $elem->value;
             }
          }
      return $result;
    }

    function preg_match_single($pattern, $subject) {
       return preg_match($pattern, $subject, $matches) ? end($matches) : null;
    }

    function preg_match_many($regex, $data){
      preg_match_all($regex, $data, $matches, PREG_OFFSET_CAPTURE);
      return $matches;
    }

}
