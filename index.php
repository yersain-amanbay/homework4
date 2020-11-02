<?php
require_once 'vendor/autoload.php';
require_once 'db.conf.php';

$row = (isset($_POST['row'])) ? $_POST['row'] : 0;
$products= [];

$count = $db->query('select count(*) from `goods` ')->fetchColumn();
$result = $db->query("SELECT id, nameFull, price, param, bigPhoto FROM `goods` ORDER BY id ASC LIMIT $row, 5");
if($db->errorCode() != 0000)
    echo "SQL ERROR: " . $db->errorInfo()[2];


while($row = $result->fetch()) {
    array_push($products, array(
        "id" => $row['id'],
        "name" => $row['nameFull'],
        "price" => $row['price'],
        "param" => $row['param'],
        "img" => $row['bigPhoto'],
        'count' => $count
    ));
}



try {
    $loader = new Twig\Loader\FilesystemLoader('templates');
    $twig = new Twig\Environment($loader);

    if(isset($_POST['row'])){
        $template2 = $twig->load('products.html.twig');
        echo $template2->render(array('products' => $products));
    }else{
        $template = $twig->load('main.html.twig');
        echo $template->render(array('products' => $products));
    }

}catch (Exception $e){die("Error: ". $e->getMessage());}





