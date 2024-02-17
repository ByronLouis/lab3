<!DOCTYPE html>
<html lang="en">
<head>
 
    <link rel="icon" href="<?php echo base_url('devil.jpg');?>" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My First Persnoal Portfolio</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Rubik+Doodle+Shadow&display=swap" rel="stylesheet">

<style>
    @import url('https://fonts.googleapis.com/css?family=Carter+One&display=swap&effect=shadow-multiple|fire-animation');

    html {
        scroll-behavior: smooth;
    }
    
    .html, body {
    height: 100%;
    margin: 0;
  }

    .second-header {
        background-color: rgb(15, 15, 15);
        color: #ffffff;
        padding: 350px;
        text-align: center;
        background-image: url(<?php echo base_url('backgroundgif.gif');?>);
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        background-size: cover;
        font-family: 'Carter One', system-ui;
        color: rgb(218, 216, 135);
        font-size: 25px;
    }
    
    .first-header {
      background-color: #000000;
      padding: 1%;
      text-align: center;
      font-size: 17px;
      font-family: 'Creepster', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: padding 0.3s;

    }

    .first-header a {
      color: rgb(218, 216, 135);
      text-decoration: none;
      margin: 0 10px;
      font-family: 'Creepster', sans-serif;
      transition: color 0.3s;
      cursor: pointer;
    }
 
    .first-header a:hover {
      color: #ff0000;
    }
 
    .first-header a:last-child {
      margin-right: 0.5in;
    }

    .button {
    background-color:#be2e02;
    color: rgb(255, 255, 255);
    text-decoration: none;
    border: 2px solid transparent;
    font-weight: bold;
    padding: 13px 30px;
    border-radius: 20px;
    transition: 0.3s;
    text-align: left;
    font-size: 20px;
    margin-top: 20px;
    font-family: 'Creepster', sans-serif;
    }

    .third-header {
    background-color: #0a0000;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 250px;
    color: rgb(235, 145, 27);
    font-family: 'Carter One', system-ui;
    font-size: 23px;

    }
 
    .motorgif {
        border-style:outset;
        border-width: 10px;
        border-color: rgba(255, 222, 34, 0.767);
        border-radius: 40px;
        width: 700px;
        object-fit: cover;
        margin-top: 50px;
        transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out;
        margin-right: 15px;
    }
    
    .motorgif:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);

    }

    .error {
      color: rgb(235, 145, 27);
    }
    
</style>

</head>
<body>

<!--MAIN PAGE-->

    <div>
    <header class="first-header">
      <a href="#homie" class="header-text" >Home</a>
      <a href="#aboutMe" id="about-link" class="header-text" >About Me</a>
      <a href="#hobbiees" class="header-text">Hobbies</a>
    </header>
    </div>

    <header id="homie" class="second-header">
        <div class="gif-container">
        <h1 class="font-effect-fire-animation"> W e l c o m e &nbsp; t o <br> M y &nbsp; P e r s o n a l &nbsp;P r o f i l e</h1>
        <a class="button" href="#aboutMe">About Me</a>
        </div>
    </header>

    <header class="third-header" id="aboutMe">

          <h2 class="font-effect-fire-animation"> About Me:</h2>
          <p class="aboutme"> My Name is Byron Louis A. Rabajante <br> I am 20 Years Old. Born on <span id="birthdate"></span>. <br> Currently an IT Student in Asia Pacific College</p>

          <script>
            let x = 20;
            document.getElementById("age").innerHTML = "<strong>" + x + "</strong>";
        </script>

        <script>
            const d = new Date("August 22 2003");
            const birthdateElement = document.getElementById("birthdate");
            const formattedDate = d.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })
            birthdateElement.innerHTML = formattedDate;
            console.log(formattedDate);

        </script>
        </div>
    </div>

      <a href="https://www.youtube.com/watch?v=qisoHWRZg0E">
        <img src="<?php echo base_url('motor.gif');?>" class="motorgif" height="500px" title="Click Me" class="boximages">
      </a>
      
    </header>

<!--FOOTER-->
<footer>
  
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>" style="color: rgb(218, 216, 135);">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>" style="color: rgb(218, 216, 135);"> 
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>" style="color: rgb(218, 216, 135);">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40" style="color: rgb(218, 216, 135);"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" style="color: rgb(218, 216, 135);"> <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" style="color: rgb(218, 216, 135);"> <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" style="color: rgb(218, 216, 135);"> <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

<footer style="background-color: #000000; padding: 30px; text-align: center; font-family: 'Inter', sans-serif;">
    <p style="margin: 0; color: #ffffff; font-family:'Creepster', sans-serif; color: rgb(218, 216, 135);">Devil Man Cry Baby &copy; 2024. </p>
    <div style="margin-top: 10px;">
     
      <a href="https://open.spotify.com/user/12162102984" style="color: white; text-decoration: none; margin-right: 10px;">
        <img src="<?php echo base_url('spoti.png');?>" alt="Spotify" style="width: 24px; height: 20px; vertical-align: middle;">
      </a>
      
      <a href="https://github.com/ByronLouis" style="color: white; text-decoration: none;">
        <img src="<?php echo base_url('github.png');?>" alt="github" style="width: 24px; height: 20px; vertical-align: middle;">
      </a>
    </div>

  </footer>
</body>
</html>