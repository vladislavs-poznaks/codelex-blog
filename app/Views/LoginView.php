<?php require_once __DIR__  . '/../Views/HeaderView.php' ?>

<h1>Login</h1>

<form action="/login" method="POST">

    <div>
        <label for="email">e-mail</label>
        <input type="email" id="email" name="email" required>
    </div>
    <?php if(isset($errors['email'])): ?>
        <div style="color: red"><?php echo $errors['email']; ?></div>
    <?php endif; ?>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    <?php if(isset($errors['password'])): ?>
        <div style="color: red"><?php echo $errors['password']; ?></div>
    <?php endif; ?>

    <button type="submit">Login</button>

</form>

<?php require_once __DIR__  . '/../Views/FooterView.php' ?>
