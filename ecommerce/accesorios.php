<?php
include "DB.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$con= new producto;
$con->conexion();
?>

<html>
    <div id="izquierda">
        <table border="9" width="300">
        
            <tr><td colspan="2">v:</td></tr>
            
            
            
            <tr><td>v:</td> 
                
                
                <td>v:</td></tr>
            
            
            
            <tr><td  colspan="2">v:</td></tr>
            
            
            <tr><td>v:</td> 
                
                
                <td>v:</td></tr>
            
            
            <tr><td  colspan="2">v:</td></tr>
        
        
        </table>
    </div>
    
    <div id="derecha">
        <table border="9" width="300">
            <?php
            $res=$con->ver("accesorios");
            $descuento=mysql_fetch_array($res);
            ?>
            <tr><td  colspan="3">:v</td></tr>
            
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>   
            
        </table>
    </div>
</html>