<div class="container give-admin-container">
    <h1 class="give-admin form-label">Give admin to user</h1>
    <form action="admin.php" method="post" class="give-admin give-admin-form">
        <input type="text" name="action" id="" class="action-checker" value="giveAdmin">
        <input type="text" name="newAdminsUsername" class="give-admin give-admin-form__input give-admin-form__title" placeholder="Username" required>
        <div class="give-admin give-admin-form__buttons-container"><button class="give-admin give-admin-form__submit" type="submit">Give</button><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/admin.php" class="give-admin give-admin-form__back">Back</a></div>
    </form>
</div>