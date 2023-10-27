<!DOCTYPE html>
<html>
  <head>
    <title>Multiple PHP Upload Demo</title>
  </head>
  <body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="upfile[]" multiple required>
      <input type="submit" value="Upload File">
    </form>
  </body>
</html>