<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorias</title>
</head>
<body>
    @if ($categoria)
        <h1>{{ $categoria->nome }}</h1>
        <ul>
            <li>Imagem: {{ $categoria->imagem }}</li>
        </ul>
        <table>
            <tr>
                <td>
                    <form action="{{ route('removeCat',$categoria->id) }}" method='POST'>
                        @csrf
                        <input type="submit" name='confirmar' value="Deletar" />
                    </form>
                </td>
                <td>
                    <a href="/categorias"><button>Cancelar</button></a>
                </td>
            </tr>
        </table>
    @else
        <p>Categorias não encontrados! </p>
    @endif
    <a href="/categorias">&#9664;Voltar</a>
</body>
</html>
