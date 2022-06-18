<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @package News
 *
 * @property string title
 * @property string content
 * @property string cover
 */
class News extends Model
{
    use HasFactory;
}
