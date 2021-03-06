<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DexelScraper Model
 *
 * @method \App\Model\Entity\DexelScraper get($primaryKey, $options = [])
 * @method \App\Model\Entity\DexelScraper newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DexelScraper[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DexelScraper|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DexelScraper|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DexelScraper patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DexelScraper[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DexelScraper findOrCreate($search, callable $callback = null, $options = [])
 */
class DexelScraperTable extends Table
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

        $this->setTable('dexel_scraper');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('Scrape_data')
            ->maxLength('Scrape_data', 10000)
            ->requirePresence('Scrape_data', 'create')
            ->allowEmptyString('Scrape_data', false);

        return $validator;
    }
}
