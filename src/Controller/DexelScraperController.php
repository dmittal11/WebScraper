<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Http\Client;

use Cake\I18n\Time;

include_once "simple_html_dom.php";



/**
 * DexelScraper Controller
 *
 * @property \App\Model\Table\DexelScraperTable $DexelScraper
 *
 * @method \App\Model\Entity\DexelScraper[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DexelScraperController extends AppController
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

      $website = $this->WebsiteDetails->find('all', [
        'conditions' => [
          'Url' => 'dexel'
        ]
      ])
      ->first();

      $input_data = [];

      $n = 0;

      foreach ($tyreDetail as $tyDetail) {
        usleep(1000000 + rand(0, 4000000));
        $response = $http->get('http://www.dexel.co.uk/shopping/tyre-results?width='.$tyDetail->width.'&profile='.$tyDetail->aspect_ratio.'&rim='.$tyDetail->rim.'&speed=.');


      if(!$response->isOk()){
        dd($response->isOk());
      }

        $data = json_decode($this->preg_match_single('/var allTyres = (.+);/', $response->body));

        $input_data[$n] = [

          "Brand_name" => $get_data->manufacturer,
          "Pattern_name" => $get_data->pattern,
          "Width" => $get_data->width,
          "AspectRatio" => $get_data->profile,
          "Rim" => $get_data->rim,
          "Speed_rating" => $get_data->speed,
          "Load_index" => $get_data->load
          "Price" => $get_data->price,
          "Url" => 'http://www.dexel.co.uk/shopping/tyre-results?width='.$tyDetail->width.'&profile='.$tyDetail->aspect_ratio.'&rim='.$tyDetail->rim.'&speed=.'
          "tyre_detail_id" => $tyDetail->id,
          "website_detail_id" => $website->id
        ];

        $n++;

      }

        // Tyre Size: Width/Profile(Aspect Ratio). rim speed (load)

        $this->loadModel("WebsiteScraper");

        $this->WebsiteScraper->saveData($input_data);

      /*

            $dexelScraper = $this->DexelScraper->newEntity();

            $dexelScraper->id = $n;
            $dexelScraper->Brand_name = $get_data->manufacturer;
            $dexelScraper->Pattern_name = $get_data->pattern;
            $dexelScraper->Tyre_size = $get_data->width .'/'. $get_data->profile .'. ' .$get_data->rim . ' '.$get_data->speed.' ('.$get_data->load.')';
            $dexelScraper->Price = $get_data->price;
            $dexelScraper->Url = $url.'/shopping/tyre-results?width='.$width.'&profile='.$aspectRatio.'&rim='.$rim.'&speed=.';
            $dexelScraper->Scrape_date = $date;

            $this->DexelScraper->save($dexelScraper);








        $dexelScraper = $this->paginate($this->DexelScraper);

        $this->set(compact('dexelScraper'));

        */
    }



    /**
     * View method
     *
     * @param string|null $id Dexel Scraper id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dexelScraper = $this->DexelScraper->get($id, [
            'contain' => []
        ]);

        $this->set('dexelScraper', $dexelScraper);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dexelScraper = $this->DexelScraper->newEntity();
        if ($this->request->is('post')) {
            $dexelScraper = $this->DexelScraper->patchEntity($dexelScraper, $this->request->getData());
            if ($this->DexelScraper->save($dexelScraper)) {
                $this->Flash->success(__('The dexel scraper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dexel scraper could not be saved. Please, try again.'));
        }
        $this->set(compact('dexelScraper'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dexel Scraper id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dexelScraper = $this->DexelScraper->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dexelScraper = $this->DexelScraper->patchEntity($dexelScraper, $this->request->getData());
            if ($this->DexelScraper->save($dexelScraper)) {
                $this->Flash->success(__('The dexel scraper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dexel scraper could not be saved. Please, try again.'));
        }
        $this->set(compact('dexelScraper'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dexel Scraper id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dexelScraper = $this->DexelScraper->get($id);
        if ($this->DexelScraper->delete($dexelScraper)) {
            $this->Flash->success(__('The dexel scraper has been deleted.'));
        } else {
            $this->Flash->error(__('The dexel scraper could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    function preg_match_single($pattern, $subject) {
       return preg_match($pattern, $subject, $matches) ? end($matches) : null;
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
}
