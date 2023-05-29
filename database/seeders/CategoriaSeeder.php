<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Categoria;
use Illuminate\Support\Facades\Log;
use Exception;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $createdAt = Carbon::now()->toDateTimeString();
            $categorias = [
                [
                    'nome'      =>  'Componentes',
                    'imagem'      =>  'default.jpg',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt
                ],
                [
                    'nome'      =>  'Livros',
                    'imagem'      =>  'default.jpg',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt,
                ],
                [
                    'nome'      =>  'Automoveis',
                    'imagem'      =>  'default.jpg',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt,
                ],
            ];

            Categoria::insert($categorias)
                ? Log::channel('stderr')->info("Categorias criadas!")
                : throw new Exception("Erro ao criar categorias!");

        } catch(Exception $error) {
            Log::debug($error->getMessage());
            Log::channel('stderr')->error($error->getMessage());
        }
    }
}
