<?php
declare(strict_types=1);
namespace App\Modules\Users\Services;

use App\Modules\Users\User;
use Illuminate\Support\Facades\Hash;

class CreateUserService
{
    /**
     * @return User
    */
    public function create(array $user): User
    {
        return User::create($user);
    }
}