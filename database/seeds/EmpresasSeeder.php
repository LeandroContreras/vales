<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'nombre'=>'Soboce',
            'direccion'=>'Este es el primero',
            'numero'=>'78983423',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('empresas')->insert([
            'nombre'=>'Coca Cola',
            'direccion'=>'Este es el segundo',
            'numero'=>'7898323',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('empresas')->insert([
            'nombre'=>'Pepsi',
            'direccion'=>'Este es el tercero',
            'numero'=>'78983223',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
