<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Categoria::factory(5)
        //         ->hasItens(15)
        //         ->create();

        // \App\Models\Usuario::factory(5)
        //         ->hasAreas(15)
        //         ->create();

        $seedUsuario = new UsuarioSeeder();
        $seedUsuario->run();

        $seedArea = new AreaSeeder();
        $seedArea->run();

        $seedCategoria = new CategoriaSeeder();
        $seedCategoria->run();

        $seedItem = new ItemSeeder();
        $seedItem->run();

        $seedAreaItem = new AreaItemSeeder();
        $seedAreaItem->run();
    }
}
