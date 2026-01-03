<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Courses | ProWorldz</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #0e0e0e;
    color: #fff;
    min-height: 100vh;
}

.dashboard {
    display: flex;
    min-height: 100vh;
}

/* SIDEBAR STYLES */
.sidebar {
    width: 240px;
    background: #121212;
    padding: 20px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    transition: 0.4s ease;
    z-index: 1000;
    overflow-y: auto;
}

.menu {
    padding-top: 50px;
    list-style: none;
}

.sidebar li {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 14px 16px;
    margin-bottom: 10px;
    border-radius: 12px;
    cursor: pointer;
    transition: .3s ease;
}

.sidebar li a {
    color: inherit;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 15px;
    width: 100%;
}

.sidebar li span {
    font-size: 15px;
}

.sidebar li i {
    font-size: 18px;
    min-width: 22px;
}

.sidebar li:hover,
.sidebar li.active {
    background: #1f1f1f;
    box-shadow: 0 0 12px rgba(255, 87, 34, .4);
}

.close-btn {
    display: none;
    position: absolute;
    top: 18px;
    right: 18px;
    font-size: 22px;
    cursor: pointer;
    color: #fff;
    z-index: 1100;
}

.overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, .6);
    z-index: 900;
}

/* MAIN CONTENT */
.main {
    margin-left: 240px;
    padding: 30px;
    width: calc(100% - 240px);
    transition: margin-left 0.4s ease, width 0.4s ease;
    min-height: 100vh;
}

/* PAGE HEADER */
.page-header {
    margin-bottom: 40px;
    text-align: center;
}

