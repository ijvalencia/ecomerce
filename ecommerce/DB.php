<?php

class producto{
    function conexion(){
        $host="localhost";
        $user="root";
        $pass="";
        $db="ecommerce";

            $con= mysql_connect($host, $user, $pass)or die("No se puede conectar al servidor, intenta de nuevo en unos minutos.");
            mysql_select_db($db, $con) or die("No se puede conectar a la base de datos, intenta de nuevo en unos minutos.");
            
            return $con;
    }
    
    function totaliti(){
        $query="select * from producto";
        $resultado=mysql_query($query);
        return $resultado;
        
    }
    
    function ver($categoria){
        
            $query="select * from producto where categoria='".$categoria."' order BY RAND() limit 3";
            $resultado=mysql_query($query);
            
            return $resultado;
    }
    
    function aleatorios3(){
        
            $query="select * from producto order BY RAND() limit 3";
            $resultado=mysql_query($query);
            
            return $resultado;
    }

    function sacarProducto($quiero){
        
        $query="select * from producto where id_producto='".$quiero."'";
        $resultado=mysql_query($query);

            return $resultado;
    }
    
    function calificacion($consultando){
        $query="select avg(calificacion) from comentarios where id_producto='".$consultando."'";
        $resultado=mysql_query($query);
        $resultado= mysql_fetch_array($resultado);
        $resultado=round($resultado['avg(calificacion)'],1);
        
            return $resultado;
    }
    
    function contarCalificantes($quiero){
        //echo $quiero;
        $query="SELECT count( 'id_producto' ) as  FROM 'comentarios' WHERE id_producto = '".$quiero."'";
        $resultado=mysql_query($query);
        //$resultado= mysql_fetch_array($resultado) or die ("0");
        echo $resultado[count('id_producto')];
            
    }
    
    function categorizado($categoria){
        $query="select * from producto where categoria='".$categoria."'";
        $resultado=mysql_query($query);
        
        return $resultado;
    }
}

