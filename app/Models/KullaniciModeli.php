<?php namespace App\Models;

use CodeIgniter\Model;

class KullaniciModeli extends Model {
 protected $table = 'kullanici';
 protected $allowedFields = ['isim','soyisim','dogumyili','kimlikno','email','ogrencino','sifre'];
 protected $beforeInsert = ['beforeInsert'];
 protected $beforeUpdate = ['beforeUpdate'];

 protected function beforeInsert(array $data) {
	 $data = $this->sifrehash($data);
	return $data;
 }

 protected function beforeUpdate(array $data) {
	return $data;
 }

 protected function sifrehash(array $data) {
	 if(isset($data['data']['sifre']))
		//sifreler hash olarak saklanacak
		$data['data']['sifre'] = password_hash($data['data']['sifre'], PASSWORD_DEFAULT);
	 return $data;
 }
}
