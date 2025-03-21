<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Laravel Note App</title>
    <!-- Link to Custom CSS -->
    <link rel="stylesheet" href="{{ asset('build/css/form.css') }}">
</head>
<body>
    <div class="container">
        <!-- Session Status -->
        <?php if (session('status')): ?>
            <div class="status">
                <?php echo session('status'); ?>
            </div>
        <?php endif; ?>

        <!-- Login Form -->
        <form method="POST" action="<?php echo route('login'); ?>">
            @csrf

            <!-- Email Address -->
            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?php echo old('email'); ?>" required autofocus>
                <?php if ($errors->has('email')): ?>
                    <span class="error"><?php echo $errors->first('email'); ?></span>
                <?php endif; ?>
            </div>

            <!-- Password -->
            <div class="input-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                <?php if ($errors->has('password')): ?>
                    <span class="error"><?php echo $errors->first('password'); ?></span>
                <?php endif; ?>
            </div>

            <!-- Remember Me -->
            <div class="checkbox-group">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>

            <!-- Forgot Password -->
            <div class="actions">
                <?php if (Route::has('password.request')): ?>
                    <a href="<?php echo route('password.request'); ?>">Forgot your password?</a>
                <?php endif; ?>

                <button type="submit">Log in</button>
            </div>
        </form>
    </div>
</body>
</html>