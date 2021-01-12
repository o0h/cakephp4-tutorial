<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookmarksTagsFixture
 */
class BookmarksTagsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'bookmark_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tag_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'tag_key' => ['type' => 'index', 'columns' => ['tag_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['bookmark_id', 'tag_id'], 'length' => []],
            'bookmarks_tags_ibfk_1' => ['type' => 'foreign', 'columns' => ['tag_id'], 'references' => ['tags', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'bookmarks_tags_ibfk_2' => ['type' => 'foreign', 'columns' => ['bookmark_id'], 'references' => ['bookmarks', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_0900_ai_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'bookmark_id' => 1,
                'tag_id' => 1,
            ],
        ];
        parent::init();
    }
}
