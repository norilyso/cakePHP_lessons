<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AmazonBooks Model
 *
 * @method \App\Model\Entity\AmazonBook get($primaryKey, $options = [])
 * @method \App\Model\Entity\AmazonBook newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AmazonBook[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AmazonBook|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AmazonBook|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AmazonBook patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AmazonBook[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AmazonBook findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AmazonBooksTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('amazon_books');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('item_name')
            ->maxLength('item_name', 1000)
            ->allowEmpty('item_name');

        $validator
            ->scalar('item_ID')
            ->maxLength('item_ID', 20)
            ->requirePresence('item_ID', 'create')
            ->notEmpty('item_ID');

        $validator
            ->scalar('SKU')
            ->maxLength('SKU', 30)
            ->requirePresence('SKU', 'create')
            ->notEmpty('SKU');

        $validator
            ->integer('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->dateTime('list_day')
            ->allowEmpty('list_day');

        $validator
            ->integer('item_id_tipe')
            ->requirePresence('item_id_tipe', 'create')
            ->notEmpty('item_id_tipe');

        $validator
            ->scalar('description')
            ->maxLength('description', 2000)
            ->allowEmpty('description');

        $validator
            ->integer('condition_type')
            ->allowEmpty('condition_type');

        $validator
            ->scalar('foreign_ship_flg')
            ->maxLength('foreign_ship_flg', 5)
            ->allowEmpty('foreign_ship_flg');

        $validator
            ->scalar('rapid_ship_flg')
            ->maxLength('rapid_ship_flg', 5)
            ->allowEmpty('rapid_ship_flg');

        $validator
            ->scalar('isbn_asin')
            ->maxLength('isbn_asin', 50)
            ->requirePresence('isbn_asin', 'create')
            ->notEmpty('isbn_asin');

        $validator
            ->integer('stocks')
            ->allowEmpty('stocks');

        $validator
            ->scalar('fulfillment_channel')
            ->maxLength('fulfillment_channel', 10)
            ->allowEmpty('fulfillment_channel');

        $validator
            ->scalar('merchant_shipping_group')
            ->maxLength('merchant_shipping_group', 50)
            ->allowEmpty('merchant_shipping_group');

        $validator
            ->integer('point')
            ->allowEmpty('point');

        return $validator;
    }
}
