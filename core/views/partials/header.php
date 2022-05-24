<header id="header">
  <div class="container">
    <a href="?page=home">
      <img src="/public/assets/images/shoppe.svg" alt="Shoppe Logo" />
    </a>
    <nav class="nav-bar">
      <ul class="nav-bar__links">
        <li class="nav-bar__link active" data-page="home">
          <a href="?page=home">Home</a>
        </li>
        <li class="nav-bar__link" data-page="shop">
          <a href="?page=shop">Shop</a>
        </li>
        <li class="nav-bar__link" data-page="blog">
          <a href="?page=blog">Blog</a>
        </li>
        <li class="nav-bar__link" data-page="story">
          <a href="?page=our-story">Our Story</a>
        </li>
      </ul>
      <div class="divisor"></div>
      <ul class="nav-bar__icons">
        <li class="nav-bar__icon" data-page="wishlist">
          <a href="?page=wishlist">
            <ion-icon name="heart-outline"></ion-icon>
          </a>
        </li>
        <li class="nav-bar__icon" data-page="cart">
          <a href="?page=cart">
            <ion-icon name="cart-outline"></ion-icon>
          </a>
        </li>
        <li class="nav-bar__icon" data-page="account">
          <a href="?page=account">
            <ion-icon name="person-outline"></ion-icon>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>
<?php if (!isset($_SESSION['error'])) : ?>
  <div class="showErrors">
  </div>
<?php endif; ?>
<?php if (isset($_SESSION['error']) || isset($_SESSION['msg'])) : ?>
  <div class="showErrors php">
    <?php if (isset($_SESSION['error'])) : ?>
      <div class="error">
        <ion-icon name="close-circle-outline"></ion-icon>
        <?= $_SESSION['error'] ?>
      </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['msg'])) : ?>
      <div class="info">
        <ion-icon name="information-circle-outline"></ion-icon>
        <?= $_SESSION['msg'] ?>
      </div>
    <?php endif; ?>
    <?php
    unset($_SESSION['error']);
    unset($_SESSION['msg'])
    ?>
  </div>
<?php endif; ?>
