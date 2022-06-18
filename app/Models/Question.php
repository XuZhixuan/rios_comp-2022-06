<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @package News
 *
 * @property string question News title
 * @property string answer News content
 * @property string $cover News cover link
 */
class Question extends Model
{
    use HasFactory;
}
