<?php

include "database.php";

class cita extends Database
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

    public function getLastId($table,$fileds){
        //"INSERT INTO table_name (, , ) VALUES ('m_name','qty')";
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= " (".implode(",", array_keys($fileds)).") VALUES ";
        $sql .= "('".implode("','", array_values($fileds))."')";
        $query = mysqli_query($this->con,$sql);
        if($query){
            $last_id = mysqli_insert_id($this->con);
            return $last_id;
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

    public function checkIfExist($table,$where){
        $sql = "";
        $condition = "";
        foreach ($where as $key => $value) {
            // id = '5' AND m_name = 'something'
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql .= "SELECT * FROM ".$table." WHERE ".$condition;
        $query = mysqli_query($this->con,$sql);
        $numRows = mysqli_num_rows($query);
        return $numRows;
    }

    public function sql_row($sql){
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

$obj = new cita();

// ==============================================================================================================================================

if(isset($_POST["submit"])){
    date_default_timezone_set("America/Lima");
    $fecha_registro = date('Y-m-d');

    // $estado = "DEUDA";
    $estado = "PENDIENTE";
    $estadocita = "OCUPADO";

    $c_iddetalleprogramacion = $_POST["c_iddetalleprogramacion"];

    $where = array("DetProgMedId"=>$c_iddetalleprogramacion);
    $myArray2 = array(
        "DetProgMedEstado" => $estadocita
    );
    if($obj->update_record("programacionmedico",$where,$myArray2)){
        $myArray = array(
            "PacId" => $_POST["idpaciente"],
            "ServId" => $_POST["idservicio"],
            "DetProgMedId" => $c_iddetalleprogramacion,
            "CitaAsunto" => $_POST["asunto"],
            "CitaEstado" => $estado,
            "CitaFecReg" => $fecha_registro
        );
        if($obj->insert_record("cita",$myArray)){
            echo "OK";
        }else{
            echo "ERROR2";
        }
    }else{
        echo "ERROR1";
    }
}


// ==============================================================================================================================================

if(isset($_POST["submitExterno"])){
    date_default_timezone_set("America/Lima");
    $fecha_registro = date('Y-m-d');

    $where = array("PerDoc"=> $_POST["documento"]);
    $numRows = $obj -> checkIfExist("persona",$where);

    if($numRows>0){
        // echo 'Existe la persona';

        $where = array("PerDoc"=> $_POST["documento"]);
        $row = $obj -> select_record("persona", $where);
        $perId = $row["PerId"];

        $myArray2 = array(
            "PerId" => $perId,
            "PacAlergiaMedicamento" => $_POST["alergiamedicamento"]
        );
        $pacId = $obj -> getLastId("paciente", $myArray2);
        if($pacId>0){
            $estado = "PENDIENTE";
            $estadocita = "OCUPADO";
            $c_iddetalleprogramacion = $_POST["c_iddetalleprogramacion"];
            $where = array("DetProgMedId"=>$c_iddetalleprogramacion);
            $myArray3 = array(
                "DetProgMedEstado" => $estadocita
            );
            if($obj->update_record("programacionmedico",$where,$myArray3)){
                $myArray4 = array(
                    "PacId" => $pacId,
                    "ServId" => $_POST["idservicio"],
                    "DetProgMedId" => $c_iddetalleprogramacion,
                    "CitaAsunto" => $_POST["asunto"],
                    "CitaEstado" => $estado,
                    "CitaFecReg" => $fecha_registro
                );
                if($obj->insert_record("cita",$myArray4)){
                    echo "OK";
                }else{
                    echo "ERROR2";
                }
            }else{
                echo "ERROR1";
            }
        }




    }else {
        // echo 'No existe la persona, registro nuevo';
        $myArray = array(
            "PerNombre" => $_POST["nombre"],
            "PerApepat" => $_POST["apepat"],
            "PerApemat" => $_POST["apemat"],
            "PerSexo" => $_POST["sexo"],
            "TipoDocId" => $_POST["tipodoc"],
            "PerDoc" => $_POST["documento"],
            "PerFecNac" => $_POST["fecnacimiento"],
            "PerEstadoCivil" => $_POST["estadocivil"],
            "PerDireccion" => $_POST["direccion"],
            "PerTelefono" => $_POST["telefono"],
            "PerCorreo" => $_POST["email"]
        );
        $perId = $obj -> getLastId("persona", $myArray);
        if($perId>0){
            $myArray2 = array(
                "PerId" => $perId,
                "PacAlergiaMedicamento" => $_POST["alergiamedicamento"]
            );
            $pacId = $obj -> getLastId("paciente", $myArray2);
            if($pacId>0){
                $estado = "PENDIENTE";
                $estadocita = "OCUPADO";
                $c_iddetalleprogramacion = $_POST["c_iddetalleprogramacion"];
                $where = array("DetProgMedId"=>$c_iddetalleprogramacion);
                $myArray3 = array(
                    "DetProgMedEstado" => $estadocita
                );
                if($obj->update_record("programacionmedico",$where,$myArray3)){
                    $myArray4 = array(
                        "PacId" => $pacId,
                        "ServId" => $_POST["idservicio"],
                        "DetProgMedId" => $c_iddetalleprogramacion,
                        "CitaAsunto" => $_POST["asunto"],
                        "CitaEstado" => $estado,
                        "CitaFecReg" => $fecha_registro
                    );
                    if($obj->insert_record("cita",$myArray4)){
                        echo "OK";
                    }else{
                        echo "ERROR2";
                    }
                }else{
                    echo "ERROR1";
                }
            }
        }




    }

    
}

// ===========================================================================================================================================

if(isset($_POST["mostrardisponibilidad"])){
    header('Content-Type: application/json');
    
    // $idespecialidad = $_POST["idespecialidad"];
    // $idservicio = $_POST["idservicio"];
    $iddoctor = $_POST["iddoctor"];
    $fechacita = $_POST["fechacita"];

    $filas = $obj -> mostrarDisponibilidad($iddoctor,$fechacita);
    echo json_encode($filas);
}

if(isset($_POST["select_servicio"])){
    header("content-type:application/json");
    $busqueda = $_POST["q"];
    $espId = $_POST["espId"];
    $row = $obj -> sql("SELECT ser.ServId, ser.ServNombre, ser.ServPrecio FROM servicio ser
                    INNER JOIN especialidad esp
                    ON ser.EspId = esp.EspId
                    WHERE esp.EspId = ".$espId." AND ser.ServEstado = 'ACTIVO' AND ser.ServNombre LIKE '%".$busqueda."%'");
    if(count($row) > 0){
        foreach ($row as $key => $value) {
        $data[] = array('id' => $value['ServId'], 'text' => $value['ServNombre']);
        } 
    } else {
        $data[] = array('id' => '0', 'text' => 'No se encontraron servicios');
    }
    echo json_encode($data, JSON_PRETTY_PRINT);
}

if(isset($_POST["select_medico"])){
    header("content-type:application/json");
    $busqueda = $_POST["q"];
    $espId = $_POST["espId"];
    $row = $obj -> sql("SELECT med.MedId, per.PerNombre, per.PerApepat, per.PerApemat FROM medico med
                        INNER JOIN persona per
                        ON med.PerId = per.PerId
                        INNER JOIN especialidad esp
                        ON med.EspId = esp.EspId
                        WHERE esp.EspId = ".$espId." AND (per.PerNombre LIKE '%".$busqueda."%' OR per.PerApepat LIKE '%".$busqueda."%' OR per.PerApemat LIKE '%".$busqueda."%')");
    if(count($row) > 0){
        foreach ($row as $key => $value) {
        $data[] = array('id' => $value['MedId'], 'text' => $value['PerNombre']. ' ' . $value['PerApepat']. ' ' . $value['PerApemat']);
        } 
    } else {
        $data[] = array('id' => '0', 'text' => 'No se encontraron medicos');
    }
    echo json_encode($data, JSON_PRETTY_PRINT);
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