<?php
namespace Dashboard\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tickets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Schedules
 * @property \Cake\ORM\Association\BelongsTo $Routes
 * @property \Cake\ORM\Association\BelongsTo $Buses
 * @property \Cake\ORM\Association\HasMany $TicketOrders
 *
 * @method \Dashboard\Model\Entity\Ticket get($primaryKey, $options = [])
 * @method \Dashboard\Model\Entity\Ticket newEntity($data = null, array $options = [])
 * @method \Dashboard\Model\Entity\Ticket[] newEntities(array $data, array $options = [])
 * @method \Dashboard\Model\Entity\Ticket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Dashboard\Model\Entity\Ticket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Dashboard\Model\Entity\Ticket[] patchEntities($entities, array $data, array $options = [])
 * @method \Dashboard\Model\Entity\Ticket findOrCreate($search, callable $callback = null)
 */
class TicketsTable extends Table
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

        $this->table('tickets');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Schedules', [
            'foreignKey' => 'schedule_id',
            'joinType' => 'INNER',
            'className' => 'Dashboard.Schedules'
        ]);
        $this->belongsTo('Routes', [
            'foreignKey' => 'route_id',
            'joinType' => 'INNER',
            'className' => 'Dashboard.Routes'
        ]);
        $this->belongsTo('Buses', [
            'foreignKey' => 'bus_id',
            'joinType' => 'INNER',
            'className' => 'Dashboard.Buses'
        ]);
        $this->hasMany('TicketOrders', [
            'foreignKey' => 'ticket_id',
            'className' => 'Dashboard.TicketOrders'
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
            ->date('date_create_at')
            ->allowEmpty('date_create_at');

        $validator
            ->time('departure_time')
            ->requirePresence('departure_time', 'create')
            ->notEmpty('departure_time');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->time('arival_time')
            ->requirePresence('arival_time', 'create')
            ->notEmpty('arival_time');

        $validator
            ->requirePresence('fare', 'create')
            ->notEmpty('fare');

        $validator
            ->integer('stock')
            ->requirePresence('stock', 'create')
            ->notEmpty('stock');

        $validator
            ->integer('passegers')
            ->allowEmpty('passegers');

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
        $rules->add($rules->existsIn(['schedule_id'], 'Schedules'));
        $rules->add($rules->existsIn(['route_id'], 'Routes'));
        $rules->add($rules->existsIn(['bus_id'], 'Buses'));

        return $rules;
    }
}
