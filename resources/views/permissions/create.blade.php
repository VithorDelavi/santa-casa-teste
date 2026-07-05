<!DOCTYPE html>
<html>
<head>
    <title>Nova Permissão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h2>Nova Permissão</h2>

    <form action="{{ url('/permissoes') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Nome da Permissão</label>

            <input
                type="text"
                name="name"
                class="form-control"
                required>
        </div>

        <button class="btn btn-success">
            Salvar
        </button>

        <a href="{{ url('/permissoes') }}" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

</body>
</html>