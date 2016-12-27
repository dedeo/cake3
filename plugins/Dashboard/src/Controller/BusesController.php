<?php
namespace Dashboard\Controller;

use Dashboard\Controller\AppController;
use App\View\Helper\BusHelper;

/**
 * Buses Controller
 *
 * @property \Dashboard\Model\Table\BusesTable $Buses
 */
class BusesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $buses = $this->paginate($this->Buses);

        $this->set(compact('buses'));
        $this->set('_serialize', ['buses']);
    }

    /**
     * View method
     *
     * @param string|null $id Bus id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bus = $this->Buses->get($id, [
            'contain' => ['Schedules']
        ]);

        $this->set('bus', $bus);
        $this->set('_serialize', ['bus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bus = $this->Buses->newEntity();
        if ($this->request->is('post')) {
            $formData = $this->request->data;
            $formData['name'] = str_replace(' ', '-',$formData['plat_no']);
            $formData['capacity'] = $formData['capacity'];
            $formData['facilities'] = 'a:3:{i:0;s:2:"Ac";i:1;s:7:"Selimut";i:2;s:6:"Bantal";}';

            $bus = $this->Buses->patchEntity($bus, $formData);
            if ($this->Buses->save($bus)) {
                $this->Flash->success(__('The bus has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bus could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('bus'));
        $this->set('_serialize', ['bus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bus id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($id == 'new'){
            $bus = $this->Buses->newEntity();
            if ($this->request->is('post')) {
                $bus = $this->Buses->patchEntity($bus, $this->request->data);
                if ($this->Buses->save($bus)) {
                    $this->Flash->success(__('The bus has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The bus could not be saved. Please, try again.'));
                }
            }

            $this->set('title', 'Armada Baru');
            $this->set(compact('bus'));
            $this->set('_serialize', ['bus']);
        }else{
            $bus = $this->Buses->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $bus = $this->Buses->patchEntity($bus, $this->request->data);
                if ($this->Buses->save($bus)) {
                    $this->Flash->success(__('The bus has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The bus could not be saved. Please, try again.'));
                }
            }
            $this->set('title', $bus['name']);
            $this->set(compact('bus'));
            $this->set('_serialize', ['bus']);            
        }    }

    /**
     * Delete method
     *
     * @param string|null $id Bus id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bus = $this->Buses->get($id);
        if ($this->Buses->delete($bus)) {
            $this->Flash->success(__('The bus has been deleted.'));
        } else {
            $this->Flash->error(__('The bus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
