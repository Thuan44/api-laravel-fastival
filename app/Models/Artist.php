<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Artist extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $primaryKey = 'artist_id';
    
    protected $fillable = [
        'artist_name',
        'artist_description',
        'artist_img',
        'artis_concert_date',
        'artist_concert_time',
        'stage_id',
    ];
}
