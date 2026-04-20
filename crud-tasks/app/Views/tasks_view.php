<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Tasks | CI4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
        }

        .gradient-custom {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 2rem 2rem;
        }

        .card {
            border: none;
            border-radius: 15px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .task-done {
            text-decoration: line-through;
            color: #adb5bd;
        }

        .btn-action {
            border-radius: 10px;
        }

        .badge-status {
            font-size: 0.75rem;
            padding: 0.5em 1em;
        }
    </style>
</head>

<body>

    <div class="gradient-custom shadow">
        <div class="container text-center">
            <h1 class="fw-bold"><i class="bi bi-check2-all"></i> Master Tasks</h1>
            <p class="lead">Organize seu dia, aumente sua produtividade</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="card shadow p-4">
                    <form action="/tasks/store" method="post">
                        <div class="row g-3">
                            <div class="col-md-5">
                                <label class="form-label fw-bold">O que fazer?</label>
                                <input type="text" name="titulo" class="form-control form-control-lg"
                                    placeholder="Ex: Estudar Frameworks" required>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label fw-bold">Detalhes</label>
                                <input type="text" name="descricao" class="form-control form-control-lg"
                                    placeholder="Breve descrição...">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary btn-lg w-100 btn-action shadow-sm">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <?php if (session()->has('errors')): ?>
                        <div class="mt-3 text-danger small">
                            <?php foreach (session('errors') as $error): ?> <i class="bi bi-exclamation-circle"></i>
                                <?= $error ?><br> <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold">Suas Tarefas (<?= count($tasks) ?>)</h4>
                </div>

                <div class="table-responsive bg-white rounded-4 shadow-sm p-3">
                    <table class="table align-middle">
                        <thead class="text-secondary small text-uppercase">
                            <tr>
                                <th style="width: 50px"></th>
                                <th>Tarefa</th>
                                <th>Status</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tasks as $t): ?>
                                <tr>
                                    <td>
                                        <i
                                            class="bi <?= $t->status == 'concluido' ? 'bi-check-circle-fill text-success' : 'bi-circle text-muted' ?> fs-4"></i>
                                    </td>
                                    <td>
                                        <div class="<?= $t->status == 'concluido' ? 'task-done' : 'fw-semibold' ?>">
                                            <?= esc($t->titulo) ?>
                                        </div>
                                        <div class="small text-muted"><?= esc($t->descricao) ?></div>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-status rounded-pill <?= $t->status == 'concluido' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' ?>">
                                            <?= strtoupper($t->status) ?>
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a href="/tasks/updateStatus/<?= $t->id ?>/<?= $t->status == 'pendente' ? 'concluido' : 'pendente' ?>"
                                                class="btn btn-light btn-sm btn-action me-2 border" title="Alternar Status">
                                                <i class="bi bi-arrow-left-right"></i>
                                            </a>
                                            <a href="/tasks/delete/<?= $t->id ?>"
                                                class="btn btn-outline-danger btn-sm btn-action"
                                                onclick="return confirm('Deseja realmente excluir esta tarefa?')"
                                                title="Excluir">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if (empty($tasks)): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <i class="bi bi-emoji-smile fs-1 text-muted"></i>
                                        <p class="text-muted mt-2">Nenhuma tarefa por aqui. Relaxe ou adicione uma nova!</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5 mb-3 text-muted small">
        CRUD de Tarefas - Disciplina Backend Frameworks &copy; <?= date('Y') ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>