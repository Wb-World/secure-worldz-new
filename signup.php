<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up | PROWORLDZ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="auth.css">
</head>
<body>

<div class="auth-container">
  <div class="auth-box">

    <h2>Create Your Account </h2>
    <p>Join PROWORLDZ and start your tech journey</p>

    <form>
      <div class="input-group">
        <input type="text" required>
        <label>Full Name</label>
      </div>

      <div class="input-group">
        <input type="email" required>
        <label>Email Address</label>
      </div>

      <div class="input-group">
        <input type="tel" required>
        <label>Mobile Number</label>
      </div>

      <div class="input-group">
        <input type="password" required>
        <label>Password</label>
      </div>

      <div class="input-group">
        <input type="password" required>
        <label>Confirm Password</label>
      </div>

      <button type="submit">Sign Up</button>

      <span class="switch">
        Already have an account?
        <a href="login.php">Login</a>
      </span>
    </form>

  </div>
</div>

<script src="auth.js"></script>
</body>
</html>
