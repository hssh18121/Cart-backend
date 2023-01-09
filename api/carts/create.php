<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request With');

    include_once('../../config/db.php');
    include_once('../../model/Cart.php');

    $db = new Database();
    $connect = $db->connect();

    $cart = new Cart($connect);
    
    $data = json_decode(file_get_contents("php://input"));
    // echo $data;

    $cart->user_id = $data->user_id;
    $cart->cart_id = $data->user_id;

    if ($cart->create()) {
        echo json_encode(array('messege', 'cart created'));
    } else {
        echo json_encode(array('messege', 'cart not created'));
    }

    echo json_encode($cart, JSON_PRETTY_PRINT);
?>