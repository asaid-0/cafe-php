<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin All users</title>
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin-all-products.css">


</head>
<body>
    <nav class="navbar">
        <ul class="menu-left">
            <li><a href="#" class="logo">OS Coffee</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#" class="active">Users</a></li>
            <li><a href="#">Manual Order</a></li>
            <li><a href="#">Checks</a></li>
        </ul>
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Admin Dashboard</span>
        </a>
    </nav>
    <section>
        <div class="container">
            <header>
                <h2>All Users</h2>
                <a href="">Add user</a>
            </header>
            <div class="orders">
                <table class="orders-table">
                    <tr>
                        <th>Name</th>
                        <th>Room</th>
                        <th>Image</th>
                        <th>Ext.</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td>3001</td>
                        <td>
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        </td>
                        <td>1111</td>
                        <td>
                            <a href="">edit</a>
                            <a href="">delete</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</body>
</html>