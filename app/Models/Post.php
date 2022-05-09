<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Conner\Tagging\Taggable;

class Post extends Model
{
    use HasFactory;
    use Taggable;

    protected $fillable = [ 
        'title', 
        'content' 
    ];
}