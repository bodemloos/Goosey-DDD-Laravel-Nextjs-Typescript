<?php
declare(strict_types=1);
namespace App\Modules\Messages\Repositories;

use App\Modules\Messages\Message;
use Illuminate\Database\Eloquent\Collection;

class MessageRepository
{
    /**
     * @return Collection
     */
    public function getByFromUserId(int $userId): Collection
    {
        return Message::where('from_id', $userId)->get();
    }

}