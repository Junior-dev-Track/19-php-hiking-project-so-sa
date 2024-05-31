    <?php include('header.php'); ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="/public/css/register.css">
    </head>
    <body>
        <div class="register-container">
        <h2 class="title">Register</h2>
        <div class="form-container">
        <form action="/register" method="POST">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required><br>
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required><br>
            <label for="nickname">Nickname:</label>
            <input type="text" id="nickname" name="nickname" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <button type="submit">Register</button>
        </form>
        </div>
        </div>
        <?php if (!empty($data['error'])): ?>
        <p><?php echo $data['error']; ?></p>
    <?php endif; ?>
    </body>
    </html>
