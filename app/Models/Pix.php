<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pix extends Model
{
    use HasFactory, HasUuid;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pixs';

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'pix',
        'total',
        'qrcode_path'
    ];
}
