<?php require_once __DIR__  . '/../Views/HeaderView.php' ?>

<h1>Register</h1>

<form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST">
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
    </div>
    <?php if(isset($errors['name'])): ?>
        <div style="color: red"><?php echo $errors['name']; ?></div>
    <?php endif; ?>

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

    <div>
        <label for="password-confirm">Confirm Password</label>
        <input type="password" id="password-confirm" name="password-confirm" required>
    </div>
    <?php if(isset($errors['passwordConfirm'])): ?>
        <div style="color: red"><?php echo $errors['passwordConfirm']; ?></div>
    <?php endif; ?>

    <button type="submit">Register</button>

</form>

<?php require_once __DIR__  . '/../Views/FooterView.php' ?>
