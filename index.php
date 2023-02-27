<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>CRUD MVC</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="css/newcc.css" rel="stylesheet" />
        <script src="js/scripts.js"></script>
<script >
    function Eliminar(id)
    {
        if(confirm("¿Confirmar Eliminacion?"))
        {
            window.location = "index.PHP?id_eliminar=" + id;
        }
    }
    function Modificar(id)
    {
        window.location = "index.PHP?id_mod=" + id;
    }
</script>

    </head>
    <body >
            <?php

            @$DaB = $_POST['txtnomB'];
            @$nombre = $_POST['txtnomR'];
            @$fecha = $_POST['txtfecha'];

            //IMPORTA ARCHIVO DE CONEXION QUE CONTIENE LA CLASE DE CONEXION A MYSQL//
                require 'BD/conexion_bd.php';
            //CREAR EL OBJETO DE LA CLASE BD_PDO//
                $obj = new BD_PDO();

                if(isset($_POST['btnreg']))
                {
                    if($_POST['btnreg']=="Registrar")
                    {
                        @$obj->Ejecutar_Instruccion("INSERT INTO categorias (Nombre,Fecha) VALUES ('$nombre','$fecha')");
                    }               
                    else
                    {
                        @$id = $_POST['txtidcatR'];
                        @$obj->Ejecutar_Instruccion("Update categorias set Nombre = '$nombre', Fecha = '$fecha' where id_categoria = '$id' ");
                    }
                }
                else if (isset($_GET['id_eliminar'])) 
                {
                    @$id = $_GET['id_eliminar'];
                    @$obj->Ejecutar_Instruccion("Delete from categorias where id_categoria = '$id'");
                }
                else if (isset($_GET['id_mod']))
                {
                    @$id = $_GET['id_mod'];
                    @$cat_mod = $obj->Ejecutar_Instruccion("Select * from categorias where id_categoria = '$id' ");
                    
                }
            //REALIZAMOS UNA PETICION SQL AL SERVER A TRAVES DEL OBJETO//
                $resu = $obj->Ejecutar_Instruccion("Select * from categorias where Nombre like '%$DaB%' ");
            //MOSTRAMOS EL CONTENIDO QUE ARROJA LA PETICION//
                //var_dump($resu);

            ?>
            <head>
</head>
<body>
 </header>
 <br><br><br><br>
<div class = "L-tewelve">
  <div class = "row">
    <div class = "section">   
        <div class = "box1">
            <br><br>
        <form action="index.php" id="frmregistrar" name="frmregistrar" method="POST">
        <!--REGISTRAR-->
                       <center> <div class="container-btn"> 
                            <h2>Proyecto MVC</h2>
                            <input class="" type="txtidcatR" name="txtidcatR" placeholder="Id Categoria"
                            value="<?php echo @$cat_mod[0][0]; ?>" hidden><br>                       
                    <div class="group">
                    <input type="text" name="txtnomR" placeholder="Nombre" value="<?php echo @$cat_mod[0][1];?>">                                 
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Nombre</label>
                    </div>
                    <div class="group">
                    <input class="" type="date" id="txtfecha" name="txtfecha"value="<?php echo @$cat_mod[0][2];?>">                                
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Fecha</label>
                    </div>
                            <input type="submit"  class="custom-btn btn-3"  id="btnreg" name="btnreg"
                            value="<?php 
                            if(isset($_GET['id_mod']))
                            {
                                echo 'Modificar';
                            }
                            else
                            {
                                echo 'Registrar';
                            } 
                            ?>"><br>
                </form>
        </div> </center>
      </div>
    <link href="./css/newcss.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="./js/scripts.js"></script>
    
</head>
<div class = "L-tewelve"> 
  <div class = "row">
      <div class = "L-four T-six S-tewelve">
        <div class = "box">
        <table class="table table-hover table-responsive mb-0" id="myTable" >
    <thead>
      <tr >  
        <th ></th>
        <th >Producto</th>
        <th >Fecha</th>
        <th >Eliminar</th>
        <th >Modificar</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($resu as $row) { ?>
                <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><input type="button" class="custom-btn btn-3" name="btnEliminar" id="btnEliminar"  value="Eliminar" onclick="javascript: Eliminar('<?php echo $row[0]; ?>')"></td>
                <td><input type="button" class="custom-btn btn-3" name="btnMod"  id="btnMod" value="Modificar" onclick="javascript: Modificar('<?php echo $row[0]; ?>')"></td>
                </tr>
               <?php } ?> 
    </tbody>
  </table>
        </div>
      </div>

</body>
<br>


</html>