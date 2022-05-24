<?php include 'partials/header.php'; ?>
<main>
  <div class="container">
    <h1><?= $title ?></h1>
    <div class="shop">
      <aside class="filters-container"></aside>
      <div class="products__area">
        <div class="product">
          <div class="product__img">
            <img src="public/assets/images/products/<?= 'product-large.png' ?>" alt="Product Image." />
          </div>
          <div class="product__name">
            <?= "..." ?>
          </div>
          <div class="product__price">
            $ <?= "..." ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include 'partials/footer.html'; ?>
