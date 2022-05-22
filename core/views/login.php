<?php include 'partials/header.html'; ?>

<main>
  <div class="container">
    <h1><?= $title ?></h1>
    <div class="menu-opts">
      <div class="menu-opts__sign active">Sign in</div>
      <div class="menu-opts__register">Register</div>
    </div>
    <div class="form">
      <form action="" id="login">
        <fieldset>
          <input type="email" name="email" id="email" placeholder="Email" data="email|required" />
          <input type="text" name="passwd" id="passwd" placeholder="Password" data="min=8|required|pwd" />
          <input type="text" name="passwd" id="passwd" placeholder="Confirm Password" data="min=8|required|pwd" />
        </fieldset>
        <input type="submit" value="Register" />
      </form>
      <form action="" id="register">
        <fieldset>
          <input type="email" name="email" id="email" placeholder="Email" data="email|required" />
          <input type="text" name="passwd" id="passwd" placeholder="Password" data="min=8|required|pwd" />
          <label>
            <input type="checkbox" name="remember" id="remember" value="yes" />Remember me
          </label>
        </fieldset>
        <input type="submit" value="Sign in" />
        <a>Have you forgotten your password?</a>
      </form>

    </div>
  </div>
</main>

<?php include 'partials/footer.html'; ?>
