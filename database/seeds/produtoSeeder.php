<?php

use Illuminate\Database\Seeder;
use App\Produto;

class produtoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $produto = new Produto([
            'nome' => 'Produto 1', 
            'detalhe' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s', 
            'img' => 'img/produto.png',
            'valor' => 10.0,]);
        $produto->save();
        $produto->categorias()->attach([1,2]);

        $produto = new Produto([
            'nome' => 'Produto 2', 
            'detalhe' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s', 
            'img' => 'img/produto.png',
            'valor' => 20.0,]);
        $produto->save();
        $produto->categorias()->attach([2,3]);

        $produto = new Produto([
            'nome' => 'Produto 3', 
            'detalhe' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s', 
            'img' => 'img/produto.png',
            'valor' => 30.0,]);
        $produto->save();
        $produto->categorias()->attach([1,3]);
    }
}
