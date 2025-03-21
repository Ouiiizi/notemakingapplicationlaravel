<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Laravel Note App</title>

    <link rel="stylesheet" href="{{ asset('build/css/form.css') }}">
</head>
<body>
    <div class="container">
        
        <?php if (session('status')): ?>
            <div class="status">
                <?php echo session('status'); ?>
            </div>
        @endif

        
        <form method="POST" action="<?php echo route('login'); ?>">
            @csrf

            <!-- Email Address -->
            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?php echo old('email'); ?>" required autofocus>
                <?php if ($errors->has('email')): ?>
                    <span class="error"><?php echo $errors->first('email'); ?></span>
                @endif
            </div>

            
            <div class="input-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                <?php if ($errors->has('password')): ?>
                    <span class="error"><?php echo $errors->first('password'); ?></span>
                @endif
            </div>

            
            <div class="checkbox-group">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>

           
            <div class="actions">
                <?php if (Route::has('password.request')): ?>
                    <a href="<?php echo route('password.request'); ?>">Forgot your password?</a>
                @endif

                <button type="submit">Log in</button>
            </div>
        </form>
    </div>
</body>
</html>
