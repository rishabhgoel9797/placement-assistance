<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = 'table_company';

    protected $primaryKey = 'company_id';

    protected $fillable = [
        'company_id','institute_id','company_name', 'job_role', 'company_description','job_description','location','ctc','department','category','tenth','twelth','graduate','avatar','status','created_date'
    ];
}
