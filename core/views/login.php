<?php include 'partials/header.php'; ?>

<main>
  <div class="container">
    <h1><?= $title ?></h1>
    <div class="menu-opts">
      <div class="menu-opts__sign active" data-opt="0">Sign in</div>
      <div class="menu-opts__register" data-opt="1">Register</div>
    </div>
    <div class="form">
      <form action="<?= htmlspecialchars("?page=verify") ?>" method="POST" id="login">
        <input type="hidden" name="t" value="login" />
        <fieldset>
          <input type="email" name="email" id="email" placeholder="Email" data-sec="email|required" />
          <input type="password" name="passwd" id="passwd" placeholder="Password" data-sec="min=8|required|pwd" />
          <label>
            <input type="checkbox" name="remember" id="remember" value="yes" />Remember me
          </label>
        </fieldset>
        <input type="submit" value="Sign in" class="submit" />
        <a href="">Have you forgotten your password?</a>
      </form>
      <form action="<?= htmlspecialchars("?page=verify") ?>" method="POST" id="register">
        <input type="hidden" name="t" value="register" />
        <fieldset>
          <input type="email" name="email" id="email" placeholder="Email" data-sec="email|required" />
          <input type="password" name="passwd" id="passwd" placeholder="Password" data-sec="min=8|required|pwd" />
          <input type="password" name="confirm-passwd" id="confirm-passwd" placeholder="Confirm Password" data-sec="min=8|required|pwd" />
        </fieldset>
        <input type="submit" value="Register" class="submit" />
      </form>
    </div>
  </div>
</main>

<?php include 'partials/footer.html'; ?>
