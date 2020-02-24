<?php
    session_start();
    if(!isset($_SESSION['id']))
        header("location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OS Cafe - Home</title>
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <nav class="navbar">
        <ul class="menu-left">
            <li><a href="#" class="logo">OS Coffee</a></li>
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">My Orders</a></li>
        </ul>

        <a href="#">
            <i class="fa fa-user"></i>
            <span>Islam Abdelhamid</span>
        </a>
    </nav>




    <?php if (isset($_SESSION['flash'])) : ?>
        <div class="success-message">
            <p>Order Created Successfully !!!</p>
        </div>
    <?php endif;
    unset($_SESSION['flash']); ?>


    <section>
        <div class="container">
            <div class="cart">
                <form action="make_order.php" method="POST" id="make_order">
                    <ul class="drinks-list">
                        <li class="hidden-item">
                            <span class="name"> </span>
                            <span class="quantity">0</span>
                            <i class="fa fa-plus"></i>
                            <i class="fa fa-minus"></i>
                            <span class="price">0</span>
                            <i class="fa fa-close"></i>
                            <input type="text" class="di-id" name="drink_id[]" hidden>
                            <input type="text" class="di-quantity" name="drink_quantity[]" hidden required>
                        </li>
                    </ul>

                    <div class="notes">
                        <label for="notes">Notes</label>
                        <textarea name="notes" id="notes" placeholder="do you have any comment?" rows="5"></textarea>
                    </div>
                    <div class="room">
                        <label for="room">Room</label>
                        <select name="room" id="room" required>
                            <option value="room 1">Room 1</option>
                            <option value="room 2">Room 2</option>
                            <option value="room 3">Room 3</option>
                        </select>
                    </div>
                    <hr>
                    <div class="confirm">
                        <span class="total-price"></span>
                        <input type="submit" value="confirm" name="confirm" class="btn btn-confirm" id="confirm-btn">
                    </div>
                </form>
            </div>
            <div class="content">
                <form action="">
                    <div class="search-group">
                        <input type="text" class="search-input" placeholder="search...">
                        <button type="submit" class="search-btn"><i class="fa fa-search search-icon"></i></button>
                    </div>
                </form>
                <div class="items">

                    <div class="item" id="1">
                        <img src="assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2 class="item-name">Tea</h2>
                            <p>Price: <em class="item-price">9 EGP</em>
                            </p>
                        </div>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>

                    <div class="item" id="2">
                        <img src="assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2 class="item-name">Mint</h2>
                            <p>Price: <em class="item-price">9 EGP</em>
                            </p>
                        </div>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>

                    <div class="item" id="3">
                        <img src="assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2 class="item-name">Cafe</h2>
                            <p>Price: <em class="item-price">9 EGP</em>
                            </p>
                        </div>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>

                </div>
            </div>

        </div>
    </section>


    <script src="assets/javascript/cart.js"></script>
</body>

</html>
