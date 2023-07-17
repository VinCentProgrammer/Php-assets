<?php
function construct()
{
    load_model('index');
}

function indexAction()
{
    $posts = get_posts();
    $data['posts'] = $posts;
    load_view('index', $data);
}

function detailAction()
{
    $id = (int)$_GET['id'];
    $post = get_post_by_id($id);
    $data['post'] = $post;
    load_view('detail', $data);
}
