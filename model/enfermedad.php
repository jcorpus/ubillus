<?php

include "database.php";

class enfermedad extends Database
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
    public function get_id($table,$fileds){
        //"INSERT INTO table_name (, , ) VALUES ('m_name','qty')";
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= " (".implode(",", array_keys($fileds)).") VALUES ";
        $sql .= "('".implode("','", array_values($fileds))."')";
        if(mysqli_query($this->con,$sql)){
            $last_id = mysqli_insert_id($this->con);
            return $last_id;
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->con);
        }
    }
    public function insert_arrays($parent, $mi){
        foreach ($mi as $value){
            list($arreglo01) = $value;
            $sql = "INSERT INTO detalleenfermedadtipo(EnfId, EnfTipId) VALUES('$parent','$arreglo01')";
            $query = mysqli_query($this->con, $sql);
            if($query){
                $resp = true;
            } else {
                $resp = false;
                echo "Error " .$sql. "<br>" . mysqli_error($this->con);
            }
        }
        return $resp;
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

$obj = new enfermedad();


if(isset($_POST["submit"])){
    $myArray = array(
        "EnfNom" => $_POST["nombre"],
        "EnfCausa" => $_POST["causa"]
    );

    if(isset($_POST["tipoenfermedad"]) && !empty($_POST["tipoenfermedad"])){
        $tipoenfermedad = $_POST["tipoenfermedad"];
        $mi = new MultipleIterator();
        $mi -> attachIterator(new ArrayIterator($tipoenfermedad));

        $last_id = $obj->get_id("enfermedad",$myArray);
        if($last_id > 0){
            if($obj -> insert_arrays($last_id, $mi)){
                header("location:../enfermedad.php");
            }
        }
    } else {
        if($obj->insert_record("enfermedad",$myArray)){
            header("location:../enfermedad.php");
        }
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