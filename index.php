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
    <h4> We work hard to make your life easier! </h4> <!-- the heading -->
    <br><br><!--space between text--> 
    <p>Welcome to the Hiring Portal! Here you can create your profile and we will send to the best companies!</p> <!-- brief description -->
    <br><br><!--space between text-->
    <!--class with image--> 
    <div class="photo">
        <img src="images/team.jpg" alt="team photo">
           </div>
    <br><br><!--space between text--> 
    <p> We know how difficult is to find a job these days, that is why our mission is to make this easier for you.
    <br><br><!--space between text--> 
    <p> It is very simple, you just have to create your profile and we do all the hard work!<p>
    <br><br><br><!--space between text-->     
    <div> 
    <p> Create here your profile filling the form below: </p> <!--Paragraph-->
    <br><br><br><!--space between text--> 
</div>

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

    <?php

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
} else {
    echo "The connection with database returned the following information: <br><br><br>";
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $work = $_POST['work'];
    $telephone = $_POST['telephonenumber'];
    $email = $_POST['email'];
    $photo = $_FILES['photo']['name'];
    $resume = $_FILES['resume']['name'];

    // storage the data in the table
$sql = "INSERT INTO candidates (username, password, name, city, work_field, telephone, email, photo_path, resume_path) 
VALUES ('$username', '$password', '$name', '$city', '$work', '$telephone', '$email', '$photoDestination', '$resumeDestination')";

    // condition to check if the connection was successfull
    if ($conn->query($sql) === TRUE) {
        echo "Your profile was submitted";
    } else {
        echo "Sorry, try again " . $sql . "<br>" . $conn->error;
    }
}
//close connection
$conn->close();

?>

    <br><br><br><br>

    <!--Footer with the references-->
    <footer>
    <p>Hiring Portal</p>
    <p>Telephone: +1 (647) 111 3455 </p>
    <p>Email: hiringportal.ca </p>
    </footer>

    </body>
    </html>
