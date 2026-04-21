## ✅ TaskMaster - Gerenciador de Tarefas

Uma aplicação robusta de gerenciamento de tarefas desenvolvida em **PHP** com o framework **CodeIgniter 4** e banco de dados **MySQL**.  
O sistema permite o controle total de afazeres através de um CRUD completo, utilizando os conceitos de MVC, Entities e Migrations.

---
> [!IMPORTANT]
> 🎓 **Projeto desenvolvido para a disciplina de Back-End Frameworks.**

---

## 🚀 Tecnologias utilizadas

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![CodeIgniter](https://img.shields.io/badge/CodeIgniter-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)](https://codeigniter.com/)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Laragon](https://img.shields.io/badge/Laragon-0E83CD?style=for-the-badge&logo=laragon&logoColor=white)](https://laragon.org/)

---

## 📂 Estrutura do banco de dados

### Tabela `tasks`
- `id` (PK, auto increment)
- `titulo` (VARCHAR 100)
- `descricao` (TEXT)
- `status` (ENUM: pendente, concluído)
- `created_at` (DATETIME)
- `updated_at` (DATETIME)

---

## ⚙️ Configuração do ambiente

1. Clone o repositório:
```bash
   git clone https://github.com/Rayck4dev/To-Do-List.git
```

2. Configure o arquivo .env:

```bash

CI_ENVIRONMENT = development

database.default.DBDriver = MySQLi 
database.default.database = tasksdb 
database.default.hostname = localhost 
database.default.username = root 
database.default.password = 

```

3. Execute as migrations:

```bash
php spark migrate
```

## ▶️ Como rodar

1. No terminal:

```bash
php spark serve
```

2. Acesse no navegador:

```bash
http://localhost:8080/
```

> Desenvolvido com muito ☕ para a aula de Back-End Frameworks! 🚀
