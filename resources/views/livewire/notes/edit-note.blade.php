<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Layout};
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {
    public Note $note;

    public $noteBody;
    public $noteSubject;
    public $notePublished;
    public $noteSendDate;

    public function mount(Note $note)
    {
        $this->authorize('update', $note);
        $this->fill($note);
        $this->noteBody = $note->body;
        $this->noteSubject = $note->subject;
        $this->notePublished = $note->published;
        $this->noteSendDate = $note->send_date;
    }

    public function saveNote()
    {
        $this->validate([
            'noteSubject' => ['required', 'string', 'min:5'],
            'noteBody' => ['required', 'string', 'min:20'],
            'noteSendDate' => ['required', 'date'],
        ]);

        $this->note->update([
            'subject' => $this->noteSubject,
            'body' => $this->noteBody,
            'send_date' => $this->noteSendDate,
            'published' => $this->notePublished,
        ]);

        $this->dispatch('note-saved');
    }
}; ?>

<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-8 max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                <form class="space-y-4" wire:submit='saveNote'>
                    <x-input label="Note Subject" placeholder="It's been a great day." wire:model='noteSubject' />
                    <x-textarea label="Notes" placeholder="Let your thoughts fill the page." wire:model='noteBody' />
                    <x-input wire:model='noteSendDate' icon="calendar" label="Send Date" type="date" />
                    <x-checkbox label="Note is Published" wire:model='notePublished' />
                    <div class="flex justify-between pt-4">
                        <x-button secondary spinner="saveNote" type="submit">Save Note </x-button>
                        <x-button href="{{ route('notes') }}" flat negative>Back to Notes</x-button>
                    </div>
                    <x-action-message on="note-saved" />
                    <x-errors />
                </form>
            </div>
        </div>
    </div>
</div>
