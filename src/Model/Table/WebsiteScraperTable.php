<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WebsiteScraper Model
 *
 * @property \App\Model\Table\TyreDetailsTable|\Cake\ORM\Association\BelongsTo $TyreDetails
 * @property \App\Model\Table\WebsiteDetailsTable|\Cake\ORM\Association\BelongsTo $WebsiteDetails
 *
 * @method \App\Model\Entity\WebsiteScraper get($primaryKey, $options = [])
 * @method \App\Model\Entity\WebsiteScraper newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WebsiteScraper[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WebsiteScraper|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WebsiteScraper|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WebsiteScraper patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WebsiteScraper[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WebsiteScraper findOrCreate($search, callable $callback = null, $options = [])
 */
class WebsiteScraperTable extends Table
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

        $this->setTable('website_scraper');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TyreDetails', [
            'foreignKey' => 'tyre_detail_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('WebsiteDetails', [
            'foreignKey' => 'website_detail_id',
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('Brand_name')
            ->maxLength('Brand_name', 10000)
            ->requirePresence('Brand_name', 'create')
            ->allowEmptyString('Brand_name', false);

        $validator
            ->scalar('Pattern_name')
            ->maxLength('Pattern_name', 10000)
            ->requirePresence('Pattern_name', 'create')
            ->allowEmptyString('Pattern_name', false);

        $validator
            ->scalar('Tyre_size')
            ->maxLength('Tyre_size', 10000)
            ->requirePresence('Tyre_size', 'create')
            ->allowEmptyString('Tyre_size', false);

        $validator
            ->scalar('Price')
            ->maxLength('Price', 10000)
            ->requirePresence('Price', 'create')
            ->allowEmptyString('Price', false);

        $validator
            ->scalar('Url')
            ->maxLength('Url', 10000)
            ->requirePresence('Url', 'create')
            ->allowEmptyString('Url', false);

        $validator
            ->scalar('Scrape_date')
            ->maxLength('Scrape_date', 10000)
            ->requirePresence('Scrape_date', 'create')
            ->allowEmptyString('Scrape_date', false);

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
        $rules->add($rules->existsIn(['tyre_detail_id'], 'TyreDetails'));
        $rules->add($rules->existsIn(['website_detail_id'], 'WebsiteDetails'));

        return $rules;
    }
}
