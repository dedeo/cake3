<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TicketPassengers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TicketOrders
 *
 * @method \App\Model\Entity\TicketPassenger get($primaryKey, $options = [])
 * @method \App\Model\Entity\TicketPassenger newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TicketPassenger[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TicketPassenger|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TicketPassenger patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TicketPassenger[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TicketPassenger findOrCreate($search, callable $callback = null)
 */
class TicketPassengersTable extends Table
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

        $this->table('ticket_passengers');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('TicketOrders', [
            'foreignKey' => 'ticket_order_id',
            'joinType' => 'INNER'
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
            ->requirePresence('gender', 'create')
            ->notEmpty('gender');

        $validator
            ->requirePresence('seet_number', 'create')
            ->notEmpty('seet_number');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['ticket_order_id'], 'TicketOrders'));

        return $rules;
    }
}
