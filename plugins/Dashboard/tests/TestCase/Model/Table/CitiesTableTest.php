<?php
namespace Dashboard\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Dashboard\Model\Table\CitiesTable;

/**
 * Dashboard\Model\Table\CitiesTable Test Case
 */
class CitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Dashboard\Model\Table\CitiesTable
     */
    public $Cities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.dashboard.cities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cities') ? [] : ['className' => 'Dashboard\Model\Table\CitiesTable'];
        $this->Cities = TableRegistry::get('Cities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cities);

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
