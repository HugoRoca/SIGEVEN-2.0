<?php

//Incluímos inicialmente la conexión a la base de datos
require '../config/Conexion.php';

Class Consultas
{
    //Implementamoa nuestro constructor
    public function __construct(){

    }

    //Implementar para listar todos los registros
    public function comprasFecha($fecha_inicio, $fecha_fin){
        $sql = "SELECT DATE(i.fecha_hora) as fecha, u.nombre as usuario, p.nombre as proveedor,
                    i.tipo_comprobante, i.serie_comprobante, i.total_compra, i.impuesto,
                    i.estado
                FROM ingreso i 
                INNER JOIN persona p ON i.idproveedor = p.idpersona
                INNER JOIN usuario u ON i.idusuario = u.idusuario
                WHERE DATE(i.fecha_hora) >= '$fecha_inicio' AND DATE(i.fecha_hora) => '$fecha_fin'";
        return ejecutarConsulta($sql);
    }
}


?>