<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = ['target_url' ,'short_link','name'];

}