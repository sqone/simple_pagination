<?php

$conn = mysqli_connect('localhost', 'root', '', 'infinite_scroll');

$page = 5 * (int)@$_GET['page'];
$limit = 5;
$query = mysqli_query($conn, "select * from tb_content limit ".$page.", ".$limit);

$result = array();
while ($data = mysqli_fetch_array($query)) {
	array_push($result, array(
		'id' => $data['id'],
		'title' => $data['title'],
		'content' => $data['content']
	));
}

header('Content-type: application/json;');
echo json_encode($result);