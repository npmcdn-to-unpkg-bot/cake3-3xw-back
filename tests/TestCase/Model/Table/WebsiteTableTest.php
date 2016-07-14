<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WebsiteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WebsiteTable Test Case
 */
class WebsiteTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WebsiteTable
     */
    public $Website;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.website'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Website') ? [] : ['className' => 'App\Model\Table\WebsiteTable'];
        $this->Website = TableRegistry::get('Website', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Website);

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
