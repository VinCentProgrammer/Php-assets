<?php
function get_header($mod = 'home'){
    if($mod == 'home'){
        $path_header = 'inc/header.php';
    }else{
        $path_header = "inc/header-{$mod}.php";
    }

    if(file_exists($path_header))
        require $path_header;
    else 
        echo "Không tồn tại đường dẫn {$path_header}";
}

function get_footer(){
    $path_footer = 'inc/footer.php';
    if(file_exists($path_footer))
        require $path_footer;
    else 
        echo "Không tồn tại đường dẫn {$path_footer}";
}

function get_sidebar(){
    $path_sidebar = 'inc/sidebar.php';
    if(file_exists($path_sidebar))
        require $path_sidebar;
    else 
        echo "Không tồn tại đường dẫn {$path_sidebar}";
}

function get_404(){
    $path_404 = 'inc/404.php';
    if(file_exists($path_404))
        require $path_404;
    else
        echo "Không tồn tại đường dẫn {$path_404}";
}


?>