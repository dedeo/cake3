<?php

namespace Dashboard\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
	public $components = ['RequestHandler', 'Cookie'];

    public function initialize()
    {
        parent::initialize();

        $this->Auth->allow();
    } 

    // public function beforeRender(Event $event)
    // {
    //     $this->viewBuilder()->layout('Dashboard.default');
    //     if (!$this->request->is('json')) {
    //         $this->viewBuilder()->className('DebugKit.Ajax');
    //     }
    // }
}
