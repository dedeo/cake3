<?php
namespace Dashboard\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RouteDestinations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Routes
 *
 * @method \Dashboard\Model\Entity\RouteDestination get($primaryKey, $options = [])
 * @method \Dashboard\Model\Entity\RouteDestination newEntity($data = null, array $options = [])
 * @method \Dashboard\Model\Entity\RouteDestination[] newEntities(array $data, array $options = [])
 * @method \Dashboard\Model\Entity\RouteDestination|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Dashboard\Model\Entity\RouteDestination patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Dashboard\Model\Entity\RouteDestination[] patchEntities($entities, array $data, array $options = [])
 * @method \Dashboard\Model\Entity\RouteDestination findOrCreate($search, callable $callback = null)
 */
class RouteDestinationsTable extends Table
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

        $this->table('route_destinations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Routes', [
            'foreignKey' => 'route_id',
            'joinType' => 'INNER',
            'className' => 'Dashboard.Routes'
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
            ->integer('city')
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        $validator
            ->integer('distance')
            ->requirePresence('distance', 'create')
            ->notEmpty('distance');

        $validator
            ->integer('fare')
            ->requirePresence('fare', 'create')
            ->notEmpty('fare');

        // $validator
        //     ->requirePresence('city_name', 'create')
        //     ->notEmpty('city_name');

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

        return $rules;
    }
}
