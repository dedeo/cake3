<?php
namespace Dashboard\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schedules Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Routes
 * @property \Cake\ORM\Association\BelongsTo $Buses
 *
 * @method \Dashboard\Model\Entity\Schedule get($primaryKey, $options = [])
 * @method \Dashboard\Model\Entity\Schedule newEntity($data = null, array $options = [])
 * @method \Dashboard\Model\Entity\Schedule[] newEntities(array $data, array $options = [])
 * @method \Dashboard\Model\Entity\Schedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Dashboard\Model\Entity\Schedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Dashboard\Model\Entity\Schedule[] patchEntities($entities, array $data, array $options = [])
 * @method \Dashboard\Model\Entity\Schedule findOrCreate($search, callable $callback = null)
 */
class SchedulesTable extends Table
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

        $this->table('schedules');
        $this->displayField('route_name');
        $this->primaryKey('id');

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
            // ->integer('day')
            ->requirePresence('class', 'create')
            ->notEmpty('class');

        $validator
            // ->integer('day')
            ->requirePresence('fare', 'create')
            ->notEmpty('fare');

        $validator
            ->integer('day')
            ->requirePresence('day', 'create')
            ->notEmpty('day');

        $validator
            ->dateTime('create_at')
            ->allowEmpty('create_at');

        $validator
            ->time('departure_time')
            ->requirePresence('departure_time', 'create')
            ->notEmpty('departure_time');

        $validator
            ->time('arival_time')
            ->requirePresence('arival_time', 'create')
            ->notEmpty('arival_time');

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
        $rules->add($rules->existsIn(['route_id'], 'Routes'));
        $rules->add($rules->existsIn(['bus_id'], 'Buses'));

        return $rules;
    }
}
