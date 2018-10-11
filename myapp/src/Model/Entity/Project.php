<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property int $project_number
 * @property string $segment
 * @property string $orderer
 * @property string $project_name
 * @property string $staff
 * @property string $team
 * @property int $contract_amount
 * @property int $estimate_amount
 * @property \Cake\I18n\FrozenTime $order_planed_month
 * @property \Cake\I18n\FrozenTime $completion_planed_month
 * @property string $completion_planed_term
 * @property int $probability_orders
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Project extends Entity
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
        'project_number' => true,
        'segment' => true,
        'orderer' => true,
        'project_name' => true,
        'staff' => true,
        'team' => true,
        'contract_amount' => true,
        'estimate_amount' => true,
        'order_planed_month' => true,
        'completion_planed_month' => true,
        'completion_planed_term' => true,
        'probability_orders' => true,
        'created' => true,
        'modified' => true
    ];
}
