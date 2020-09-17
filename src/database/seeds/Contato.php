<?php

use App\Contato as AppContato;
use Illuminate\Database\Seeder;

class Contato extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AppContato::class, 20)->create();
    }
}
