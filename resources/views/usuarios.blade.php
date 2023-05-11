<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
</head>
<body>
    <h1>usuarios</h1>
    @if ($usuarios->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>email</th>
                <th>senha</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->nome}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->senha}}</td>
                <td>{{($usuario->status)}}</td>
                <td>
                    {{-- <a href="{{route('delete',$usuario->id)}}" title='Deletar'>&#128465</a> --}}
                    <a href="{{route('edit',$usuario->id)}}" title='Editar'>&#128464</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>usuarios não encontrados! </p>
    @endif
</body>
</html>
