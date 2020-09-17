<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model
{
    use SoftDeletes;

    protected $table = 'contato';
    protected $fillable = [
        'nome',
        'email',
        'telefone',
    ];
}
