<?php
session_start();
include_once "conexion.php";
			
?>
<style>
		*{
			font-size: 14px;
			font-family: sans-serif;
		}
		form.registro{
		    background: none repeat scroll 0 0 #F1F1F1;
		    border: 1px solid #DDDDDD;
		    margin: 0 auto;
		    padding: 20px;
		    width: 278px;
		}
		form.registro div {
		    margin-bottom: 15px;
		    overflow: hidden;
		}
		form.registro div label {
		    display: block;
		    float: left;
		    line-height: 25px;
		}
		form.registro div input[type="text"], form.registro div input[type="password"] {
		    border: 1px solid #DCDCDC;
		    float: right;
		    padding: 4px;
		}
		form.registro div input[type="submit"] {
		    background: none repeat scroll 0 0 #DEDEDE;
		    border: 1px solid #C6C6C6;
		    float: right;
		    font-weight: bold;
		    padding: 4px 20px;
		}
		.error{
			color: red;
		    font-weight: bold;
		    margin: 10px;
		    text-align: center;
		}
</style>

<form action="" method="post" class="registro">
<div><label>Usuario:</label>
<input type="text" name="usuario"></div>
<div><label>Clave:</label>
<input type="password" name="password"></div>
<div><label>Repetir Clave:</label>
<input type="password" name="repassword"></div>
<div>
<input type="submit" name="enviar" value="Registrar"></div>
</form>
			
<?php
if(isset($_POST['enviar']))
{
    if($_POST['usuario'] == '' or $_POST['password'] == '' or $_POST['repassword'] == '')
    {
        echo 'Por favor llene todos los campos.';
    }
    else
    {
        $sql = 'SELECT * FROM usuarios';
        $rec = mysql_query($sql);
        $verificar_usuario = 0;
 
        while($result = mysql_fetch_object($rec))
        {
            if($result->usuario == $_POST['usuario'])
            {
                $verificar_usuario = 1;
            }
        }
 
        if($verificar_usuario == 0)
        {
            if($_POST['password'] == $_POST['repassword'])
            {
                $usuario = $_POST['usuario'];
                $password = $_POST['password'];
                $sql = "INSERT INTO usuarios (usuario,password) VALUES ('$usuario','$password')";
                mysql_query($sql);
 
                echo 'Usted se ha registrado correctamente.';
            }
            else
            {
                echo 'Las claves no son iguales, intente nuevamente.';
            }
        }
        else
        {
            echo 'Este usuario ya ha sido registrado anteriormente.';
        }
    }
}
?>