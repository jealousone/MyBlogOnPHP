<nav class="nav-bar">
    <div class="main">
        <a href="<?= 'http://' . $_SERVER['HTTP_HOST'] ?>" class="main__logo">MyBlog</a>
        <ul class="main__menu-list">
            <?php
            echo "
            <li class=\"menu-list__item\"><a href=\"http://" . $_SERVER['HTTP_HOST'] . "/catalog.php\" class=\"menu-list__link\">Catalog</a></li>
            <li class=\"menu-list__item\"><a href=\"http://" . $_SERVER['HTTP_HOST'] . "/#latest\" class=\"menu-list__link\">Latest</a></li>
            <li class=\"menu-list__item\"><a href=\"http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "#contacts\" class=\"menu-list__link\">Contacts</a></li>"
            ?>
        </ul>
    </div>
    <div class="user">
        <?php
        require_once '../models/UserInfo.php';
        if (isset($_SESSION['username'])) {
            $userInfo = new UserInfo($_SESSION['username']);
            echo '<div class="user__item user__name">' . $userInfo->getUsername() . '</div>';
            if ($userInfo->getRole() == 'admin') {
                echo "<a href=\"http://" . $_SERVER['HTTP_HOST'] . "/admin.php\" class=\"user__item user__admin\">Admin panel</a>";
            }
            echo '<a href="http://localhost:8000/logout.php" class="user__item user__logout">Log out</a>';
        }
        elseif (! ($_SERVER['REQUEST_URI'] == '/signup.php' || $_SERVER['REQUEST_URI'] == '/signin.php')) {
            echo '<a href="http://localhost:8000/signin.php" class="user__item user__signin">Sign in</a>';
            echo '<a href="http://localhost:8000/signup.php" class="user__item user__signup">Sign up</a>';
        } ?>
    </div>
</nav>