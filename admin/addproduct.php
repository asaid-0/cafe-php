<?php
require_once("../database/database.inc.php");
require_once("../models/products.php");

$product = new Products();

?>

<?php
 if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // $file_ext;	#to be used in uploading image to folder function
      $name = $_POST['name'];
      $price = $_POST['price'];
      $file_info = $_FILES['file'];
      $file_name = $file_info['name'];
      $file_size = $file_info['size'];
      $file_tmp = $file_info['tmp_name'];
      $file_type = $file_info['type'];
    
      if($name == "")
          $errors["name"] = "Name field is required.<br>";

      if(!empty($file_name)) {
          $extens = explode('.', $file_name);
          $file_ext = strtolower(end($extens));
          $extensions = array("jpeg", "jpg", "png");
      
          if(in_array($file_ext, $extensions) === false){
              $errors["file"] = "extension not allowed, please choose a JPEG, JPG or PNG file.";
          } 
      }
      else {
          $errors["file"] = "No Photos uploaded.<br>";
  }

/*******************Data is validated and ready for insertion*******************/

  if(empty($errors)) {
    
    $pic_name = "../assets/images/"."product_".$name."_".time().".".$file_ext;
    move_uploaded_file($file_tmp, $pic_name);

    if(isset($_POST['cat_id']) && !empty($_POST['cat_id'])){
      $category = $_POST['cat_id'];
      $product->addProduct($category, $name, $price, $pic_name, false);
    }else{
      $category = $_POST['cat_name'];
      $product->addProduct($category, $name, $price, $pic_name, true);
      
    }
  }
  else {
    error_log(print_r($errors, TRUE)); 
    $_SESSION['errors'] = $errors;
    #handling validation errors
    /*foreach($errors as $error) {
      echo $error;
    }*/
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/add.css">
        <link rel="stylesheet" href="../assets/css/style.css">
   


</head>
<body>
    <nav class="navbar">
        <ul class="menu-left">
            <li><a href="#" class="logo">OS Coffee</a></li>
            <li><a href="#" class="active">Products</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Manual Order</a></li>
            <li><a href="#">Checks</a></li>
        </ul>
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Admin Dashboard</span>
        </a>
    </nav>
    <section>
        <div class="add-container">
            <div class="main-title">Add Product</div>
            <div id='form' class='_form'>
                <form action='' method='POST' enctype="multipart/form-data" name='addProduct'>
              
                  <fieldset>
                    <legend>NAME</legend>
                    <input type='text' name='name' placeholder='Name' />
                  </fieldset>

                  <fieldset>
                    <legend>PRICE</legend>
                    <input type='text' name='price' placeholder='0.00' />
                  </fieldset>
              
                  <fieldset id="new_cat">
                    <legend>NEW CATEGORY</legend>
                    <input type='text' name='cat_name' placeholder='Category Name' />
                  </fieldset>

                  <fieldset id="select-menu">
                    <legend class="category">CATEGORY</legend>
                    <span onclick="newCategory();" class="new-cat">new category</span>
                    <label class='input-select'>
                        <select name='cat_id'>
                          <option selected='selected'>- Select -</option>
                          <option value='1'>Hot Drinks</option>
                          <option value='2'>Soft Drinks</option>
                          <option value='3'>Juice</option>
                        </select>
                      </label>
                  </fieldset>

           


                  <fieldset>
                    <legend>PRODUCT PICTURE</legend>
                    <label for="file" class="file-upload">
                      <span class="fa fa-cloud-upload"><span> Upload
                    </label>
                    <input type='file' name='file' id="file" />
                   
                    
                  </fieldset>
              
              
                  <input type='submit' name='submit' value='Add' />
                </form>
              </div>
        </div>
    </section>
    <script type="text/javascript">
        function newCategory(){
            // console.log("test");
            document.getElementById('select-menu').remove();
            document.getElementById('new_cat').style.display = "block";
        }

    </script>
</body>
</html>