<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
    ];

    public function updateSettings($data)
    {
        $this->updateSocialProfile($data['social']);
        $this->updateOptions($data['options']);
    }

    public function updateSocialProfile($social)
    {
        Social::updateOrCreate(
            ['user_id' => $this->id],
            $social
        );
    }

    public function updateOptions($options)
    {
        $this->setting()->update($options);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }

    public function social(){
        return $this->hasOne(Social::class)->withDefault(); //, 'user_id', '_id');
    }

    public function setting()
    {
        return $this->hasOne(Setting::class)->withDefault();
    }

    protected static function booted()
    {
        static::created(function ($user) {
            $emailNotificationArray = [
                "new_comment" => 1,
                "new_image" => 1
            ];

            $user->setting()->create([
                "disable_comments" => false,
                "moderate_comments" => false,
                "email_notification" => json_encode($emailNotificationArray)
            ]);
        });
    }




    public function getImagesCount()
    {
        $imagesCount = $this->images()->published()->count();
        return $imagesCount . ' ' . str()->plural('image', $imagesCount);
    }
}
