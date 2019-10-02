<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserInformation
 *
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string|null $address
 * @property int|null $phone
 * @property string|null $img
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation whereUserId($value)
 */
class UserInformation extends Model
{
    protected $table = "user_information";
    protected $fillable = ['user_id', 'address', 'phone', 'img'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
