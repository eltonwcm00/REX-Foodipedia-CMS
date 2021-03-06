<?php
//WORKING - Xavier
//fetch.php

include('../db-connect.php');

/*if(isset($_REQUEST["access"])){
    $name = $_REQUEST["access"];

    $result = mysqli_query($connect, "SELECT username from staff_acc WHERE hashed = '$name'");
    $staff_username1 = mysqli_fetch_assoc($result);
    
}*/

//$staff_username = $staff_username1["username"];

$column = array("dish_id", "dish_name", "cloudinary_link", "description", "stock_qty", "stock_qty", "deleted_menu");

$query = "SELECT * FROM menu";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE dish_id LIKE "%'.$_POST["search"]["value"].'%"
 OR dish_name LIKE "%'.$_POST["search"]["value"].'%"
 OR cloudinary_link LIKE "%'.$_POST["search"]["value"].'%"
 OR description LIKE "%'.$_POST["search"]["value"].'%"
 OR stock_qty LIKE "%'.$_POST["search"]["value"].'%"
 OR price LIKE "%'.$_POST["search"]["value"].'%"
 OR deleted_menu LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY deleted_menu DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connectings->prepare($query);
$statement->execute();
$number_filter_row = $statement->rowCount();
$statement = $connectings->prepare($query . $query1);
$statement->execute();
$result = $statement->fetchAll();
$data = array();


foreach($result as $row)
{
    /*if(($row['menu_random']) == 0){
        $menu_random_output = "No";
    }else if(($row['menu_random']) == 1){
        $menu_random_output = "Yes";
    }else{
        $menu_random_output = "No Data";
    }*/
 $sub_array = array();
 $sub_array[] = $row['dish_id'];
 $sub_array[] = $row['dish_name'];
 $sub_array[] = $row['cloudinary_link'];
 $sub_array[] = $row['description'];
 $sub_array[] = $row['stock_qty'];
 $sub_array[] = $row['price'];
 $sub_array[] = $row['deleted_menu'];
 //$sub_array[] = $menu_random_output;
 $data[] = $sub_array;
}
//"dish_name", "dish_id", "price", "picture", "description", "stock_qty", "deleted_menu", "menu_random"
function count_all_data($connectings)
{
 $query = "SELECT * FROM menu";
 $statement = $connectings->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connectings),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>
