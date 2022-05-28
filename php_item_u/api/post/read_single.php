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

    //Get ID
    $post->id = isset($_GET['id']) ? $_GET['id'] : die();

    //Get post
    $post->read_single();

    //Create Array
    $post_array = array(
        'id' => $post->id,
        'category_id' => $post->category_id,
        'category_name' => $post->category_name,
        'item_name' => $post->item_name,
        'stock' => $post->stock
    );
    
    print_r(json_encode($post_array));