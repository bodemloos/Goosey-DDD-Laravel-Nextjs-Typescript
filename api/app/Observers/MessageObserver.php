<?php

namespace App\Observers;

use App\Modules\Messages\Message;
use App\Modules\Users\User;
use Illuminate\Support\Facades\Http;

class MessageObserver
{
    /**
     * Handle the Message "created" event.
     */
    public function created(Message $message): void
    {
        // TODO: ADD TO QUEUE!!!!
        // SEND message by selected channel (just for now email)
        $from = User::select('name', 'email')->where('id', $message->from_id)->first();
        $to = User::select('name', 'email')->where('id', $message->to_id)->first();

        $postBody = [
            "message" => [
                "notificationType" => env('NOTIFY_NOTIFICATION'),
                "language" => "en",
                "params" => ["message" => $message->body, "from" => $from, "to" => $to],
                "transport" => [
                    [
                        "type" => env('NOTIFY_TRANSPORT'),
                        "from" => ["name" => $from['name'], "email" => $from['email']],
                        "recipients" => [
                            "to" => [
                                ["name" => $to['name'], "recipient" => $to['email']]
                            ]
                        ]
                    ]
                ]
            ]
        ];


        Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-ClientId' => env('NOTIFY_PUBLIC'),
            'X-SecretKey' => env('NOTIFY_SECRET')
        ])->post(env('NOTIFY_URL'), $postBody);
    }

    /**
     * Handle the Message "updated" event.
     */
    public function updated(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "deleted" event.
     */
    public function deleted(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "restored" event.
     */
    public function restored(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "force deleted" event.
     */
    public function forceDeleted(Message $message): void
    {
        //
    }
}