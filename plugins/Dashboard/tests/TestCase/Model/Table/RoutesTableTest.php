<?php
namespace Dashboard\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Dashboard\Model\Table\RoutesTable;

/**
 * Dashboard\Model\Table\RoutesTable Test Case
 */
class RoutesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Dashboard\Model\Table\RoutesTable
     */
    public $Routes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.dashboard.routes',
        'plugin.dashboard.route_destinations',
        'plugin.dashboard.schedules',
        'plugin.dashboard.buses',
        'plugin.dashboard.tickets',
        'plugin.dashboard.ticket_orders',
        'plugin.dashboard.customers',
        'plugin.dashboard.avatars',
        'plugin.dashboard.ticket_passengers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Routes') ? [] : ['className' => 'Dashboard\Model\Table\RoutesTable'];
        $this->Routes = TableRegistry::get('Routes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Routes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
