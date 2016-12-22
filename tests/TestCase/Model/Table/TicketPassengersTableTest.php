<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TicketPassengersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TicketPassengersTable Test Case
 */
class TicketPassengersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TicketPassengersTable
     */
    public $TicketPassengers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ticket_passengers',
        'app.ticket_orders',
        'app.customers',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.roles',
        'app.documents',
        'app.avatars',
        'app.schedules',
        'app.routes',
        'app.buses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TicketPassengers') ? [] : ['className' => 'App\Model\Table\TicketPassengersTable'];
        $this->TicketPassengers = TableRegistry::get('TicketPassengers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TicketPassengers);

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
