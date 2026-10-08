<?php

include "database.php";

class usuario extends Database
{
    public function insert_record($table,$fileds){
        //"INSERT INTO table_name (, , ) VALUES ('m_name','qty')";
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= " (".implode(",", array_keys($fileds)).") VALUES ";
        $sql .= "('".implode("','", array_values($fileds))."')";
        $query = mysqli_query($this->con,$sql);
        if($query){
            return true;
        }

    }
    public function fetch_record($table){
        $sql = "SELECT * FROM ".$table;
        $array = array();
        $query = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function sql($sql){
        $array = array();
        $query = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }

    public function select_record($table,$where){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            // id = '5' AND m_name = 'something'
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql .= "SELECT * FROM ".$table." WHERE ".$condition;
        $query = mysqli_query($this->con,$sql);
        $row = mysqli_fetch_array($query);
        return $row;

    }
    public function update_record($table,$where,$fields){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            // id = '5' AND m_name = 'something'
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        foreach ($fields as $key => $value) {
            //UPDATE table SET m_name = '' , qty = '' WHERE id = '';
            $sql .= $key . "='".$value."', ";
        }
        $sql = substr($sql, 0,-2);
        $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
        if(mysqli_query($this->con,$sql)){
            return true;
        }
    }
    public function delete_record($table,$where){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = "DELETE FROM ".$table." WHERE ".$condition;
        if(mysqli_query($this->con,$sql)){
            return true;
        }
    }
}

$obj = new usuario();


if(isset($_POST["submit"])){
    $estadoDefault = "ACTIVO";

    $myArray = array(
        "UsuNombre" => $_POST["usuario"],
        "UsuClave" => $_POST["clave"],
        "PerId" => $_POST["perid"],
        "UsuEstado" => $estadoDefault
    );


    if(isset($_POST["id"]) && !empty($_POST["id"])){
        $id = $_POST["id"];
        $where = array("UsuId"=>$id);
        if($obj->update_record("usuario",$where,$myArray)){
            header("location:../usuario.php");
        }
    } else {
        if($obj->insert_record("usuario",$myArray)){
            header("location:../usuario.php");
        }
    }


}

if(isset($_POST["login"])){
    header("content-type: application/json");
    $where = array(
        "UsuNombre" => $_POST["usuario"],
        "UsuClave" => $_POST["clave"]
    );
    $row = $obj->select_record("usuario",$where);
    if(count($row)){
        $data["respuesta"] = "OK";
        $data["mensaje"] = "Credenciales correctas";
    }  else {
        $data["respuesta"] = "ERROR";
        $data["mensaje"] = "Credenciales incorrectas, intente nuevamente por favor.";
    }
    echo json_encode($data);
}

if(isset($_GET["edit_inactivo"])){
    $newEstado = "INACTIVO";
    
    $id = $_GET["id"];
    $where = array("UsuId"=>$id);
    $myArray = array(
        "UsuEstado" => $newEstado
    );
    if($obj->update_record("usuario",$where,$myArray)){
        header("location:../usuario.php");
    }
}

if(isset($_GET["edit_activo"])){
    $newEstado = "ACTIVO";
    
    $id = $_GET["id"];
    $where = array("UsuId"=>$id);
    $myArray = array(
        "UsuEstado" => $newEstado
    );
    if($obj->update_record("usuario",$where,$myArray)){
        header("location:../usuario.php");
    }
}

if(isset($_GET["delete"])){
//    $id = $_GET["id"] ?? null;
    $where = array("id"=>$id);
    if($obj->delete_record("medicines",$where)){
        header("location:index.php?msg=Record Deleted Successfully");
    }


}
?>