<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | PROWORLDZ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="auth.css">
  <style>
    /* Basic styles if auth.css is missing */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }
    
    .auth-container {
      width: 100%;
      max-width: 400px;
    }
    
    .auth-box {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      padding: 40px;
      border-radius: 16px;
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }
    
    h2 {
      color: #fff;
      text-align: center;
      margin-bottom: 10px;
      font-size: 28px;
    }
    
    p {
      color: #b0b0b0;
      text-align: center;
      margin-bottom: 30px;
      font-size: 14px;
    }
    
    .input-group {
      position: relative;
      margin-bottom: 25px;
    }
    
    .input-group input {
      width: 100%;
      padding: 15px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 8px;
      color: #fff;
      font-size: 16px;
      outline: none;
      transition: all 0.3s ease;
    }
    
    .input-group input:focus {
      border-color: #ff5722;
      box-shadow: 0 0 0 2px rgba(255, 87, 34, 0.2);
    }
    
    .input-group label {
      position: absolute;
      left: 15px;
      top: 15px;
      color: #888;
      pointer-events: none;
      transition: all 0.3s ease;
      font-size: 16px;
    }
    
    .input-group input:focus + label,
    .input-group input:not(:placeholder-shown) + label {
      top: -10px;
      left: 10px;
      font-size: 12px;
      color: #ff5722;
      background: #0a0a0a;
      padding: 0 8px;
    }
    
    button {
      width: 100%;
      padding: 15px;
      background: linear-gradient(135deg, #ff5722 0%, #ff4081 100%);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-bottom: 20px;
    }
    
    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(255, 87, 34, 0.3);
    }
    
    button:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }
    
    .switch {
      display: block;
      text-align: center;
      color: #b0b0b0;
      font-size: 14px;
    }
    
    .switch a {
      color: #ff5722;
      text-decoration: none;
      font-weight: 600;
    }
    
    .switch a:hover {
      text-decoration: underline;
    }
    
    .error {
      color: #ff4444;
      font-size: 14px;
      margin-top: 10px;
      text-align: center;
      display: none;
    }
    
    .loading {
      display: none;
      text-align: center;
      color: #ff5722;
      margin: 10px 0;
    }
  </style>
</head>
<body>

<div class="auth-container">
  <div class="auth-box">
    <h2>Welcome Back</h2>
    <p>Login to access your PROWORLDZ dashboard</p>

    <div class="input-group">
      <input type="email" id="mail-login" name="mail-login" required placeholder=" ">
      <label>Email Address</label>
    </div>

    <div class="input-group">
      <input type="password" id="passw-login" name="passw-login" required placeholder=" ">
      <label>Password</label>
    </div>

    <button type="submit" onclick="login()">Login</buatton>
  </div>
</div>

<script>
  function login(){
    let datas = new FormData();
    let mail = document.getElementById('mail-login').value;
    let pass = document.getElementById('passw-login').value;
    datas.append("mail-login",mail);
    datas.append("passw-login",pass);

    fetch("http://localhost:3000/api/login.php",{
      method:'POST',
      body:datas
    }).then(res => res.json())
    .then(data => {
      if(data['result'] !== null) location.replace('dashboard.php');
    }).catch(err => console.log(err));
  }
</script>

</body>
</html>