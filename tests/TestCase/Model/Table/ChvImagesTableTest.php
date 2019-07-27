<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChvImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChvImagesTable Test Case
 */
class ChvImagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChvImagesTable
     */
    public $ChvImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ChvImages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ChvImages') ? [] : ['className' => ChvImagesTable::class];
        $this->ChvImages = TableRegistry::getTableLocator()->get('ChvImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChvImages);

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
