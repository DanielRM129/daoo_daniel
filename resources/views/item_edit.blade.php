<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edite os dados do Item</h1>
    <form action="{{route('updateItem',$item->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$item->nome}}"/></td>
            </tr>
            <tr>
                <td>Descrição:</td>
                <td><input type="text" name="descricao" value="{{$item->descricao}}"/></td>
            </tr>
            <tr>
                <td>Imagem:</td>
                <td><input type="string" name="imagem" value="{{$item->imagem}}"/></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" value="Salvar"/>
                    <a href="/itens"><button form=cancel >Cancelar</button></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
