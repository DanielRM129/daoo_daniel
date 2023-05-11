<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de areas</title>
</head>
<body>
    <h1>areas</h1>
    @if ($areas->count()>0)
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
            @foreach($areas as $area)
            <tr>
                <td>{{$area->id}}</td>
                <td>{{$area->nome}}</td>
                <td>{{$area->descricao}}</td>
                <td>{{$area->imagem}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>areas não encontrados! </p>
    @endif
</body>
</html>
