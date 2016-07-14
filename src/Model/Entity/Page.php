<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Page Entity.
 *
 * @property int $id
 * @property bool $active
 * @property bool $main_menu
 * @property int $main_menu_order
 * @property string $name
 * @property int $lft
 * @property int $rght
 * @property int $parent_id
 * @property \App\Model\Entity\ParentPage $parent_page
 * @property \App\Model\Entity\Block[] $blocks
 * @property \App\Model\Entity\ChildPage[] $child_pages
 */
class Page extends Entity
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

    public function afterSave(Event $event, Entity $entity, ArrayObject $options) {
      debug($entity);
   }
}
