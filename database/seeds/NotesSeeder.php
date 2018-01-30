<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
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
        
        DB::table('secciones')->insert([
            [ 'nombre' => 'DESPACHO DEL ALCALDE' ],
            [ 'nombre' => 'GOBIERNO' ],
            [ 'nombre' => 'HACIENDA' ],
            [ 'nombre' => 'DESARROLLO SOCIAL' ],
            [ 'nombre' => 'PLANEACION' ],
            [ 'nombre' => 'AGRICULTURA' ]
        ]);
        
        DB::table('sub_secciones')->insert([
            [ 'nombre' => 'SECRETARÍA EJECUTIVA', 'seccion_id' => 1],
            [ 'nombre' => 'OFICINA DE ASESORÍA JURÍDICA', 'seccion_id' => 1],
            [ 'nombre' => 'OFICINA DE CONTROL INTERNO', 'seccion_id' => 1],
            [ 'nombre' => 'DESPACHO DEL SECRETARIO', 'seccion_id' => 2],
            [ 'nombre' => 'COMISARIA DE FAMILIA', 'seccion_id' => 2],
            [ 'nombre' => 'INSPECCIÓN CENTRAL DE POLICÍA', 'seccion_id' => 2],
            [ 'nombre' => 'INSPECTOR RURAL DE LOS ANDES', 'seccion_id' => 2],
            [ 'nombre' => 'INSPECTOR RURAL DE LAS TINAS', 'seccion_id' => 2],
            [ 'nombre' => 'INSPECTOR RURAL DE SAN JOSÉ DE BALLESTEROS', 'seccion_id' => 2],
            [ 'nombre' => 'INSPECTOR RURAL DE SAN JOSÉ DE BALLESTEROS', 'seccion_id' => 2],
            [ 'nombre' => 'INSPECTOR RURAL DE EL BAJO', 'seccion_id' => 2],
            [ 'nombre' => 'ENLACE MUNICIPAL DE VICTIMAS', 'seccion_id' => 2],
            [ 'nombre' => 'ARCHIVO', 'seccion_id' => 2],
            [ 'nombre' => 'DESPACHO DEL SECRETARIO', 'seccion_id' => 3],
            [ 'nombre' => 'CONTADOR', 'seccion_id' => 3],
            [ 'nombre' => 'RECAUDOS', 'seccion_id' => 3],
            [ 'nombre' => 'PRESUPUESTOS', 'seccion_id' => 3],
            [ 'nombre' => 'DESPACHO DEL SECRETARIO', 'seccion_id' => 4],
            [ 'nombre' => 'VIGILANTE DE SALUD PUBLICA', 'seccion_id' => 4],
            [ 'nombre' => 'OFICINA DE MAS FAMILIAS EN ACCIÓN', 'seccion_id' => 4],
            [ 'nombre' => 'PROGRAMAS SOCIALES', 'seccion_id' => 4],
            [ 'nombre' => 'COORDINADOR SALUD PUBLICA', 'seccion_id' => 4],
            [ 'nombre' => 'COORDINADOR DE CULTURA', 'seccion_id' => 4],
            [ 'nombre' => 'COORDINADOR DE DEPORTE', 'seccion_id' => 4],
            [ 'nombre' => 'SERVICIO DE ATENCIÓN A LA COMUNIDAD - SAC', 'seccion_id' => 4],
            [ 'nombre' => 'DESPACHO DEL SECRETARIO', 'seccion_id' => 5],
            [ 'nombre' => 'SISBEN', 'seccion_id' => 5],
            [ 'nombre' => 'DESPACHO DEL SECRETARIO', 'seccion_id' => 6],
            
        ]);
      
    }
}
