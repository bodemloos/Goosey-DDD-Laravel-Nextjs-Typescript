<?php
declare(strict_types=1);
namespace App\Modules\Users\Services;

use App\Modules\Users\User;

class UpdateUserService
{
    /**
     * @return User
    */
    public function update(array $user, int $userId): User
    {
        // return User::update($user);
    }
}