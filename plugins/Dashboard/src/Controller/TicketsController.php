<?php
namespace Dashboard\Controller;

use Dashboard\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;



/**
 * Tickets Controller
 *
 * @property \Dashboard\Model\Table\TicketsTable $Tickets
 */
class TicketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Schedules', 'Buses']
        ];
        $tickets = $this->paginate($this->Tickets);

        $this->set(compact('tickets'));
        $this->set('_serialize', ['tickets']);
    }

    /**
     * View method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => ['Schedules', 'Buses']
        ]);

        $this->set('ticket', $ticket);
        $this->set('_serialize', ['ticket']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticket = $this->Tickets->newEntity();
        if ($this->request->is('post')) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->data);
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
            }
        }
        $schedules = $this->Tickets->Schedules->schedulevaluescheduleidfind('list', ['limit' => 200]);
        $buses = $this->Tickets->Buses->find('list', ['limit' => 200]);
        $this->set(compact('ticket', 'schedules', 'buses'));
        $this->set('_serialize', ['ticket']);
    }

    public function create($scheduleid = null)
    {

        // debug($this->request->data);
        // die();

        $scheduleid = $this->request->data['scheduleid'];
        $scheduledaterange = $this->request->data['daterangeticket'];
        $scheduledate = explode('-',$scheduledaterange);
        // debug(explode(' - ',$scheduledaterange));
        // die();
        $scheduleTable = TableRegistry::get('Schedules');

        $schedule = $scheduleTable->get($scheduleid, [
            'contain' => ['Routes', 'Buses']
        ]);

        $weekdayNumber = $schedule->day;

        // debug($schedule);

        $firstday = strtotime($scheduledate[0]);
        $lastmonth = strtotime($scheduledate[1]);
        // echo 'today: '.$firstday;
        // echo 'lastmonth: '.$weekdayNumber;

        $ticket = $this->Tickets->newEntity();

        // $dateArr = array();

            do
            {
                // 'w' is Numeric representation of the day of the week   
                // 0 (for Sunday) through 6 (for Saturday)
                if(date("w", $firstday) != $weekdayNumber)
                {
                    $firstday += (24 * 3600); // add 1 day
                }
            } while(date("w", $firstday) != $weekdayNumber);


            while($firstday <= $lastmonth)
            {
                $dateArr[] = date('Y-m-d', $firstday);
                $firstday += (7 * 24 * 3600); // add 7 days

            }

            $dateNow = date('Y-m-d H:m:s', strtotime('now'));
            foreach ($dateArr as $date) {

                $newTicket = [
                    'schedule_id' => $schedule->id,
                    'date_create_at' => date('Y-m-d',strtotime("now")),
                    'route_id' => $schedule->route_id,
                    'departure_time' => $schedule->departure_time->i18nFormat('HH:mm:ss'),
                    'date' => $date,
                    'arival_time' => $schedule->arival_time->i18nFormat('HH:mm:ss'), 
                    'fare' => $schedule->route->fare,
                    'stock' => $schedule->bus->capacity,
                    'bus_id' => $schedule->bus_id,
                    'passegers' => '',
                ];
                
                $ticket = $this->Tickets->patchEntity($ticket,$newTicket);
                $ticket = $this->Tickets->newEntity($newTicket);

                // debug($ticket);

                $save = $this->Tickets->save($ticket);
                // debug($save);
            }

            $allScheduleModel = TableRegistry::get('Tickets');
            $allTickets = $allScheduleModel->find('all',['conditions'=>['Tickets.schedule_id'=>$scheduleid], 'contain'=>['Schedules','Buses']]);
            // debug($allTickets->toArray());
            // die();

            // $ticket = $this->Tickets->newEntities($newTicket);

            // foreach ($newTicket as $data) {
            //     $entity = $this->Tickets->patchEntity($ticket,$data );
            //     // $order = $orderTable->patchEntity($order, $ticketData);
            //     $entity = $this->Tickets->newEntity($data);
            // //     debug($ticket);
            //     if ($this->Tickets->save($entity)) {
            //         $this->Flash->success(__('The ticket has been saved.'));

            //         return $this->redirect(['action' => 'index']);
            //     } else {
            //         $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
            //     }
            // }

            // debug($dateArr);

            // $schedules = $schedule->Routes->find('list', ['limit' => 200]);
            $buses = $this->Tickets->Buses->find('list', ['limit' => 200]);
            $this->set(compact('ticket', 'schedule', 'buses','allTickets'));
            // $this->set('_serialize', ['ticket','schedules']);
            $this->set('title', 'Buat Tiket Baru');        
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->data);
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
            }
        }
        $schedules = $this->Tickets->Schedules->find('list', ['limit' => 200]);
        $buses = $this->Tickets->Buses->find('list', ['limit' => 200]);
        $this->set(compact('ticket', 'schedules', 'buses'));
        $this->set('_serialize', ['ticket']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticket = $this->Tickets->get($id);
        if ($this->Tickets->delete($ticket)) {
            $this->Flash->success(__('The ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
