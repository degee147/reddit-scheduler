<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChvImagesDeletedTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChvImagesDeletedTable Test Case
 */
class ChvImagesDeletedTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChvImagesDeletedTable
     */
    public $ChvImagesDeleted;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ChvImagesDeleted',
        'app.ImageUsers',
        'app.ImageAlbums',
        'app.ImageStorages',
        'app.ImageCategories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ChvImagesDeleted') ? [] : ['className' => ChvImagesDeletedTable::class];
        $this->ChvImagesDeleted = TableRegistry::getTableLocator()->get('ChvImagesDeleted', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChvImagesDeleted);

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
