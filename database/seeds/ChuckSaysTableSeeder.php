<?php

use Illuminate\Database\Seeder;

class ChuckSaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chuck_says')->insert([
            'title'  => 'Informática',
            'phrase' => 'Cuando Google no encuentra algo, le pide ayuda a Chuck Norris'
        ]);
        DB::table('chuck_says')->insert([
            'title'  => 'Informática',
            'phrase' => 'Chuck Norris eliminó la tecla Escape del teclado de su ordenador. No le gusta salir huyendo de los problemas'
        ]);
        DB::table('chuck_says')->insert([
            'title'  => 'Literatura',
            'phrase' => 'Chuck Norris es la razón por la que Wally se esconde'
        ]);
        DB::table('chuck_says')->insert([
            'title'  => 'Física',
            'phrase' => 'Ley de la termodinámica: cuanto más se caliente a Chuck Norris, más lejos llegarán los cadáveres.'
        ]);
        DB::table('chuck_says')->insert([
            'title'  => 'Dios',
            'phrase' => 'Chuck Norris no juega a ser Dios, porque jugar es de niños. simplemente es Dios'
        ]);
        DB::table('chuck_says')->insert([
            'title'  => 'Biologia',
            'phrase' => 'Chuck Norris no corta el césped, simplemente le advierte que si crece, lo lamentará'
        ]);
        DB::table('chuck_says')->insert([
            'title'  => 'Informática',
            'phrase' => 'Chuck Norris es capaz de sacar un 2 en un sistema binario.'
        ]);
    }
}