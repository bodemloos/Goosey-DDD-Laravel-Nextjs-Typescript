<?php
declare(strict_types=1);
namespace App\Modules\Messages\Services;

use App\Modules\Messages\Message;

class CreateMessageService 
{
  /**
   * @return Message
   */
  public function create(array $message, int $userId): Message
  {
    return Message::create(['from_id' => $userId, ...$message]);
  }
}