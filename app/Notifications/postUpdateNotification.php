<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class postUpdateNotification extends Notification
{
    use Queueable;

    private $uploadUser;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($uploadUser)
    {
        $this->uploadUser = $uploadUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id' => $this->uploadUser->id,
            'username' => $this->uploadUser->username,
            'URL' => \App\Http\Controllers\ImageController::getProPic($this->uploadUser->username),
            'text' =>  $this->uploadUser->username." ha appena caricato un nuovo post!",
        ];
    }
}
