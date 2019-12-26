<?php
$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
$searchTerm = strtoupper($_GET['searchTerm']);
if(!$sidx) $sidx =1;
if ($searchTerm=="") {
	$searchTerm="%";
} else {
	$searchTerm = "%" . $searchTerm . "%";
}

require_once("../dbConnect.php");
$db = new DBController();
$sql = "SELECT g.*, s.`name` as sizename FROM goods g
	LEFT JOIN size s ON s.id = g.sizeid WHERE upper(g.name) like '$searchTerm'";
$count = $db->numRows($sql);

if( $count >0 ) {
	$total_pages = ceil($count/$limit);
} else {
	$total_pages = 0;
}
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit; // do not put $limit*($page - 1)
if($total_pages!=0) $SQL = "SELECT g.*, s.`name` as sizename FROM goods g
LEFT JOIN size s ON s.id = g.sizeid WHERE upper(g.name) like '$searchTerm'  ORDER BY $sidx $sord LIMIT $start , $limit";
else $SQL = "SELECT g.*, s.`name` as sizename FROM goods g
LEFT JOIN size s ON s.id = g.sizeid WHERE upper(g.name) like '$searchTerm'  ORDER BY $sidx $sord";
$result = $db->get_select_nested($SQL);
class reponse{}
$response = new reponse();
$response->page = $page;
$response->total = $total_pages;
$response->records = $count;
$response->rows = $result;
echo json_encode($response);

?>
