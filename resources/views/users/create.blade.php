<!DOCTYPE html>
<html>
<head>
    <title>Novo Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h2>Novo Usuário</h2>

    <form method="POST" action="{{ url('/usuarios') }}">
        @csrf

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Senha</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Perfil</label>
            <select name="role" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Permissões</label>

            @foreach($permissions as $permission)

                <div class="form-check">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="permissions[]"
                        value="{{ $permission->name }}"
                        id="perm{{ $permission->id }}">

                    <label class="form-check-label" for="perm{{ $permission->id }}">
                        {{ $permission->name }}
                    </label>

                </div>

            @endforeach

        </div>

        <button class="btn btn-success">Salvar</button>
        <a href="{{ url('/usuarios') }}" class="btn btn-secondary">Voltar</a>

    </form>

</div>

</body>
</html>