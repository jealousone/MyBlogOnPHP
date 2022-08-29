<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Sign In</title>
    <style>
        <?php 
        require_once '../public/assets/css/navbar_styles.css';
        require_once '../public/assets/css/signin_styles.css';
        require_once '../public/assets/css/footer_styles.css';
        ?>
    </style>
</head>
<body>
    <?php require_once 'blocks/navbar_html.php' ?>
    <div class="container">
        <h1 class="signin-label">Authorization</h1>
        <form action="signin.php" method="post" class="signin-form">
            <input type="text" name="login" class="signin-form__input signin-form__username" placeholder="Username or email"
            <?php
            if ($defaults) {
                echo 'value=\'' . $defaults['login'] . '\'';
            }
            ?>>
            <input type="text" name="password" class="signin-form__input signin-form__password" placeholder="Password"
            <?php
            if ($defaults) {
                echo 'value=\'' . $defaults['password'] . '\'';
            }
            ?>>
            <button type="submit" class="signin-form__input signin-form__submit">submit</button>
            <span class="signup-link-label">Do not have an account? <a href="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/signup.php'; ?>" class="signup-link">Sign up</a></span>
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