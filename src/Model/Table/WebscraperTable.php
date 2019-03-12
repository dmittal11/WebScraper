<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Webscraper Model
 *
 * @method \App\Model\Entity\Webscraper get($primaryKey, $options = [])
 * @method \App\Model\Entity\Webscraper newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Webscraper[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Webscraper|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Webscraper|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Webscraper patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Webscraper[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Webscraper findOrCreate($search, callable $callback = null, $options = [])
 */
class WebscraperTable extends Table
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

        $this->setTable('webscraper');
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
            ->scalar('brand_name')
            ->maxLength('brand_name', 10000)
            ->requirePresence('brand_name', 'create')
            ->allowEmptyString('brand_name', false);

        $validator
            ->scalar('pattern_name')
            ->maxLength('pattern_name', 10000)
            ->requirePresence('pattern_name', 'create')
            ->allowEmptyString('pattern_name', false);

        $validator
            ->scalar('tyre_size')
            ->maxLength('tyre_size', 10000)
            ->requirePresence('tyre_size', 'create')
            ->allowEmptyString('tyre_size', false);

        $validator
            ->scalar('price')
            ->maxLength('price', 10000)
            ->requirePresence('price', 'create')
            ->allowEmptyString('price', false);

        $validator
            ->scalar('url')
            ->maxLength('url', 10000)
            ->requirePresence('url', 'create')
            ->allowEmptyString('url', false);

        $validator
            ->scalar('scrape_data')
            ->maxLength('scrape_data', 10000)
            ->requirePresence('scrape_data', 'create')
            ->allowEmptyString('scrape_data', false);

        return $validator;
    }
}
