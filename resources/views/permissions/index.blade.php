<!DOCTYPE html>
<html>
<head>
    <title>Permissões</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h2>Permissões</h2>

    <a href="{{ url('/permissoes/create') }}" class="btn btn-primary mb-3">
        Nova Permissão
    </a>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

        @foreach ($permissions as $permission)

            <tr>

                <td>{{ $permission->id }}</td>

                <td>{{ $permission->name }}</td>

                <td>

                    <a href="{{ url('/permissoes/'.$permission->id.'/edit') }}"
                       class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <form action="{{ url('/permissoes/'.$permission->id) }}"
                          method="POST"
                          style="display:inline;">

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