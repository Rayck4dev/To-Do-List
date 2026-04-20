<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Task extends Entity
{
    // Mapeia os dados do banco para propriedades do objeto
    protected $dates = ['created_at', 'updated_at'];
}