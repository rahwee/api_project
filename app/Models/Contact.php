<?php

namespace App\Models;

use App\Enums\Constants;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\GlobalVersionTraits;
use App\Traits\HasPermissionsTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\ResetPasswordNotification;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Contact extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'contact';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "global_id",
        "version",
        "firstname",
        "lastname",
        "description",
        "account_id",
        "supplier_id",
        "contact_type",
        "fake_age",
        "gender",
        "dob",
        "id_card",
        "language",
        "email",
        "password",
        "password_pos",
        "last_access",
        "api_token",
        'app_manager_token',
        "device_id",
        "otp_verify_code",
        "remember_token",
        "tag",
        "timezone",
        "is_raspberry",
        "receive_notify",
        "sup_role",
        "isReceive",
        "leave_date",
        "entry_date",
        "color_code",
        "is_main_contact",
        "limit_unpaid_amount",
        "is_lite_version",
        "has_unpaid_amount",
        "pos_id",
        "deleted_at"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'password_pos', 'remember_token', 'api_token', 'app_manager_token'
    ];

    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     * @return void
     */
    
}
