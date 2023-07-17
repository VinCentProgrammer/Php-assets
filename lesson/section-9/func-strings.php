<?php
#strlen
// $fullname = "Ha Van Dung";
// echo strlen($fullname); //11
// $fullname = "Hà Văn Dũng";
// echo strlen($fullname); //14

#ucfirst - ucwords
// $str = "dung";
// // echo ucfirst($str);
// $fullname = "ha van dung";
// echo ucwords($fullname);

#trim

// $fullname = '      Hà            Văn            Dũng         ';
// echo trim($fullname);

#str_repeat

// $str = '==';
// echo str_repeat($str, 5);
// echo 'Function String In Php';
// echo str_repeat($str, 5);


#md5

// $password = 'dungken2112';
// // echo md5($password);

#join

// $my_fullname = ['Ha', 'Van', 'Dung'];

// $fullname = join(' ', $my_fullname);
// echo $fullname;

#implode

// $my_fullname = ['Ha', 'Van', 'Dung'];

// $fullname = implode(' ', $my_fullname);
// echo $fullname;

#explode

// $pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
// $pieces = explode(" ", $pizza);
// print_r($pieces);
// print_r($pieces[0]);
// print_r($pieces[5]);

#htmlspecialchars
// echo "<a href='test'>Test</a>";
// $new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
// echo $new;

echo htmlspecialchars("<script> alert('ok') </script>");

?>