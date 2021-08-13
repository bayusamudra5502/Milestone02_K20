<?php
$hostname = 'localhost';
$username = 'milestone';
$password = 'IrUzNkA!MOLRO_K5';
$dbname   = 'db_milestone';

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    $message = array(
        "status" => "error",
        "message" => $conn->connect_error
    );


    $json = json_encode($message);
    die($json);
}

function run_query($query, $need_output = true)
{
    global $conn;
    $res = $conn->query($query);

    if ($need_output) {
        $output = array();

        if (($res->num_rows) > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push($output, $row);
            }
        }

        return $output;
    } else {
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}

function add_data($table, $data)
{
    $query = "INSERT INTO `$table` (";
    $keys = array_keys($data);
    foreach ($keys as $key) {
        $query .= "$key,";
    }

    $query[strlen($query) - 1] = ")";

    $query .= " VALUES (";
    foreach ($keys as $key) {
        if (gettype($data[$key]) === "string") {
            $query .= "'" . $data[$key] . "',";
        } else {
            $query .= $data[$key] . ",";
        }
    }
    $query[strlen($query) - 1] = ")";

    return run_query($query, false);
}

function delete_data($table, $criteria)
{
    $query = "DELETE FROM `$table` ";
    $keys = array_keys($criteria);

    $query .= " WHERE ";

    foreach ($keys as $key) {
        $query .= "$key=";
        if (gettype($criteria[$key]) === "string") {
            $query .= "'" . $criteria[$key] . "'";
        } else {
            $query .= $criteria[$key];
        }

        $query .= " AND ";
    }

    $query = substr($query, 0, -5);

    run_query($query, false);

    return true;
}

function update_data($table, $criteria, $data)
{
    $query = "UPDATE `$table` ";

    $query .= "SET ";
    $data_keys = array_keys($data);

    foreach ($data_keys as $key) {
        $query .= "$key=";

        if (gettype($data[$key]) === "string") {
            $query .= "'" . $data[$key] . "'";
        } else {
            $query .= $data[$key];
        }

        $query .= ", ";
    }
    $query = substr($query, 0, -2);

    $query .= " WHERE ";
    $criteria_keys = array_keys($criteria);

    foreach ($criteria_keys as $key) {
        $query .= "$key=";
        if (gettype($criteria[$key]) === "string") {
            $query .= "'" . $criteria[$key] . "'";
        } else {
            $query .= $criteria[$key];
        }

        $query .= " AND ";
    }

    $query = substr($query, 0, -5);

    run_query($query, false);

    return true;
}
