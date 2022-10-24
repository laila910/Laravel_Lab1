<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'user_id'
        
    ];
    
    protected $dates = ['deleted_at'];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
   
}
