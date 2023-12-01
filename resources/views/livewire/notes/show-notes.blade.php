<?php

use Livewire\Volt\Component;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Note;

new class extends Component {
    public $noteId;

    public function notes()
    {
        return $this->user->notes;
    }

    public function delete($noteId)
    {
        $note = Note::find($noteId);

        $this->authorize('delete', $note);
        $note->delete();
    }

    public function with(): array
    {
        return [
            'notes' => Auth::user()
                ->notes()
                ->orderBy('id', 'desc')
                ->get(),
        ];
    }
}; ?>

<div>
    <div>
        @if ($notes->isEmpty())
            <div class="text-center">
                <h3 class="mt-2 text-sm font-semibold text-gray-900">No Notes</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new one.</p>
                <div class="mt-6">
                    <x-button href="{{ route('notes.create') }}" wire:navigate primary right-icon="plus">Create
                        Note</x-button>
                </div>
            </div>
        @else
            <x-button href="{{ route('notes.create') }}" wire:navigate primary right-icon="plus">Create New
                Note</x-button>
            <div class="grid grid-cols-2 gap-4 mt-12">
                @foreach ($notes as $note)
                    <div class="p-4 bg-white rounded-md shadow-md" wire:key='{{ $note->id }}'>
                        <a href="{{ route('notes.edit', $note) }}"
                            class="text-xl font-bold hover:underline hover:text-blue-500">{{ $note->subject }},
                            {{ $note->id }}</a>
                        <p>{{ Str::limit($note->body, 30) }}</p>
                        <div class="flex justify-end mt-4">
                            <x-button.circle icon="trash" wire:click='delete({{ $note->id }})'
                                spinner="delete({{ $note->id }})" />
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
