<?php

include "database.php";

class historial extends Database
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
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->con);
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
    public function sql_record($sql){
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
    public function mostrarDisponibilidad($iddoctor,$fechacita){
        $sql = "SELECT promed.DetProgMedId, promed.DetProgMedHora, promed.DetProgMedFecha, promed.DetProgMedEstado 
        FROM programacion pro
        INNER JOIN programacionmedico promed
        ON pro.ProgId = promed.ProgId
        INNER JOIN medico med
        ON pro.MedId = med.MedId
        WHERE med.MedId = " . $iddoctor ." AND promed.DetProgMedFecha = '".$fechacita."' AND promed.DetProgMedEstado = 'DISPONIBLE'";
        $result = mysqli_query($this->con, $sql);
        $array = array();
        $query = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
    }
}

$obj = new historial();

if(isset($_POST["submit"])){
    date_default_timezone_set("America/Lima");
    $fecha_registro = date('Y-m-d H:m:s');
    
    $myArray = array(
        "CitaId" => $_POST["idcita"],
        "HisCliPeso" => $_POST["peso"],
        "HisCliPresionarterial" => $_POST["presionarterial"],
        "HisCliTemperatura" => $_POST["temperatura"],
        "HisCliHora" => $fecha_registro
        );
    if($obj->insert_record("historiaclinica",$myArray)){
        header("location:../historial.php?msg=Record Inserted");
    }
}

if(isset($_POST["edit"])){
    $id = $_POST["id"];
    $where = array("id"=>$id);
    $myArray = array(
        "m_name" => $_POST["name"],
        "qty" => $_POST["qty"]
    );
    if($obj->update_record("medicines",$where,$myArray)){
        header("location:index.php?msg=Record Updated Successfully");
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