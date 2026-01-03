<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us | ProWorldz</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
/* Reset & Base */
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

/* Dashboard Layout */
.dashboard {
    display: flex;
    min-height: 100vh;
}

/* Sidebar */
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

/* Main Content */
.main {
    margin-left: 240px;
    padding: 40px;
    width: calc(100% - 240px);
    min-height: 100vh;
    transition: margin-left 0.4s ease, width 0.4s ease;
}

/* Page Header */
.page-header {
    text-align: center;
    margin-bottom: 50px;
    padding: 0 20px;
}

.page-header h1 {
    font-size: 3rem;
    color: #ff5722;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

.page-header p {
    font-size: 1.1rem;
    color: #aaa;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* About Card */
.about-card {
    background: #1a1a1a;
    padding: 40px;
    border-radius: 20px;
    margin-bottom: 50px;
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    border: 1px solid #2a2a2a;
}

.about-card h2 {
    font-size: 2rem;
    color: #ff5722;
    margin-bottom: 20px;
    text-align: center;
}

.about-card p {
    color: #bbb;
    font-size: 1.1rem;
    line-height: 1.8;
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

/* Info Cards */
.info-cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-bottom: 60px;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}

.info-card {
    background: #1a1a1a;
    padding: 40px 30px;
    border-radius: 20px;
    text-align: center;
    transition: all 0.4s ease;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    border: 2px solid transparent;
}

.info-card:hover {
    transform: translateY(-10px);
    border-color: #ff5722;
    box-shadow: 0 15px 30px rgba(255, 87, 34, 0.3);
    background: #1f1f1f;
}

.info-card i {
    font-size: 2.5rem;
    color: #ff5722;
    margin-bottom: 20px;
    background: rgba(255, 87, 34, 0.1);
    width: 70px;
    height: 70px;
    line-height: 70px;
    border-radius: 50%;
    display: inline-block;
}

.info-card h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #fff;
}

.info-card p {
    color: #bbb;
    font-size: 1rem;
    line-height: 1.6;
}

/* Stats */
.stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    max-width: 1000px;
    margin: 0 auto;
}

.stat-box {
    background: #1a1a1a;
    padding: 40px 30px;
    border-radius: 20px;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    border: 2px solid transparent;
}

.stat-box:hover {
    border-color: #ff5722;
    transform: translateY(-5px);
    box-shadow: 0 15px 25px rgba(255, 87, 34, 0.2);
}

.stat-box h2 {
    font-size: 3rem;
    color: #ff5722;
    margin-bottom: 10px;
}

.stat-box span {
    color: #bbb;
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Mobile Menu Button (Hidden by default) */
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

.overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, .6);
    z-index: 900;
}

/* ========== RESPONSIVE DESIGN ========== */

/* Tablets (769px - 1024px) */
@media (max-width: 1024px) {
    .sidebar {
        width: 220px;
    }
    
    .main {
        margin-left: 220px;
        width: calc(100% - 220px);
        padding: 30px;
    }
    
    .info-cards,
    .stats {
        grid-template-columns: repeat(2, 1fr);
        max-width: 800px;
    }
    
    .info-card:last-child,
    .stat-box:last-child {
        grid-column: span 2;
        max-width: 400px;
        justify-self: center;
    }
    
    .page-header h1 {
        font-size: 2.5rem;
    }
    
    .about-card h2 {
        font-size: 1.8rem;
    }
}

/* Large Mobile Devices (481px - 768px) */
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
    
    .close-btn {
        display: block;
    }
    
    .overlay.active {
        display: block;
    }
    
    .main {
        margin-left: 0;
        width: 100%;
        padding: 25px;
    }
    
    .info-cards,
    .stats {
        grid-template-columns: 1fr;
        max-width: 500px;
    }
    
    .info-card:last-child,
    .stat-box:last-child {
        grid-column: 1;
        max-width: 100%;
    }
    
    .page-header {
        margin-bottom: 40px;
    }
    
    .page-header h1 {
        font-size: 2.2rem;
    }
    
    .page-header p {
        font-size: 1rem;
    }
    
    .about-card {
        padding: 30px;
    }
}

/* Small Mobile Devices (up to 480px) */
@media (max-width: 480px) {
    .main {
        padding: 20px;
    }
    
    .page-header {
        margin-bottom: 30px;
    }
    
    .page-header h1 {
        font-size: 1.8rem;
    }
    
    .about-card,
    .info-card,
    .stat-box {
        padding: 30px 20px;
    }
    
    .info-card i,
    .info-card h3,
    .stat-box h2 {
        font-size: 2rem;
    }
    
    .info-card i {
        width: 60px;
        height: 60px;
        line-height: 60px;
    }
    
    .stat-box h2 {
        font-size: 2.5rem;
    }
}

