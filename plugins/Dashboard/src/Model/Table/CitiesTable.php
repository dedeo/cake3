<?php
namespace Dashboard\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cities Model
 *
 * @method \Dashboard\Model\Entity\City get($primaryKey, $options = [])
 * @method \Dashboard\Model\Entity\City newEntity($data = null, array $options = [])
 * @method \Dashboard\Model\Entity\City[] newEntities(array $data, array $options = [])
 * @method \Dashboard\Model\Entity\City|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Dashboard\Model\Entity\City patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Dashboard\Model\Entity\City[] patchEntities($entities, array $data, array $options = [])
 * @method \Dashboard\Model\Entity\City findOrCreate($search, callable $callback = null)
 */
class CitiesTable extends Table
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

        $this->table('cities');
        $this->displayField('city');
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
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        return $validator;
    }
}
