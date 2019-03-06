<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Validation\Validator;

class GalleriesTable extends Table
{
	public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('galleries'); 
       
    }
      public function validationDefault(Validator $validator)
    { 
    	return $validator;
    }
}