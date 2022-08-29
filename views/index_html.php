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
        require_once '../public/assets/css/index_styles.css';
        require_once '../public/assets/css/footer_styles.css';
        ?>
    </style>
</head>
<body>
    <header class="header">
        <?php require_once 'blocks/navbar_html.php' ?>
        <div class="main header__main">
            <h1 class="main__welcome-message">Welcome to <span class="main__blog-name">MyBlog</span></h1>
        </div>
    </header>
    <h2 id="latest" class="post-cards-label">Latest posts</h2>
    <div class="container post-cards">
        <?php
        if ($posts) {
            $htmlTagsToReplace = ['<p>', '</p>', '<h2>', '</h2>'];
            foreach ($posts as $postValues) {
                $h2ContentRemover = preg_replace('#(<h2.*?>).*?(</h2>)#', '$1$2', $postValues['text']);
                $desc = str_replace($htmlTagsToReplace, '', $h2ContentRemover);
                $postUrl = "http://". $_SERVER['HTTP_HOST'] . "/post.php?id=" . $postValues['id'];
                echo 
                "<a href=\"$postUrl\" class=\"post-card\">
                    <h3 class=\"post-card__item post-card__title\">"
                        .$postValues['title'].
                    "</h3>
                    <img src=\""
                        .$postValues['image_url'].
                    "\" alt=\"post_image\" class=\"post-card__item post-card__image\">
                    <p class=\"post-card__item post-card__description\">"
                        .mb_substr($desc, 0, 300).
                        "<strong>
                            <em>... Читать далее</em>
                        </strong>
                    </p>
                    <hr>
                    <div class=\"post-card__item post-card__tags\">";
                    foreach (explode(',', $postValues['tags']) as $tag) {
                        echo "<span class=\"post-card__tag\">". $tag ."</span>";
                    }
                echo "</div></a>"; // Closing container of tags, then closing card's box
            }
        }
        else {
            echo '<span class="noPostsMsg">There is no posts</span>';
        }
        ?>
    </div>
    <?php require_once 'blocks/footer_html.php' ?>
</body>
</html>