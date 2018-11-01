<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Students extends Authenticatable
{
    //
    use Notifiable;
    protected $guard='student';
    protected $table = 'table_students';

    protected $primaryKey = 'student_id';

    protected $fillable = [
        'student_id','teacher_id','institute_id','name', 'email', 'password','unique_id','phone','program','department','year','remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
