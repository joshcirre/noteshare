<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendScheduledNotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-scheduled-notes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $now = Carbon::now();
        $notes = Note::where('published', true)
            ->whereDate('send_date', $now->toDateString())
            ->whereTime('send_date', '<=', $now->toTimeString())
            ->get();

        $noteCount = $notes->count();
        $this->info('Number of notes: '.$noteCount);

        foreach ($notes as $note) {
            SendEmail::dispatch($note);
        }
    }
}
