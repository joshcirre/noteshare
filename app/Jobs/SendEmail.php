<?php

namespace App\Jobs;

use App\Models\Note;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $note;

    /**
     * Create a new job instance.
     */
    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    public function handle()
    {
        $noteUrl = config('app.url').'/notes/'.$this->note->id;

        // Logic for sending the email
        $emailContent = "Hello, you've received a new note. $noteUrl";
        // Send the email using your preferred email sending method

        Mail::raw($emailContent, function ($message) {
            $message->from('notes@noteshare.com', 'Noteshare')
                ->to($this->note->recipient)
                ->subject('You have a new note from '.$this->note->user->name);
        });
    }
}
