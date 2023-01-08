<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/Cart.php');

    $db = new Database();
    $connect = $db->connect();

    $order_detail = new Cart($connect);
    $result = $order_detail->read();

    $order_array = [];
    $order_array['data'] = [];

    foreach($result as $row) {
        extract($row);

        $order_item = array(
            'id' => $id,
            'user_id' => $user_id,
            'cart_id' => $cart_id,
        );

        array_push($order_array['data'], $order_item);
    }

    echo json_encode($order_array, JSON_PRETTY_PRINT);
?>