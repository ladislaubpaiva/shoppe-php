<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php switch ($title) {
    case 'Home':
      echo "<title>Shoppe - Best Products for you</title>";
      break;
    default:
      echo "<title>$title - Shoppe</title>";
      break;
  }
  ?>

  <link rel="stylesheet" href="public/assets/styles/<?= lcfirst($title) ?>.css" type="text/css" />
</head>

<body>