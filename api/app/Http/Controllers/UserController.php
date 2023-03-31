<?php

namespace App\Http\Controllers;

use App\Modules\Users\Repositories\UserRepository;
use App\Modules\Messages\Services\CreateMessageService;
use App\Modules\Users\Services\UpdateUserService;
use App\Http\Requests\SendMessageRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends AuthenticatedController
{
  /**
   * UserController constructor.
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function update(UpdateUserRequest $request, UpdateUserService $service): JsonResponse
  {
    return response()->json([
      'user' => $service->update($request->data(), auth()->user()->id)
    ]);
  }

  public function receivedMessages(Request $request, UserRepository $repository): JsonResponse
  {
    return response()->json([
      'messages' => $repository->getReceivedMessages(auth()->user()->id)
    ]);
  }

  public function sendMessages(Request $request, UserRepository $repository): JsonResponse
  {
    return response()->json([
      'messages' => $repository->getSendMessages(auth()->user()->id)
    ]);
  }

  public function recipients(Request $request, UserRepository $repository): JsonResponse
  {
    return response()->json(['recipients' => $repository->getRecipients(auth()->user()->id)]);
  }

  public function sendMessage(SendMessageRequest $request, CreateMessageService $service): JsonResponse
  {
    return response()->json([
      'message' => $service->create($request->data(), auth()->user()->id)
    ]);
  }
}