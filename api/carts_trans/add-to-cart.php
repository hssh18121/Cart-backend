<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request With');

    include_once('../../config/db.php');
    include_once('../../model/Cart.php');
    include_once('../../model/CartDetails.php');

    $db = new Database();
    $connect = $db->connect();

    $cart = new Cart($connect);
    $cart_detail = new CartDetail($connect);
    
    $data = json_decode(file_get_contents("php://input"));

    $cart->user_id = $data->user_id;

    if ($cart->add_to_cart() == 0) {
        $cart->cart_id = $data->user_id;

        $cart->create();
    } 
    
    $cart_detail->cart_id = $data->user_id;
    $cart_detail->product_id = $data->product_id;
    $cart_detail->quantity = $data->quantity;

    if ($cart_detail->create()) {
        echo json_encode(array('messege', 'Add to cart successful'));
    } else {
        echo json_encode(array('messege', 'Add to cart fail'));
    }
?>