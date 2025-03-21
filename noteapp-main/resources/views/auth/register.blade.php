<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Laravel Note App</title>
   <link rel="stylesheet" href = {{ asset('build/css/form.css') }}
</head>
<body>
    <div class="input-group">
        <h1>Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="error">{{ $errors->first('name') }}</span>
                @endif
            </div>

            
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
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

            <!-- Form Actions -->
            <div class="form-actions">
                <a href="{{ route('login') }}">Already registered?</a>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
