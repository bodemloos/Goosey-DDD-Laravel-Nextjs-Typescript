<?php

namespace App\Http\Controllers;

use App\Modules\Messages\Services\CreateMessageService;
use App\Http\Requests\CreateMessageRequest;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MessageController extends AuthenticatedController
{

    public function post(
        CreateMessageRequest $request,
        CreateMessageService $service
    ): JsonResponse {
        $message = $service->create($request->data(), auth()->user()->id);
        return response()->json(['message' => $message]);
    }
}