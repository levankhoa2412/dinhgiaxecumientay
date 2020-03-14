<?php
require "function.php";
require_once("dbConnect.php");

function save($table, $data = array())
{
    $conn = $GLOBALS["conn"];
    $values = array();
    foreach ($data as $key => $value) {
        $value = mysqli_real_escape_string($conn, $value);
        $values[] = "`$key`='$value'";
    }
    $Id = intval($data['Id']);
    if ($Id > 0) {
        $sql = "UPDATE `$table` SET " . implode(',', $values) . " WHERE Id=$Id";
    } else {
        $sql = "INSERT INTO `$table` SET " . implode(',', $values);
    }

    mysqli_query($conn, $sql) or die(mysqli_error());

    $Id = ($Id > 0) ? $Id : mysqli_insert_id($conn);
    return $Id;
}

function get_a_record($table, $id, $select = '*')
{
    $conn = connectDB();
    $id = intval($id);
    $sql = "SELECT $select FROM `$table` WHERE =$id";
    $query = mysqli_query($conn, $sql) or die(mysqli_error());
    $data = NULL;
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        mysqli_free_result($query);
    }
    return $data;
}

function get_a_record_by_alias($table, $alias, $select = '*')
{
    $conn = $GLOBALS["conn"];
    $alias = mysqli_real_escape_string($alias);
    $sql = "SELECT $select FROM `$table` WHERE alias='$alias'";
    $query = mysqli_query($conn, $sql) or die(mysqli_error());
    $data = NULL;
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        mysqli_free_result($query);
    }
    return $data;
}

function Selecct_a_record($table, $options = array(), $select = '*')
{
    $conn = $GLOBALS["conn"];
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';

    $sql = "SELECT $select FROM `$table` $where $order_by $limit";
    $query = mysqli_query($conn, $sql) or die(mysqli_error());

    $data = NULL;
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        mysqli_free_result($query);
    }
    return $data;
}

function get_all($table, $options = array())
{
    $conn = $GLOBALS["conn"];
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
    $sql = "SELECT $select FROM $table $where $order_by $limit";
    $query = mysqli_query($conn, $sql) or die(mysqli_error());

    $data = array();
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        mysqli_free_result($query);
    }

    return $data;
}

function get_total($table, $options = array())
{
    $conn = $GLOBALS["conn"];
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $sql = "SELECT COUNT(*) as total FROM `$table` $where";
    $query = mysqli_query($conn, $sql) or die(mysqli_error());
    $row = mysqli_fetch_assoc($query);
    return $row['total'];
}

function getRealIpAddr()
{
    $count_file = fopen("counter.txt", "r") or die("Unable to open file!");
    $count_visiter = print_r(fgets($count_file));
    fclose($count_file);
    return $count_visiter;
}

function get_time($timePost, $timeReply)
{

    $datePost = date_parse_from_format('Y:m:d H:i:s', $timePost);
    $dateReply = date_parse_from_format('Y:m:d H:i:s', $timeReply);

    $tsPost = mktime($datePost['hour'], $datePost['minute'], $datePost['second'], $datePost['month'], $datePost['day'], $datePost['year']);
    $tsReply = mktime($dateReply['hour'], $dateReply['minute'], $dateReply['second'], $dateReply['month'], $dateReply['day'], $dateReply['year']);
    $distance = $tsReply - $tsPost;

    switch ($distance) {
        case ($distance < 60):
            $result = ($distance == 1) ? $distance . ' second ago' : $distance . ' seconds ago';
            break;
        case ($distance >= 60 && $distance < 3600):
            $minute = round($distance / 60);
            $result = ($minute == 1) ? $minute . ' minute ago' : $minute . ' minutes ago';
            break;
        case ($distance >= 3600 && $distance < 86400):
            $hour = round($distance / 3600);
            $result = ($hour == 1) ? $hour . ' hour ago' : $hour . ' hours ago';
            break;
        case (round($distance / 86400) == 1):
            $result = 'Yesterday at ' . date('H:i:s', $tsReply);
            break;
        default:
            $result = date('d/m/Y \a\t H:i:s', $tsPost);
            break;
    }
    return $result;
}

function get_select_nested($sql)// select lồng
{
    $conn = $GLOBALS["conn"];
    $query = mysqli_query($conn, $sql) or die(mysqli_error());

    $data = array();
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        mysqli_free_result($query);
    }

    return $data;
}

function insert($table, $data = array())
{
    $conn = connectDB();
    $values = array();
    foreach ($data as $key => $value) {
        $value = mysqli_real_escape_string($conn, $value);
        $values[] = "`$key`='$value'";
    }
    $sql = "INSERT INTO `$table` SET " . implode(',', $values);

    if (mysqli_query($conn, $sql) or die(mysqli_error())) {
        $id = mysqli_insert_id($conn);
        return $id;
    } else {
        return 0;
    }
}

function update($table, $data = array(), $where)
{
    $conn = connectDB();
    $values = array();
    foreach ($data as $key => $value) {
        $value = mysqli_real_escape_string($conn, $value);
        $values[] = "`$key`='$value'";
    }
    $sql = "UPDATE `$table` SET " . implode(',', $values) . " WHERE " . $where;

    if (mysqli_query($conn, $sql) or die(mysqli_error())) {
        return 1;
    } else {
        return 0;
    }
}

function select($sql)
{
    $conn = connectDB();
    $query = mysqli_query($conn, $sql) or die(mysqli_error());

    $data = array();
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        mysqli_free_result($query);
    }

    return $data;
}

function select_1_record($sql)
{
    $conn = connectDB();
    $query = mysqli_query($conn, $sql) or die(mysqli_error());
    $data = NULL;
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        mysqli_free_result($query);
    }
    return $data;
}

function delete($table, $where)
{
    $conn = connectDB();
    $sql = "DELETE FROM `$table` WHERE " . $where;
    mysqli_query($conn, $sql) or die(mysqli_error());
}