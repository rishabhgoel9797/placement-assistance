<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teachers extends Authenticatable
{
    //
    use Notifiable;
    protected $guard='teacher';
    protected $table = 'table_teachers';

    protected $primaryKey = 'teacher_id';

    protected $fillable = [
        'teacher_id','institute_id','name', 'email', 'password','unique_id','program','department','phone','remember_token',
        'created_date'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
