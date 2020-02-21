<?php

    try {
        $dsn = 'mysql:dbname=cafe;host=localhost;port=3306;';
        $user = 'macrina';
        $pass = 'ROOT';

        $id = $_GET['num'];
        $result = $_GET['result'];
        /*$error;

        if($result == 'ext')
            $error = 'Wrong photo extension!';
        elseif($result == 'empty')
            $error = 'Some fields are empty, please complete the form to update your data.';
        else
            $error = '';*/

        $con = new \PDO($dsn, $user, $pass);

        $query = "SELECT * FROM users WHERE id=?";
        $stmt = $con->prepare($query);
        $stmt->execute([$id]);

        $row = $stmt->fetch();
        $con = null;
        
       // var_dump($_SESSION);
    }  catch (\Throwable $th) {
        echo "Connection Error"."<br>"."<br>";
    }
    
?>

<form action="update_action.php" method="post" enctype="multipart/form-data">
    <p><?php echo $error; ?></p>
    <input type="hidden" name="id" id="id" value="<?php echo $row['id']?>">
	<input type="text" name="name" id="name" value="<?php echo $row['name']?>">
    <br><br>
    <input type="text" name="email" id="email" value="<?php echo $row['email']?>">
    <br><br>
    <input type="text" name="password" id="password" value="<?php echo $row['password']?>">
    <br><br>
    <input type="text" name="ext" id="ext" value="<?php echo $row['ext']?>">
    <br><br>
    <select id="room" name="room">
        <option value="" selected="selected"></option>
        <option value="application"> Application </option>
        <option value="main"> Main </option>
        <option value="cloud"> Cloud </option>
    </select>
    <br><br>
    <input type="file" name="photo" id="photo" value="<?php echo $row['pic']?>">
    <br><br>
    <input type="submit" value="Update">
</form>