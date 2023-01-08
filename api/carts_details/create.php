<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request With');

    include_once('../../config/db.php');
    include_once('../../model/CartDetails.php');

    $db = new Database();
    $connect = $db->connect();

    $cart_details = new CartDetail($connect);
    
    $data = json_decode(file_get_contents("php://input"));
    // echo $data;

    $cart_details->cart_id = $data->cart_id;
    $cart_details->product_id = $data->product_id;
    $cart_details->quantity = $data->quantity;

    if ($cart_details->create()) {
        echo json_encode(array('messege', 'cart detail created'));
    } else {
        echo json_encode(array('messege', 'cart detail not created'));
    }

    echo json_encode($cart_details, JSON_PRETTY_PRINT);
?>