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

      $inputData[0] = [
        'url' => 'https://www.national.co.uk',
        'width' => '165',
        'aspectRatio' => '60',
        'rim' => '15',
        'rating' => 'H',
        'loadIndex' => '77'
      ];

      $inputData[1] = [
        'url' => 'https://www.national.co.uk',
        'width' => '150',
        'aspectRatio' => '60',
        'rim' => '15',
        'rating' => 'H',
        'loadIndex' => '77'
      ];

      $inputData[2] = [
        'url' => 'https://www.national.co.uk',
        'width' => '145',
        'aspectRatio' => '60',
        'rim' => '15',
        'rating' => 'H',
        'loadIndex' => '77'
      ];



      $this->webScraping($inputData[0]);








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

    public function webScraping($data){

      $http = new Client();


      $response = $http->get(
        $data['url'].'/tyres-search?Width='.$data['width'].'&Profile='.$data['aspectRatio'].'&Diameter='.$data["rim"].'&Rating='.$data["rating"].'&LoadIndex='.$data["loadIndex"]
      );


      usleep(1000000 + rand(0, 4000000));

      if(!$response->isOk()){
        dd($response->isOk());
      }

      $dom = str_get_html($response->body);

    //  $dom->dump();

  //  $data = [];\

/*

        $get_data = [

          "Brand_name" => $dom->find("img[id=MainContent_ucTyreResults_rptTyres_imgBrand_0]", 0)->alt,
          "Pattern_name" => $dom->find("a[id=MainContent_ucTyreResults_rptTyres_hypPattern_0]", 0)->plaintext,
          "Price" => $dom->find("#MainContent_ucTyreResults_rptTyres_ddlOrder_0", 0)->children(0)->plaintext,
          "Width" => $this->findValue("#MainContent_ddlWidth", "option", $dom),
          "AspectRatio" => $this->findValue("#MainContent_ddlProfile", "option", $dom),
          "Rim" => $this->findValue("#MainContent_ddlDiameter", "option", $dom),
          "Load_index" => $dom->find("#MainContent_ucTyreResults_rptTyres_divTyre_0", 0)->children(0)->children(1)->children(2)->plaintext,
          "Speed_rating" => $dom->find("#MainContent_ucTyreResults_rptTyres_divTyre_0", 0)->children(0)->children(1)->children(3)->plaintext,
          "Url" => $data['url'].'/tyres-search?Width='.$data['width'].'&Profile='.$data['aspectRatio'].'&Diameter='.$data["rim"].'&Rating='.$data["rating"].'&LoadIndex='.$data["loadIndex"]

        ];

  */

       $data[0] = [

         "Brand_name" => $this->preg_match_single('/^([\w\-]+)/', $dom->find("img[id=MainContent_ucTyreResults_rptTyres_imgBrand_0]", 0)->alt),
         "Pattern_name" => $dom->find("a[id=MainContent_ucTyreResults_rptTyres_hypPattern_0]", 0)->plaintext,
         "Price" => $this->preg_match_single('/([0-9]+\.[0-9]+)/', $dom->find("#MainContent_ucTyreResults_rptTyres_ddlOrder_0", 0)->children(0)->plaintext),
         "Width" => $this->findValue("#MainContent_ddlWidth", "option", $dom),
         "AspectRatio" => $this->findValue("#MainContent_ddlProfile", "option", $dom),
         "Rim" => $this->findValue("#MainContent_ddlDiameter", "option", $dom),
         "Load_index" => $this->preg_match_single('/(\d+)/', $dom->find("#MainContent_ucTyreResults_rptTyres_divTyre_0", 0)->children(0)->children(1)->children(2)->plaintext),
         "Speed_rating" => substr($dom->find("#MainContent_ucTyreResults_rptTyres_divTyre_0", 0)->children(0)->children(1)->children(3)->plaintext, -1),
         "Url" => $data['url'].'/tyres-search?Width='.$data['width'].'&Profile='.$data['aspectRatio'].'&Diameter='.$data["rim"].'&Rating='.$data["rating"].'&LoadIndex='.$data["loadIndex"]
      ];

    //  dd([$get_data, $data]);

      $this->saveData($data[0]);

      $data[1] = [

        "Brand_name" => $this->preg_match_single('/^([\w\-]+)/', $dom->find("img[id=MainContent_ucTyreResults_rptTyres_imgBrand_1]", 0)->alt),
        "Pattern_name" => $dom->find("a[id=MainContent_ucTyreResults_rptTyres_hypPattern_1]", 0)->plaintext,
        "Price" => $this->preg_match_single('/([0-9]+\.[0-9]+)/', $dom->find("#MainContent_ucTyreResults_rptTyres_ddlOrder_1", 0)->children(0)->plaintext),
        "Width" => $this->findValue("#MainContent_ddlWidth", "option", $dom),
        "AspectRatio" => $this->findValue("#MainContent_ddlProfile", "option", $dom),
        "Rim" => $this->findValue("#MainContent_ddlDiameter", "option", $dom),
        "Load_index" => $this->preg_match_single('/(\d+)/', $dom->find("#MainContent_ucTyreResults_rptTyres_divTyre_1", 0)->children(0)->children(1)->children(2)->plaintext),
        "Speed_rating" => substr($dom->find("#MainContent_ucTyreResults_rptTyres_divTyre_1", 0)->children(0)->children(1)->children(3)->plaintext, -1),
        "Url" => $data['url'].'/tyres-search?Width='.$data['width'].'&Profile='.$data['aspectRatio'].'&Diameter='.$data["rim"].'&Rating='.$data["rating"].'&LoadIndex='.$data["loadIndex"]
     ];

       $this->saveData($data[1]);

       $data[2] = [

         "Brand_name" => $this->preg_match_single('/^([\w\-]+)/', $dom->find("img[id=MainContent_ucTyreResults_rptTyres_imgBrand_2]", 0)->alt),
         "Pattern_name" => $dom->find("a[id=MainContent_ucTyreResults_rptTyres_hypPattern_2]", 0)->plaintext,
         "Price" => $this->preg_match_single('/([0-9]+\.[0-9]+)/', $dom->find("#MainContent_ucTyreResults_rptTyres_ddlOrder_2", 0)->children(0)->plaintext),
         "Width" => $this->findValue("#MainContent_ddlWidth", "option", $dom),
         "AspectRatio" => $this->findValue("#MainContent_ddlProfile", "option", $dom),
         "Rim" => $this->findValue("#MainContent_ddlDiameter", "option", $dom),
         "Load_index" => $this->preg_match_single('/(\d+)/', $dom->find("#MainContent_ucTyreResults_rptTyres_divTyre_2", 0)->children(0)->children(1)->children(2)->plaintext),
         "Speed_rating" => substr($dom->find("#MainContent_ucTyreResults_rptTyres_divTyre_2", 0)->children(0)->children(1)->children(3)->plaintext, -1),
         "Url" => $data['url'].'/tyres-search?Width='.$data['width'].'&Profile='.$data['aspectRatio'].'&Diameter='.$data["rim"].'&Rating='.$data["rating"].'&LoadIndex='.$data["loadIndex"]
      ];

      $this->saveData($data[2]);


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
