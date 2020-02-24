<?php
    include("user-functions.php");

        $id = $_GET['num'];
        $row = selectUser($id);
        
?>

<form action="update_action.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="<?php echo $row["id"]?>">
	<input type="text" name="name" id="name" value="<?php echo $row["name"]?>">
    <br><br>
    <input type="text" name="email" id="email" value="<?php echo $row["email"]?>">
    <br><br>
    <input type="text" name="password" id="password" value="<?php echo $row["password"]?>">
    <br><br>
    <input type="text" name="ext" id="ext" value="<?php echo $row["ext"]?>">
    <br><br>
    <input type="text" name="room" id="room" value="<?php echo $row["room"]?>">
    <br><br>
    <input type="file" name="photo" id="photo">
    <br><br>
    <input type="submit" value="Update">
</form>