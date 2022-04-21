<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ogrenciotomasyon extends Migration
{
    public function up()
    {
	    $this->forge->addField([
		'id' => [
		    	'type' => 'INT',
			'auto_increment' => true,
		],
		'isim' => [
			'type' => 'VARCHAR',
			'constraint' => '50',
		],
		'soyisim' => [
			'type' => 'VARCHAR',
			'constraint' => '50',
		],
		'dogumyili' => [
			'type' => 'INT',
			'constraint' => '4',
		],
		'sifre' => [
			'type' => 'VARCHAR',
			'constraint' => '255',
		],
		'kimlikno' => [
			'type' => 'VARCHAR',
			'constraint' => '11',
			'unique' => true,
		],
		'ogrencino' => [
			'type' => 'VARCHAR',
			'constraint' => '50',
			'unique' => true,
		],
		'email' => [
			'type' => 'VARCHAR',
			'constraint' => '50',
			'unique' => 'true',
		],
		'admin' => [
			'type' => 'BOOL',
		],
	]);
	    $this->forge->addPrimaryKey('id');
	    $this->forge->createTable('kullanici');

	    $data = [
		    'isim' => "admin",
		    'soyisim' => "admin",
		    'dogumyili' => "0000",
		    'sifre' => "$2a$12\$kn9DNB6bGwZ2jaOtzwSOQOENAG1eak9W2Xf/vvQINRa1unFZ41ftm",
		    'kimlikno' => "01234567890",
		    'ogrencino' => "admin",
		    'email' => "yok@yok.com",
		    'admin' => "1",
	    ];
	    $this->db->table('kullanici')->insert($data);
	    
	    $this->forge->addField([
		'id' => [
		    	'type' => 'INT',
			'auto_increment' => true,
		],
	    	'dersadi' => [
			'type' => 'VARCHAR',
			'constraint' => '50',
		],
		'ogrencino' => [
			'type' => 'VARCHAR',
			'constraint' => '50',
		],
		'not' => [
			'type' => 'INT',
			'constraint' => '3',
		],
	]);
	    $this->forge->addPrimaryKey('id');
	    $this->forge->createTable('notlar');

    }

    public function down()
    {
	    $this->forge->dropTable('kullanici');
	    $this->forge->dropTable('notlar');
    }
}
