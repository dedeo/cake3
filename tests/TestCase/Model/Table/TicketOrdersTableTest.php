<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TicketOrdersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TicketOrdersTable Test Case
 */
class TicketOrdersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TicketOrdersTable
     */
    public $TicketOrders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ticket_orders',
        'app.customers',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.roles',
        'app.documents',
        'app.tickets',
        'app.schedules',
        'app.routes',
        'app.buses',
        'app.ticket_passengers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TicketOrders') ? [] : ['className' => 'App\Model\Table\TicketOrdersTable'];
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
