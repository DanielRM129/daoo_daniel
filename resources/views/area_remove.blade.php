<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Areas</title>
</head>
<body>
    @if ($area)
        <h1>{{ $area->nome }}</h1>
        <ul>
            <li>Imagem: {{ $area->imagem }}</li>
        </ul>
        <table>
            <tr>
                <td>
                    <form action="{{ route('removeArea',$area->id) }}" method='POST'>
                        @csrf
                        <input type="submit" name='confirmar' value="Deletar" />
                    </form>
                </td>
                <td>
                    <a href="/areas"><button>Cancelar</button></a>
                </td>
            </tr>
        </table>
    @else
        <p>Areas não encontrados! </p>
    @endif
    <a href="/areas">&#9664;Voltar</a>
</body>
</html>
