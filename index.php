<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>XML_TO_MYSQL</title>
  </head>
  <body>
    <form action="convert.php" method="post" enctype="multipart/form-data">
       <input type="file" webkitdirectory directory multiple name="XMLs[]" /> <!--input  para selecionar a pasta com os XML -->
       <button type="submit" name="button">Enviar</button>
    </form>
  </body>
</html>
