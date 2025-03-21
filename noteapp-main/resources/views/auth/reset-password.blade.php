<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Laravel Note App</title>
    <link rel="stylesheet" href="{{ asset('build/css/form.css') }}">
</head>
<body>
    <div class="form-container">
        <h1>Reset Password</h1>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

           
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

           
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="error">{{ $errors->first('email') }}</span>
                @endif
            </div>

            
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @if ($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
                @if ($errors->has('password_confirmation'))
                    <span class="error">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            
            <div class="form-actions">
                <button type="submit">Reset Password</button>
            </div>
        </form>
    </div>
</body>
</html>