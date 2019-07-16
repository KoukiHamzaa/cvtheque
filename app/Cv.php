<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $primaryKey = 'id';
    protected $fillable = ['titre', 'presentation', 'birthDate', 'age', 'jobs', 'salary', 'methodOfPayment', 'user_id'];
}
