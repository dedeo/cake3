<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TicketOrders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Schedules
 * @property \Cake\ORM\Association\HasMany $TicketPassengers
 *
 * @method \App\Model\Entity\TicketOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\TicketOrder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TicketOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TicketOrder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TicketOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TicketOrder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TicketOrder findOrCreate($search, callable $callback = null)
 */
class TicketOrdersTable extends Table
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

        $this->table('ticket_orders');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Schedules', [
            'foreignKey' => 'schedule_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('TicketPassengers', [
            'foreignKey' => 'ticket_order_id'
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
            ->dateTime('create_at')
            ->requirePresence('create_at', 'create')
            ->notEmpty('create_at');

        $validator
            ->time('departure_time')
            ->requirePresence('departure_time', 'create')
            ->notEmpty('departure_time');

        $validator
            ->date('departure_date')
            ->requirePresence('departure_date', 'create')
            ->notEmpty('departure_date');

        $validator
            ->requirePresence('fare', 'create')
            ->notEmpty('fare');

        $validator
            ->integer('passegers')
            ->allowEmpty('passegers');

        $validator
            ->allowEmpty('total');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['schedule_id'], 'Schedules'));

        return $rules;
    }
}
