<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => '11',
                'null' => true
            ],
            'buyer_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
