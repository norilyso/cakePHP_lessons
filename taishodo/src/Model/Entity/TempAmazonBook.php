<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TempAmazonBook Entity
 *
 * @property int $id
 * @property string $item_name
 * @property string $item_ID
 * @property string $SKU
 * @property int $price
 * @property int $quantity
 * @property \Cake\I18n\FrozenTime $list_day
 * @property int $item_id_tipe
 * @property string $description
 * @property int $condition_type
 * @property string $foreign_ship_flg
 * @property string $rapid_ship_flg
 * @property string $isbn_asin
 * @property int $stocks
 * @property string $fulfillment_channel
 * @property string $merchant_shipping_group
 * @property int $point
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class TempAmazonBook extends Entity
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
        'item_name' => true,
        'item_ID' => true,
        'SKU' => true,
        'price' => true,
        'quantity' => true,
        'list_day' => true,
        'item_id_tipe' => true,
        'description' => true,
        'condition_type' => true,
        'foreign_ship_flg' => true,
        'rapid_ship_flg' => true,
        'isbn_asin' => true,
        'stocks' => true,
        'fulfillment_channel' => true,
        'merchant_shipping_group' => true,
        'point' => true,
        'created' => true,
        'modified' => true
    ];
}