/* Extra Small Devices (up to 360px) */
@media (max-width: 360px) {
    .main {
        padding: 15px;
    }
    
    .page-header h1 {
        font-size: 1.6rem;
    }
    
    .page-header p {
        font-size: 0.9rem;
    }
    
    .about-card p,
    .info-card p,
    .stat-box span {
        font-size: 0.9rem;
    }
}

/* Landscape Mode for Mobile */
@media (max-height: 600px) and (orientation: landscape) {
    .sidebar {
        overflow-y: auto;
        height: 100vh;
    }
    
    .menu {
        padding-top: 20px;
    }
    
    .sidebar li {
        padding: 10px 12px;
        margin-bottom: 5px;
    }
    
    .info-cards,
    .stats {
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    
    .info-card,
    .stat-box {
        padding: 25px 20px;
    }
}

/* High DPI Screens */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .info-card,
    .stat-box,
    .about-card {
        border-width: 1.5px;
    }
}

/* Print Styles */
@media print {
    body {
        background: white;
        color: black;
    }
    
    .sidebar {
        display: none;
    }
    
    .main {
        margin-left: 0;
        width: 100%;
    }
    
    .info-card,
    .stat-box,
    .about-card {
        border: 1px solid #000;
        box-shadow: none;
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
        <li><a href="index.php" style="color: inherit; text-decoration: none;">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>
        </a></li>
        <li><a href="assignment.php" style="color: inherit; text-decoration: none;">
            <i class="fa-solid fa-book"></i>
            <span>Assignment</span>
        </a></li>
        <li><a href="ourcourse.php" style="color: inherit; text-decoration: none;">
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
      <h1>About ProWorldz</h1>
      <p>Learn. Build. Succeed.</p>
    </section>

    <!-- ABOUT CARD -->
    <section class="about-card">
      <h2>Who We Are</h2>
      <p>
        ProWorldz is a modern learning platform focused on empowering students
        with real-world skills in technology, development, and startups.
        Our goal is to bridge the gap between education and industry.
      </p>
    </section>

    <!-- INFO CARDS -->
    <section class="info-cards">

      <div class="info-card">
        <i class="fa-solid fa-bullseye"></i>
        <h3>Our Mission</h3>
        <p>
          To provide practical, hands-on learning experiences that help students
          build confidence and job-ready skills.
        </p>
      </div>

      <div class="info-card">
        <i class="fa-solid fa-eye"></i>
        <h3>Our Vision</h3>
        <p>
          To become a trusted digital learning ecosystem for students,
          creators, and future innovators.
        </p>
      </div>

      <div class="info-card">
        <i class="fa-solid fa-users"></i>
        <h3>Who We Help</h3>
        <p>
          College students, beginners, and aspiring professionals who want
          to learn by doing and grow their careers.
        </p>
      </div>

    </section>

    <!-- STATS -->
    <section class="stats">

      <div class="stat-box">
        <h2>10K+</h2>
        <span>Students</span>
      </div>

      <div class="stat-box">
        <h2>50+</h2>
        <span>Courses</span>
      </div>

      <div class="stat-box">
        <h2>100+</h2>
        <span>Projects</span>
      </div>

    </section>

  </main>
</div>

<script>
// Mobile Menu Functionality
const menuBtn = document.getElementById('menuBtn');
const closeBtn = document.getElementById("closeBtn");
const sidebar = document.querySelector(".sidebar");
const overlay = document.getElementById("overlay");

// Toggle sidebar
menuBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
    document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : 'auto';
});

closeBtn.addEventListener("click", () => {
    sidebar.classList.remove("active");
    overlay.classList.remove("active");
    document.body.style.overflow = 'auto';
});

overlay.addEventListener("click", () => {
    sidebar.classList.remove("active");
    overlay.classList.remove("active");
    document.body.style.overflow = 'auto';
});

// Close sidebar when clicking on menu links (mobile)
const menuLinks = document.querySelectorAll('.menu a');
menuLinks.forEach(link => {
    link.addEventListener('click', () => {
        if (window.innerWidth <= 768) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    });
});

// Close sidebar on window resize (if resized to desktop)
window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
});
</script>

</body>
</html>