<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      background: #f9f9fb;
      color: #333;
    }

    .container {
      display: flex;
    }

    .sidebar {
      width: 220px;
      background: #fff;
      padding: 30px 20px;
      box-shadow: 2px 0 5px rgba(0,0,0,0.05);
      min-height: 100vh;
    }

    .sidebar h2 {
      color: #5c4dff;
      font-size: 24px;
      margin-bottom: 30px;
    }

    .sidebar h2 span {
      color: #000;
    }

    .sidebar nav {
      display: flex;
      flex-direction: column;
    }

    .nav-item {
      display: flex;
      align-items: center;
      padding: 12px;
      margin-bottom: 10px;
      color: #333;
      text-decoration: none;
      border-radius: 8px;
      transition: 0.2s;
    }

    .nav-item i {
      font-size: 20px;
      margin-right: 10px;
    }

    .nav-item:hover,
    .nav-item.active {
      background: #f1f1ff;
      color: #5c4dff;
    }

    .main {
      flex: 1;
      padding: 40px;
    }

    .main header h1 {
      font-size: 28px;
      color: #111;
      margin-bottom: 5px;
    }

    .main header p {
      color: #777;
      margin-bottom: 30px;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
    }

    .card {
      padding: 20px;
      border-radius: 16px;
      color: #fff;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h3 {
      font-size: 18px;
      margin-bottom: 6px;
    }

    .card p {
      margin-bottom: 16px;
      font-size: 14px;
    }

    .card .info span {
      display: block;
      font-size: 13px;
      margin-bottom: 5px;
    }

    .card .info i {
      margin-right: 6px;
    }

    .purple {
      background: linear-gradient(135deg, #6a11cb, #2575fc);
    }

    .blue {
      background: linear-gradient(135deg, #4285F4, #2a63c3);
    }

    .magenta {
      background: linear-gradient(135deg, #aa076b, #61045f);
    }

    .content-section {
      margin-top: 30px;
    }

    .hidden {
      display: none;
    }

    ul li {
      margin-bottom: 10px;
    }

  </style>
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <h2>Learn<span>Space</span></h2>
      <nav>
        <a href="#" class="nav-item active"><i class="ph ph-house"></i> Dashboard</a>
        <a href="#" class="nav-item"><i class="ph ph-book"></i> Courses</a>
        <a href="#" class="nav-item"><i class="ph ph-calendar"></i> Schedule</a>
        <a href="#" class="nav-item"><i class="ph ph-users"></i> Classmates</a>
      </nav>
    </aside>

    <main class="main">
      <header>
        <h1>Welcome Back!</h1>
        <p>Select a section from the sidebar to view more</p>
      </header>

      <!-- Dashboard -->
      <div id="dashboard-section" class="content-section">
        <section class="cards">
          <div class="card purple">
            <h3>Intro to Programming</h3>
            <p>Dr. Sarah Wilson</p>
            <div class="info">
              <span><i class="ph ph-calendar"></i> May 1, 2024</span>
              <span><i class="ph ph-users"></i> 45 students</span>
              <span><i class="ph ph-clock"></i> 12 weeks</span>
            </div>
          </div>
          <div class="card blue">
            <h3>Web Development Fundamentals</h3>
            <p>Prof. Michael Chen</p>
            <div class="info">
              <span><i class="ph ph-calendar"></i> May 15, 2024</span>
              <span><i class="ph ph-users"></i> 38 students</span>
              <span><i class="ph ph-clock"></i> 10 weeks</span>
            </div>
          </div>
          <div class="card magenta">
            <h3>Data Structures & Algorithms</h3>
            <p>Dr. James Rodriguez</p>
            <div class="info">
              <span><i class="ph ph-calendar"></i> June 1, 2024</span>
              <span><i class="ph ph-users"></i> 32 students</span>
              <span><i class="ph ph-clock"></i> 14 weeks</span>
            </div>
          </div>
        </section>
      </div>

      <!-- Courses -->
      <div id="courses-section" class="content-section hidden">
        <h2>All Courses</h2>
        <p>List of available courses with details...</p>
        <ul>
          <li>Intro to Programming</li>
          <li> Web Dev Fundamentals</li>
          <li> Data Structures</li>
        </ul>
      </div>

      <!-- Schedule -->
      <div id="schedule-section" class="content-section hidden">
        <h2>Your Schedule</h2>
        <ul>
          <li>Mon 9:00 AM – Intro to Programming</li>
          <li>Wed 11:00 AM – Web Dev Fundamentals</li>
          <li>Fri 2:00 PM – Data Structures</li>
        </ul>
      </div>

      <!-- Classmates -->
      <div id="classmates-section" class="content-section hidden">
        <h2>Your Classmates</h2>
        <ul>
          <li>Likhitha - Programming</li>
          <li>Sahithi - Web Dev</li>
          <li>Poojitha - Data Structures</li>
        </ul>
      </div>
    </main>
  </div>

  <script>
    const links = document.querySelectorAll('.nav-item');
    const sections = {
      'Dashboard': 'dashboard-section',
      'Courses': 'courses-section',
      'Schedule': 'schedule-section',
      'Classmates': 'classmates-section'
    };

    links.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        links.forEach(l => l.classList.remove('active'));
        link.classList.add('active');

        const sectionName = link.textContent.trim();
        for (let key in sections) {
          document.getElementById(sections[key]).classList.add('hidden');
        }
        document.getElementById(sections[sectionName]).classList.remove('hidden');
      });
    });
  </script>
</body>
</html>
