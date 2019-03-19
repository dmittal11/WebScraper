<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Http\Client;

use Cake\I18n\Time;

include_once "simple_html_dom.php";

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


      $http = new Client();

      $this->loadModel('TyreDetails');
      $tyreDetail = $this->TyreDetails->find('all')->toArray();

      foreach ($tyreDetail as $tyDetail) {
        usleep(1000000 + rand(0, 4000000));
        $response = $http->get('http://www.national.co.uk/tyres-search?Width='.$tyDetail->width.'&Profile='.$tyDetail->aspect_ratio.'&Diamteter='.$tyDetail->rim.'&Rating=&loadIndex=');
        $this->webScraping($response->body, $tyDetail);

      }













      dd('die');


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

    public function webScraping($data, $tyre_details){

      $this->loadModel('WebsiteScraper');
      $this->loadModel('WebsiteDetails');



      $dom = str_get_html($data);

      $website = $this->WebsiteDetails->find('all', [
        'conditions' => [
          'Url' => 'national'
        ]
      ])
      ->first();

      $web_data = [];



      $n = 0;

      while($element = $dom->find('MainContent_ucTyreResults_rptTyres_divTyre_'.$n)){

        dd('Here');

        // Assign Variables

        $brand_name = $this->preg_match_single('/^([\w\-]+)/', $element->find('img[id=MainContent_ucTyreResults_rptTyres_imgBrand_'.$n.']', 0)->alt);
        $pattern_name = $element->find('a[id=MainContent_ucTyreResults_rptTyres_hypPattern_'.$n.']', 0)->plaintext;
        $price = $this->$element->find('meta[id=MainContent_ucTyreResults_rptTyres_metaPrice_'.$n.']', 0)->content;
        $load_index = $element->find(".detail", 0)->children(2)->plaintext;
        $speed_rating = $element->find(".detail", 0)->children(3)->plaintext;

        $web_data[$n] =[

          "Brand_name" => $brand_name,
          "Pattern_name" => $pattern_name,
          "Price" => $price,
          "Width" => $tyre_details->width,
          "AspectRatio" => $tyre_details->aspect_ratio,
          "Rim" => $tyre_details->rim,
          "Load_index" => $load_index,
          "Speed_rating" => $speed_rating,
          "Url" => 'https://www.national.co.uk/tyres-search?Width='.$tyre_details->width.'&Profile='.$tyre_details->aspect_ratio.'&Diameter='.$tyre_details->rim.'&Rating='.$speed_rating.'&LoadIndex='.$load_index,
          "tyre_detail_id" => $tyre_details->id,
          "website_detail_id" => $website->id

        ];

        $n++;

          dd($web_data);


      }




      //$this->WebsiteScraper->saveData($web_data);


    }


    public function saveData($data){

        date_default_timezone_set('Europe/London');
        $date = date('d/m/Y h:i:s a', time());

        $nationalScraper = $this->NationalScraper->newEntity();

        $nationalScraper->Brand_name = $data["Brand_name"];
        $nationalScraper->Pattern_name = $data["Pattern_name"];
        $nationalScraper->Tyre_size = $data["Width"] .'/'. $data["AspectRatio"] .'. ' .$data["Rim"] . ' '.$data["Speed_rating"].' ('.$data["Load_index"].')';
        $nationalScraper->Price = $data["Price"];
        $nationalScraper->Url = $data["Url"];
        $nationalScraper->Scrape_date = $date;

        $this->NationalScraper->save($nationalScraper);
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



    public function calculateTyreSize($width, $profile, $rim){

      // Step 1: Multiply a tyre’s width by the aspect ratio to get aspect height

      $aspectHeight = $width * ($profile / 100);

      // Step 2: Convert into inches

      $inches = $aspectHeight / 25.4;

      // Step 3: Double the aspect height

      $doubleAspectHeight = 2 * $inches;

      // Step 4: Add inside diameter of tyre

      return $doubleAspectHeight + $rim;

    }

    function preg_match_single($pattern, $subject) {
       return preg_match($pattern, $subject, $matches) ? end($matches) : null;
    }

}
