<? $context = compact(array_keys(get_defined_vars())); ?>

<!DOCTYPE html>
<html lang="en">
<script src="js/salesController.js"></script>
<script src="js/ajaxRequestHelper.js"></script>
<? require_once("components/head.php");?>
<body>

<? require_once("components/header.php");?>

<? require_once("components/nav.php");?>

  <? require_once("components/medicineSalesByYear.php");?>
 
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
<? require_once("components/footer.php"); ?>
</html>
