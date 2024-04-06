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
    <h4>Here you can acess your profile and make modifications</h4> <!-- the heading -->
    <br><br><br><!--space between text--> 
    <p>Edit your profile here:</p> <!-- brief description -->
    <br><br><!--space between text--> 

<!-- Form for submitting employee information using the POST method + enctype so the user can make the upload-->
<form action="message.php" method="post" enctype="multipart/form-data">
    <label for="username">User name:</label>
    <input type="text" name="username" required>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <br><br>
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <br><br>
    <label for="city">City:</label>
    <input type="text" name="city" required>
    <br><br>
    <label for="work">Work field:</label>
    <input type="text" name="work" required>
    <br><br>
    <label for="telephonenumber">Telephone number:</label>
    <input type="text" name="telephonenumber" required>
    <br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br><br>
    <label for="photo">Upload your photo:</label>
    <input type="file" name="photo" accept="image/*" required>
    <br><br>
    <label for="resume">Upload your resume:</label>
    <input type="file" name="resume" accept=".pdf,.doc,.docx" required>
    <br><br>
    <input type="submit" value="Submit">
</form>
    <br><br><br><br><br> <br><br><br><br>

    <!--if the user click on delete button redirect to the delete php-->
    <form action="delete.php" method="post"  enctype="multipart/form-data">
    Click here to delete your profile <input type="submit" value="Delete">
</form>
    <br><br><!--space between text--> 
    
    <br><br><br><br> <br><br><br><br> <br><br><br><br>

    <?php


//identify the database
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "profile";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_profile'])) {
    
    //if the user is logged in 
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
   
        //delete the profile
        $stmt = $conn->prepare("DELETE FROM candidates WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        
        // if the profile was deleted:
        if ($stmt->affected_rows > 0) {
        echo "Your profile was deleted";
        //if the profile was not deleted:
        } else {
        echo "Your profile was not deleted because something went wrong. Please try again.";
       }
}}
?>


    <!--Footer with the references-->
    <footer>
    <p>Hiring Portal</p>
    <p>Telephone: +1 (647) 111 3455 </p>
    <p>Email: hiringportal.ca </p>
    </footer>

    </body>
    </html>
