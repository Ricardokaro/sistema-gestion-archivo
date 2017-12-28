<?php

use Illuminate\Database\Seeder;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            'title' => 'titutulo de ejemplo',
            'content' => 'contenido del ejemplo uno',            
        ]);
    }
}
