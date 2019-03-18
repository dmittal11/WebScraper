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

            $this->loadModel('TyreDetails');
            $tyreDetail = $this->TyreDetails->find('all')->toArray();

            foreach ($tyreDetail as $tyDetail) {
              usleep(1000000 + rand(0, 4000000));
              $response = $http->get('http://www.thetyregroup.co.uk/tyre-results',[
                'form' => '1',
                'width' => $tyDetail->width,
                'profile' => $tyDetail->aspect_ratio,
                'rim' => $tyDetail->rim,
                'speed' => '',
                'brand' => 'CONTINENTAL',
                'x' => '76',
                'y' => '12'
              ]);

              $this->webScraping($response->body, $tyDetail);


      }



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

    public function webScraping($data, $tyre_detail){


      //$url = 'http://www.dexel.co.uk';
      //$width = 205;
      //$aspectRatio = 55;
      //$rim = 16;



      //  usleep(1000000 + rand(0, 4000000));


        $dom = str_get_html($response->body);

        $element = $dom->find(".result");
        $element1 = $dom->find(".price");

      //  $data = [];

      $this->loadModel('WebsiteScraper');
      $this->loadModel('WebsiteDetails');



      $dom = str_get_html($data);

      $website = $this->WebsiteDetails->find('all', [
        'conditions' => [
          'Url' => 'thetyregroup'
        ]
      ])
      ->first();



        $n = 0;

        foreach ($element as $ele) {

          $pieces = preg_split('/[\s,]+/', $ele->find('.tyreTitle', 0)->plaintext);

          dd($pieces);

          $brand = $pieces[0];
          $pattern = $pieces[1] . ' ' . $pieces[2];

          //"Speed_rating" => $this->preg_match_single('/[a-zA-Z]/', $ele->children(1)->children(1)->children(0)->plaintext),

          $input_data[$n] = [

            "Brand_name" => $brand,
            "Pattern_name" => $pattern,
            "Price" => $this->preg_match_single('/([0-9]+\.[0-9]+)/', $element1[$n]->plaintext),
            "Width" => $tyre_detail->width,
            "AspectRatio" => $tyre_detail->aspect_ratio,
            "Rim" => $tyre_detail->rim,
            "Speed_rating" => $this->preg_match_single('/[a-zA-Z]/', $ele->find('p',0)->plaintext),
            "Load_index" => $this->preg_match_many('/[\s,]+/', $ele->find('.tyreTitle', 0)->plaintext)[0][1][0],
            "Url" => "http://www.thetyregroup.co.uk/tyre-results",
            "tyre_detail_id" => $tyre_detail->id,
            "website_detail_id" => $website->id

          ];

          $n++;


      }

      $this->WebsiteScraper->saveData($input_data);



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
