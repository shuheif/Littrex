<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttachmentsTopics Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Topics
 * @property \Cake\ORM\Association\BelongsTo $Attachments
 *
 * @method \App\Model\Entity\AttachmentsTopic get($primaryKey, $options = [])
 * @method \App\Model\Entity\AttachmentsTopic newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AttachmentsTopic[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AttachmentsTopic|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttachmentsTopic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AttachmentsTopic[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AttachmentsTopic findOrCreate($search, callable $callback = null, $options = [])
 */
class AttachmentsTopicsTable extends Table
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

        $this->table('attachments_topics');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Topics', [
            'foreignKey' => 'topic_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Attachments', [
            'foreignKey' => 'attachment_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['topic_id'], 'Topics'));
        $rules->add($rules->existsIn(['attachment_id'], 'Attachments'));

        return $rules;
    }
}
