<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Exception;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $createdAt = Carbon::now()->toDateTimeString();
            $areas = [
                [
                    'usuario_id' => 1,
                    'nome'      =>  'Quarto',
                    'descricao'      =>  '4x4',
                    'imagem'      =>  'default.jpg',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt
                ],
                [
                    'usuario_id' => 1,
                    'nome'      =>  'Sala',
                    'descricao'      =>  '4x4',
                    'imagem'      =>  'default.jpg',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt,
                ],
                [
                    'usuario_id' => 1,
                    'nome'      =>  'Cozinha',
                    'descricao'      =>  '4x4',
                    'imagem'      =>  'default.jpg',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt,
                ],
            ];

            Area::insert($areas)
                ? Log::channel('stderr')->info("Areas criadas!")
                : throw new Exception("Erro ao criar areas!");

        } catch(Exception $error) {
            Log::debug($error->getMessage());
            Log::channel('stderr')->error($error->getMessage());
        }
    }
}
