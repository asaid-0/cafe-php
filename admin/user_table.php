<table border="5" cellpadding="10">
<tr>
    <td>Name</td>
    <td>Email</td>
    <td>Password</td>
    <td>Ext</td>
    <td>Room</td>
    <td>Path To Image</td>
</tr>
<?php
    include "../database/config.php";

    $dbServername = DB_HOST;
    $dbUsername = DB_USER;
    $dbPassword = DB_PWD;
    $dbname = DB_NAME;

    $dsn = 'mysql:host='.$dbServername.';dbname='.$dbname;
                
    $con;

    try {
        $con = new \PDO($dsn, $dbUsername, $dbPassword);

        $query = "SELECT * FROM users";
        $stmt = $con->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $id = $row['id'];
            echo "<tr><td>".$row['name']."</td> <td>".$row['email']."</td> <td>".$row['password']."</td> <td>".$row['ext']."</td> <td>".$row['room']."</td> <td>".$row['pic']."</td>";
            echo"<td><a href ='update_form.php?num=$id'>Update</a></td>";
            echo"<td><a href ='delete_action.php?num=$id'>Delete</a></td>";
            echo "</tr>";
        }
    } catch(\Throwable $th) {
        echo "Connection Error"."<br>"."<br>";
    }

    $con = null;
?>
</table>

<?php
	echo"<br> Do you want to add anothor user? <br>";
	echo"<a href='#'>Yes</a>";
?>