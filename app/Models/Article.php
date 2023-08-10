<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'articles';

    protected $fillable = [
        'title',
        'subject',
        'image',
    ];

        public function images()
        {
            return $this->hasMany(PostImage::class);
        }
        public function likes(){
            return $this->hasMany(Like::class );
        }
        public function comments(){
            return $this->hasMany(Comment::class );
        }
        public function rates(){
            return $this->hasMany(Rate::class );
        }
     // Attribute Accessors: image_url | $product->image_url
     public function getImageurlAttribute()
     {
         if ($this->image) {
             return Storage::disk('public')->url($this->image);
         }
         return 'https://placeholder.co/60x60';
     }

     public function scopeFilter(Builder $query, $request){
        $query->when($request->search , function($query, $value){
            $query->where('subject' ,'LIKE', "%{$value}%");
        });
     }

}
