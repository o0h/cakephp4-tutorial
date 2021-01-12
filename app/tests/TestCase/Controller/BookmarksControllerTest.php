<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\BookmarksController;
use App\Model\Entity\Bookmark;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\BookmarksController Test Case
 *
 * @uses \App\Controller\BookmarksController
 */
class BookmarksControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Bookmarks',
        'app.Users',
        'app.Tags',
        'app.BookmarksTags',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView(): void
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                ],
            ],
        ]);
        $this->get('/bookmarks/view/1');

        $this->assertResponseOk();
        /** @var Bookmark $actualBookmark */
        $actualBookmark = $this->viewVariable('bookmark');
        $this->assertSame(1, $actualBookmark->id);
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
