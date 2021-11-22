<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'administrador@rits.com',
            'password' => '$2y$10$N69W5N.uTt8NeQJ./h4AIeHVzPuAyXoeTiUkNsmQZxVSbrsxP.Jlq',
        ]);
    }
}
