<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AmazonBooksFixture
 *
 */
class AmazonBooksFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'item_name' => ['type' => 'string', 'length' => 1000, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '商品名', 'precision' => null, 'fixed' => null],
        'item_ID' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '出品ID(Amazon)', 'precision' => null, 'fixed' => null],
        'SKU' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '出品者SKU', 'precision' => null, 'fixed' => null],
        'price' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '価格', 'precision' => null, 'autoIncrement' => null],
        'quantity' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '数量', 'precision' => null, 'autoIncrement' => null],
        'list_day' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '出品日', 'precision' => null],
        'item_id_tipe' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '商品IDタイプ', 'precision' => null, 'autoIncrement' => null],
        'description' => ['type' => 'string', 'length' => 2000, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'コンディション説明', 'precision' => null, 'fixed' => null],
        'condition_type' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'コンディション', 'precision' => null, 'autoIncrement' => null],
        'foreign_ship_flg' => ['type' => 'string', 'length' => 5, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '国外へ配送可', 'precision' => null, 'fixed' => null],
        'rapid_ship_flg' => ['type' => 'string', 'length' => 5, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '迅速な配送', 'precision' => null, 'fixed' => null],
        'isbn_asin' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '商品ID(ISBN)', 'precision' => null, 'fixed' => null],
        'stocks' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '在庫数(未使用)', 'precision' => null, 'autoIncrement' => null],
        'fulfillment_channel' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'フルフィルメント・チャンネル', 'precision' => null, 'fixed' => null],
        'merchant_shipping_group' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'merchant-shipping-group', 'precision' => null, 'fixed' => null],
        'point' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ポイント', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'item_name' => 'Lorem ipsum dolor sit amet',
                'item_ID' => 'Lorem ipsum dolor ',
                'SKU' => 'Lorem ipsum dolor sit amet',
                'price' => 1,
                'quantity' => 1,
                'list_day' => '2018-10-01 15:58:14',
                'item_id_tipe' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'condition_type' => 1,
                'foreign_ship_flg' => 'Lor',
                'rapid_ship_flg' => 'Lor',
                'isbn_asin' => 'Lorem ipsum dolor sit amet',
                'stocks' => 1,
                'fulfillment_channel' => 'Lorem ip',
                'merchant_shipping_group' => 'Lorem ipsum dolor sit amet',
                'point' => 1,
                'created' => '2018-10-01 15:58:14',
                'modified' => '2018-10-01 15:58:14'
            ],
        ];
        parent::init();
    }
}
