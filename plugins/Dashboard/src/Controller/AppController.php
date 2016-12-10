<?php

namespace Dashboard\Controller;

use App\Controller\AppController as BaseController;
// use Cake\Controller\Controller;
use Cake\Event\Event;


class AppController extends BaseController
{

    public $components = [
        'Acl' => [
            'className' => 'Acl.Acl'
        ]
    ];

    public static $AclActionsExclude = [
        'isAuthorized'
    ];
    
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        // parent::initialize();
        $this->viewBuilder()->layout('dashboard');


        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => [
                'Acl.Actions' => ['actionPath' => 'controllers/']
            ],
            'loginAction' => [
                // 'plugin' => true,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                // 'plugin' => true,
                'controller' => 'Users',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                // 'plugin' => true,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                'prefix' => false,
                // 'plugin' => true
            ],
            'authError' => 'You are not authorized to access that location.',
            'flash' => [
                'element' => 'error'
            ]
        ]);
        
        // Only for ACL setup
        // $this->Auth->allow();
    }

    /**
     * Before filter callback.
     *
     * @param \Cake\Event\Event $event The beforeFilter event.
     * @return void
     */
    public function beforeFilter(Event $event) {
        // parent::beforeFilter($event);

        $this->Auth->allow('display');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event) {
        // parent::beforeRender($event);

        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    /**
     * isAuthorized.
     *
     * @param array $user user logged.
     * @return void
     */
    public function isAuthorized($user) {
        // return true;
        
        // Admin can access every action
        if (isset($user['role_id']) && $user['role_id'] === 1) {
            return true;
        }

        // Default deny
        return false;
    }
}
