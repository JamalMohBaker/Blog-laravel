<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const TYPE_USER = 'user';
    const TYPE_ADMIN = 'admin';

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'password',
        'type',
        'image',
        'status',
        'email_verified_at',
    ];



    public static function statusOptions()
    {
       return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_INACTIVE => 'Inactive',

       ];
    }
    public static function userTypes()
    {
       return [
            self::TYPE_USER => 'User',
            self::TYPE_ADMIN => 'Admin',

       ];
    }

    public function suggestions(){
        return $this->hasMany(Suggestion::class );
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
         return 'https://placeholder.co/40x40';
     }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
