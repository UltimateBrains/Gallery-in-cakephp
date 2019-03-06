<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Validation\Validator;

class AlbumsTable extends Table
{
	public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('albums');
      
       
    }
     public function validationDefault(Validator $validator)
    { 

        $validator
        ->requirePresence("AlbumName","Album name is Required")
        ->allowEmptyString('AlbumName', false)
        ->add("AlbumName",[
            "unique_album"=>[
                "rule"=>["validateUnique"],
                "provider"=>"table",
                "message"=>"Already exists"
            ]
        ]);   

        return $validator;
    }
     public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['AlbumName']));

        return $rules;
    }
    

}