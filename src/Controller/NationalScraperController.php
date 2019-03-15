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

      $url = 'https://www.national.co.uk';
      $width = 165;
      $aspectRatio = 60;
      $rim = 15;
      $rating = 'H';
      $loadIndex = 77;

      /*

      $response = $http->get(
        $url.'/shopping/tyre-results?width='.$width.'&profile='.$aspectRatio.'&rim='.$rim.'&speed=.'
      );

      */

      $response = $http->get(
        $url.'/tyres-search?Width='.$width.'&Profile='.$aspectRatio.'&Diameter='.$rim.'&Rating='.$rating.'&LoadIndex='.$loadIndex
      );

      //dd($url.'/tyres-search?Width='.$width.'&Profile='.$aspectRatio.'&Diameter='.$rim.'&Rating='.$rating.'&LoadIndex='.$loadIndex);



      usleep(1000000 + rand(0, 4000000));

      if(!$response->isOk()){
        dd($response->isOk());
      }

      $dom = str_get_html($response->body);

    //  $dom->dump();

  //  $data = [];


       $input_data = [

         "Brand_name" => $dom->find("#MainContent_ucTyreResults_rptTyres_imgBrand_0", 0)->innertext,
         "Price" => $dom->find("#MainContent_ucTyreResults_rptTyres_ddlOrder_0", 0)->children(0)->plaintext,


      ];

       dd($input_data["Brand_name"]);

       //dd($result);

       //$result = floatval($data);




       $data = [
         "Price" => $this->preg_match_single('/([0-9]+\.[0-9]+)/', $input_data["Price"]),

       ];

      $result = $this->preg_match_single('/([0-9]+\.[0-9]+)/', $data);





       dd($result);



    //  $data = json_decode($this->preg_match_single('/var allTyres = (.+);/', $response->body));

      //dd($data[1]->id);



      //  $dexelScraper = $this->DexelScraper->newEntity();

        //dd($dexelScraper);

      //  $time = Time::now();

        //date_default_timezone_set('Europe/London');
        //$date = date('d/m/Y h:i:s a', time());


        //$n = 1;

        /*

        foreach ($data as $get_data) {

            $dexelScraper = $this->DexelScraper->newEntity();

            $dexelScraper->id = $n;
            $dexelScraper->Brand_name = $get_data->manufacturer;
            $dexelScraper->Pattern_name = $get_data->pattern;
            $dexelScraper->Tyre_size = $this->calculateTyreSize($get_data->width, $get_data->profile, $get_data->rim);
            $dexelScraper->Price = $get_data->price;
            $dexelScraper->Url = $url.'/shopping/tyre-results?width='.$width.'&profile='.$aspectRatio.'&rim='.$rim.'&speed=.';
            $dexelScraper->Scrape_date = $date;

          //  dd($dexelScraper);


            $this->DexelScraper->save($dexelScraper);

            $n++;


        }
        */
        // $result = $dom->find('select[name=ctl00$MainContent$ucTyreResults$rptTyres$ctl01$ddlOrder]');

         // foreach ($result as $r) {
         //
         //   array_push($data, $r->plaintext);
         // }

        // foreach ($dom->find('select[name=ctl00$MainContent$ucTyreResults$rptTyres$ctl01$ddlOrder]') as $result) {

           //$result->dump();

           //dd('die');

           //foreach ($result->find('option') as $result){

           //$result->dump();

           //$result = $result->find('option[value=1]', 0)->plaintext;

             //array_push($data, $result);
           //}

         //}


      dd('die');




      /*
        $nationalScraper = $this->paginate($this->NationalScraper);

        $this->set(compact('nationalScraper'));

        */
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
