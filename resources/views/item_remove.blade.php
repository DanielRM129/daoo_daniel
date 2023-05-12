<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Items</title>
</head>
<body>
    @if ($item)
        <h1>{{ $item->nome }}</h1>
        <ul>
            <li>Descrição:{{ $item->descricao }}</li>
            <li>Imagem: {{ $item->imagem }}</li>
        </ul>
        <table>
            <tr>
                <td>
                    <form action="{{ route('removeItem',$item->id) }}" method='POST'>
                        @csrf
                        <input type="submit" name='confirmar' value="Deletar" />
                    </form>
                </td>
                <td>
                    <a href="/itens"><button>Cancelar</button></a>
                </td>
            </tr>
        </table>
    @else
        <p>Items não encontrados! </p>
    @endif
    <a href="/itens">&#9664;Voltar</a>
</body>
</html>
