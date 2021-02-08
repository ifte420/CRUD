<?php
class DB {
    function db_connect(){
        return $db_connect = mysqli_connect('localhost', 'root', '', 'php registration data');
    }
    function insert($table_name, $insert_place, $what_insert){
        $insert_query = "INSERT INTO $table_name ($insert_place) VALUES ($what_insert)";
        $from_db = mysqli_query($this->db_connect(), $insert_query);
        return $from_db;
    }
    function select($table_name){
        $select_query = "SELECT * FROM $table_name";
        $from_db = mysqli_query($this->db_connect(), $select_query);
        return $from_db;
    }
    function select3key($what_to_select,$table_name, $another_write){
        $select_query = "SELECT $what_to_select FROM $table_name $another_write";
        $from_db = mysqli_query($this->db_connect(), $select_query);
        return $from_db;
    }
    function select_assoc($what_to_select,$table_name, $another_write){
        $select_query = "SELECT $what_to_select FROM $table_name $another_write";
        $from_db = mysqli_fetch_assoc(mysqli_query($this->db_connect(), $select_query));
        return $from_db;
    }
    function select_count($table_name){
        $select_count_query = "SELECT COUNT(*) as total FROM $table_name";
        $from_db = mysqli_fetch_assoc(mysqli_query($this->db_connect(), $select_count_query));
        return $from_db['total'];
    }
    function select_count_where($table_name, $where){
        $select_count_query = "SELECT COUNT(*) as total FROM $table_name WHERE $where";
        $from_db = mysqli_fetch_assoc(mysqli_query($this->db_connect(), $select_count_query));
        return $from_db['total'];
    }
    function update($table_name, $what_to_set ,$where_update){
        $update_query = "UPDATE $table_name SET $what_to_set WHERE $where_update";
        $form_db = mysqli_query($this->db_connect(), $update_query);
        return $form_db;
    }
    function delete($table_name, $where_delete){
        $delete_query = "DELETE FROM $table_name WHERE $where_delete";
        $form_db = mysqli_query($this->db_connect(), $delete_query);
        return $form_db;
    }
    function delete_all($table_name){
        $delete_all_query = "DELETE FROM $table_name";
        $form_db = mysqli_query($this->db_connect(), $delete_all_query);
        return $form_db;
    }
}

$db = new DB;
?>