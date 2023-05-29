# Consultas com Eloquent
```sh
php artisan tinker
```
_Importar classes necessarias no tinker._
```sh
use App\Models\Item
use App\Models\Area
```
_Listar areas do Item de ID=3, apenas acessando a propriedade areas._
```sh
Item::find(3)->areas
```
_Listar itens da Area de ID=2, apenas acessando a propriedade item._
```sh
Area::find(2)->itens
```
_Pesquisar a area de ID=1 que possui relação com item de ID=3._
```sh
Item::find(3)->areas()->find(1)
```
_Pesquisar o item de ID=3 que possui relação com a area de ID=2._
```sh
Area::find(2)->itens()->find(3)
```
_Listar os itens de determinado usuario passando apenas o nome do usuario_
```sh
use App\Models\Item
Item::whereHas('areas',fn($q)=>$q->whereHas('usuario',fn($q)=>$q->where('nome','Daniel Rojhn Milgarejo')))->get();
```
# Consulta com Query/Builder
_A seguir é retornado o primeiro elemento de uma coleção através dos metodos get() e first() e para diferenciar os campos nome, o método select()._
```sh
DB::Table('areas')->join('usuarios','usuario_id','=','usuarios.id')->select('*','usuarios.nome as nome','areas.nome as nome_area')->get()->first()
ou utilizando Eloquent
use App\Models\Area
Area::with('usuario')->first()
```
_Retorna um array de arrays contendo o nome da primeira categoria e o nome dos itens associados. Ex.:[["Componentes","Capacitor",],["Componentes","Resistor",],]_
```sh
DB::Table('itens')->join('categorias','categoria_id','=','categorias.id')->select('*','itens.nome as nome','categorias.nome as nome_categoria')->get()->map(fn($p)=>[$p->nome_categoria,$p->nome])
```
