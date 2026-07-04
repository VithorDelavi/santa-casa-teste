<!DOCTYPE html>
<html>
<head>
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h2>Usuários</h2>

    <a href="{{ url('/usuarios/create') }}" class="btn btn-primary mb-3">
        Novo Usuário
    </a>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ url('/usuarios/'.$user->id.'/edit') }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ url('/usuarios/'.$user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>