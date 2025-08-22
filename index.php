<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
  echo "<script>alert('Message sent successfully!');</script>";
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Saleheen's Portfolio</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <header>
    <nav>
      <div class="logo">
        <img src="./assets/logo.png" width="64px" alt="" />
      </div>
      <div class="nav-right">
        <ul class="links-ul">
          <li class="eachlink" onclick="mainClick()"><a href="#main-container">Main</a></li>
          <li class="eachlink" onclick="skillClick()"><a href="#skill-container">Skills</a></li>
          <li class="eachlink" onclick="projectClick()"><a href="#projects-container">Projects</a></li>
          <li class="eachlink" onclick="eduClick()"><a href="#education-container">Education</a></li>
          <li class="eachlink" onclick="photoClick()"><a href="#photography-container">Photography</a></li>
          <li class="eachlink" onclick="contactClick()"><a href="#contact-container">Contact</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- MAIN -->
  <main class="container main-container" id="main-container">
    <div class="my-details-container">
      <p>Hi, I'm</p>
      <h1 class="name-head">Saleheen Uddin Sakin</h1>
      <p class="typing">A passionate, self taught & experienced software engineer.</p>
      <p>Frontend: NextJS, ReactJS, HTML, CSS</p>
      <p>Backend: ExpressJS, NodeJS</p>
      <p>Database: MongoDB</p>
      <p>Languages: JavaScript, C, C++, Python</p>
      <p>
        <a href="https://github.com/sakincse21" target="_blank">
          <button class="resume-btn">My Resume</button>
        </a>
      </p>
    </div>
    <div class="my-image-container">
      <img src="./assets/myPic.png" width="auto" alt="Saleheen" class="img1" />
    </div>
  </main>

  <div class="container skill-container" id="skill-container">
    <div class="left-side-skill">
      <div class="each-skill-left">
        <h2>NextJS</h2>
        <div class="nextjs skill-have"></div>
        <div class="skill-full"></div>
      </div>
      <div class="each-skill-left">
        <h2>NodeJS</h2>
        <div class="nodejs skill-have"></div>
        <div class="skill-full"></div>
      </div>
      <div class="each-skill-left">
        <h2>TailwindCSS</h2>
        <div class="tailwind skill-have"></div>
        <div class="skill-full"></div>
      </div>
      <div class="each-skill-left">
        <h2>HTML</h2>
        <div class="html skill-have"></div>
        <div class="skill-full"></div>
      </div>
      <div class="each-skill-left">
        <h2>JavaFX</h2>
        <div class="javafx skill-have"></div>
        <div class="skill-full"></div>
      </div>
      <div class="each-skill-left">
        <h2>C</h2>
        <div class="c skill-have"></div>
        <div class="skill-full"></div>
      </div>
    </div>
    <div class="middle-line-skill"></div>
    <div class="right-side-skill">
      <div class="each-skill-right">
        <h2>ReactJS</h2>
        <div class="reactjs skill-have"></div>
        <div class="skill-full"></div>
      </div>
      <div class="each-skill-right">
        <h2>ExpressJS</h2>
        <div class="expressjs skill-have"></div>
        <div class="skill-full"></div>
      </div>
      <div class="each-skill-right">
        <h2>TypeScript</h2>
        <div class="typescript skill-have"></div>
        <div class="skill-full"></div>
      </div>
      <div class="each-skill-right">
        <h2>JavaScript</h2>
        <div class="js skill-have"></div>
        <div class="skill-full"></div>
      </div>
      <div class="each-skill-right">
        <h2>CSS</h2>
        <div class="css skill-have"></div>
        <div class="skill-full"></div>
      </div>
      <div class="each-skill-right">
        <h2>JAVA</h2>
        <div class="java skill-have"></div>
        <div class="skill-full"></div>
      </div>
      <div class="each-skill-right">
        <h2>C++</h2>
        <div class="cpp skill-have"></div>
        <div class="skill-full"></div>
      </div>
    </div>
  </div>

  <div class="container p-5 photography-container" id="photography-container">
    <!-- <div class="photography-container" id="photography-container">
        <div class="frame">
          <div class="image-box">
            <img src="./assets/photography/fly1.jpg" alt="" />
          </div>
          <div class="image-text">
            <h5>A fly on leaf</h5>
          </div>
        </div>
        <div class="frame">
          <div class="image-box">
            <img src="./assets/photography/fly2.jpg" alt="" />
          </div>
          <div class="image-text">
            <h5>A fly on tree branch</h5>
          </div>
        </div>
        <div class="frame">
          <div class="image-box">
            <img src="./assets/photography/horse1.jpg" alt="" />
          </div>
          <div class="image-text">
            <h5>Two horses eating</h5>
          </div>
        </div>
        <div class="frame">
          <div class="image-box">
            <img src="./assets/photography/horse2.jpg" alt="" />
          </div>
          <div class="image-text">
            <h5>Two horses eating</h5>
          </div>
        </div>
        <div class="frame">
          <div class="image-box">
            <img src="./assets/photography/padma1.jpg" alt="" />
          </div>
          <div class="image-text">
            <h5>Two labours going to work</h5>
          </div>
        </div>
        <div class="frame">
          <div class="image-box">
            <img src="./assets/photography/padma2.jpg" alt="" />
          </div>
          <div class="image-text">
            <h5>Two labours going to work</h5>
          </div>
        </div>
        <div class="frame">
          <div class="image-box">
            <img src="./assets/photography/train1.jpg" alt="" />
          </div>
          <div class="image-text">
            <h5>Compartment no 5267</h5>
          </div>
        </div>
      </div> -->



    <div class="parent">

      <div class="frame div1">
        <div class="image-box">
          <img src="./assets/photography/horse2.jpg" alt="" />
        </div>
        <div class="image-text">
          <h5>Two horses eating</h5>
        </div>
      </div>
      <div class="frame div2">
        <div class="image-box">
          <img src="./assets/photography/train1.jpg" alt="" />
        </div>
        <div class="image-text">
          <h5>Compartment no 5267</h5>
        </div>
      </div>
      <div class="frame div3">
        <div class="image-box">
          <img src="./assets/photography/padma2.jpg" alt="" />
        </div>
        <div class="image-text">
          <h5>Two labours going to work</h5>
        </div>
      </div>
      <div class="frame div4">
        <div class="image-box">
          <img src="./assets/photography/padma1.jpg" alt="" />
        </div>
        <div class="image-text">
          <h5>Two labours going to work</h5>
        </div>
      </div>
      <div class="frame div5">
        <div class="image-box">
          <img src="./assets/photography/fly2.jpg" alt="" />
        </div>
        <div class="image-text">
          <h5>A fly on tree branch</h5>
        </div>
      </div>
      <div class="frame div6">
        <div class="image-box">
          <img src="./assets/photography/horse1.jpg" alt="" />
        </div>
        <div class="image-text">
          <h5>Two horses eating</h5>
        </div>
      </div>

    </div>


  </div>

  <div class="container education-container" id="education-container">

  </div>
  <!-- CONTACT -->
  <div class="container contact-container" id="contact-container" style="display:none; min-height:100vh;">
    <div class="contact-form">
      <h2>Contact Me</h2>
      <form action="contact.php" method="POST" id="contactForm">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Message:</label>
        <textarea name="message" required></textarea>
        <button type="submit">Send</button>
      </form>
      
      <a href="./admin/login.php"><button class="admin-login-btn">Check Messages</button></a>
    </div>
  </div>

  <script src="index.js"></script>
</body>

</html>