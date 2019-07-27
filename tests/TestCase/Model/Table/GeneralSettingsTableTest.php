<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GeneralSettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GeneralSettingsTable Test Case
 */
class GeneralSettingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GeneralSettingsTable
     */
    public $GeneralSettings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GeneralSettings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GeneralSettings') ? [] : ['className' => GeneralSettingsTable::class];
        $this->GeneralSettings = TableRegistry::getTableLocator()->get('GeneralSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GeneralSettings);

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
