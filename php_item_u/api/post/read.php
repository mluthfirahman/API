<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    //instantiate blog post objext
    $post = new Post($db);

    //Post query
    $result = $post->read();
    //get row count
    $num = $result->rowCount();

    //check if any posts
    if($num > 0){
        //post array
        $post_arr = array();
        $post_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $post_item = array(
                'id' => $id,
                'category_id' => $category_id,
                'category_name' => $category_name,
                'item_name' => $item_name,
                'stock' => $stock
            );

            //push to "data"
            array_push($post_arr['data'], $post_item);
        }

        //turn tp json & output
        echo json_encode($post_arr);
    }else{
        echo json_encode(
            array('message' => 'No Posts Found')
        );
    }
