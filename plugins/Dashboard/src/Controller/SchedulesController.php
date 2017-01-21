<?php
namespace Dashboard\Controller;

use Dashboard\Controller\AppController;

/**
 * Schedules Controller
 *
 * @property \Dashboard\Model\Table\SchedulesTable $Schedules
 */
class SchedulesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Routes', 'Buses']
        ];
        $schedules = $this->paginate($this->Schedules);

        $now = date('w', strtotime('now'));

        $todaySchedules = $this->Schedules->find('all',[
                'conditions' => ['day'=>$now],
                'contain'=>['Routes','Buses']
            ]);

        // debug($todaySchedules->toArray());


        $this->set(compact('todaySchedules','schedules'));
        $this->set('_serialize', ['schedules']);
    }

    /**
     * View method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => ['Routes', 'Buses']
        ]);

        $this->set('schedule', $schedule);
        $this->set('_serialize', ['schedule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('title','Tambah Jadwal Baru');
        $schedule = $this->Schedules->newEntity();
        if ($this->request->is('post')) {
            $dataForm = $this->request->data;

            debug($dataForm);
            // die();

            foreach ($dataForm['day'] as $day => $label) {
                $datas[]= [
                            'day' => $label,
                            'route_id' => $dataForm['route_id'],
                            'route_name' => $dataForm['route_name'],
                            'bus_id' => $dataForm['bus_id'],
                            'departure_time' => $dataForm['departure_time'],
                            'arival_time' => $dataForm['arival_time'],
                            'class' => $dataForm['bus_type'],
                            'fare' => $dataForm['fare'],
                            // 'create_at' => date('Y-m-d H:m:s'),
                            ];
            }

            $schedules = $this->Schedules->newEntities($datas);

            foreach ($schedules as $schedule) {
                if($query = $this->Schedules->save($schedule)){
                    $this->Flash->success(__('Jadwal baru behasil disimpan.'));
                }else{
                    $this->Flash->error(__('Jadwal baru gagal disimpan.'));
                }
            }
            return $this->redirect(['action' => 'index']);
        }
        // debug($data);
        // die();
        $routes = $this->Schedules->Routes->find('list', ['limit' => 200]);
        $buses = $this->Schedules->Buses->find('list', ['limit' => 200]);
        $this->set(compact('schedule', 'routes', 'buses'));
        $this->set('_serialize', ['schedule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            debug($this->request->data);
            die();

            $schedule = $this->Schedules->patchEntity($schedule, $this->request->data);
            if ($this->Schedules->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
            }
        }
        // $schedule->className = $this->Buses->get($schedule->bus_id)
        $routes = $this->Schedules->Routes->find('list', ['limit' => 200]);
        $buses = $this->Schedules->Buses->find('list', ['limit' => 200]);
        $this->set(compact('schedule', 'routes', 'buses'));
        $this->set('_serialize', ['schedule']);
        $this->set('title', 'Edit/Lihat Jadwal Keberangkatan');
    }

    /**
     * Delete method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $schedule = $this->Schedules->get($id);
        if ($this->Schedules->delete($schedule)) {
            $this->Flash->success(__('The schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
