<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
    @if ($usuario)
        <h1>{{ $usuario->nome }}</h1>
        <ul>
            <li>Email:{{ $usuario->email }}</li>
            <li>Senha: {{ $usuario->senha }}</li>
            <li>Imagem: {{ $usuario->imagem }}</li>
        </ul>
        <table>
            <tr>
                <td>
                    <form action="{{ route('removeUser',$usuario->id) }}" method='POST'>
                        @csrf
                        <input type="submit" name='confirmar' value="Deletar" />
                    </form>
                </td>
                <td>
                    <a href="/usuarios"><button>Cancelar</button></a>
                </td>
            </tr>
        </table>
    @else
        <p>Usuarios não encontrados! </p>
    @endif
    <a href="/usuarios">&#9664;Voltar</a>
</body>
</html>
