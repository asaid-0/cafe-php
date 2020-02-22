<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
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
            <div class="main-title">Add User</div>
            <div id='form' class='_form'>
                <form action='#' method='POST' name='addUser'>
              
                  <fieldset>
                    <legend>NAME</legend>
                    <input type='text' name='name' placeholder='Name' />
                  </fieldset>

                  <fieldset>
                    <legend>EMAIL</legend>
                    <input type='text' name='email' placeholder='Email' />
                  </fieldset>
              
                  <fieldset>
                    <legend>PASSWORD</legend>
                    <input type='password' name='password' placeholder='password' />
                  </fieldset>

                  <fieldset>
                    <legend>CONFIRM PASSWORD</legend>
                    <input type='password' name='confirm_password' placeholder='confirm password' />
                  </fieldset>

                  <fieldset>
                    <legend>ROOM NO.</legend>
                    <input type='text' name='room' placeholder='Room No.' />
                  </fieldset>

                  <fieldset>
                    <legend>EXT.</legend>
                    <input type='text' name='room' placeholder='Ext.' />
                  </fieldset>


                  <fieldset>
                    <legend>PROFILE PICTURE</legend>
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
</body>
</html>