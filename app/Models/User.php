<?php 

namespace App\Models;

use Closure;
use App\Models\Job;
use App\Models\Role;
use App\Models\Review;
use App\Models\GoogleData;
use App\Models\UserReaction;
use App\Models\AccountSetting;
use App\Models\UserDetails;
use App\Models\Notifications;
use App\Traits\RelationTraits;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends EloquentUser {

    /**
	* To allow soft deletes
	*/
    use RelationTraits, SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'email',
        'password',
        'last_name',
        'first_name',
        'permissions',
        'verify_token',
        'sms_allowed',
        'email_allowed',
        'user_experience',
        'notificationToken',
        'notification_allowed',
    ];

    public function userDetails() {
        return $this->hasOne(UserDetails::class, 'u_id');
    }

    public function account_setting() {
        return $this->hasOne(AccountSetting::class, 'user_id');
    }

    public function roleUser() {
        return $this->belongsTo(Role::class, 'role_users', 'role_id');
    }

    public function roles() {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id')->withTimestamps();
    }

    public function notifications() {
        return $this->belongsTo(Notifications::class, 'notifications', 'u_id');
    }

    public function accountSetting() {
        return $this->hasOne(AccountSetting::class, 'user_id', 'id');
    }

    public function gdata() {
        return $this->hasOne(GoogleData::class, 'user_id', 'id');
    }

    // public function comments() {
    //     $this->belongsTo(Review::class, 'tradeperson_id', 'id');
    // }

    public function reviews() {
        return $this->hasMany(Review::class, 'tradeperson_id')
            ->orderBy('created_at', 'desc');
    }

    // Homeowners relations
    public function jobs() {
        return $this->hasMany(Job::class, 'owner_id')
            ->orderBy('created_at', 'desc');
    }

    // Tradepeolpes relation
    public function leads() {
        return $this->belongsToMany(Job::class, 'user_leads', 'user_id', 'job_id')
            ->withPivot(['status'])
            ->orderBy('created_at', 'desc')
            ->withTimestamps()
            ->withTrashed();
    }
}
