<?php

include "database.php";

class programacion extends Database
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

    public function insertarProgramacionDoctor($table,$fileds){
        //"INSERT INTO table_name (, , ) VALUES ('m_name','qty')";
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= " (".implode(",", array_keys($fileds)).") VALUES ";
        $sql .= "('".implode("','", array_values($fileds))."')";
        $query = mysqli_query($this->con,$sql);
        if($query){
            $last_id = mysqli_insert_id($this->con);
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->con);
        }
        return $last_id;

    }

    public function validarRegistro($fecharegistro)
    {
        $sql = "SELECT * FROM programaciondoctor WHERE fecharegistro='".$fecharegistro."'";
        $result = mysqli_query($this->con, $sql);
        $contador = mysqli_num_rows($result);
        return $contador;
    }

    public function get_minutes ( $start, $end ) {
        while ( strtotime($start) <= strtotime($end) ) {
            $minutes[] = date("h:i A", strtotime( "$start" ) );
            $start = date("h:i A", strtotime( "$start + 30 mins")) ;
        }
        return $minutes;
    }

    public function insertarDetalleProgramacion($idprogramaciondoctor, $fecha, $hora, $estado){
        $respuesta = false;
        for($i = 0; $i<count($fecha); $i++){
            for($j = 0; $j<count($hora); $j++){

                $sql = "INSERT INTO programacionmedico(ProgId,DetProgMedFecha,DetProgMedHora,DetProgMedEstado)
                VALUES($idprogramaciondoctor,'$fecha[$i]','$hora[$j]','$estado')";
                $query = mysqli_query($this->con,$sql);
                if($query){
                    $respuesta =  true;
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($this->con);
                }
            }
        }
        return $respuesta;
    }
}

$obj = new programacion();


if(isset($_POST["submit"])){
    date_default_timezone_set("America/Lima");
    $fecha_registro = date('Y-m-d');

//    $validar = $obj -> validarRegistro($fecha_registro);

    /*$originalDate = $_POST["fechacita"];
    $newDate = date("Y-m-d", strtotime($originalDate));*/
//    $medid = $_POST["medid"];
    $begin = new DateTime( $_POST["fecinicio"] );
    $end   = new DateTime( $_POST["fecfinal"] );
    $StartTime= $_POST["horainicio"];
    $EndTime = $_POST["horafinal"];
    $dias = $_POST["dias"];


    $diasrango = [];
    $diasdisponibles = [];
    $horadisponible = [];

    $minutes = $obj->get_minutes($StartTime, $EndTime);

    foreach($minutes as $minute) {
        $horadisponible[] = $minute ;
    }

    for($i = $begin; $i <= $end; $i->modify('+1 day')){
        $diasrango[] = $i->format("Y-m-d");
    }

    for($d = 0 ; $d<count($diasrango); $d++){

        for($r=0; $r<count($dias); $r++){

            if(date('w', strtotime($diasrango[$d])) == $dias[$r]){
                $diasdisponibles[] = $diasrango[$d];
            }
        }
    }

    $lunes = 0;
    $martes = 0;
    $miercoles = 0;
    $jueves = 0;
    $viernes = 0;
    $sabado = 0;
    $domingo = 0;

    foreach($dias as $dia){
        if($dia==0) $domingo = 1;
        if($dia==1) $lunes = 1;
        if($dia==2) $martes = 1;
        if($dia==3) $miercoles = 1;
        if($dia==4) $jueves = 1;
        if($dia==5) $viernes = 1;
        if($dia==6) $sabado = 1;
    }

    $estado = "DISPONIBLE";
    $myArray = array(
        "MedId" => $_POST["medid"],
        "ProgFecInicio" => $_POST["fecinicio"],
        "ProgFecFinal" => $_POST["fecfinal"],
        "ProgHorInicio" => $_POST["horainicio"],
        "ProgHorFinal" => $_POST["horafinal"],
        "Lunes" => $lunes,
        "Martes" => $martes,
        "Miercoles" => $miercoles,
        "Jueves" => $jueves,
        "Viernes" => $viernes,
        "Sabado" => $sabado,
        "Domingo" => $domingo
        /*"estado" => $estado,
        "fecharegistro" => $fecha_registro*/
    );
    $idprogramaciondoctor = $obj->insertarProgramacionDoctor("programacion",$myArray);
    if($idprogramaciondoctor>0){
        //header("location:../registrar_programaciondoctor.php?msg=Registro_exitoso");

        if($obj->insertarDetalleProgramacion($idprogramaciondoctor,$diasdisponibles,$horadisponible,"DISPONIBLE")){
            header("location:../programacion.php");
        }
    }

//    $myArray = array(
//
//        "EspId" => $_POST["especialidad"],
//        "ServNombre" => $_POST["nombre"],
//        "ServDescripcion" => $_POST["descripcion"],
//        "ServPrecio" => $_POST["precio"],
//        "ServEstado" => "ACTIVO"
//    );
//    if($obj->insert_record("servicio",$myArray)){
//        header("location:../servicio.php");
//    }

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