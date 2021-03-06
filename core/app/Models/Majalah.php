<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Majalah extends Model
{
    use Sluggable;
    protected $table = 'majalah';
    protected $primaryKey = 'id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    protected $fillable = [
        'judul', 'deskripsi', 'slug', 'foto', 'seo_keyword', 'seo_description', 'seo_tags', 'status', 'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Admin', 'admin_id', 'id');
    }
}
