<?php

    header('Content-Type: application/json');

    require_once("../Config/conexion.php");
    require_once("../Models/Pedidos.php");
    $pedidos = new pedidos();

    $body = json_decode(file_get_contents("php://input"), true);
    
    switch($_GET["op"]){

        case "GetPedidos":
            $datos=$pedidos->get_pedidos();
            echo json_encode($datos);
        break;
        
        case "GetUno":
            $datos=$pedidos->get_pedido($body["Id"]);
            echo json_encode($datos);
        break;
        
        case "InsertPedido":
            $datos=$pedidos->insert_pedido($body["Id_Socio"], $body["Fecha_Pedido"], $body["Detalle"],
            $body["Sub_Total"], $body["Total_ISV"], $body["Total"], $body["Fecha_Entrega"]);
            echo json_encode("Pedido agregado ");
        break;
        
        case "DeletePedido":
            $datos=$pedidos->delete_pedido($body["Id"], );
            echo json_encode("Pedido eliminado ");
        break;
        
        case "UpdatePedido":
            $datos=$pedidos->update_pedido($body["Id"]);
            echo json_encode("Pedido actualizado ");
        break;
        
        
    }       

     
?>