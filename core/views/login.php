<?php include 'partials/header.html'; ?>

<main>
  <div class="container">
    <h1><?= $title ?></h1>
    <div class="menu-opts">
      <div class="menu-opts__sign active" data-opt="0">Sign in</div>
      <div class="menu-opts__register" data-opt="1">Register</div>
    </div>
    <div class="form">
<<<<<<< HEAD
      <form action="?page=account" method="POST" id="login">
        <input type="hidden" name="t" value="login" />
=======
      <form action="" id="login">
>>>>>>> 301e25dcca4c5f4ac5908cf480d51a9ad722575d
        <fieldset>
          <input type="email" name="email" id="email" placeholder="Email" data="email|required" />
          <input type="text" name="passwd" id="passwd" placeholder="Password" data="min=8|required|pwd" />
          <label>
            <input type="checkbox" name="remember" id="remember" value="yes" />Remember me
          </label>
        </fieldset>
        <input type="submit" value="Sign in" class="submit" />
        <a href="">Have you forgotten your password?</a>
      </form>
<<<<<<< HEAD
      <form action="?page=account" method="POST" id="register">
        <input type="hidden" name="t" value="register" />
        <fieldset>
          <input type="email" name="email" id="email" placeholder="Email" data-sec="email|required" />
          <input type="text" name="passwd" id="passwd" placeholder="Password" data-sec="min=8|required|pwd" />
          <input type="text" name="confirm-passwd" id="confirm-passwd" placeholder="Confirm Password" data-sec="min=8|required|pwd" />
=======
      <form action="" id="register">
        <fieldset>
          <input type="email" name="email" id="email" placeholder="Email" data-sec="email|required" />
          <input type="text" name="passwd" id="passwd" placeholder="Password" data-sec="min=8|required|pwd" />
          <input type="text" name="passwd" id="passwd" placeholder="Confirm Password" data-sec="min=8|required|pwd" />
>>>>>>> 301e25dcca4c5f4ac5908cf480d51a9ad722575d
        </fieldset>
        <input type="submit" value="Register" class="submit" />
      </form>
    </div>
  </div>
</main>

<?php include 'partials/footer.html'; ?>
