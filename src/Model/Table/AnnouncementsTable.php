<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Announcements Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clubs
 * @property \Cake\ORM\Association\BelongsToMany $Attachments
 *
 * @method \App\Model\Entity\Announcement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Announcement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Announcement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Announcement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Announcement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Announcement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Announcement findOrCreate($search, callable $callback = null, $options = [])
 */
class AnnouncementsTable extends Table
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

        $this->table('announcements');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('Announcements', [
            'foreignKey' => 'club_id'
        ]);

        $this->belongsTo('Clubs', [
            'foreignKey' => 'club_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Attachments', [
            'foreignKey' => 'announcement_id',
            'targetForeignKey' => 'attachment_id',
            'joinTable' => 'announcements_attachments'
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
            ->integer('announcement_index')
            ->requirePresence('announcement_index', 'create')
            ->notEmpty('announcement_index');

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
        $rules->add($rules->existsIn(['club_id'], 'Clubs'));

        return $rules;
    }

    public function findWithClub(Query $query, array $options)
    {
        $query = $this->find()
                    ->order(['Announcements.announcement_index' => 'ASC'])
                    ->contain(['Attachments']);
        $query->matching('Clubs', function ($q) use ($options) {
            return $q->where(['Clubs.id' => $options['club_id']]);
        });
        return $query;
    }
}
