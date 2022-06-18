<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * @package Model
 *
 * @property int id
 * @property \Carbon\Carbon created_at
 * @property \Carbon\Carbon updated_at
 *
 * @method static static create(array $data)
 * @method static static find(int $id)
 * @method static static findOrFail(int $id)
 */
class Model extends BaseModel
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
