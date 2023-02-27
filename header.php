<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/bootstrap5/bootstrap.min.css">
  <link rel="stylesheet" href="./public/fontawesome-free-6.1.1-web/css/all.css">
  <link rel="stylesheet" href="./public/css/estilo.css">
  <link rel="stylesheet" href="./css/style.css">
  <title>Crud mongo con php</title>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
$(document).ready(function(){
  $("#buscar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabla tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</head>

<body>

