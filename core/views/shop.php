<?php include 'partials/header.php'; ?>
<main>
  <div class="container">
    <header>
      <h1><?= $title ?></h1>
      <h2>All <?= count($products) ?> Items</h2>
    </header>
    <div class="shop">
      <aside class="filters-container">
        <form action=<?= htmlspecialchars(APP_HOSTNAME . "?page=shop") ?> method="post" id="search-form">
          <input type="search" name="q" placeholder="Search ..." id="search">
          <button type="submit" name="searchSubmit" id="searchSubmit">
            <ion-icon name="search-outline"></ion-icon>
          </button>
        </form>
        <form action="" id="select-form">
          <input type="hidden" name="filters">
          <select name="color" id="color" class="options">
            <option value="any" selected>Any Color</option>
            <option value="black">Black</option>
            <option value="white">White</option>
          </select>
          <select name="category" id="category" class="options">
            <option value="any" selected>Any Category</option>
            <option value="polo">Polo</option>
            <option value="casual">Casual</option>
          </select>
          <select name="sort" id="sort" class="options">
            <option value="sort" selected>Sort by</option>
            <option value="l-price">Lower price</option>
            <option value="l-price">Highest price</option>
            <option value="white">Ascending A-Z</option>
            <option value="white">Descending A-Z</option>
          </select>
          <div class="by-price">...</div>
          <input type="reset" class="submit" value="Clear Filters">
          <input type="submit" class="submit" value="Apply Filters">
          <div class="in-stock">.</div>
        </form>
      </aside>
      <?php if (count($products) > 0) : ?>
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
      <?php else : ?>
        <div id="no-product">
          <h1 style="text-align:center; width:100%">There are no products</h1>
          <img src="/public/assets/images/shoppe.svg" alt="">
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>
<?php include 'partials/footer.html'; ?>
