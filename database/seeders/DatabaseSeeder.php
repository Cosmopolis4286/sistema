<?php

namespace Database\Seeders;

use DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_sexes')->insert([
            'info' => 'Masculino',
        ]);
        DB::table('type_sexes')->insert([
            'info' => 'Feminino',
        ]);
        DB::table('type_sexes')->insert([
            'info' => 'Outro',
        ]);
        DB::table('type_idents')->insert([
            'info' => 'CPF',
        ]);
        DB::table('type_idents')->insert([
            'info' => 'RG',
        ]);
        DB::table('type_idents')->insert([
            'info' => 'Carteira Motorista',
        ]);
    }
}
