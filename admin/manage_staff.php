<?php
require 'database.php';  // include your database connection

$id = $_POST['id'];
$action = $_POST['action'];

$response = array('success' => false, 'message' => 'An error occurred.');

if ($action == 'delete') {
    $stmt = $connect->prepare("UPDATE admin SET status = 'inactive' WHERE id = ?");
    $stmt->bind_param("i", $id);
} elseif ($action == 'activate') {
    $stmt = $connect->prepare("UPDATE admin SET status = 'active' WHERE id = ?");
    $stmt->bind_param("i", $id);
}

if ($stmt->execute()) {
    $response['success'] = true;
    $response['message'] = ucfirst($action) . "d successfully.";
} else {
    $response['message'] = "Error while trying to " . $action . " staff.";
}

$stmt->close();
$connect->close();

echo json_encode($response);
?>
