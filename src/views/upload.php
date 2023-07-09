<!DOCTYPE html>
<html lang="en">
<? require_once("components/head.php");?>
<body>

  <? require_once("components/header.php");?>
  <? require_once("components/nav.php");?>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <form action="UploadController.php" method="post" enctype="multipart/form-data">

          <div class="mb-3">
            <label for="fileInput" class="form-label">Selecciona un archivo CSV:</label>
            <br>
            <input type="file" class="form-control" id="fileInput" name="file">
            <br>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
  <br>

  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
