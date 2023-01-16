<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'name' => 'Milton Arturo',
            'apellido_paterno' => 'Quiroz',
            'apellido_materno' => 'Hernández',
            'email' => 'milton.quiroz@bluelife.network',
            'password' => Hash::make('qwe123...'),
            'rol_id' => '1',
            'location_id' => '1',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);

    }
}
