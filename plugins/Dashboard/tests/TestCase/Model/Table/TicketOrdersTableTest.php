<?php
namespace Dashboard\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Dashboard\Model\Table\TicketOrdersTable;

/**
 * Dashboard\Model\Table\TicketOrdersTable Test Case
 */
class TicketOrdersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Dashboard\Model\Table\TicketOrdersTable
     */
    public $TicketOrders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.dashboard.ticket_orders',
        'plugin.dashboard.customers',
        'plugin.dashboard.avatars',
        'plugin.dashboard.tickets',
        'plugin.dashboard.schedules',
        'plugin.dashboard.routes',
        'plugin.dashboard.buses',
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
        $config = TableRegistry::exists('TicketOrders') ? [] : ['className' => 'Dashboard\Model\Table\TicketOrdersTable'];
        $this->TicketOrders = TableRegistry::get('TicketOrders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TicketOrders);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
