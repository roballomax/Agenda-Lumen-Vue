<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Usuario extends Seeder
{
    public function run()
    {
        DB::table('usuario')->insert([
            'login'         => 'agenda',
            'senha'         => Crypt::encrypt('agenda'),
            'created_at'    => Carbon::now(),
            'token'         => Str::random(60),
        ]);
    }
}
