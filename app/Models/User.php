<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ContributeSummarye;
use App\Models\ProfileDetail;
use App\Models\SocialLink;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,  HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'upload_file'
    ];


    protected $appends = ['upload_file', 'status_name'];

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
        'created_at' => 'date:d M Y h:i:s A',
        'email_verified_at' => 'date:d M Y h:i:s A',
        'password' => 'hashed',
    ];

    public function uploads(){
        return $this->hasOne(uploads::class,'id' ,'upload_id' );
    }
    public function details(){
        return $this->hasOne(ProfileDetail::class,'user_id' ,'id' );
    }

    public function social(){
        return $this->hasMany(SocialLink::class,'user_id' ,'id' );
    }

    public function contribute(){
        return $this->hasOne(ContributeSummarye::class, 'user_id', 'id');
    }

    public function getStatusNameAttribute(){
        return $this->status == 1 ? 'Active' : "Inactive";
    }

    public function votes(){
        return $this->hasMany(Vote::class, 'user_id');
    }
    public function comments(){
        return $this->hasMany(comment::class, 'user_id');
    }
    public function posts(){
        return $this->hasMany(post::class, 'user_id');
    }
    public function getUploadFileAttribute()
    {
        return dynamic_asset($this->upload_id);


    }

}
