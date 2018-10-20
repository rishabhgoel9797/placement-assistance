<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddTeacher extends Model
{
    //
    protected $table = 'table_teachers';

    protected $primaryKey = 'teacher_id';

    protected $fillable = [
        'teacher_id','institute_id','name', 'email', 'password','unique_id','program','department','remember_token',
    ];
}
