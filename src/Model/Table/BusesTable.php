<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buses Model
 *
 * @property \Cake\ORM\Association\HasMany $Schedules
 *
 * @method \App\Model\Entity\Bus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bus findOrCreate($search, callable $callback = null)
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

        $this->hasMany('Schedules', [
            'foreignKey' => 'bus_id'
        ]);
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
            ->requirePresence('plat_no', 'create')
            ->notEmpty('plat_no');

        $validator
            ->allowEmpty('facilities');

        $validator
            ->integer('capacity')
            ->allowEmpty('capacity');

        $validator
            ->allowEmpty('status');

        return $validator;
    }
}
