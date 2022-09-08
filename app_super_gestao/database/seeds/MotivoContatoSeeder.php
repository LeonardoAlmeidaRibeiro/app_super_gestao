<?php

use Illuminate\Database\Seeder;
use App\MotivoContato;


class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create(['Motivo_contato'=>'Dúvida']);
        MotivoContato::create(['Motivo_contato'=>'Elogio']);
        MotivoContato::create(['Motivo_contato'=>'Reclamação']);    }
}
