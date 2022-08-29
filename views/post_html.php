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
        require_once '../public/assets/css/post_styles.css';
        require_once '../public/assets/css/footer_styles.css';
        ?>
    </style>
</head>
<body>
    <?php require_once 'blocks/navbar_html.php' ?>
    <div class="container">
        <div class="post">
            <div class="post-item post__header">
                <div class="post-header-item post__path"><em><a href="<?= 'http://' . $_SERVER['HTTP_HOST'] ?>" class="path__link link-to-main">Main</a> / <a href="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/catalog.php' ?>" class="path__link link-to-posts">posts</a> / <?= $postValues['id'] ?> post</em></div>
                <span>Author: </span><div class="post-header-item post__author"><em><?= $postValues['author'] ?></em></div>
                <i>at</i>
                <div class="post-header-item post__datetime"><em><?= $postValues['datetime'] ?></em></div>
            </div>
            <hr>
            <h1 class="post-item post__title"><?= $postValues['title']; ?></h1>
            <img src="<?= $postValues['image_url'] ?>" alt="" class="post-item post__image">
            <div class="post-item post__text"><?= $postValues['text'] ?></div>
        </div>
        <aside class="aside-menu">
            <div class="aside-menu__tags">
                <?php
                foreach(explode(',', $postValues['tags']) as $tag) {
                    echo "<span class=\"tag\">". $tag ."</span>";
                }
                ?>
                </div>
                <hr>
            <div class="aside-menu__random-posts-list-label">Our other posts</div>
            <div class="aside-menu__random-posts-list">
                <?php
                $htmlTagsToReplace = ['<p>', '</p>', '<h2>', '</h2>'];
                foreach ($randomPosts as $randomPostValues) {
                    $h2ContentRemover = preg_replace('#(<h2.*?>).*?(</h2>)#', '$1$2', $randomPostValues['text']);
                    $desc = str_replace($htmlTagsToReplace, '', $h2ContentRemover);
                    $postUrl = "http://". $_SERVER['HTTP_HOST'] . "/post.php?id=" . $randomPostValues['id'];
                    echo "
                        <a href=\"". $postUrl ."\" class=\"random-post-card\">
                            <h3 class=\"random-post-card__item random-post-card__title\">". $randomPostValues['title'] ."</h3>
                            <img src=\"". $randomPostValues['image_url'] ."\" alt=\"random-post-card-image\" class=\"random-post-card__item random-post-card__image\">
                            <p class=\"random-post-card__item random-post-card__description\">". mb_substr($desc, 0, 120) ."<strong><em>... Читать далее</em></strong></p>
                            <hr>
                            <div class=\"post-card__item random-post-card__tags\">";
                    foreach (explode(',', $randomPostValues['tags']) as $tag) {
                        echo "<span class=\"random-post-card__tag\">". $tag ."</span>";
                    }
                    echo "</div></a>";
                }
                ?>
            </div>
        </aside>
    </div>
    <?php require_once 'blocks/footer_html.php' ?>
</body>
</html>