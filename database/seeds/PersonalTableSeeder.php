<?php

use Illuminate\Database\Seeder;
use proyecto\Personal;
use proyecto\Persona;

class PersonalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personal = new Personal([
            'cedula'=> 123123123,
            'nombre'=> 'Eder',
            'apellido' => 'Villa'
        ]);
        $personal->save();
    }
}
