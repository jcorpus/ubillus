<?php

include "database.php";

class consulta extends Database
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
    public function insert_lastId($table,$fileds){
        //"INSERT INTO table_name (, , ) VALUES ('m_name','qty')";
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= " (".implode(",", array_keys($fileds)).") VALUES ";
        $sql .= "('".implode("','", array_values($fileds))."')";
        $query = mysqli_query($this->con,$sql);
        if($query){
            $lastId = mysqli_insert_id($this->con);
            return $lastId;
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

    public function insertar_enfermedades($diagId, $arreglo){
        $contador=0;
        foreach($arreglo as $value){
            $sql = "INSERT INTO detallediagnostico (DiagId, EnfId) VALUES($diagId, $value)";
            $query = mysqli_query($this->con, $sql);
            if($query){
                $contador++;
            }
        }
        if(count($arreglo)==$contador){
            return true;
        }
    }

}

$obj = new consulta();


if(isset($_POST["submit"])){
    $estado = "CONSUMIDO";
    $estadoDiagnostico = "ACTIVO";
    date_default_timezone_set("America/Lima");
    $fecha_registro = date('Y-m-d');
    $fechahora_registro = date('Y-m-d H:m:s');

    $citaId = $_POST["citaid"];
    
    $myArray = array(
        "CitaId" => $citaId,
        "HisCliPeso" => $_POST["peso"],
        "HisCliPresionarterial" => $_POST["presionarterial"],
        "HisCliTemperatura" => $_POST["temperatura"],
        "HisCliHora" => $fecha_registro
        );
    if($obj->insert_record("historiaclinica",$myArray)){
        // header("location:../historial.php?msg=Record Inserted");
        $myArray = array(
        "CitaId" => $citaId,
        "ConsAnamnesis" => $_POST["anamnesis"],
        "ConsDescripcion" => $_POST["consultadescripcion"],
        "ConsFecReg" => $fecha_registro
        );
        $consId = $obj -> insert_lastId("consulta", $myArray);
        if($consId > 0){
            $myArray = array(
                "ConsId" => $consId,
                "DiagDescripcion" => $_POST["diagnosticodescripcion"],
                "DiagFecha" => $fecha_registro,
                "DiagEstado" => $estadoDiagnostico
            );
            $diagId = $obj -> insert_lastId("diagnostico", $myArray);
            if($diagId > 0){
                $myArray = array(
                    "DiagId" => $diagId,
                    "RecMedTratamiento" => $_POST["recmedtratamiento"]
                );
                if($obj -> insert_record("recetamedica", $myArray)){

                    $newEstado = "CONSUMIDO";
                    $where = array("CitaId"=>$citaId);
                    $myArray = array(
                        "CitaEstado" => $newEstado
                    );
                    if($obj->update_record("cita",$where,$myArray)){
                        
                        $enfermedades = $_POST["enfermedades"];
                        if($obj->insertar_enfermedades($diagId,$enfermedades)){
                            header("location: ../consulta.php");
                        }

                    }

                }
            }
        }


    }
}

if(isset($_POST["edit"])){
    $estado = $_POST["id"];
    $where = array("CitaEstado"=>$id);
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