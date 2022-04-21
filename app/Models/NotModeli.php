<?php namespace App\Models;

use CodeIgniter\Model;

class NotModeli extends Model {
 protected $table = 'notlar';
 protected $allowedFields = ['dersadi','ogrencino','ogrenciid','not'];

 function ajaxKayit(){
		$data = array(				
				'dersadi'		=> $this->input->post('dersadi'), 
				'ogrencino'		=> $this->input->post('ogrencino'), 
				'ogrenciid'		=> $this->input->post('ogrenciid'), 
				'not'		 	=> $this->input->post('not'), 
			);
		$kayit = $this->db->insert('notlar',$data);
		return $kayit;
 }
}
