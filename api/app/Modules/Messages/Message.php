<?php

namespace App\Modules\Messages;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Users\User;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'from_id',
        'to_id',
        'title',
        'body'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes/relations should be included in the message collection.
     *
     * @var array<int, string>
     */
    protected $with = [
        'from:id,name',
        'to:id,name'
    ];

    /**
     * Includes the from user collection in the message.
     *
     * @return BelongsTo
     */
    public function from(): BelongsTo
    {
        return $this->belongsTo(User::class, 'from_id', 'id');
    }

    /**
     * Includes the to user collection in the message.
     *
     * @return BelongsTo
     */
    public function to(): BelongsTo
    {
        return $this->belongsTo(User::class, 'to_id', 'id');
    }
}