<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Friend
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string $email
 * @property int $added_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Friend newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Friend newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Friend query()
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friend whereUserId($value)
 * @mixin \Eloquent
 */
class Friend extends Model
{
    use HasFactory;
}
