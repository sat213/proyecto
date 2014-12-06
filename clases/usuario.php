<?php
class Usuario{
    private $name;
    public function getUsuario(){
        echo "<br>Mostrar Usuario: ".$this->name;

    }
    public function setUsuario(){
        $this->name="Angel";
        return $this->name;
    }
    public function readUsuarioG(){
        //echo "<br><br>readusuarioG";
        $sql01 = "SELECT * FROM usuario WHERE estatus = 1 ORDER BY ApellidoPaterno ASC";
        $result01 = mysql_query($sql01)or die("Error $sql01");
        echo "<div class=table-responsive>";
        echo "<table class=\"table table-striped\">";
        echo "<tr><td colspan=5 align=center><strong>Lista de Usuarios</strong></td></tr>";
        echo "<tr><th>Id</th><th>Nombre</th><th>Apellido P</th><th>Apellido M</th><th>Nivel</th><tr>";
        while($field = mysql_fetch_array($result01)){
            $this->Id = $field['id'];
            $this->Nombre = utf8_decode($field['Nombre']);
            $this->ApellidoPaterno = utf8_decode($field['ApellidoPaterno']);
            $this->ApellidoMaterno = utf8_decode($field['ApellidoMaterno']);
            $this->Nivel = $field['Nivel'];
            switch($this->Nivel){
                case 1:
                    $type = "Administrador";
                    break;
                case 2:
                    $type = "Maestro";
                    break;
                case 3:
                    $type = "Alumno";
                    break;
            }
            echo "<tr><td>$this->Id</td><td>$this->Nombre</td><td>$this->ApellidoPaterno</td><td>$this->ApellidoMaterno</td><td>$type</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    }
}