<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checks</title>
  <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  

  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/user-orders.css">
  <link rel="stylesheet" href="../assets/css/popup.css">
  <link rel="stylesheet" href="../assets/css/checks.css">



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
      <div class="main-title">Checks</div>
      <!-- start all hidden popup orders -->
      <div class="order" id="order_1">
        <div class="orderForm">
          <a href="#" class="fa fa-window-close"></a>
          <h1>order 1</h1>
          <div class="items">
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
        </div>
        </div>
        <a class="dimm-anchor" href="#"><div class="dimmed"></div></a>
      </div>

      <div class="order" id="order_2">
        <div class="orderForm">
          <a href="#" class="fa fa-window-close"></a>
          <h1>order 2</h1>
          <div class="items">
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
        </div>
        </div>
        <a class="dimm-anchor" href="#"><div class="dimmed"></div></a>
      </div>


      <div class="order" id="order_3">
        <div class="orderForm">
          <a href="#" class="fa fa-window-close"></a>
          <h1>order 3</h1>
          <div class="items">
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/tea.jpg" alt="tea" />
                <div class="item-details">
                    <h2>Tea</h2>
                    <p>Price: <em>$9</em>
                    </p>
                </div>
            </div>
        </div>
        </div>
        <a class="dimm-anchor" href="#"><div class="dimmed"></div></a>
      </div>

      <!-- end all hidden popup orders -->
      <form action="">
        <div class="search-group">
          <div>
            <label for="">Date from</label>
            <input type="date" class="search-input" placeholder="">
          </div>
          <div>
            <label for="">Date to</label>
            <input type="date" class="search-input" placeholder="Date to">
          </div>
          <div>
            <button type="submit" class="search-btn"><i class="fa fa-search search-icon"></i></button>
          </div>
        </div>
      </form>

      <div class="collapse-content">
        <div class="collapse" id="user_1">
          <a class="" href="#user_1"><i class="fa fa-user"></i> Ahmed Ahmed
            <span class="total">total: 1000</span>
          </a>
          <div class="container">
            <div class="content">
              <div class="orders">
                <table class="orders-table">
                  <tr>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    <td>Date</td>
                    <td>Out for delivery</td>
                    <td>50 EGP</td>
                    <td><a href="#"></a>Cancel <a href="#order_2">View</a></td>
                  </tr>
                  <tr>
                    <td>Date</td>
                    <td>Done</td>
                    <td>50 EGP</td>
                    <td><a href="#"></a>Cancel <a href="#order_3">View</a></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="collapse" id="user_2">
          <a href="#user_2"><i class="fa fa-user"></i> Ahmed Ahmed
            <span class="total">total: 1000</span>
          </a>
          <div class="content">
            <div class="inner-content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero
              nobis iusto deleniti corporis alias quo a quam similique cupiditate
              pariatur aliquid, omnis, officia dicta officiis impedit nisi dolores
              ut, distinctio placeat. Magni dolores perferendis ab laborum in
              neque, non exercitationem!
            </div>
          </div>
        </div>
        <div class="collapse" id="user_3">
          <a href="#user_3"><i class="fa fa-user"></i> Ahmed Ahmed
            <span class="total">total: 1000</span>
          </a>
          <div class="content">
            <div class="inner-content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero
              nobis iusto deleniti corporis alias quo a quam similique cupiditate
              pariatur aliquid, omnis, officia dicta officiis impedit nisi dolores
              ut, distinctio placeat. Magni dolores perferendis ab laborum in
              neque, non exercitationem!
            </div>
          </div>
        </div>
        <div class="collapse" id="user_4">
          <a href="#user_4"><i class="fa fa-user"></i> Ahmed Ahmed
            <span class="total">total: 1000</span>
          </a>
          <div class="content">
            <div class="inner-content">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero
              nobis iusto deleniti corporis alias quo a quam similique cupiditate
              pariatur aliquid, omnis, officia dicta officiis impedit nisi dolores
              ut, distinctio placeat. Magni dolores perferendis ab laborum in
              neque, non exercitationem!
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>