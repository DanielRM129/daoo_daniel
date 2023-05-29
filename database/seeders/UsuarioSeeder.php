<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Usuario;
use Illuminate\Support\Facades\Log;
use Exception;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $createdAt = Carbon::now()->toDateTimeString();
            $usuarios = [
                [
                    'nome'      =>  'Daniel Rojhn Milgarejo',
                    'email'      =>  'danielrojhn@gmail.com',
                    'senha'      =>  '12345',
                    'imagem'      =>  'default.jpg',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt
                ],
                [
                    'nome'      =>  'Marcio Pozada Milgarejo',
                    'email'      =>  'marciopozada@gmail.com',
                    'senha'      =>  'senha5',
                    'imagem'      =>  'default.jpg',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt
                ],
                [
                    'nome'      =>  'Daniela Fraga',
                    'email'      =>  'danielafraga2008@gmail.com',
                    'senha'      =>  'Teste123',
                    'imagem'      =>  'default.jpg',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt
                ],
            ];

            Usuario::insert($usuarios)
                ? Log::channel('stderr')->info("Usuarios criados!")
                : throw new Exception("Erro ao criar usuarios!");

        } catch(Exception $error) {
            Log::debug($error->getMessage());
            Log::channel('stderr')->error($error->getMessage());
        }
    }
}
