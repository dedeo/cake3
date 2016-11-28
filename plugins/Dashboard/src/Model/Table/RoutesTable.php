<?php
namespace Dashboard\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Routes Model
 *
 * @method \Dashboard\Model\Entity\Route get($primaryKey, $options = [])
 * @method \Dashboard\Model\Entity\Route newEntity($data = null, array $options = [])
 * @method \Dashboard\Model\Entity\Route[] newEntities(array $data, array $options = [])
 * @method \Dashboard\Model\Entity\Route|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Dashboard\Model\Entity\Route patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Dashboard\Model\Entity\Route[] patchEntities($entities, array $data, array $options = [])
 * @method \Dashboard\Model\Entity\Route findOrCreate($search, callable $callback = null)
 */
class RoutesTable extends Table
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

        $this->table('routes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Cities',[
                'className' => 'Cities',
                'foreignKey' => 'destination',
                'propertyName' => 'city'
            ]);

        // $this->belongsTo('Cities',[
        //         'className' => 'Cities',
        //         'foreignKey' => ['destination'],
        //         'propertyName' => 'city'
        //     ]);

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
            ->requirePresence('source', 'create')
            ->notEmpty('source');

        $validator
            ->requirePresence('destination', 'create')
            ->notEmpty('destination');

        $validator
            ->integer('distance')
            ->requirePresence('distance', 'create')
            ->notEmpty('distance');

        $validator
            ->integer('fare')
            ->requirePresence('fare', 'create')
            ->notEmpty('fare');

        $validator
            ->dateTime('create_at')
            ->requirePresence('create_at', 'create')
            ->notEmpty('create_at');

        return $validator;
    }
}
