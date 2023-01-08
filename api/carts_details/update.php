<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PATCH');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request With');

    include_once('../../config/db.php');
    include_once('../../model/CartDetails.php');


    $db = new Database();
    $connect = $db->connect();

    $cart = new CartDetail($connect);
    
    $data = json_decode(file_get_contents("php://input"));

    $cart->cart_id = $data->cart_id;
    $cart->product_id = $data->product_id;
    $cart->quantity = $data->quantity;
    $cart->last_updated = date("Y-m-d");

    if ($cart->update()) {
        echo json_encode(array('messege', 'Update successful'));
    } else {
        echo json_encode(array('messege', 'Update failed'));
    }

    echo json_encode($cart, JSON_PRETTY_PRINT);
?>