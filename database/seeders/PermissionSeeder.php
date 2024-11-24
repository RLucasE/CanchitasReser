<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create-role',
            'edit-role',
            'delete-role',
            'create-user',
            'edit-user',
            'delete-user',
            //Equipos
            'view-team',
            'create-team',
            'edit-team',
            'delete-team',
            //Campeonatos
            'view-championship',
            'create-championship',
            'edit-championship',
            'delete-championship',
            //Juadores
            'view-player',
            'create-player',
            'edit-player',
            'delete-player',
            //Delegados
            'view-leader',
            'create-leader',
            'edit-leader',
            'delete-leader',
            //Inscripciones
            'view-inscription',
            'create-inscription',
            'edit-inscription',
            'delete-inscription',
            //Pagos
            'view-payment',
            'create-payment',
            'edit-payment',
            'delete-payment',
            //Árbitros
            'view-referee',
            'create-referee',
            'edit-referee',
            'delete-referee',
            //Partidos
            'view-clash',
            'create-clash',
            'edit-clash',
            'delete-clash',
            //Canchas
            'view-field',
            'create-field',
            'edit-field',
            'delete-field',
            //Fechas de Partidos
            'view-matchday',
            'create-matchday',
            'edit-matchday',
            'delete-matchday',
            //Reservas
            'view-reservation',
            'create-reservation',
            'edit-reservation',
            'delete-reservation',
        ];

        // Looping and Inserting Array's Permissions into Permission Table
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
