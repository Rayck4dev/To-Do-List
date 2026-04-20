<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Entities\Task;

class Tasks extends BaseController
{
    private $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel(); // Inicializa o model no construtor
    }

    public function index()
    {
        $data['tasks'] = $this->taskModel->orderBy('id', 'DESC')->findAll(); // Lista tarefas do BD
        return view('tasks_view', $data); // Carrega a view com os dados
    }

    public function store()
    {
        $task = new Task($this->request->getPost()); // Cria entidade com dados do POST
        if ($this->taskModel->save($task)) { // Tenta salvar no banco
            return redirect()->to('/');
        }
        return redirect()->back()->with('errors', $this->taskModel->errors()); // Retorna erros se falhar
    }

    public function updateStatus($id, $status)
    {
        $this->taskModel->update($id, ['status' => $status]); // Atualiza apenas o campo status
        return redirect()->to('/');
    }

    public function delete($id)
    {
        $this->taskModel->delete($id); // Deleta a tarefa por ID
        return redirect()->to('/');
    }
}