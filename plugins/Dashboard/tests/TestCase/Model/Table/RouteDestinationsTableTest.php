<?php
namespace Dashboard\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Dashboard\Model\Table\RouteDestinationsTable;

/**
 * Dashboard\Model\Table\RouteDestinationsTable Test Case
 */
class RouteDestinationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Dashboard\Model\Table\RouteDestinationsTable
     */
    public $RouteDestinations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.dashboard.route_destinations',
        'plugin.dashboard.routes',
        'plugin.dashboard.schedules',
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
        $config = TableRegistry::exists('RouteDestinations') ? [] : ['className' => 'Dashboard\Model\Table\RouteDestinationsTable'];
        $this->RouteDestinations = TableRegistry::get('RouteDestinations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RouteDestinations);

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
