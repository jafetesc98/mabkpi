<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Comentarios extends Model
{

    protected $table = 'comentarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /*protected $fillable = [
        'name',
        'password',
        'user_mks',
        'cve_corta'
    ];*/

}
