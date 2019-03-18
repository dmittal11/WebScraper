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



    public function webScraping($data){

      $http = new Client();
      //$url = 'http://www.dexel.co.uk';
      //$width = 205;
      //$aspectRatio = 55;
      //$rim = 16;

      $this->loadModel('TyreDetails');
      $this->loadModel('WebsiteDetails');


      $websiteDetail = $this->WebsiteDetails->find('all')->toArray();
      $tyreDetail = $this->TyreDetails->find('all')->toArray();


      foreach ($websiteDetail as $webDetail) {

        if($webDetail->Url == 'http://www.dexel.co.uk')
          {

          }
          else if($webDetail->Url == 'http://www.national.co.uk'){

            foreach($tyreDetail as $tyDetail){

                $response = $http->get($webDetail->Url.'/tyres-search?Width='.$tyDetail->width.'&Profile='.$tyDetail->aspect_ratio.'&Diamteter='.$tyDetail->rim.'&Rating=&loadIndex=');
                $this->
            }



          }
        }
      }

      //dd($websiteDetail);

      $http = new Client();
      $response = $http->get('https://www.national.co.uk/');


      foreach($tyreSizes as $size){
        $data[] =
            [
              'form' => '1',
              'width' => $size['width'],
              'profile' => $size['profile'],
              'rim' => $size['rim'],
              'speed' => '',
              'brand' => 'CONTINENTAL',
              'x' => '76',
              'y' => '12'
          ];
      }


      $response = $http->get('http://www.thetyregroup.co.uk/tyre-results', $data);

      //  usleep(1000000 + rand(0, 4000000));


        $dom = str_get_html($response->body);

        $element = $dom->find(".result");
        $element1 = $dom->find(".price");

      //  $data = [];


        $n = 0;

        foreach ($element as $ele) {

          $pieces = preg_split('/[\s,]+/', $ele->find('.tyreTitle', 0)->plaintext);

          $brand = $pieces[0];
          $pattern = $pieces[1] . ' ' . $pieces[2];

          $input_data[$n] = [

            "Brand_name" => $brand,
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


      public function webScrapeNational(){





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
