<?php
namespace Dashboard\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buses Model
 *
 * @method \Dashboard\Model\Entity\Bus get($primaryKey, $options = [])
 * @method \Dashboard\Model\Entity\Bus newEntity($data = null, array $options = [])
 * @method \Dashboard\Model\Entity\Bus[] newEntities(array $data, array $options = [])
 * @method \Dashboard\Model\Entity\Bus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Dashboard\Model\Entity\Bus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Dashboard\Model\Entity\Bus[] patchEntities($entities, array $data, array $options = [])
 * @method \Dashboard\Model\Entity\Bus findOrCreate($search, callable $callback = null)
 */
class BusesTable extends Table
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

        $this->table('buses');
        $this->displayField('name');
        $this->primaryKey('id');
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('capacity')
            ->requirePresence('capacity', 'create')
            ->notEmpty('capacity');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
