<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Main</title>
    <style>
        <?php 
        require_once '../public/assets/css/navbar_styles.css';
        require_once '../public/assets/css/admin_styles.css';
        require_once '../public/assets/css/footer_styles.css';
        ?>
    </style>
</head>
<body>
    <?php require_once 'blocks/navbar_html.php';
    if (($_GET['action'] ?? '') == 'addPost') {
        require_once 'admin_blocks/addPost_html.php';
    }
    elseif (($_GET['action'] ?? '') == 'giveAdmin') {
        require_once 'admin_blocks/giveAdmin_html.php';
    }
    else {
        echo "<div class=\"action-list\">";
        $actions = ['Add post' => 'addPost', 'Give admin' => 'giveAdmin'];
        foreach ($actions as $actionLabel => $action) {
            echo "<a href=\"http://" . $_SERVER['HTTP_HOST'] . "/admin.php?action=$action\" class=\"action-list__action-link\"><div class=\"action-list__action\">$actionLabel</div></a>";
        }
        echo "</div>";
    }
    require_once 'blocks/footer_html.php'; ?>
</body>
</html>