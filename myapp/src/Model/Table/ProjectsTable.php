<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('project_number')
            ->requirePresence('project_number', 'create')
            ->notEmpty('project_number');

        $validator
            ->scalar('segment')
            ->maxLength('segment', 255)
            ->allowEmpty('segment');

        $validator
            ->scalar('orderer')
            ->maxLength('orderer', 500)
            ->allowEmpty('orderer');

        $validator
            ->scalar('project_name')
            ->maxLength('project_name', 1000)
            ->allowEmpty('project_name');

        $validator
            ->scalar('staff')
            ->maxLength('staff', 500)
            ->allowEmpty('staff');

        $validator
            ->scalar('team')
            ->maxLength('team', 500)
            ->allowEmpty('team');

        $validator
            ->integer('contract_amount')
            ->allowEmpty('contract_amount');

        $validator
            ->integer('estimate_amount')
            ->allowEmpty('estimate_amount');

        $validator
            ->date('order_planed_month')
            ->allowEmpty('order_planed_month');

        $validator
            ->date('completion_planed_month')
            ->allowEmpty('completion_planed_month');

        $validator
            ->scalar('completion_planed_term')
            ->maxLength('completion_planed_term', 50)
            ->allowEmpty('completion_planed_term');

        $validator
            ->integer('probability_orders')
            ->allowEmpty('probability_orders');

        return $validator;
    }

    // public function getColumnDispName($column_name){
    //     return COLUMN_DISP_NAME[$column_name];
    // }
}
