<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = 'mariamalospelos@gmail.com';
        $plain = '123456789'; // ⚠️ Sólo para desarrollo

        // Crea o actualiza el usuario base
        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin',
                'password' => Hash::make($plain),
            ]
        );

        // Evita tokens duplicados si relanzas el seeder
        if (method_exists($user, 'tokens')) {
            $user->tokens()->delete();
        }

        // Crea un token Sanctum para pruebas de API
        $token = $user->createToken('api')->plainTextToken;

        $this->command?->info("Usuario de desarrollo creado/actualizado:");
        $this->command?->info("Email: {$user->email}");
        $this->command?->info("Pass:  {$plain}");
        $this->command?->info("API token: {$token}");
    }
}
