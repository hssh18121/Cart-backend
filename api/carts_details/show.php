<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request With');

    include_once('../../config/db.php');
    include_once('../../model/CartDetails.php');

    $db = new Database();
    $connect = $db->connect();

    $cart = new CartDetail($connect);

    // $data = json_decode(file_get_contents("php://input"));
    
    $cart->cart_id = $_GET['cart_id'];
    
    $result = $cart->show();

    $product_array = [];
    $product_array['data'] = [];

    foreach($result as $row) {
        extract($row);

        $product_item = array(
            'cart_id' => $cart_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'created_at' => $created_at,
            'last_updated' => $last_updated
        );

        array_push($product_array['data'], $product_item);
    }

    echo json_encode($product_array, JSON_PRETTY_PRINT);
?>