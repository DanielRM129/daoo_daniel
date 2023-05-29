<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Item;
use Illuminate\Support\Facades\Log;
use Exception;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $createdAt = Carbon::now()->toDateTimeString();
            $itens = [
                [
                    'categoria_id' => 1,
                    'nome'      =>  'Capacitor',
                    'descricao'      =>  'Capacitancia: 10uF',
                    'imagem'      =>  'default.jpg',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt
                ],
                [
                    'categoria_id' => 1,
                    'nome'      =>  'Resistor',
                    'descricao'      =>  'Resistencia: 10ohns',
                    'imagem'      =>  'default.jpg',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt,
                ],
                [
                    'categoria_id' => 1,
                    'nome'      =>  'As aventuras de tibicuera',
                    'descricao'      =>  'Genero: Aventura',
                    'imagem'      =>  'default.jpg',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt,
                ],
            ];

            Item::insert($itens)
                ? Log::channel('stderr')->info("Itens criadas!")
                : throw new Exception("Erro ao criar itens!");

        } catch(Exception $error) {
            Log::debug($error->getMessage());
            Log::channel('stderr')->error($error->getMessage());
        }
    }
}
