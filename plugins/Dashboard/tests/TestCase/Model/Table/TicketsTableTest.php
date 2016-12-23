<?php
namespace Dashboard\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Dashboard\Model\Table\TicketsTable;

/**
 * Dashboard\Model\Table\TicketsTable Test Case
 */
class TicketsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Dashboard\Model\Table\TicketsTable
     */
    public $Tickets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.dashboard.tickets',
        'plugin.dashboard.schedules',
        'plugin.dashboard.routes',
        'plugin.dashboard.buses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tickets') ? [] : ['className' => 'Dashboard\Model\Table\TicketsTable'];
        $this->Tickets = TableRegistry::get('Tickets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tickets);

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
