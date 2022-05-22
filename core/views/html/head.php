<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php if ($title == 'Home') : ?>
    <title><?= APP_NAME ?> - Best Products For You</title>
  <?php else : ?>
    <title><?= $title . ' - ' . APP_NAME ?></title>
  <?php endif; ?>
  <link rel="shortcut icon" href="public/assets/images/favicon.svg" type="image/x-icon">
  <link rel="stylesheet" href="public/assets/styles/<?= $style ?>.css" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
