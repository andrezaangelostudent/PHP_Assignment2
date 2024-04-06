<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8"> <!-- Unicode Transformation Format -->
    <title> Hiring Portal </title> <!-- The title of the page -->
    <link rel="stylesheet" href="styles.css"> <!-- link of html with the css -->

    <!--fonts google-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Great+Vibes&family=Josefin+Sans&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">

    </head>
    <body>
     <nav>
    <ul>
    <li><a href="index.php">Home</a></li> <!-- link the nav option to the php -->
    <li><a href="login.php">Login</a></li> <!-- link the nav option to the php -->
    <li><a href="visualize.php">Visualize</a></li> <!-- link the nav option to the php -->
    <li><a href="manage.php">Manage</a></li> <!-- link the nav option to the php -->
    </ul>
    </nav>
    <br><br><br><!--space between text--> 
    <h4>Login to have acess to edit your profile: </h4> <!-- the heading -->
    <br><br><!--space between text--> 
     
<!-- Form for submitting employee information using the POST method + enctype so the user can make the upload-->
   <form action="manage.php" method="post" enctype="multipart/form-data">
    User name <input type="text" name="username">
    <br><br><br>
    Password <input type="password" name="password">
    <br><br><br>
    <input type="submit" value="Login">
    
    </form>

      <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validate user name and password
        if (isset($_POST['username']) && isset($_POST['password'])) {

          //identify the database
            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $database = "profile";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve username and password from the form
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Validate user name and password
            $sql = "SELECT * FROM candidates WHERE username='$username' AND password='$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                // If the user log in go to the manage page
                header("Location: manage.php");
                exit();
          
                //if the log in is not successfull
            } else {
                echo "Login invalid, please try again.";
            }

            //close connection
            $conn->close();
        }
    }
    ?>

    <br><br><br><br> <br><br><br><br> <br><br><br><br>

    <!--Footer with the references-->
    <footer>
    <p>Hiring Portal</p>
    <p>Telephone: +1 (647) 111 3455 </p>
    <p>Email: hiringportal.ca </p>
    </footer>

    </body>
    </html>
