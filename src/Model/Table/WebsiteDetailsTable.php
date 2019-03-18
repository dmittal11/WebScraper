<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WebsiteDetails Model
 *
 * @property \App\Model\Table\WebsiteScraperTable|\Cake\ORM\Association\HasMany $WebsiteScraper
 *
 * @method \App\Model\Entity\WebsiteDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\WebsiteDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WebsiteDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WebsiteDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WebsiteDetail|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WebsiteDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WebsiteDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WebsiteDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class WebsiteDetailsTable extends Table
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

        $this->setTable('website_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('WebsiteScraper', [
            'foreignKey' => 'website_detail_id'
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
            ->scalar('Url')
            ->maxLength('Url', 10000)
            ->requirePresence('Url', 'create')
            ->allowEmptyString('Url', false);

        return $validator;
    }
}
