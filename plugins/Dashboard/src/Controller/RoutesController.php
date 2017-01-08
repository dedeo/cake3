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
        $routes = $this->paginate($this->Routes);

        $this->set(compact('routes'));
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
                    'distance' => $data['distance'],
                    'fare'  => $data['fare'],
                    'create_at' => date('Y-m-d H:m:s'),
                    'parent_route' => (($data['parent_route']=='')? 0:$data['parent_route'])
                ];

            if(!empty($data['source'])){
                $route = $this->Routes->patchEntity($route, $rute,['assosiated'=>['RouteDestinations']]);

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

    // public function add()
    // {
    //     $this->set('title', 'Tambah Rute Baru');

    //     $route = $this->Routes->newEntity();
    //     // $routeDestination = $this->loadModel('RouteDestinations')->newEntity();

    //     $cities = $this->loadModel('Cities')->find('list',
    //             [
    //                 'keyField' => 'id',
    //                 'valueField' => 'city'                    
    //             ]);
        
    //     if ($this->request->is('post')) {
    //         $data = $this->request->data;

    //         $rute = [
    //             // 'name' => $data['name'],
    //             'source' => $data['source'],
    //             'create_at' => date('Y-m-d H:i:s')
    //         ];

    //         $_destinations = $data['route_destinations'];
    //         $destinations = array();
            
    //         $_cities = $cities->toArray();

    //         $routeName[0] = $data['source'];

    //         foreach ($_destinations as $dest) {
    //             if(!empty($dest['city']) AND !empty($dest['fare'])){
    //                 $city_name = $_cities[$dest['city']];
    //                 $destinations[] = [
    //                         'city'      => $dest['city'],
    //                         'city_name' => $city_name,
    //                         'distance'  => $dest['distance'],
    //                         'fare'      => $dest['fare']
    //                         ];
    //                 $routeName[] = $city_name;
    //             }
    //         }
    //         $rute['name'] = implode(' - ', $routeName);
    //         $rute['route_destinations'] = $destinations;
    //         // $data['create_at'] = date('Y-m-d H:i:s');
            
    //         // debug($rute);
    //         // die();

    //         // debug($this->Routes);
    //         // debug($routeDestination);
    //         // die();

    //         if(!empty($data['source'])){
    //             $route = $this->Routes->patchEntity($route, $rute,['assosiated'=>['RouteDestinations']]);
    //             // $route = $this->Routes->newEntity($rute,[
    //             //         'assosiated'=>['RouteDestinations']
    //             //         ]
    //             //     );

    //             // debug($route);
    //             // die();

    //             if ($this->Routes->save($route,[
    //                     'validate' => false,
    //                     'assosiated'=>['RouteDestinations']
    //                 ])) {

    //                 // $routeId = $route->getId

    //                 // $routeDestination = $routeDestination->patchEntity($routeDestination, $_destinations);
    


    //                 $this->Flash->success(__('The route has been saved.'));

    //                 return $this->redirect(['action' => 'index']);
    //             } else {
    //                 $this->Flash->error(__('The route could not be saved. Please, try again.'));
    //             }
                
    //         }


    //     }
    //     $this->set(compact('route','cities'));
    //     $this->set('_serialize', ['route']);
    // }

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
                'contain' => ['RouteDestinations']
            ]);
            $cities = $this->_getCityList();
            $routeList = $this->_getRouteList();

            if ($this->request->is(['patch', 'post', 'put'])) {

                $data = $this->request->data;
                debug($data);
                // die();

                $_destinations = $data['route_destinations'];
                $destinations = array();
                
                $_cities = $cities->toArray();

                $routeName[0] = $data['source'];

                foreach ($_destinations as $dest) {
                    if(!empty($dest['city']) AND !empty($dest['fare'])){
                        $city_name = $_cities[$dest['city']];
                        $destinations[] = [
                                'id'      => $dest['id'],
                                'city'      => $dest['city'],
                                'city_name' => $city_name,
                                'distance'  => $dest['distance'],
                                'fare'      => $dest['fare']
                                ];
                        $routeName[] = $city_name;
                    }
                }

                $rute['name'] = $data['name'];
                $rute['source'] = $data['source'];
                $rute['route_destinations'] = $destinations;


                $route = $this->Routes->patchEntity($route, $rute,['assosiated'=>['RouteDestinations']]);

                if ($this->Routes->save($route,[
                        'validate' => false,
                        'assosiated'=>['RouteDestinations']
                    ])) {
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
