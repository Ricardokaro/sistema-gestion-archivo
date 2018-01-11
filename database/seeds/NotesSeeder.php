<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;


class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('notes')->insert([
            'title' => 'titutulo de ejemplo',
            'content' => 'contenido del ejemplo uno',            
        ]);*/

        $role = Role::create(['name' => 'Administrator']);
        $role = Role::find(1);         
        Permission::create(['name' => 'crear_seccion']);
        //La variable $role contiene el rol Administrator
        $role->givePermissionTo('crear_seccion');
        //Verificar que el epersimo este asignado a este rol
        $role->hasPermissionTo('crear_seccion');
        // Creación del usuario
        $user = User::create([
            'name' => 'Ricardo',
            'email' => 'ricardo.caro9@hotmail.com',
            'password' => bcrypt('1234')
        ]);
        //Asignación del rol
        $user = User::find(1);
        $user->assignRole('Administrator');
    }
}
