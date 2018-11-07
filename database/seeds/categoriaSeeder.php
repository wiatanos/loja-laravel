<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoria = new Categoria(['nome' => 'Categoria#1']);
        $categoria->save();

        $categoria = new Categoria(['nome' => 'Categoria#2']);
        $categoria->save();

        $categoria = new Categoria(['nome' => 'Categoria#3']);
        $categoria->save();
    }
}
