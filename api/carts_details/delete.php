<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request With');

    include_once('../../config/db.php');
    include_once('../../model/CartDetails.php');


    $db = new Database();
    $connect = $db->connect();

    $cart = new CartDetail($connect);
    
    $data = json_decode(file_get_contents("php://input"));

    $cart->cart_id = $data->cart_id;
    $cart->product_id = $data->product_id;

    if ($cart->delete()) {
        echo json_encode(array('messege', 'Delete successful'));
    } else {
        echo json_encode(array('messege', 'Delete failed'));
    }

    echo json_encode($cart_array, JSON_PRETTY_PRINT);
?>