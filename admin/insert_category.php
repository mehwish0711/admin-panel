<?php
// insertions.php
include 'config.php'; 

if(isset($_POST["add_category_item_btn"]))
{
    
    $category_name = $_POST["category_name"];
    $item_name = $_POST["item_name"];
    $category_type = $_POST["category_type"];

    
    


        $insert = "INSERT INTO `category`(`category`, `item`, `category_type`) VALUES ('$category_name','$item_name','$category_type')";
        $excec = mysqli_query($config,$insert);
        if($excec)
        {
            ?>
                <script>
                    alert("Deal has been Added");window.location.href = "add_category_restaurant.php";
                </script>
            <?php
        }
        else
        {
            echo mysqli_error($config);
        }
        
    }

?>
<!-- delete from//// add_reataurant_category//// mehwish-->

<?php
 include('config.php');
 if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql="DELETE  FROM category WHERE id ='{$id}' ";
    
    $query= mysqli_query($config,$sql);
    
    header("Location: add_category_restaurant.php");
    
    
    
    }


?>


