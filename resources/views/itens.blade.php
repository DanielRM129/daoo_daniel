<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de itens</title>
</head>
<body>
    <h1>itens</h1>
    @if ($itens->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Imagem</th>
            </tr>
        </thead>
        <tbody>
            @foreach($itens as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->descricao}}</td>
                <td>{{$item->imagem}}</td>
                <td>
                    <a href="{{route('deleteItem',$item->id)}}" title='Deletar'>&#128465</a>
                    <a href="{{route('editItem',$item->id)}}" title='Editar'>&#128464</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>itens não encontrados! </p>
    @endif
</body>
</html>
