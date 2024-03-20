<?php
    require 'connection.php';
    $connection = connectToDatabase();

    function getAllData() {
        global $connection;
        $query = "SELECT * FROM KelasMahasiswa";
        $result = pg_query($connection, $query);
        $data = pg_fetch_all($result);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD']  == 'GET') {
        $data = getAllData();
        echo json_encode($data);
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = $_POST;
        $query = "INSERT INTO KelasMahasiswa (nim, kodemk) VALUES ('" . $data['nim'] . "', '" . $data['kodemk'] . "')";
        $result = pg_query($connection, $query);
        if ($result) {
            echo json_encode(array('status' => 'OK', 'message' => 'Data berhasil ditambahkan'));
        } else {
            echo json_encode(array('status' => 'ERROR', 'message' => 'Data gagal ditambahkan'));
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $data = file_get_contents('php://input');
        $data1 = array();
        parse_str($data, $data1);

        $query = "DELETE FROM KelasMahasiswa WHERE nim = '" . $data1['nim'] . "'";
        $result = pg_query($connection, $query);
        if ($result) {
            echo json_encode(array('status' => 'OK', 'message' => 'Data berhasil dihapus'));
        } else {
            echo json_encode(array('status' => 'ERROR', 'message' => 'Data gagal dihapus'));
        }

    } elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $data = file_get_contents('php://input');
        $data1 = array();
        parse_str($data, $data1);

        $query = "UPDATE KelasMahasiswa SET kodemk = '" . $data1['kodemk'] . "' WHERE nim = '" . $data1['nim'] . "'";
        $result = pg_query($connection, $query);
        if ($result) {
            echo json_encode(array('status' => 'OK', 'message' => 'Data berhasil diubah'));
        } else {
            echo json_encode(array('status' => 'ERROR', 'message' => 'Data gagal diubah'));
        }
    }
?>