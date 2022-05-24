<?php if ($style == "login") : ?>
  <template id="actualPage" data-page="<?= "account" ?>"></template>
<?php else : ?>
  <template id="actualPage" data-page="<?= $style ?>"></template>
<?php endif; ?>

<script src="public/assets/js/main.js"></script>
<script src="public/assets/js/<?= $style ?>.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
