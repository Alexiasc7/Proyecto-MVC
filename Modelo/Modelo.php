?<?php 
require 'BD/conexion_bd.php';

class categorias extends BD_PDO
{
	function Ins ($nombre,$fecha)
	{
		$this -> Ejecutar_Instruccion ("Insert into categorias (Nombre,Fecha) values ('$nombre','$fecha')");
	}
	function Mod ($nombre,$fecha,$id)
	{
		$this -> Ejecutar_Instruccion("Update categorias set Nombre = '$nombre', Fecha = '$fecha' where id_categoria = '$id'");
	}
	function Bus($DaB)
	{
		$result = $this->Ejecutar_Instruccion("Select * from categorias where Nombre like '%$DaB%'");
		return $result;
	}
	function Eli($id)
	{
		$this -> Ejecutar_Instruccion("Delete from categorias where id_categoria = '$id'");
	}
	function BusTod()
	{
		$result = $this->Ejecutar_Instruccion("Select * from categorias");
		var_dump($result);
		return $result;
	}
	function Tabla_gen($result)
	{  
		var_dump($result);
 foreach ($result as $row) {
$tabla.="<tr>";
  $tabla.='<td>'.$row[0].'</td>';
  $tabla.='<td>'.$row[1].'</td>';
  $tabla.='<td>'.$row[2].'</td>';
  $tabla.='<td><input type="button" class="btn btn-danger" name="btnEliminar" id="btnEliminar" value="Eliminar" onclick="javascript: Eliminar('.$row[0].')"></td>
    <td><input type="button" class="btn btn-warning" name="btnMod" id="btnMod" value="Modificar" onclick="javascript: Modificar('.$row[0].')"></td></tr>';
    }
		var_dump($tabla);
		return $tabla;
	}
}
?>