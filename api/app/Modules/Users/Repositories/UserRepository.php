<?php
declare(strict_types=1);
namespace App\Modules\Users\Repositories;

use App\Modules\Users\User;
use App\Modules\Messages\Message;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    /**
     * @return Collection
     */
    public function getRecipients(int $userId): Collection
    {
        return User::select('id', 'name')->whereNot('id', $userId)->get();
    }

    /**
     *  get messages received for authenticated user
     * 
     *  @return Collection
     */
    public function getReceivedMessages(int $userId): Collection
    {
        return Message::where('to_id', $userId)->orderBy('created_at', 'desc')->get();
    }

    /**
     *  get messages received for authenticated user
     * 
     *  @return Collection
     */
    public function getSendMessages(int $userId): Collection
    {
        return Message::where('from_id', $userId)->orderBy('created_at', 'desc')->get();
    }

}