<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ejecuta tu usuario inicial
        $this->call(AdminUserSeeder::class);

        // Si en algún momento quieres datos de demo, llama aquí a otros seeders.
        // $this->call(DemoSeeder::class);
    }
}
