    <?php include('header.php'); ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
    </head>
    <body>
        <h2>Register</h2>
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
        <?php if (!empty($data['error'])): ?>
        <p><?php echo $data['error']; ?></p>
    <?php endif; ?>
    </body>
    </html>
