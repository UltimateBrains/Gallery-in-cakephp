<?php 


namespace App\View\Helper;
use Cake\View\Helper;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

class CountHelper extends Helper{

 	  public function showtheCount(){
 	 
 	     $count =0;
 	     $users = TableRegistry::get('Albums');
 	     $query = $users->find("all");
         foreach ($query as $row) {
         	return   $count= $row->id;
           		
		 }        
    }
}




?>