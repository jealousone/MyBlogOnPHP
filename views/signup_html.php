<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Sign Up</title>
    <style>
        <?php 
        require_once '../public/assets/css/navbar_styles.css';
        require_once '../public/assets/css/signup_styles.css';
        require_once '../public/assets/css/footer_styles.css';
        ?>
    </style>
</head>
<body>
    <?php require_once 'blocks/navbar_html.php' ?>
    <div class="container">
        <h1 class="signup-label">Registration</h1>
        <form action="signup.php" method="post" class="signup-form">
            <input type="text" name="email" class="signup-form__input signup-form__email" placeholder="Email"
            <?php
            if ($defaults) {
                echo 'value=\'' . $defaults['email'] . '\'';
            }
            ?>>
            <input type="text" name="username" class="signup-form__input signup-form__username" placeholder="Username"
            <?php
            if ($defaults) {
                echo 'value=\'' . $defaults['username'] . '\'';
            }
            ?>>
            <input type="text" name="password" class="signup-form__input signup-form__password" placeholder="Password"
            <?php
            if ($defaults) {
                echo 'value=\'' . $defaults['password'] . '\'';
            }
            ?>>
            <input type="text" name="repeat-password" class="signup-form__input signup-form__repeat-password" placeholder="Repeat password"
            <?php
            if ($defaults) {
                echo 'value=\'' . $defaults['repeat-password'] . '\'';
            }
            ?>>
            <button type="submit" class="signup-form__input signup-form__submit">submit</button>
            <span class="signin-link-label">Already have an account? <a href="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/signin.php'; ?>" class="signin-link">Sign in</a></span>
        </form>
        <?php
        if ($errors) {
            echo '<div class="errors-block"><ul class="errors"><li class="error">' . implode('</li><li class="error">', $errors) . '</li></ul></div>';   
        }
        ?>
    </div>
    <?php require_once 'blocks/footer_html.php' ?>
</body>
</html>