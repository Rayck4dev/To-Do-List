<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        // Define a estrutura da tabela tasks
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'titulo' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'descricao' => ['type' => 'TEXT', 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['pendente', 'concluido'], 'default' => 'pendente'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true); // Define chave primária
        $this->forge->createTable('tasks'); // Cria a tabela
    }

    public function down()
    {
        $this->forge->dropTable('tasks'); // Remove a tabela
    }
}