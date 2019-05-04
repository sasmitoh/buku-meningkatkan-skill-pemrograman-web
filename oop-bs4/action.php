<?php
include_once "db.php";

class DataOperation extends Database 
{
	public function insert_record($table, $field){
		// " INSERT INTO table_name( , , ) VALUES ('', '')";
		$sql = "";
		$sql .= "INSERT INTO ".$table;
		$sql .= " (".implode(",", array_keys($field)).") VALUES ";
		$sql .= "('".implode("','", array_values($field))."')";
		$query = mysqli_query($this->con,$sql);
		if ($query) {
			return true;
		}

	}

	public function fetch_record($table){
		$sql = "SELECT * FROM ".$table;
		$array = array();
		$query = mysqli_query($this->con,$sql);
		while ($row = mysqli_fetch_assoc($query)) {
			$array[] = $row;
		}
		return $array;
	}

	public function select_record($table,$where){
		$sql ="";
		$condition = "";
		foreach ($where as $key => $value) {
			$condition .= $key . "='" . $value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		$sql .= "SELECT * FROM ".$table." WHERE ".$condition;
		$query = mysqli_query($this->con,$sql);
		$row = mysqli_fetch_assoc($query);
		return $row;
	}

	public function update_record($table,$where,$field){
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
			$condition .= $key . "='" . $value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		foreach ($field as $key => $value) {
			$sql .= $key . "='".$value."', ";
		}
		$sql = substr($sql, 0, -2);
		$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
		if (mysqli_query($this->con,$sql)) {
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
		if (mysqli_query($this->con,$sql)) {
			return true;
		}
		
	}
	
} 

$obj = new DataOperation;
if (isset($_POST["submit"])){
	$myArray = array(
		"nama" => $_POST["name"],
		"email" => $_POST["email"],
		"no_telp" => $_POST["telp"],
		"alamat" => $_POST["address"]
	);
	if ($obj->insert_record('data',$myArray)){
		header("location:view.php?msg=insert recorded");
	}
}
if (isset($_POST["edit"])) {
	$id = $_POST["id"];
	$where = array("id_data"=>$id);
	$myArray = array(
		"nama" => $_POST["name"],
		"email" => $_POST["email"],
		"no_telp" => $_POST["telp"],
		"alamat" => $_POST["address"]
	);

	if ($obj->update_record("data",$where,$myArray)) {
		header("location:view.php?msg=Record Update Successfully");
	}
	
}

if (isset($_GET["delete"])) {
	$id = $_GET["id"] ?? null;
	$where = array("id_data"=>$id);
	if ($obj->delete_record("data",$where)) {
		header("location:view.php?msg=Record Deleted Successfully");
	}
}
 ?>