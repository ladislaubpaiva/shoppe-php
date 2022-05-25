<?php include 'partials/header.php'; ?>
<main>
  <div class="container">
    <div class="slider">
      <div class="slider__slide">
        <div class="slider__slide-info">
          <div class="heading">
            <div class="heading__title">Gold big hoops</div>
            <div class="heading__price">$ 60.90</div>
          </div>
          <div class="button">View Product</div>
        </div>
        <img src="public/assets/images/ian-dooley-TT-ROxWj9nA-unsplash.jpg" alt="">
      </div>
      <div class="slider__control">
        <div class="slider__control-point active">.</div>
        <div class="slider__control-point">.</div>
        <div class="slider__control-point">.</div>
        <div class="slider__control-point">.</div>
        <div class="slider__control-point">.</div>
      </div>
    </div>
    <header>
      <h1>Shop The Latest</h1>
      <a href="?page=shop">View All</a>
    </header>
    <div class="products__area">
      <?php foreach ($products as $product) : ?>
        <div href="" class="product">
          <div class="product__img">
            <a href="">
              <img src="public/assets/images/products/<?= $product->image ?>" alt="Product Image." />
            </a>
            <p><a href="" class="add-cart">Add to cart</a></p>
          </div>
          <div class="product__name">
            <a href="">
              <?= $product->name ?>
            </a>
          </div>
          <div class="product__price">
            $ <?= $product->price ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>
<?php include 'partials/footer.html'; ?>
