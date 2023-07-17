<?php

if(isset($_POST['btn_reg'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    if(isset($_POST['rules'])){
        $rules = $_POST['rules'];
        echo $rules;
    }else 
        echo "Bạn cần đọc và xác nhận điều khoản!";
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhận dữ liệu từ checkbox</title>
</head>
<body>
    <p style="width: 200px; height: 100px; overflow: auto;">Lorem ipsum dolor sit amet consectetur adipisicing elit. At assumenda perspiciatis placeat voluptates, vitae molestias totam mollitia dolor perferendis tenetur corrupti accusamus quod, molestiae, aspernatur commodi. Maxime quod quibusdam autem laborum obcaecati, debitis, accusamus esse labore quam sint excepturi. Quasi labore, ducimus magni dolorem temporibus quidem nisi accusamus neque ipsam voluptate saepe modi incidunt eos placeat. Magni adipisci at quam maxime, quas vero voluptatibus aliquam veritatis eveniet cupiditate facilis. Dolor delectus sunt necessitatibus nisi in, sit quaerat qui error earum vitae? Libero animi, iste dolorem ipsum quasi asperiores eum ducimus id. Doloremque consectetur rerum vel aut. Ratione necessitatibus non quod dignissimos explicabo ipsa consequatur delectus quisquam nostrum iusto iure sint asperiores, cumque tenetur quo nisi ab neque eligendi error. Provident voluptatibus dolores nam repellat, quia corporis officiis a consequuntur? Debitis voluptatem reprehenderit deleniti commodi nobis vitae, nesciunt amet tempora culpa reiciendis. Ullam accusamus vitae officia unde atque dolorem iusto aperiam a odit debitis deserunt repudiandae, cum quaerat saepe inventore voluptatibus eius ducimus sed eaque! Rem at sed veritatis commodi possimus? Iste similique molestias quos accusamus consequatur porro animi officiis accusantium odio fugiat, consequuntur nemo incidunt impedit, repellat repudiandae ut, quas deleniti maiores. Cumque ipsum maxime vero odit soluta voluptates consequatur!</p>
    <form action="" method="POST">
        <input type="checkbox" name="rules" id="rules" value = "yes">
        <label for="rules">Đồng ý</label><br><br>
        <input type="submit" value="Regiter" name="btn_reg">
    </form>
</body>
</html>