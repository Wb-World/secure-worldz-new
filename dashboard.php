<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProWorldz Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#0e0e0e;
            color:#fff;
        }

        .dashboard{
            display:flex;
        }

        .menu{
            padding-top:50px;
        }

        .sidebar{
            width:240px;
            background:#121212;
            padding:20px;
            height:100vh;
            position:fixed;
            top:0;
            left:0;
            transition:0.4s ease;
            z-index:1000;
        }

        .logo{
            width:52px;
            height:52px;
            border-radius:50%;
            background:#ff5722;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:20px;
            font-weight:700;
            margin-bottom:40px;
        }

        .sidebar ul{
            list-style:none;
        }

        .sidebar li{
            display:flex;
            align-items:center;
            gap:15px;
            padding:14px 16px;
            margin-bottom:10px;
            border-radius:12px;
            cursor:pointer;
            transition:.3s ease;
        }

        .sidebar li span{
            font-size:15px;
        }

        .sidebar li i{
            font-size:18px;
            min-width:22px;
        }

        .sidebar li:hover,
        .sidebar li.active{
            background:#1f1f1f;
            box-shadow:0 0 12px rgba(255,87,34,.4);
        }

        .main{
            margin-left:240px;
            padding:30px;
            width:100%;
            transition:margin-left 0.4s ease;
        }

        .topbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        }

        .search{
            background:#1a1a1a;
            padding:10px 18px;
            border-radius:30px;
            display:flex;
            align-items:center;
            gap:10px;
            width:260px;
        }

        .search input{
            background:none;
            border:none;
            outline:none;
            color:#fff;
            width:100%;
        }

        .profile{
            display:flex;
            align-items:center;
            gap:12px;
            position:relative;
        }

        .profile span{
            font-size:13px;
            opacity:.7;
        }

        .avatar{
            width:42px;
            height:42px;
            border-radius:50%;
            background:#ff5722;
        }

        .welcome{
            background:linear-gradient(135deg,#ff005d,#ff5722);
            padding:30px;
            border-radius:20px;
            margin-bottom:30px;
            transition:.4s ease;
            height: 200px;
        }

        .welcome h2{
            margin:10px 0;
        }

        .welcome:hover{
            transform:scale(1.02);
        }

        .section-title{
            margin:25px 0 15px;
            color:#ff5722;
        }

        .cards{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:20px;
        }

        .card{
            background:#1a1a1a;
            padding:28px;
            border-radius:18px;
            text-align:center;
            transition:.4s ease;
        }

        .card h1{
            margin-bottom:5px;
        }

        .card:hover{
            transform:translateY(-8px);
            box-shadow:0 0 22px rgba(255,87,34,.4);
        }

        .card.highlight{
            border:2px solid #ff5722;
        }

        .courses{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(230px,1fr));
            gap:20px;
        }

        .course{
            background:#1a1a1a;
            padding:20px;
            border-radius:15px;
            transition:.35s ease;
        }

        .course:hover{
            background:#ff5722;
            transform:translateY(-6px);
        }

        .logout-btn{
            gap: 6px;
            padding: 8px 16px;
            border-radius: 20px;
            background: #ff3c00;
            color: #fff;
            text-decoration: none;
            font-size: 13px;
            transition: .3s;
            white-space: nowrap;
            order: 3;
            margin-left: 170cap;
        }

        .logout-btn:hover{
            background:#ff1f00;
            box-shadow:0 0 15px rgba(255,60,0,.5);
        }

        .menu-btn{
            display:none;
            font-size:22px;
            cursor:pointer;
            color:#fff;
        }

        .close-btn{
            display:none;
            position:absolute;
            top:18px;
            right:18px;
            font-size:22px;
            cursor:pointer;
            color:#fff;
            z-index:1100;
        }

        .overlay{
            display:none;
            position:fixed;
            inset:0;
            background:rgba(0,0,0,.6);
            z-index:900;
        }

        /* Course Card Styles */
        .course-card {
            background: #1a1a1a;
            padding: 28px;
            border-radius: 18px;
            text-align: center;
            transition: .4s ease;
            width: 300px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .course-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .badge {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge.completed {
            background: #4CAF50;
            color: white;
        }

        .course-card h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #fff;
        }

        .course-card p {
            color: #aaa;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 30px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .completed-btn {
            background: #4CAF50;
            color: white;
        }

        .completed-btn:hover {
            background: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }

        @media(max-width:1024px){
            .sidebar{
                width:200px;
            }

            .main{
                margin-left:200px;
                width: calc(100% - 200px);
            }

            .search{
                width:220px;
            }
        }

        @media(max-width:768px){
            .menu-btn{
                display:block;
            }

            .close-btn{
                display:block;
            }

            .sidebar{
                left:-100%;
                width:280px;
            }

            .sidebar.active{
                left:0;
            }

            .main{
                margin-left:0;
                width: 100%;
                padding:20px;
            }

            .topbar{
                flex-wrap:wrap;
                gap:15px;
            }

            .search{
                width:100%;
                order:3;
            }

            .profile{
                margin-left:auto;
            }

            .cards,
            .courses{
                grid-template-columns:1fr;
            }

            .logout-btn{
                padding:5px 12px;
                font-size:12px;
            }

            .overlay.active{
                display:block;
            }

            .course-card {
                width: 100%;
                max-width: 400px;
                margin: 0 auto;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <!-- SIDEBAR NAVIGATION -->
        <aside class="sidebar">
            <div class="close-btn" id="closeBtn">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <ul class="menu">
                <li class="active">
                    <a href="dashboard.php" style="color: inherit; text-decoration: none;">
                        <i class="fa-solid fa-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="assignment.php" style="color: inherit; text-decoration: none;">
                        <i class="fa-solid fa-book"></i>
                        <span>Assignment</span>
                    </a>
                </li>
               
                <li>
                    <a href="ourcourse.php" style="color: inherit; text-decoration: none;">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span>Courses</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- OVERLAY (for mobile) -->
        <div class="overlay" id="overlay"></div>

        <main class="main">
            <div class="topbar">
                <div class="menu-btn" id="menuBtn">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="profile">
                    <a href="logout.php" class="logout-btn">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </a>
                </div>
            </div>
            <section class="welcome">
                <p><?=date("D M Y");?></p>
                <h2 id="showname">Welcome back, <?=$_SESSION['current-student'];?></h2>
                <span>Always stay updated in your student portal</span>
            </section>
            <h3 class="section-title">Enrolled Courses</h3>
            <div style="display:flex; gap:20px; justify-content:flex-start; flex-wrap:wrap;">

                <div class="course-card">
                    <div class="course-top">
                        <span class="badge completed">Completed</span>
                    </div>
                    <h3>Fundamentals of Web Design</h3>
                    <p>UI basics, layout, responsiveness</p>
                    <button class="btn completed-btn">View Certificate</button>
                </div>

                <div class="course-card">
                    <div class="course-top">
                        <span class="badge completed">Completed</span>
                    </div>
                    <h3>Fundamentals of Web Design</h3>
                    <p>UI basics, layout, responsiveness</p>
                    <button class="btn completed-btn">View Certificate</button>
                </div>

            </div>

        </main>
    </div>
    <script>
        const menuBtn = document.getElementById("menuBtn");
        const closeBtn = document.getElementById("closeBtn");
        const sidebar = document.querySelector(".sidebar");
        const overlay = document.getElementById("overlay");

        menuBtn.addEventListener("click", () => {
            sidebar.classList.add("active");
            overlay.classList.add("active");
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
        const menuLinks = document.querySelectorAll('.menu a');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
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