<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'bkomentar';
    protected $primaryKey = 'id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'status', 'user_id', 'berita_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function berita()
    {
        return $this->belongsTo('App\Models\Berita', 'berita_id', 'id');
    }
    // public function foto()
    // {
    //     return $this->hasMany('App\Models\Foto', 'id', 'album_id');
    // }
}
