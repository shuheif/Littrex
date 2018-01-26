<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Classevents Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Courses
 * @property \Cake\ORM\Association\HasMany $Attendances
 *
 * @method \App\Model\Entity\Classevent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Classevent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Classevent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Classevent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classevent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Classevent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Classevent findOrCreate($search, callable $callback = null, $options = [])
 */
class ClasseventsTable extends Table
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

        $this->table('classevents');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Attendances', [
            'foreignKey' => 'classevent_id'
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
            ->boolean('attendance')
            ->allowEmpty('attendance');

        $validator
            ->requirePresence('date', 'create')
            ->notEmpty('date');

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
        $rules->add($rules->existsIn(['course_id'], 'Courses'));

        return $rules;
    }

    public function findWithCourse(Query $query, array $options)
    {
        $query = $this->find();
        $query->matching('Courses', function ($q) use ($options) {
            return $q->where(['Courses.id' => $options['course_id']]);
        });
        return $query;
    }
}
