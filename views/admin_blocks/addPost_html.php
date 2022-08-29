<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<div class="container add-post-container">
    <h1 class="add-post form-label">Add new post</h1>
    <form action="admin.php" method="post" class="add-post add-post-form">
        <input type="text" name="action" id="" class="action-checker" value="addPost">
        <input type="text" name="title" class="add-post add-post-form__input add-post-form__title" placeholder="Title" required>
        <input type="text" name="image_url" class="add-post add-post-form__input add-post-form__image-url" placeholder="URL of image" required>
        <span class="add-post-form__tip"><em>Tip: use second headers to mark subtitles. First header is already used for title.</em></span>
        <textarea type="text" name="text" id="text" class="add-post add-post-form__input add-post-form__text" required></textarea>
        <span class="add-post-form__tip"><em>Tip: write tags dividing with commas. Example: "business,finances,entertainment"</em></span>
        <input type="text" name="tags" class="add-post add-post-form__input add-post-form__tags" placeholder="Tags" required>
        <div class="add-post add-post-form__buttons-container"><button class="add-post add-post-form__submit" type="submit">Add post</button><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/admin.php" class="add-post add-post-form__back">Back</a></div>
    </form>
</div>
<script src="assets/js/addPost.js"></script>