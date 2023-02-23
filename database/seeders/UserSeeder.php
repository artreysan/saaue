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
        // User::create([
        //     'name' => 'Milton Arturo',
        //     'last_name' => 'Quiroz',
        //     'last_maternal' => 'Hernández',
        //     'email' => 'milton.quiroz@mail.com',
        //     'password' => Hash::make('qwe123...'),
        //     'rol_id' => '9',
        //     'location_id' => '4',
        //     'enterprise_id' => '2',
        //     'role_id' => '1'
        // ]);

        // User::create([
        //     'name' => 'Arturo',
        //     'last_name' => 'Reyes',
        //     'last_maternal' => 'Santana',
        //     'email' => 'arturo.reyes@mail.com',
        //     'password' => Hash::make('qwe123...'),
        //     'rol_id' => '9',
        //     'location_id' => '4',
        //     'enterprise_id' => '2',
        //     'role_id' => '1'
        // ]);


        User::create([
            'name' => 'Ing. Mario César',
            'last_name' => 'Herrera',
            'last_maternal' => 'González',
            'email' => 'mario.cesar@sct.gob.mx',
            'password' => Hash::make('Mchg2212$$$'),
            'rol_id' => '12',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Ing. José Antonio',
            'last_name' => 'Rulfo',
            'last_maternal' => 'Zaragoza',
            'email' => 'antonio.rulfo@sct.gob.mx',
            'password' => Hash::make('Jarz0117%&$'),
            'rol_id' => '13',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Mtra. Edna. Patricia',
            'last_name' => 'Santiago',
            'last_maternal' => 'Vargas',
            'email' => 'edna.patricia@sct.gob.mx',
            'password' => Hash::make('Epsv0117%&$'),
            'rol_id' => '20',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Ing. Iracema',
            'last_name' => 'Mirón',
            'last_maternal' => 'Ramírez',
            'email' => 'iracema.miron@sct.gob.mx',
            'password' => Hash::make('Imr0117%&$'),
            'rol_id' => '21',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Ing. David',
            'last_name' => 'De León ',
            'last_maternal' => 'Muñoz',
            'email' => 'david.deleon@sct.gob.mx',
            'password' => Hash::make('Ddlmz0215%&$'),
            'rol_id' => '21',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Ing. Betzalel',
            'last_name' => 'Betanzos',
            'last_maternal' => 'Laiseca',
            'email' => 'betzalel.betanzos@sct.gob.mx',
            'password' => Hash::make('Bbla0117%&$'),
            'rol_id' => '21',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);
        // Datos de prueba
        User::create([
            'name' => 'Usuario Administrador',
            'last_name' => 'Administrador ',
            'last_maternal' => 'del Sistema',
            'email' => 'admin@sct.gob.mx',
            'password' => Hash::make('admin'),
            'rol_id' => '12',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Usuario Editor',
            'last_name' => 'Editor de ',
            'last_maternal' => 'Tickets',
            'email' => 'editor@sct.gob.mx',
            'password' => Hash::make('editor'),
            'rol_id' => '12',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '2'
        ]);
        User::create([
            'name' => 'Usuario Externo',
            'last_name' => 'Gestor de',
            'last_maternal' => 'Colaboradores',
            'email' => 'externo@sct.gob.mx',
            'password' => Hash::make('externo'),
            'rol_id' => '12',
            'location_id' => '4',
            'enterprise_id' => '2',
            'role_id' => '3'
        ]);
        //!Datos de prueba

    }
}
