<?php namespace Tests\Support\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'					=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'					=> ['type' => 'varchar', 'constraint' => 50],
            'email'					=> ['type' => 'varchar', 'constraint' => 100],
            'password'			    => ['type' => 'varchar', 'constraint' => 255],
            'created_at'			=> ['type' => 'int', 'null' => true],
            'updated_at'            => ['type' => 'int', 'null' => true]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
