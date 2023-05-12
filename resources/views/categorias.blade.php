<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de categorias</title>
</head>
<body>
    <h1>categorias</h1>
    @if ($categorias->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Imagem</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->nome}}</td>
                <td>{{$categoria->imagem}}</td>
                <td>
                    <a href="{{route('deleteCat',$categoria->id)}}" title='Deletar'>&#128465</a>
                    <a href="{{route('editCat',$categoria->id)}}" title='Editar'>&#128464</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>categorias não encontrados! </p>
    @endif
</body>
</html>