.page-header h1 {
    font-size: 2.5rem;
    color: #ff5722;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* COURSES GRID */
.course-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

/* COURSE CARD */
.course-card-full {
    background: #1a1a1a;
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.course-card-full:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(255, 87, 34, 0.3);
}

.course-img {
    height: 200px;
    overflow: hidden;
}

.course-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.course-card-full:hover .course-img img {
    transform: scale(1.05);
}

.course-content {
    padding: 25px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.course-content h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #fff;
}

.course-content p {
    color: #aaa;
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
}

.course-btn {
    background: linear-gradient(135deg, #ff5722, #ff005d);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 30px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 0.9rem;
    width: 100%;
}

.course-btn:hover {
    background: linear-gradient(135deg, #ff005d, #ff5722);
    box-shadow: 0 5px 15px rgba(255, 87, 34, 0.4);
    transform: translateY(-2px);
}

/* Mobile menu button (hidden by default, shown on mobile) */
.menu-btn {
    display: none;
    font-size: 24px;
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 1001;
}

/* RESPONSIVE DESIGN */
@media (max-width: 1200px) {
    .course-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
        max-width: 900px;
    }
}

@media (max-width: 1024px) {
    .course-grid {
        grid-template-columns: repeat(2, 1fr);
        max-width: 700px;
    }
    
    .main {
        padding: 20px;
    }
    
    .sidebar {
        width: 200px;
    }
    
    .main {
        margin-left: 200px;
        width: calc(100% - 200px);
    }
}

@media (max-width: 768px) {
    .menu-btn {
        display: block;
    }
    
    .sidebar {
        left: -100%;
        width: 280px;
    }
    
    .sidebar.active {
        left: 0;
    }
    
    .main {
        margin-left: 0;
        width: 100%;
        padding: 15px;
    }
    
    .course-grid {
        grid-template-columns: 1fr;
        max-width: 500px;
        gap: 20px;
    }
    
    .page-header h1 {
        font-size: 2rem;
    }
    
    .close-btn {
        display: block;
    }
    
    .overlay.active {
        display: block;
    }
}

@media (max-width: 480px) {
    .course-content {
        padding: 20px;
    }
    
    .course-content h3 {
        font-size: 1.3rem;
    }
    
    .course-img {
        height: 180px;
    }
    
    .course-btn {
        padding: 10px 20px;
        font-size: 0.85rem;
    }
}
</style>
</head>
<body>

<!-- Mobile Menu Button -->
<button class="menu-btn" id="menuBtn">
    <i class="fas fa-bars"></i>
</button>

<div class="dashboard">
  <!-- SIDEBAR NAVIGATION -->
  <aside class="sidebar">
    <div class="close-btn" id="closeBtn">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <ul class="menu">
        <li><a href="dashboard.php" style="color: inherit; text-decoration: none;">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>
        </a></li>
        <li><a href="assignment.php" style="color: inherit; text-decoration: none;">
            <i class="fa-solid fa-book"></i>
            <span>Assignment</span>
        </a></li>
       
        <li class="active"><a href="ourcourse.php" style="color: inherit; text-decoration: none;">
            <i class="fa-solid fa-graduation-cap"></i>
            <span>Courses</span>
        </a></li>
    </ul>
  </aside>

  <!-- OVERLAY (for mobile) -->
  <div class="overlay" id="overlay"></div>

  <!-- MAIN -->
  <main class="main">

    <!-- HEADER -->
    <section class="page-header">
      <h1>Available Courses</h1>
    </section>

    <!-- COURSES GRID - 3 per row -->
    <section class="course-grid">
      
      <!-- Course 1 -->
      <div class="course-card-full">
        <div class="course-img">
          <img src="./pydesk.jpeg" alt="Python Course">
        </div>
        <div class="course-content">
          <h3>Python Mastery</h3>
          <p>Learn Python from basics to advanced, covering data science, automation, and web development with Django.</p>
          <button class="course-btn" onclick="location.href='course-details.php?course=python'">
            Course Details
          </button>
        </div>
      </div>

      <!-- Course 2 -->
      <div class="course-card-full">
        <div class="course-img">
          <img src="./pydesk.jpeg" alt="JavaScript Course">
        </div>
        <div class="course-content">
          <h3>JavaScript Pro</h3>
          <p>Master modern JavaScript, ES6+, React, Node.js and build dynamic web applications from scratch.</p>
          <button class="course-btn" onclick="location.href='course-details.php?course=javascript'">
            Course Details
          </button>
        </div>
      </div>

      <!-- Course 3 -->
      <div class="course-card-full">
        <div class="course-img">
          <img src="./pydesk.jpeg" alt="Data Science Course">
        </div>
        <div class="course-content">
          <h3>Data Science</h3>
          <p>Learn data analysis, machine learning, and visualization with Python, Pandas, and TensorFlow.</p>
          <button class="course-btn" onclick="location.href='course-details.php?course=datascience'">
            Course Details
          </button>
        </div>
      </div>

      <!-- Course 4 -->
      <div class="course-card-full">
        <div class="course-img">
          <img src="./pydesk.jpeg" alt="Mobile Development">
        </div>
        <div class="course-content">
          <h3>Mobile Development</h3>
          <p>Build cross-platform mobile apps with React Native and Flutter. Learn app deployment to stores.</p>
          <button class="course-btn" onclick="location.href='course-details.php?course=mobile'">
            Course Details
          </button>
        </div>
      </div>

      <!-- Course 5 -->
      <div class="course-card-full">
        <div class="course-img">
          <img src="./pydesk.jpeg" alt="Cyber Security">
        </div>
        <div class="course-content">
          <h3>Cyber Security</h3>
          <p>Learn ethical hacking, network security, cryptography, and how to protect systems from threats.</p>
          <button class="course-btn" onclick="location.href='course-details.php?course=cyber'">
            Course Details
          </button>
        </div>
      </div>

      <!-- Course 6 -->
      <div class="course-card-full">
        <div class="course-img">
          <img src="./pydesk.jpeg" alt="UI/UX Design">
        </div>
        <div class="course-content">
          <h3>UI/UX Design</h3>
          <p>Master user interface and experience design principles, prototyping, and design tools like Figma.</p>
          <button class="course-btn" onclick="location.href='course-details.php?course=design'">
            Course Details
          </button>
        </div>
      </div>

      <!-- Course 7 -->
      <div class="course-card-full">
        <div class="course-img">
          <img src="./pydesk.jpeg" alt="Cloud Computing">
        </div>
        <div class="course-content">
          <h3>Cloud Computing</h3>
          <p>Learn AWS, Azure, and Google Cloud. Deploy, manage, and scale applications in the cloud.</p>
          <button class="course-btn" onclick="location.href='course-details.php?course=cloud'">
            Course Details
          </button>
        </div>
      </div>

      <!-- Course 8 -->
      <div class="course-card-full">
        <div class="course-img">
          <img src="./pydesk.jpeg" alt="DevOps">
        </div>
        <div class="course-content">
          <h3>DevOps Engineering</h3>
          <p>Master CI/CD, Docker, Kubernetes, and infrastructure as code. Automate deployment pipelines.</p>
          <button class="course-btn" onclick="location.href='course-details.php?course=devops'">
            Course Details
          </button>
        </div>
      </div>

      <!-- Course 9 -->
      <div class="course-card-full">
        <div class="course-img">
          <img src="./pydesk.jpeg" alt="WebCraft Full Stack">
        </div>
        <div class="course-content">
          <h3>WebCraft Full Stack</h3>
          <p>From idea to launch — learn to build and deploy complete startup-grade web apps.</p>
          <button class="course-btn" onclick="location.href='course-details.php?course=webcraft'">
            Course Details
          </button>
        </div>
      </div>

    </section>

  </main>
</div>

<script>
// Mobile menu functionality
const menuBtn = document.getElementById('menuBtn');
const closeBtn = document.getElementById("closeBtn");
const sidebar = document.querySelector(".sidebar");
const overlay = document.getElementById("overlay");

menuBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
});

closeBtn.addEventListener("click", () => {
    sidebar.classList.remove("active");
    overlay.classList.remove("active");
});

overlay.addEventListener("click", () => {
    sidebar.classList.remove("active");
    overlay.classList.remove("active");
});

// Close sidebar when clicking on a menu item (mobile)
const menuItems = document.querySelectorAll('.menu a');
menuItems.forEach(item => {
    item.addEventListener('click', () => {
        if (window.innerWidth <= 768) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }
    });
});

// Close sidebar on window resize (if resized to desktop)
window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
    }
});
</script>

</body>
</html>