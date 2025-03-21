<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <!-- Link to External CSS -->
    <link rel="stylesheet" href="{{ asset('build/css/notes.css') }}">
</head>
<body>
    <div class="container">
        <!-- Button to Trigger New Note -->
        <button class="add-note-btn" id="addNoteBtn">+ Add New Note</button>

        <!-- Form to Add a New Note (Initially Hidden) -->
        <div class="note-form" id="noteForm" style="display: none;">
            <form method="POST" action="{{ route('notes.store') }}">
                @csrf
                <textarea name="message" placeholder="Write your note...">{{ old('message') }}</textarea>
                
                <!-- Display Validation Errors -->
                <?php if ($errors->has('message')): ?>
                    <div class="error">
                        <?php echo $errors->first('message'); ?>
                    </div>
                <?php endif; ?>

                <!-- Add Button -->
                <button type="submit">Add Note</button>
            </form>
        </div>

        <!-- List of Notes -->
        <div class="notes-list">
            <?php foreach ($notes as $note): ?>
                <div class="note">
                    <div class="note-header">
                        <div>
                            <span class="note-author"><?php echo $note->user->name; ?></span>
                            <small class="note-date">
                                <?php echo $note->created_at->format('j M Y, g:i a'); ?>
                            </small>
                            <?php if (!$note->created_at->eq($note->updated_at)): ?>
                                <small class="note-edited"> &middot; edited</small>
                            <?php endif; ?>
                        </div>
                        <?php if ($note->user->is(auth()->user())): ?>
                            <div class="note-actions">
                                <!-- Edit Button -->
                                <a href="<?php echo route('notes.edit', $note); ?>" class="edit-btn">Edit</a>
                                <!-- Delete Button -->
                                <form method="POST" action="<?php echo route('notes.destroy', $note); ?>" class="delete-form">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this note?');">Delete</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                    <p class="note-message"><?php echo $note->message; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Script to Toggle Note Form -->
    <script>
        // Toggle the visibility of the note form
        document.getElementById('addNoteBtn').addEventListener('click', function() {
            const noteForm = document.getElementById('noteForm');
            noteForm.style.display = noteForm.style.display === 'none' ? 'block' : 'none';
        });
    </script>
</body>
</html>