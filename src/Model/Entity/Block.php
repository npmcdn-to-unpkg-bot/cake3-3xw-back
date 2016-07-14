<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Block Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $name
 * @property string $content
 * @property string $size
 * @property int $block_type_id
 * @property \App\Model\Entity\BlockType $block_type
 * @property int $page_id
 * @property \App\Model\Entity\Page $page
 * @property \App\Model\Entity\Attachment[] $attachments
 */
class Block extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
