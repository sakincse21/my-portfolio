<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
  echo "<script>alert('Message sent successfully!');</script>";
}
require 'db.php';

$projects = $conn->query("SELECT * FROM projects ORDER BY updated_at DESC");
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Saleheen's Portfolio</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Iceland&family=Saira+Stencil+One&display=swap" rel="stylesheet">
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
          <li class="eachlink" onclick="photoClick()"><a href="#photography-container">Photography</a></li>
          <li class="eachlink" onclick="eduClick()"><a href="#education-container">Education</a></li>
          <li class="eachlink" onclick="contactClick()"><a href="#contact-container">Contact</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Main Section  -->
  <main class="container main-container" id="main-container">
    <div class="my-details-container">
      <p>Hi, I'm</p>
      <span class="name-head">Saleheen Uddin Sakin</span>
      <p class="typing">A passionate, self taught & experienced software engineer.</p>
      <p>Frontend: NextJS, ReactJS, HTML, CSS, Tailwind</p>
      <p>Backend: ExpressJS, NodeJS, JWT</p>
      <p>Database: MongoDB, MySQL, Postgresql</p>
      <p>Languages: TypeScript, JavaScript, C, C++, Java, Python</p>
      <p>
        <a href="./assets/pdf/resume.pdf" target="_blank">
          <button class="resume-btn">My Resume</button>
        </a>
      </p>
    </div>
    <div class="my-image-container">
      <img src="./assets/myPic.png" width="" alt="Saleheen" class="img1" />
    </div>
  </main>

  <!-- Skills Section  -->
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


  <!-- Projects Section -->
  <div class="projects-container container" id="projects-container">
    <div class="projects-wrapper">
      <?php while ($project = $projects->fetch_assoc()): ?>
        <div class="projectCard">
          <div class="projectThumbnail">
            <?php if ($project['thumbnail']): ?>
              <img src="<?= $project['thumbnail'] ?>" alt="<?= htmlspecialchars($project['title']) ?>">
            <?php else: ?>
              <div class="no-image">No Image</div>
            <?php endif; ?>
          </div>
          <div class="projectContent">
            <h3 class="projectTitle"><?= htmlspecialchars($project['title']) ?></h3>
            <p class="projectDescription"><?= htmlspecialchars($project['description']) ?></p>
            <div class="projectTechnologies">
              <strong>Technologies:</strong>
              <span class="techList"><?= htmlspecialchars($project['technologies']) ?></span>
            </div>
            <div class="projectLinks">
              <?php if ($project['live_url']): ?>
                <a href="<?= $project['live_url'] ?>" target="_blank" class="projectLink live-link">
                  <span>🔗</span> Live Demo
                </a>
              <?php endif; ?>
              <?php if ($project['github_url']): ?>
                <a href="<?= $project['github_url'] ?>" target="_blank" class="projectLink github-link">
                  <span>📂</span> GitHub
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>


  <!-- Photography Section  -->
  <div class="container p-5 photography-container" id="photography-container">
    <div class="outerFrame">
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

  </div>

  <!-- Education Section handled using JS -->
  <div class="container education-container" id="education-container">

  </div>
  <!-- Contact Section -->
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

      <a href="./admin/"><button class="admin-login-btn">Check Messages</button></a>
    </div>
  </div>

  <script src="index.js"></script>
</body>

</html>