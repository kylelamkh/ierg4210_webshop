<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $pid
 * @property string $name
 * @property int $cid
 * @property int $price
 * @property string $description
 * @property $photo
 */
class Product extends Entity
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
		'pid' => true,
        'name' => true,
        'cid' => true,
        'price' => true,
        'description' => true,
        'photo' => true
    ];
}
