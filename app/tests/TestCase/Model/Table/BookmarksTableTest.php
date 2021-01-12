<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookmarksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookmarksTable Test Case
 */
class BookmarksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookmarksTable
     */
    protected $Bookmarks;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Bookmarks',
        'app.BookmarksTags',
        'app.Users',
        'app.Tags',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Bookmarks') ? [] : ['className' => BookmarksTable::class];
        $this->Bookmarks = $this->getTableLocator()->get('Bookmarks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Bookmarks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testFindTags(): void
    {
        $option = ['tags' => 'Lorem ipsum dolor sit amet'];
        $actual = $this->Bookmarks->find('tagged', $option);

        $expectedTaggedBookmarkIdList = [1];
        $actualTaggedBookmarkIdList = $actual->all()
            ->extract('id')
            ->toList();

        $this->assertSame(
            $expectedTaggedBookmarkIdList,
            $actualTaggedBookmarkIdList
        );
    }
}
