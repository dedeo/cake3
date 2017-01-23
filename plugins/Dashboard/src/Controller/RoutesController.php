<?php
namespace Dashboard\Controller;

use Dashboard\Controller\AppController;

/**
 * Routes Controller
 *
 * @property \Dashboard\Model\Table\RoutesTable $Routes
 */
class RoutesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadModel('Cities');
        $routes = $this->Routes->find('all');
        $cities = $this->Cities->find('all');

        $this->set(compact('routes','cities'));
        $this->set('_serialize', ['routes']);
    }

    /**
     * View method
     *
     * @param string|null $id Route id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $route = $this->Routes->get($id, [
            'contain' => []
        ]);

        $this->set('route', $route);
        $this->set('_serialize', ['route']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('title', 'Tambah Rute Baru');

        $route = $this->Routes->newEntity();
        $routeList = $this->_getRouteList();

        $cities = $this->_getCityList();
        
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $city_name = $cities->toArray();

            $rute = [
                    'name'=> $city_name[$data['source']].' - '.$city_name[$data['destination']],
                    'source' => $data['source'],
                    'destination' => $data['destination'],
                    'create_at' => date('Y-m-d H:m:s'),
                    'parent_route' => (($data['parent_route']=='')? 0:$data['parent_route'])
                ];

            if(!empty($data['source'])){
                $route = $this->Routes->patchEntity($route, $rute,['assosiated'=>['RouteDestinations']]);

                debug($route);

                if ($this->Routes->save($route)) {

                    $this->Flash->success(__('The route has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The route could not be saved. Please, try again.'));
                }
                
            }
        }
        $this->set(compact('route','routeList','cities'));
        $this->set('_serialize', ['route']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Route id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
            $route = $this->Routes->get($id, [
                'contain' => []
            ]);
            $cities = $this->_getCityList();
            $routeList = $this->_getRouteList();

            if ($this->request->is(['patch', 'post', 'put'])) {

                $data = $this->request->data;

                // $route = $this->Routes->patchEntity($route, $data,['assosiated'=>['RouteDestinations']]);
                $route = $this->Routes->patchEntity($route, $data);

                if ($this->Routes->save($route)) {
                    $this->Flash->success(__('The route has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The route could not be saved. Please, try again.'));
                }
            }
            $this->set('title', $route['name']);
            $this->set(compact('route','routeList','cities'));
            $this->set('_serialize', ['route']);            
    }

    /**
     * Delete method
     *
     * @param string|null $id Route id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $route = $this->Routes->get($id);
        if ($this->Routes->delete($route)) {
            $this->Flash->success(__('The route has been deleted.'));
        } else {
            $this->Flash->error(__('The route could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function _getCityList(){
        return $this->loadModel('Cities')->find('list',
                [
                    'keyField' => 'id',
                    'valueField' => 'city'                    
                ]);
    }

    private function _getRouteList(){
        return $this->Routes
            ->find('list',[
                'keyField' => 'id',
                'valueField' => 'name',
                ])
            ->where(['parent_route'=>0])
            ;
    }
}
