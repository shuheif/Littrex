<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Images
 * @property \Cake\ORM\Association\HasMany $Assignments
 * @property \Cake\ORM\Association\HasMany $Attendances
 * @property \Cake\ORM\Association\HasMany $CoursesGradesUsers
 * @property \Cake\ORM\Association\HasMany $Informations
 * @property \Cake\ORM\Association\BelongsToMany $Clubs
 * @property \Cake\ORM\Association\BelongsToMany $Courses
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Images', [
            'foreignKey' => 'image_id'
        ]);
        $this->hasMany('Assignments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Attendances', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('CoursesUsers', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Informations', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Clubs', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'club_id',
            'joinTable' => 'clubs_users'
        ]);
        $this->belongsToMany('Courses', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'course_id',
            'joinTable' => 'courses_users'
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->requirePresence('gender', 'create')
            ->notEmpty('gender');

        $validator
            ->allowEmpty('middle_name');

        $validator
            ->integer('role')
            ->requirePresence('role', 'create')
            ->notEmpty('role');

        $validator
            ->dateTime('created_date')
            ->requirePresence('created_date', 'create')
            ->notEmpty('created_date');

        $validator
            ->allowEmpty('phone_number');

        $validator
            ->allowEmpty('cell_number');

        $validator
            ->allowEmpty('address');
        
        $validator
            ->allowEmpty('city');
        
        $validator
            ->allowEmpty('state');
        
        $validator
            ->allowEmpty('zip_code');
        
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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['image_id'], 'Images'));

        return $rules;
    }

    public function findWithId(Query $query, array $options)
    {
        $query = $this->get($options['user_id']);
        //$query->matching('Users', function ($q) use ($options) {
         //   return $q->where(['id' => $options['user_id']]);
        //});
        return $query;
    }
    
    public function findWithCourse(Query $query, array $options)
    {
        $query = $this->find();
        $query->matching('Courses', function ($q) use ($options) {
            return $q->where(['Courses.id' => $options['course_id']]);
        });
        return $query;
    }
    
    public function findWithClub(Query $query, array $options)
    {
        $query = $this->find();
        $query->matching('Clubs', function ($q) use ($options) {
            return $q->where(['Clubs.id' => $options['club_id']]);
        });
        return $query;
    }
    
    public function findTeachers(Query $query, array $options)
    {
        $query = $this->find()->where(['role' => 2]);
        return $query;
    }


    public function findStudents(Query $query, array $options)
    {
        $query = $this->find()->where(['role' => 3]);
        return $query;
    }

}
