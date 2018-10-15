<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{

    public $autoId = false;

    public function up()
    {

        $this->table('temp_amazon_books')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('item_name', 'string', [
                'comment' => '商品名',
                'default' => null,
                'limit' => 1000,
                'null' => true,
            ])
            ->addColumn('item_ID', 'string', [
                'comment' => '出品ID(Amazon)',
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('SKU', 'string', [
                'comment' => '出品者SKU',
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('price', 'integer', [
                'comment' => '価格',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('quantity', 'integer', [
                'comment' => '数量',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('list_day', 'datetime', [
                'comment' => '出品日',
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('item_id_tipe', 'integer', [
                'comment' => '商品IDタイプ',
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'comment' => 'コンディション説明',
                'default' => null,
                'limit' => 2000,
                'null' => true,
            ])
            ->addColumn('condition_type', 'integer', [
                'comment' => 'コンディション',
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('foreign_ship_flg', 'string', [
                'comment' => '国外へ配送可',
                'default' => null,
                'limit' => 5,
                'null' => true,
            ])
            ->addColumn('rapid_ship_flg', 'string', [
                'comment' => '迅速な配送',
                'default' => null,
                'limit' => 5,
                'null' => true,
            ])
            ->addColumn('isbn_asin', 'string', [
                'comment' => '商品ID(ISBN)',
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('stocks', 'integer', [
                'comment' => '在庫数(未使用)',
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('fulfillment_channel', 'string', [
                'comment' => 'フルフィルメント・チャンネル',
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('merchant_shipping_group', 'string', [
                'comment' => 'merchant-shipping-group',
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('point', 'integer', [
                'comment' => 'ポイント',
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }

    public function down()
    {
        $this->table('temp_amazon_books')->drop()->save();
    }
}
