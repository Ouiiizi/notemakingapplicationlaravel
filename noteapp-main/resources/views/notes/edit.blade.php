<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
   
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('notes.update', $note) }}">
            @csrf
            @method('patch')
           
            <textarea name="message"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('message', $note->message) }}</textarea>
            
            
            <?php if ($errors->has('message')): ?>
                <div class="mt-2 text-red-600">
                    <?php echo $errors->first('message'); ?>
                </div>
            <?php endif; ?>

           
            <div class="mt-4 space-x-2">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    Save
                </button>
                <a href="{{ route('notes.index') }}" class="text-indigo-600 hover:text-indigo-900">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>