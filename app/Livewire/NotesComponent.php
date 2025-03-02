<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class NotesComponent extends Component
{
    use WithPagination;

    #[Rule('required|min:3')]
    public $title;
    #[Rule('required|min:3')]
    public $body;
    public $isOpen = false;
    public $noteId;

    public function create()
    {
        $this->reset('title', 'body', 'noteId');
        $this->openModal();
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function store()
    {
        $this->validate();
        Note::create([
            'title' => $this->title,
            'body' => $this->body,
        ]);
        session()->flash('success', 'Notes created successfully.');

        $this->reset('title', 'body');
        $this->closeModal();
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);
        $this->noteId = $id;
        $this->title = $note->title;
        $this->body = $note->body;

        $this->openModal();
    }

    public function done($id)
    {
        $note = Note::findOrFail($id);
        $note->update([
            'isFinish' => !$note->isFinish,
        ]);
        session()->flash('success', 'Note ' . $id . ' updated successfully.');
    }

    public function update()
    {
        if ($this->noteId) {
            $note = Note::findOrFail($this->noteId);
            $note->update([
                'title' => $this->title,
                'body' => $this->body,
            ]);
            session()->flash('success', 'Note ' . $note->id . ' updated successfully.');
            $this->closeModal();
            $this->reset('title', 'body', 'noteId');
        }
    }

    public function delete($id)
    {
        Note::find($id)->delete();
        session()->flash('success', 'Note ' . $id . ' deleted successfully.');
        $this->reset('title', 'body');
    }

    public function render()
    {
        return view('livewire.notes-component', [
            'notes' => Note::paginate(5)
        ]);
    }
}
