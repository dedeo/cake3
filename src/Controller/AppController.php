<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Database\Type;

// Time::$defaultLocale = 'es-ES';
Time::setToStringFormat('dd-MM-YYYY');
Type::build('datetime')->useLocaleParser();

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

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
        parent::initialize();

        // $this->loadHelper('MyDate');

        // $this->loadHelper()

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => [
                'Acl.Actions' => ['actionPath' => 'controllers/']
            ],
            'loginAction' => [
                'plugin' => false,
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'plugin' => false,
                'controller' => 'Pages',
                'action' => 'home'
            ],
            'logoutRedirect' => [
                'plugin' => false,
                'controller' => 'Pages',
                'action' => 'home'
            ],
            'unauthorizedRedirect' => [
                'controller' => 'Pages',
                'action' => 'home',
                'prefix' => false
                // 'plugin' => false
            ],
            'authError' => 'You are not authorized to access that location.',
            'flash' => [
                'element' => 'error'
            ]
        ]);
        
        // Only for ACL setup
        // $this->Auth->allow();
        $this->_loadRoutes();
        $this->_loadBuses();
        $this->_loadCities();
    }

    /**
     * Before filter callback.
     *
     * @param \Cake\Event\Event $event The beforeFilter event.
     * @return void
     */
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->Auth->allow(['display','login','logout']);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event) {
        parent::beforeRender($event);

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
    private function _loadRoutes(){
        $routeModel = $this->loadModel('Routes');
        $routes = $routeModel->find('list');

        $this->request->Session()->write('Routes.list',$routes->toArray());
    }

    private function _loadBuses(){
        $busesModel = $this->loadModel('Buses');
        $buses = $busesModel->find('list');

        $this->request->Session()->write('Buses.list',$buses->toArray());
    }

    private function _loadCities(){
        $cities = $this->loadModel('Cities')
                    ->find('list',[
                            'keyField' => 'id',
                            'valueField' => 'city',                            
                        ]);

        $this->request->Session()->write('Cities.list',$cities->toArray());
    }

}
