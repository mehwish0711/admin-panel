<?php
include('config.php');

     
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>update</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.0.2/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.2.0/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.11.2/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    </head>
    <body>

      <!-- update query dev mehwish-->
    <div class="container mt-5">
    <?php
                include("config.php");

                if(isset($_GET['id'])){
                $id = $_GET['id'];

                $result = mysqli_query($config, "SELECT id,category,item FROM category WHERE id ='{$id}' ");  
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)){ 
              
                  
            ?>
        <h2>UPDATE FORM</h2>
     
        <form action="#" method="post">
         
            <!-- ID Field -->
            <div class="mb-3">
                
                <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                
              
            </div>

            <!--category Field -->
            <div class="mb-3 col-md-4">
                <label for="name" class="form-label">CATEGORY</label>
                <input type="text" class="form-control" id="name" value="<?php echo $row['category'];?>"name="cate" >
               
            </div>

            <!-- item Field -->
            <div class="mb-3 col-md-4">
                <label for="type" class="form-label">ITEM</label>
                <input type="text" class="form-control" id="type"name="item" value="<?php echo $row['item'];?>" >
               
            </div>

            <!-- Category-type Field -->
             
            <div class="mb-3 col-md-4">
            <label for="category" class="form-label"> Category Type</label>
            <select name="cate_type"  class="form-control" required>
            <option value="">Category Type</option>
            <?php         
$set = "SELECT DISTINCT category_type FROM category";
$record = mysqli_query($config,$set);
if(mysqli_num_rows($record) > 0){
    while($records=mysqli_fetch_assoc($record)){
        $item = $records['category_type'];
     

//echo "<option value='" . $records['category_type'] . "'>" .$records['category_type']. "</option>";
echo  "<option value='$item'>$item </option>";
    
         
       

  
    }


}
?>

</select>


            </div>  

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary"name="submit">Submit</button>
        </form>
        <?php } } }?>
    </div>
 
    

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

        
    </body>
    </html>

             <!--insert update query database --> 
    <?php
include("config.php");
if(isset($_POST['submit'])){
$id =$_POST['id'];
$category=$_POST['cate'];
$cate_type=$_POST['cate_type'];
$item=$_POST['item'];

$sql1="UPDATE category SET category ='{$category}', item ='{$item}' ,category_type ='{$cate_type}'
WHERE id = '{$id}'";

$query1= mysqli_query($config,$sql1);

header("Location: add_category_restaurant.php");



}
?>