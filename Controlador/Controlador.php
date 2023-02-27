?<?php 

require 'Modelo.php';
@$Var = new categorias();


    if(isset($_POST['btnreg']))
    {
    if($_POST['btnreg']=="Registrar")
        {

        @$Var->Ins($_POST['txtnomR'],$_POST['txtfecha']);

        }               

    else
        {
        	@$id = $_POST['txtidcatR'];

        	@$Var->Mod($_POST['txtnomR'],$_POST['txtfecha'],$id);
        }
    }
    else if (isset($_GET['id_eliminar'])) 
    {
    	@$id = $_GET['id_eliminar'];

        @$Var->Eli($id);

    }
    else if (isset($_GET['id_mod']))
    {
        @$id = $_GET['id_mod'];

        @$cat_mod = $Var->Ejecutar_Instruccion("Select * from categorias where id_categoria = '$id' ");
                    
    }
            //REALIZAMOS UNA PETICION SQL AL SERVER A TRAVES DEL OBJETO//
    @$resu = $Var->Ejecutar_Instruccion("Select * from categorias where Nombre like '%$DaB%' ");
            //MOSTRAMOS EL CONTENIDO QUE ARROJA LA PETICION//
                //var_dump($result);
    if (isset($_POST['btnbus'])) 
        {
            $buscar = $_POST['txtnomB'];
            $resu = $obj->Buscar($buscar);
            $BusTod = $obj->Tabla_gen($result);
        }
        else
        {
            $resu = $obj->BusTod();
            @$BusTod = $obj->Tabla_gen($result);
        }

   require 'Vista/Vista.php';


 ?>