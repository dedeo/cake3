<?php
namespace Dashboard\Controller;

use Dashboard\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class MainController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        // $this->Auth->allow();
    }    

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['Users']
        // ];
        // $posts = $this->paginate($this->Posts);

        // $this->set(compact('posts'));
        // $this->set('_serialize', ['posts']);

        $ordermodel = TableRegistry::get('TicketOrders');

        $tickets = $ordermodel->find('all',[
            'conditions'=>[
                // 'Tickets.Schedules.Buses.id'=>$formData['buses'],
                'TicketOrders.create_at >'=>date('Y-m-d',strtotime('first day of this month')),
                'TicketOrders.create_at <'=>date('Y-m-d',strtotime('last day of this month'))
                ]
        ]);
        //debug($tickets->toArray());

        $timeToday = Time::now();

        //debug(Time::format($timeToday));

        $ticketorderTotal = 0;
        $ticketorderPasseger = 0;
        foreach ($tickets as $ticket) {
            $ticketorderTotal += $ticket->total;
            $ticketorderPasseger += $ticket->passegers;
        }
        $this->set('jualTotal', $ticketorderTotal);
        $this->set('jualPessanger', $ticketorderPasseger);
        $this->set('jualBulan', $timeToday);
        
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('post', $post);
        $this->set('_serialize', ['post']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users'));
        $this->set('_serialize', ['post']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users'));
        $this->set('_serialize', ['post']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
