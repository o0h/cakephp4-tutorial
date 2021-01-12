<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bookmark Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $url
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Tag[] $tags
 */
class Bookmark extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'title' => true,
        'description' => true,
        'url' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'tags' => true,
        'tag_string' => true,
    ];


    protected function _getTagString()
    {
        if (isset($this->_fields['tag_string'])) {
            return $this->_fields['tag_string'];
        }
        if (empty($this->tags)) {
            return '';
        }
        $tags = collection($this->tags);
        $str = $tags->reduce(function ($string, $tag) {
            return $string . $tag->title . ', ';
        }, '');
        return trim($str, ', ');
    }
}
