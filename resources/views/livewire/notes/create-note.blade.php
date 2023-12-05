<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public $noteSubject;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function submit()
    {
        $validated = $this->validate([
            'noteSubject' => ['required', 'string', 'min:5'],
            'noteBody' => ['required', 'string', 'min:20'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['date'],
        ]);

        // create a new note for the current User using the validated data
        Note::create([
            'user_id' => auth()->id(),
            'subject' => $this->noteSubject,
            'body' => $this->noteBody,
            'recipient' => $this->noteRecipient,
            'published' => true,
            'send_date' => $noteSendDate ?? now()->addDay(),
        ]);

        redirect('/notes');
    }
}; ?>

<div>
    <form class="space-y-4" wire:submit='submit'>
        <x-input label="Note Subject" placeholder="It's been a great day." wire:model='noteSubject' />
        <x-textarea label="Notes" placeholder="Let your thoughts fill the page." wire:model='noteBody' />
        <x-input icon="user" label="Recipient" placeholder="yourfriend@email.com" wire:model='noteRecipient' />
        <x-input wire:model='noteSendDate' icon="calendar" label="Send Date" type="date" />
        <div class="flex pt-4 space-x-4">
            <x-button primary right-icon="calendar" type="submit" spinner>Schedule
                Note</x-button>
        </div>
        <x-errors />
    </form>
</div>
