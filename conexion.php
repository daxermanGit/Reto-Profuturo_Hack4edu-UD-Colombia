<?php
    $db_host = "profuturo.cqjhwyokh2qm.us-east-1.rds.amazonaws.com";
    $db_nombre = "recomendaciones";
    $db_usuario = "admin";
    $db_contra = "12345678";
    
    $conexion=mysqli_connect(
        $db_host,
        $db_usuario,
        $db_contra,
        $db_nombre);
    
    //print "Si funciona en php <br>";
    $seccion=$_POST["word"];
    $consulta = "select Nombre_Curso 'Curso', n_visitas
                from Competencia,CompetenciaCurso, Curso, Visitas
                where Competencia.id_Competencia = CompetenciaCurso.Id_Competencia AND
                CompetenciaCurso.Id_Curso = Curso.Id_Curso AND
                Visitas.id_Curso = Curso.Id_Curso AND
                Competencia.Nombre_Competencia = \"".$seccion."\"
                GROUP BY (Nombre_Curso)
                ";
    $resultado = mysqli_query($conexion, $consulta);
    $cursos = array();
    while (($fila=mysqli_fetch_row($resultado))==true) {                
        /*echo $fila[0];
        echo " ";
        echo $fila[1];
        echo "<br>"; */       
        $arrayName = array('text' => $fila[0], 'size' => $fila[1]);
        array_push($cursos, $arrayName);     
    }    
    $super_json =  json_encode($cursos);
    print ($super_json);
    //$a = json_decode($super_json, true); 

    /*
    foreach ($a as $value) {
       $cadena = "El nombre de la provincia es: '". $value['text'] ."', y su puntuación es: ". $value['size'] ."},";
       print ($cadena);
    }*/

    /*
    $a=array("red","green");
    array_push($a,"blue","yellow");
    echo json_encode($a);
    */
    

?>    