<?php 
include("conexion/conexion.php");

$rutaEnSeervidor = "";
$rutaTemporal = $_FILES['archivotxt']['tmp_name'];
$nombrearchivo = $_FILES['archivotxt']['name'];
$rutadestino = $rutaEnSeervidor . '/' . $nombrearchivo;
move_uploaded_file($rutaTemporal, $nombrearchivo);

$filas=file($nombrearchivo); 
//$filas=file('archivo.txt'); 
foreach($filas as $value){
list($identificacion, $nombres, $apellidos, $edad) = explode("|", $value);

echo 'Identificacion: '.$identificacion.'<br/>'; 
echo 'Nombres: '.$nombres.'<br/>'; 
echo 'Apellidos: '.$apellidos.'<br/>'; 
echo 'Edad: '.$edad.'<br/>'; 

$insert = "INSERT INTO usuarios(identificacion,nombres,apellidos,edad) VALUES ('$identificacion', '$nombres', '$apellidos', '$edad')";
$resultado=mysql_query($insert);
echo $insert."<br>";
}
?>
<h1>Sube tu archivo</h1>
<form id="form1" name="form1" method="post" action="cargue.php" enctype="multipart/form-data">
    <center>
        <table width="200" id="tbl_frm">
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;</td>
                <td>
                    <input type="file" name="archivotxt" id="archivotxt" />
                </td>
                <td>&nbsp;&nbsp;</td>
            </tr>
          <!--esto es una prueba-->
            <tr>
                <td>&nbsp;&nbsp;</td>
                <td><input type="submit" name="button" id="button" value="Guardar" class="boton"/></td>
                <td>&nbsp;&nbsp;</td>
            </tr>
            
        </table>
    </center>
</form>
