<?php

$titulo = 'Bienvenido al home';
$contenido = 'contenido aqui va el contenido';//puede ser una consulta
$variables = array ('titulo'=>$titulo,'contenido'=>$contenido);
view('home',$variables);


?>