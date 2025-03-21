<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link rel="stylesheet" href="{{ asset('build/css/notes.css') }}">
</head>
<body>
<div class="container">

    <button class="add-note-btn" id="addNoteBtn">+ Add New Note</button>

    <div class="note-form" id="noteForm" style="display: none;">
        <form method="POST" action="{{ route('notes.store') }}">
            @csrf
            <textarea name="message" placeholder="Write your note...">{{ old('message') }}</textarea>

            @if ($errors->has('message'))
                <div class="error">
                    {{ $errors->first('message') }}
                </div>
            @endif

            <button type="submit">Add Note</button>
        </form>
    </div>

    <div class="notes-list">
        @foreach ($notes as $note)
            <div class="note">
                <div class="note-header">
                    <div>
                        <span class="note-author">{{ $note->user->name }}</span>
                        <small class="note-date">
                            {{ $note->created_at->format('j M Y, g:i a') }}
                        </small>
                        @if (!$note->created_at->eq($note->updated_at))
                            <small class="note-edited"> &middot; edited</small>
                        @endif
                    </div>
                    @if ($note->user->is(auth()->user()))
                        <div class="note-actions">
                            <!-- Edit Button -->
                            <a href="{{ route('notes.edit', $note) }}" class="edit-btn">Edit</a>
                            <!-- Delete Button -->
                            <form method="POST" action="{{ route('notes.destroy', $note) }}" class="delete-form">
                                @csrf
                                @method('delete')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this note?');">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
                <p class="note-message">{{ $note->message }}</p>
            </div>
        @endforeach
    </div>
</div>


<script>
    document.getElementById('addNoteBtn').addEventListener('click', function() {
        const noteForm = document.getElementById('noteForm');
        noteForm.style.display = noteForm.style.display === 'none' ? 'block' : 'none';
    });
</script>
</body>
</html>
