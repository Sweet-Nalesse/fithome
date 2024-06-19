<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Schedule;

class ScheduleReminder extends Notification
{
    use Queueable;

    protected $schedule;

    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Напоминание о тренировке.')
                    ->line('У вас запланирована тренировка: ' . $this->schedule->workout->name)
                    ->line('Дата: ' . $this->schedule->date)
                    ->line('Время: ' . $this->schedule->time)
                    ->line('Спасибо, что используете наше приложение!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
