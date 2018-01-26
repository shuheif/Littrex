<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Courses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Assignments
 * @property \Cake\ORM\Association\HasMany $Attendances
 * @property \Cake\ORM\Association\HasMany $Cells
 * @property \Cake\ORM\Association\HasMany $CoursesGradesUsers
 * @property \Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Course get($primaryKey, $options = [])
 * @method \App\Model\Entity\Course newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Course[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Course|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Course patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Course[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Course findOrCreate($search, callable $callback = null, $options = [])
 */
class CoursesTable extends Table
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

        $this->table('courses');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsTo('Images', [
            'foreignKey' => 'image_id'
        ]);
        
        $this->belongsTo('Forums', [
            'foreignKey' => 'forum_id'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'teacher_id',
            'joinType' => 'INNER',
            'propertyName' => 'teacher'
        ]);
        $this->hasMany('Assignments', [
            'foreignKey' => 'course_id'
        ]);
        $this->hasMany('Classevents', [
            'foreignKey' => 'course_id'
        ]);
        $this->hasMany('Topics', [
            'foreignKey' => 'course_id'
        ]);
        $this->hasMany('CoursesUsers', [
            'foreignKey' => 'course_id'
        ]);
        $this->hasMany('Grades', [
            'foreignKey' => 'course_id'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'course_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'courses_users'
        ]);
        $this->belongsTo('EventTypes', [
            'foreignKey' => 'event_type_id'
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->allowEmpty('department');

        $validator
            ->integer('number')
            ->allowEmpty('number');

        $validator
            ->allowEmpty('syllabus');

        $validator
            ->allowEmpty('room');

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
        $rules->add($rules->existsIn(['teacher_id'], 'Users'));
        $rules->add($rules->existsIn(['event_type_id'], 'EventTypes'));

        return $rules;
    }

    public function findWithUser(Query $query, array $options)
    {
        $query = $this->find();
        $query->matching('Users', function ($q) use ($options) {
            return $q->where(['Users.id' => $options['user_id']]);
        });
        return $query;
    }

}
