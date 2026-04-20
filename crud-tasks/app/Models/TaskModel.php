<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Task;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = Task::class; // Define que o retorno será a Entity Task
    protected $allowedFields = ['titulo', 'descricao', 'status'];
    protected $useTimestamps = true; // Ativa controle automático de data

    // Validação integrada para o Controller usar
    protected $validationRules = [
        'titulo' => 'required|min_length[3]|max_length[100]',
    ];

    protected $validationMessages = [
        'titulo' => ['required' => 'O título é obrigatório.']
    ];
}