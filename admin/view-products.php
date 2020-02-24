<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin All products</title>
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
        <div class="container">
            <header>
                <h2>All Products</h2>
                <a href="">Add product</a>
            </header>
            <div class="items">
                    <div class="item" id="1">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2 class="item-name">Tea</h2>
                            <p>Price: <em class="item-price">9 EGP</em>
                            </p>
                        </div>
                        <div class="action">
                            <button class="add-to-cart" type="button">Available</button>
                            <button class="add-to-cart" type="button">Edit</button>
                            <button class="add-to-cart" type="button">Delete</button>
                        </div>
                    </div>
                    <div class="item" id="1">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2 class="item-name">Mint</h2>
                            <p>Price: <em class="item-price">9 EGP</em>
                            </p>
                        </div>
                        <div class="action">
                            <button class="add-to-cart" type="button">Available</button>
                            <button class="add-to-cart" type="button">Edit</button>
                            <button class="add-to-cart" type="button">Delete</button>
                        </div>
                    </div>
                    <div class="item" id="1">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2 class="item-name">Cafe</h2>
                            <p>Price: <em class="item-price">9 EGP</em>
                            </p>
                        </div>
                        <div class="action">
                            <button class="add-to-cart" type="button">Available</button>
                            <button class="add-to-cart" type="button">Edit</button>
                            <button class="add-to-cart" type="button">Delete</button>
                        </div>
                    </div>
            </div>
        </div>
    </section>
</body>
</html>