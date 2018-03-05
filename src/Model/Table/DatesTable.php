<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dates Model

 *
 * @method \App\Model\Entity\Enrollment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Enrollment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Enrollment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Enrollment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enrollment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Enrollment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Enrollment findOrCreate($search, callable $callback = null)
 */
class DatesTable extends Table
{

	public function findByReserva($numero){

	}

	public function removeDates($date, $room){
		    return $this->deleteAll(['quarto' => $room]);
	}

}