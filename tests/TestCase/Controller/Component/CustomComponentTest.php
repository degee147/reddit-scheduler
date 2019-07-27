<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\CustomComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\CustomComponent Test Case
 */
class CustomComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\CustomComponent
     */
    public $Custom;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Custom = new CustomComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Custom);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
