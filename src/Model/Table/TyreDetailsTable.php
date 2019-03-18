<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TyreDetails Model
 *
 * @property \App\Model\Table\WebsiteScraperTable|\Cake\ORM\Association\HasMany $WebsiteScraper
 *
 * @method \App\Model\Entity\TyreDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\TyreDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TyreDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TyreDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TyreDetail|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TyreDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TyreDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TyreDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class TyreDetailsTable extends Table
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

        $this->setTable('tyre_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('WebsiteScraper', [
            'foreignKey' => 'tyre_detail_id'
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('width')
            ->maxLength('width', 10000)
            ->requirePresence('width', 'create')
            ->allowEmptyString('width', false);

        $validator
            ->scalar('aspect_ratio')
            ->maxLength('aspect_ratio', 10000)
            ->requirePresence('aspect_ratio', 'create')
            ->allowEmptyString('aspect_ratio', false);

        $validator
            ->scalar('rim')
            ->maxLength('rim', 10000)
            ->requirePresence('rim', 'create')
            ->allowEmptyString('rim', false);

        return $validator;
    }
}
