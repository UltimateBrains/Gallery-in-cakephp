<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Validation\Validator;

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

        $this->setTable('users');
      
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
        ->requirePresence("name","Name is Required")
        ->add("name",[
            "length"=>[
                "rule"=>["minLength",6],
                "message"=>"Name should be more than 5"
            ]
        ])
        ->requirePresence("email","Email is Required")
        ->allowEmptyString('email', false)
        ->add("email",[
            "valid_email"=>[
                "rule"=>["email"],
                "message"=>"Invalid Email Address"
            ]
        ])
        ->add("email",[
            "unique_email"=>[
                "rule"=>["validateUnique"],
                "provider"=>"table",
                "message"=>"Already email exists"
            ]
        ])
        ->scalar('password')
        ->maxLength('password', 255)
        ->requirePresence('password', 'create')
        ->allowEmptyString('password', false);        

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

        return $rules;
    }
}
