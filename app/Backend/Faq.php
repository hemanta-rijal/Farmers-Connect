<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected  $fillable = ['question','answer','priority'];
}
