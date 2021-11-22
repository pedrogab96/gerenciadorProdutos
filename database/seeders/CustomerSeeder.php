<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'Pedro Gabriel Silva de Lima',
            'email' => 'pedrogab96@gmail.com',
            'phone' => '84992215332',
            'address' => 'Avenida dos Pinherais, 325',
        ]);
    }
}
