<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Notification
 *
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $count_noti
 * @property int|null $count_noti_client
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereCountNoti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereCountNotiClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Notification whereUserId($value)
 */
class Notification extends Model
{
    //
    protected $fillable = ['count_noti', 'count_noti_client'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
