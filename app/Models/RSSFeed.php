<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RSSFeed extends Model
{
    use HasFactory;

    protected $table = 'r_s_s_feeds';

    protected $fillable = [
        'title',
        'description',
        'link',
        'guid',
        'pubDate'
    ];


}
