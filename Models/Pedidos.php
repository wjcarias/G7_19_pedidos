<?php

class Pedidos extends conectar{

    public function get_pedidos(){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_pedidos WHERE Estado = 'F'";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);  
    }

    public function get_pedido($Id){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_pedidos WHERE Estado = 'F' AND Id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $Id); 
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_pedido($Id_socio, $Fecha_Pedido, $Detalle, $Sub_Total, $Total_ISV, $Total,
        $Fecha_Entrega){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="INSERT INTO ma_pedidos(Id, Id_Socio, Fecha_Pedido, Detalle, Sub_Total, Total_ISV, Total,
        Fecha_Entrega, Estado) VALUES (NULL, ?,?,?,?,?,?,?, 'F');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $Id_socio);
        $sql->bindValue(2, $Fecha_Pedido);
        $sql->bindValue(3, $Detalle);
        $sql->bindValue(4, $Sub_Total);
        $sql->bindValue(5, $Total_ISV);
        $sql->bindValue(6, $Total);
        $sql->bindValue(7, $Fecha_Entrega);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function delete_pedido($Id){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="DELETE FROM ma_pedidos WHERE Id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $Id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_pedido($Id, $Id_socio, $Fecha_Pedido, $Detalle, $Sub_Total, $Total_ISV, $Total,
        $Fecha_Entrega){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="UPDATE ma_pedidos SET Id_Socio = ?, Fecha_Pedido = ?, Detalle = ?, Sub_Total = ?, Total_ISV = ?,
        Total = ?, Fecha_Entrega = ?, Estado = 'F' WHERE Id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $Id_socio);
        $sql->bindValue(2, $Fecha_Pedido);
        $sql->bindValue(3, $Detalle);
        $sql->bindValue(4, $Sub_Total);
        $sql->bindValue(5, $Total_ISV);
        $sql->bindValue(6, $Total);
        $sql->bindValue(7, $Fecha_Entrega);
        $sql->bindValue(8, $Id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

}

?>