<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class dateController extends AppController
{
	 public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index(){
		$Dates = $this->Paginator->paginate($this->Dates->find());
        $this->set(compact('Dates'));
	}

	 public function view($id)
    {
        $date = $this->Dates->findById($id))->firstOrFail();
        $this->set(compact('date'));
    }

    public function update(){

    }

    public function add()
    {
        $date = $this->Dates->newEntity();
        if ($this->request->is('post')) {

            $dates = $this->Dates->patchEntity($date, $this->request->getData());
            // remove dates to existing room 
            $post_data = $this->request->data();
            $this->Dates->removeDates($post_data['room']);
            $booking = $this->Bookings->findByReserva($this->request['reserva']);
            foreach($dates as $date){
                if ($this->Dates->save($date)) {
                    $booking->status = 3; // atualiza a reserva
                    $this->Bookings->save($booking);
                }
            }
        }
        $this->set('dates', $dates);
    }

	public function edit(){

	}

	public function delete(){

	}



}