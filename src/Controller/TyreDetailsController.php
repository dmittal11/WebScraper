<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Http\Client;

include_once "simple_html_dom.php";

/**
 * TyreDetails Controller
 *
 * @property \App\Model\Table\TyreDetailsTable $TyreDetails
 *
 * @method \App\Model\Entity\TyreDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TyreDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

      $http = new Client();
      $response = $http->get('https://www.national.co.uk/');


      $dom = str_get_html($response->body);

      //$dom->dump();

      //dd('die');

      //$get

      $width = $this->findValue('select[name=ctl00$MainContent$ucTyreSearchHeader$ddlWidth]','option',$dom);

      $AspectRatio = $this->findValue('select[name=ctl00$MainContent$ucTyreSearchHeader$ddlProfile]','option',$dom);

      $rim = $this->findValue('select[name=ctl00$MainContent$ucTyreSearchHeader$ddlDiameter]',"option",$dom);

      foreach ($width as $w) {

        foreach ($AspectRatio as $ar) {

          foreach ($rim as $r) {

            $tyreDetails = $this->TyreDetails->newEntity();

            $tyreDetails->width = $w;
            $tyreDetails->aspect_ratio = $ar;
            $tyreDetails->rim = $r;
            $this->TyreDetails->save($tyreDetails);


          }
        }
      }



        /*
        $tyreDetails = $this->paginate($this->TyreDetails);

        $this->set(compact('tyreDetails'));

        */
    }

    /**
     * View method
     *
     * @param string|null $id Tyre Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tyreDetail = $this->TyreDetails->get($id, [
            'contain' => ['WebsiteScraper']
        ]);

        $this->set('tyreDetail', $tyreDetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tyreDetail = $this->TyreDetails->newEntity();
        if ($this->request->is('post')) {
            $tyreDetail = $this->TyreDetails->patchEntity($tyreDetail, $this->request->getData());
            if ($this->TyreDetails->save($tyreDetail)) {
                $this->Flash->success(__('The tyre detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tyre detail could not be saved. Please, try again.'));
        }
        $this->set(compact('tyreDetail'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tyre Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tyreDetail = $this->TyreDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tyreDetail = $this->TyreDetails->patchEntity($tyreDetail, $this->request->getData());
            if ($this->TyreDetails->save($tyreDetail)) {
                $this->Flash->success(__('The tyre detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tyre detail could not be saved. Please, try again.'));
        }
        $this->set(compact('tyreDetail'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tyre Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tyreDetail = $this->TyreDetails->get($id);
        if ($this->TyreDetails->delete($tyreDetail)) {
            $this->Flash->success(__('The tyre detail has been deleted.'));
        } else {
            $this->Flash->error(__('The tyre detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function findValue($parentElement, $childElement, $html){

      $result = [];

      //dd([$parentElement, $childElement]);

       $element = $html->find($parentElement, 0)->find($childElement);

      // dd($element);

    //  $element->dump();

    //  dd('die');
          foreach($element as $elem)
          {


               array_push($result, $elem->plaintext);

          }
      return $result;
    }
}
