<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Topics Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Courses
 * @property \Cake\ORM\Association\BelongsToMany $Assignments
 * @property \Cake\ORM\Association\BelongsToMany $Attachments
 *
 * @method \App\Model\Entity\Topic get($primaryKey, $options = [])
 * @method \App\Model\Entity\Topic newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Topic[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Topic|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Topic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Topic[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Topic findOrCreate($search, callable $callback = null, $options = [])
 */
class TopicsTable extends Table
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

        $this->table('topics');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Assignments', [
            'foreignKey' => 'topic_id',
            'targetForeignKey' => 'assignment_id',
            'joinTable' => 'assignments_topics'
        ]);
        $this->belongsToMany('Attachments', [
            'foreignKey' => 'topic_id',
            'targetForeignKey' => 'attachment_id',
            'joinTable' => 'attachments_topics'
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
            ->integer('topic_index')
            ->requirePresence('topic_index', 'create')
            ->notEmpty('topic_index');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('description');

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
        $query = $this->find()
                    ->order(['Topics.topic_index' => 'ASC'])
                    ->contain(['Attachments', 'Assignments']);
        $query->matching('Courses', function ($q) use ($options) {
            return $q->where(['Courses.id' => $options['course_id']]);
        });
        return $query;
    }

}
