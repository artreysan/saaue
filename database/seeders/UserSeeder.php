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
            'email' => 'milton.quiroz@mail.com',
            'password' => Hash::make('qwe123...'),
            'rol_id' => '9',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Arturo',
            'apellido_paterno' => 'Reyes',
            'apellido_materno' => 'Santana',
            'email' => 'arturo.reyes@mail.com',
            'password' => Hash::make('qwe123...'),
            'rol_id' => '9',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);


        User::create([
            'name' => 'Ing. Mario César',
            'apellido_paterno' => 'Herrera',
            'apellido_materno' => 'González',
            'email' => 'mario.cesar@sct.gob.mx',
            'password' => Hash::make('Mchg2212$$$'),
            'rol_id' => '12',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Ing. José Antonio',
            'apellido_paterno' => 'Rulfo',
            'apellido_materno' => 'Zaragoza',
            'email' => 'antonio.rulfo@sct.gob.mx',
            'password' => Hash::make('Jarz0117%&$'),
            'rol_id' => '13',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Mtra. Edna. Patricia',
            'apellido_paterno' => 'Santiago',
            'apellido_materno' => 'Vargas',
            'email' => 'edna.patricia@sct.gob.mx',
            'password' => Hash::make('Epsv0117%&$'),
            'rol_id' => '20',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Ing. Iracema',
            'apellido_paterno' => 'Mirón',
            'apellido_materno' => 'Ramírez',
            'email' => 'iracema.miron@sct.gob.mx',
            'password' => Hash::make('Imr0117%&$'),
            'rol_id' => '21',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);

    }
}
