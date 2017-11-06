<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ViewAccess Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\ViewAcces get($primaryKey, $options = [])
 * @method \App\Model\Entity\ViewAcces newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ViewAcces[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ViewAcces|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ViewAcces patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ViewAcces[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ViewAcces findOrCreate($search, callable $callback = null, $options = [])
 */
class ViewAccessTable extends Table
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

        $this->setTable('view_access');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'Roles'
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
            ->requirePresence('view_name', 'create')
            ->notEmpty('view_name');

        $validator
            ->requirePresence('controller_name', 'create')
            ->notEmpty('controller_name');

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
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }

    public function findAccess(\Cake\ORM\Query $query, array $options){
          $role_id=$options['role'];
          $query->
          where(['role_id' => $role_id]);
          return $query;
        }
}
