<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nama extends Model
{
    protected $table = 'nama';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'nama', 'nik', 'alamat', 'no_hp'
    // ];

    protected $guarded = ['id'];
}
