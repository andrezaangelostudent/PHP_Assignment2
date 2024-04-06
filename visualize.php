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
    <h4>Visualize below your profile</h4> <!-- the heading -->
    <br><br><!--space between text--> 
    <br>
        
    <?php
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION['username'])) {

    //if the user is not logged, go to the login page
        header("Location: login.php"); 
                exit();
    }

    // Get the user information in the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "profile";

    $conn = new mysqli($servername, $username, $password, $database);

    //if the connection is not successfull
    if ($conn->connect_error) {
        die("Sorry, something went wrong. Please try again " . $conn->connect_error);
    }

    $username = $_SESSION['username'];
    $sql = "SELECT * FROM candidates WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        //show the user profile
        $row = $result->fetch_assoc();
        echo "<p><strong>User Name:</strong> " . $row['username'] . "</p>";
        echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
        echo "<p><strong>City:</strong> " . $row['city'] . "</p>";
        echo "<p><strong>Work Field:</strong> " . $row['work_field'] . "</p>";
        echo "<p><strong>Telephone Number:</strong> " . $row['telephone'] . "</p>";
        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
       

    } else {
        echo "Sorry we didn't find your profile.";
    }

    //close connection
    $conn->close();
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
