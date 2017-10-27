<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ViewAcces Entity
 *
 * @property int $id
 * @property int $role_id
 * @property string $view_name
 * @property string $controller_name
 *
 * @property \App\Model\Entity\Role $role
 */
class ViewAcces extends Entity
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
        'id' => false
    ];
}
