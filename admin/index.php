<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin-home.css">

</head>
<body>
    <nav class="navbar">
        <ul class="menu-left">
            <li><a href="#" class="logo">OS Coffee</a></li>
            <li><a href="#">Products</a></li>
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

            <div class="cart">
                <form action="">
                    <ul class="drinks-list">
                        <li>
                            <span class="name">Tea </span>
                            <span class="quantity">5</span>
                            <i class="fa fa-plus"></i>
                            <i class="fa fa-minus"></i>
                            <span class="price"> EGP 25</span>
                            <i class="fa fa-close"></i>
                            <input type="text" name="drink_name" hidden>
                            <input type="text" name="drink_quantity" hidden>
                        </li>
                        <hr>
                        <li>
                            <span class="name">Tea </span>
                            <span class="quantity">5</span>
                            <i class="fa fa-plus"></i>
                            <i class="fa fa-minus"></i>
                            <span class="price"> EGP 25</span>
                            <i class="fa fa-close"></i>
                            <input type="text" name="drink_name" hidden>
                            <input type="text" name="drink_quantity" hidden>
                        </li>
                        <hr>
                        <li>
                            <span class="name">Tea </span>
                            <span class="quantity">5</span>
                            <i class="fa fa-plus"></i>
                            <i class="fa fa-minus"></i>
                            <span class="price"> EGP 25</span>
                            <i class="fa fa-close"></i>
                            <input type="text" name="drink_name" hidden>
                            <input type="text" name="drink_quantity" hidden>
                        </li>
                        <hr>
                        <li>
                            <span class="name">Tea </span>
                            <span class="quantity">5</span>
                            <i class="fa fa-plus"></i>
                            <i class="fa fa-minus"></i>
                            <span class="price"> EGP 25</span>
                            <i class="fa fa-close"></i>
                            <input type="text" name="drink_name" hidden>
                            <input type="text" name="drink_quantity" hidden>
                        </li>

                    </ul>

                    <div class="notes">
                        <label for="notes">Notes</label>
                        <textarea name="notes" id="notes" cols="30" rows="5"></textarea>
                    </div>
                    <div class="room">
                        <label for="room">Room</label>
                        <select name="room" id="room">
                            <option value="combobox">ComboBox</option>
                            <option value="combobox">ComboBox</option>
                            <option value="combobox">ComboBox</option>
                        </select>
                    </div>
                    <hr>
                    <div class="confirm">
                        <span>EGP 55 </span>
                        <input type="submit" value="confirm" class="btn btn-confirm">
                    </div>
                </form>
            </div>
            <div class="content">
                <form action="">
                    <!-- <div class="search-group">
                        <input type="text" class="search-input" placeholder="search...">
                        <button type="submit" class="search-btn"><i class="fa fa-search search-icon"></i></button>
                    </div> -->
                    <div class="room">
                        <label for="room">Add To User</label>
                        <select name="room" id="room">
                            <option value="combobox">User1</option>
                            <option value="combobox">User2</option>
                            <option value="combobox">User3</option>
                        </select>
                    </div>
                </form>
                <div class="items">

                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2>Tea</h2>
                            <p>Price: <em>$9</em>
                            </p>
                        </div>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>
                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2>Tea</h2>
                            <p>Price: <em>$9</em>
                            </p>
                        </div>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>
                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2>Tea</h2>
                            <p>Price: <em>$9</em>
                            </p>
                        </div>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>
                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2>Tea</h2>
                            <p>Price: <em>$9</em>
                            </p>
                        </div>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>
                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2>Tea</h2>
                            <p>Price: <em>$9</em>
                            </p>
                        </div>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>
                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2>Tea</h2>
                            <p>Price: <em>$9</em>
                            </p>
                        </div>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>
                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2>Tea</h2>
                            <p>Price: <em>$9</em>
                            </p>
                        </div>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>
                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <div class="item-details">
                            <h2>Tea</h2>
                            <p>Price: <em>$9</em>
                            </p>
                        </div>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>
                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <h2>Tea</h2>

                        <p>Price: <em>$9</em>
                        </p>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>
                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <h2>Tea</h2>

                        <p>Price: <em>$9</em>
                        </p>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>
                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <h2>Tea</h2>

                        <p>Price: <em>$9</em>
                        </p>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>
                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <h2>Tea</h2>

                        <p>Price: <em>$9</em>
                        </p>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>
                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <h2>Tea</h2>

                        <p>Price: <em>$9</em>
                        </p>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>
                    <div class="item">
                        <img src="../assets/images/tea.jpg" alt="tea" />
                        <h2>Tea</h2>

                        <p>Price: <em>$9</em>
                        </p>
                        <button class="add-to-cart" type="button">Add to cart</button>
                    </div>

                </div>
            </div>

        </div>
    </section>
</body>
</html>