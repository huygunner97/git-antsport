<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Message
 *
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $room_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUserId($value)
 */
class Message extends Model
{
    //
    protected $fillable = ['message'];
    

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
