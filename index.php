<?php
// Initialize variables to store input values and error messages
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";

//calling connecting function
include 'function.php';
$conn = connectDatabase();

// Function to sanitize input data
function sanitizeInput($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}

// Function to validate email format
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize name field
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = sanitizeInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
        }
    }

    // Validate and sanitize email field
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = sanitizeInput($_POST["email"]);
        if (!validateEmail($email)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate and sanitize message field
    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = sanitizeInput($_POST["message"]);
    }

    // insert data into the database
    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        $sql = "INSERT INTO user_message (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
           header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
        .hidden {
            display: none;
        }
    </style>
  <link rel="stylesheet" href="style.css">
  <title>My Website</title>
</head>

<body>
 
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav">
        <div class="logo">
          <a href="#hero">
            <h1><span>S</span>athya <span>D</span>arshani</h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="#hero" data-after="Home">Home</a></li>
            <li><a href="#services" data-after="Service">Services</a></li>
            <li><a href="#projects" data-after="Projects">Projects</a></li>
            <li><a href="#about" data-after="About">About</a></li>
            <li><a href="#contact" data-after="Contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">

    <div class="hero container">
      <div>
        <h1>Hello, <span></span></h1>
        <h1>My Name is <span></span></h1>
        <h1>Sathya Darshani<span></span></h1>
        <a href="#projects" type="button" class="cta">Portfolio</a>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->

  <!-- Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Serv<span>i</span>ces</h1>
        <p>Music is the only thing that can express our feelings without words. Music is a universal language. We may have different tastes in music. I can provide you my Services with Vocals, Melody Composing, Instrument Playing  and Dubbing according to your musical taste, preferences and needs, and I can assure you, I will provide my service to the best of my knowledge and skills!</p>
      </div>
      <div class="service-bottom">     
       
      
        <div class="service-item   ">
          <div class="icon"><img src="./images/vocalist.jpg"></div>
          <h2>Vocalist</h2>                
          <p>I have sung my own songs, commercials, tele drama songs,  jingles as well as many cover songs. I am a professional with specialized training in how to use my voice to produce music. I know how to present advanced musical skills such as projecting and emoting with my voice.   </p>
        </div>
        
        <div class="service-item">
          <div class="icon"><img src="./images/composing.jpg" /></div>                                                             
          <br>
          </br>
          <h2>Melody Composer </h2>
          <p>
            I am a melody composer and I am doing my further studies in melody composing. I have composed few melodies which show the wide variety of my talent and musical 
          </p>
        </div>
        
        <div class="service-item">
          <div class="icon"><img src="./images/guitar.jpg" /></div>
          <h2>Instrument Player</h2>
          <p>
            <br>
          </br>I can play many instruments including guitar, organ, flute and I have studied these instruments playing at university level.</p>
        </div>
        
        <div class="service-item">
          <div class="icon"><img src="./images/dubbing.JPG" /></div>
          <h2>Dubbing Artist</h2>
          <p>I am a professional dubbing artist and i know how to use my voice to portray characters or provide information to an audience.I have been associated with TV Derana, Hiru TV and many other TV channels for dubbing cartoon characters and teledrama characters.(Click on the Video) </p>
        </div>
      
      </div>
    </div>
   </section>
  <!-- End Service Section -->

  <!-- Projects Section -->
  <section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">Recent <span>Projects</span></h1>
      </div>
      <div class="all-projects">
        
        <div class="project-item">
          <div class="project-info">
            <h1>Project 1</h1>
            <h2>Teledrama Theom Song Singing</h2>
            <p>This is the theme song of the tele drama KINDURADARI aired on Hiru TV and it was sung by me.You can hear my voice on this video.(Click on the Video!)</p>
          </div>
          <div class="project-video">
            <video src="./images/vocal1.MOV" controls></video>
          </div>
        </div>
       
        <div class="project-item">
          <div class="project-info">
            <h1>Project 2</h1>
            <h2>Dubbing</h2>
            <p>This is a cartoon movie aired on TV Derana channel and I am involved with the dubbing team of this cartoon MEE MEDIA as the character of the lady rat GEETHA you see in the video.You can hear my dubbing.(Click on the Video!) </p>
          </div>
          <div class="project-video">
            <video src="./images/dubbing1.MOV" controls ></video>
          </div>
        </div>

        <div class="project-item">
          <div class="project-info">
            <h1>Project 3</h1>
            <h2>Cover Song</h2>
            <p>This is a cover song sung by me and my sister Prabodha Iroshini during an interview on Rhythm Beat ,Charana TV.(Click on the Video!)</p>
          </div>
          <div class="project-video">
            <video src="./images/vocal2.MOV" controls></video>
          </div>
        </div>
        
        <div class="project-item">
          <div class="project-info">
            <h1>Project 4</h1>
            <h2>Dubbing</h2>
            <p>
              This is a cartoon movie aired on TV Derana channel and I am involved with the dubbing team of this cartoon WALAS MULLA as the character of the little squirrel DANTHAJA you see in the video.You can hear my dubbing</p>
          </div>
          <div class="project-video">
            <video src="./images/dubbing2.MOV" controls></video>
          </div>
        </div>
      
      </div>
    </div>
  </section>
  <!-- End Projects Section -->

  <!-- About Section -->
  <section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="./images/about.JPG" class="slide" alt="img"> 
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">About <span>me</span></h1>
        <h2>Vocalist,Musician and Dubbing Artist </h2>
        <p>I am a graduate of BPA(Special) from Sri Lanka University of Visual and Performing Arts and I studied singing and playing instruments from my university by professionally trained lecturers.
          I am the 7th finalist of the compitition Sirasa Superstar season 6. 
          I am a professional dubbing artist and I have been involved in dubbing cartoons and teledramas of TV Derana, Hiru TV and many other TV channels.</p>
        <a href="CV.pdf" class="cta">Download Resume</a>
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- Contact Section -->
  <section id="contact">
    <div class="contact container">
      <div>
        <h1 class="section-title">Contact <span>info</span></h1>
      </div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2>+94 071456456</h2>
            <h2>+011 2456215</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>sathya.darshani@gamail.com</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2>44/14, Namaluwa Road, Artigala,Hanwella,Colombo,Srilanka</h2>
          </div>
        </div>
      </div>
    </div>

    
  </section>


    
  <button id="showFormButton">  Click here for Sending your Message!   </button>
    
    <div id="formContainer" class="hidden">
      <h2>Contact Us</h2>
    
      <form method="post" action="index.php">
       <p> Name:</p> <input type="text" name="name" value="<?php echo $name; ?>">
        <span style="color: red;"><?php echo $nameErr; ?></span><br><br>
        
        <p> Email: </p> <input type="text" name="email" value="<?php echo $email; ?>">
        <span style="color: red;"><?php echo $emailErr; ?></span><br><br>

        <p> Message:</p>  <textarea name="message"><?php echo $message; ?></textarea>
        <span style="color: red;"><?php echo $messageErr; ?></span><br><br>

        <button type="submit">Submit</button>
    </form>
    </div>
  
    <script>
        const showFormButton = document.getElementById("showFormButton");
        const formContainer = document.getElementById("formContainer");

        showFormButton.addEventListener("click", () => {
            formContainer.classList.remove("hidden");
            showFormButton.style.display = "none";
        });
    </script>

    <br>
    </br>
  <!-- End Contact Section -->

  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <div class="brand">
        <h1><span>S</span>athya <span>D</span>arshani</h1>
      </div>
      <h2>Your Complete Web Solution</h2>
      <div class="social-icon">
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/behance.png" /></a>
        </div>
      </div>
      <p>Copyright © 2023 Sathya Darshani. All rights reserved</p>
    </div>
  </section>
  <!-- End Footer -->
  <script src="./app.js"></script>
</body>

</html>