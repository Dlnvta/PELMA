<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Pengaduan extends Model
{
    use softDeletes;

    protected $fillable = [
        'tanggal_pengaduan', 'judul_pengaduan', 'isi_pengaduan','lokasi', 'foto', 'status', 'user_id'
    ];

    public function users()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    
}
