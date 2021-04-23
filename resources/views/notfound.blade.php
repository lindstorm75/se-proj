<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Not found | Engineering OKI</title>
  <link href="https://www.en.kku.ac.th/web/wp-content/uploads/2016/05/favicon-1.ico" rel="icon" type="image/png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <style>
    body {
      margin: 0;
      overflow: hidden;
      font-family: 'Prompt', sans-serif;
    }
    .container {
      display: flex;
      flex-direction: column;
      width: 100vw;
      height: 100vh;
      justify-content: center;
      align-items: center;
    }
    a {
      text-decoration: none;
      color: #808080;
      font-size: 1.25rem;
    }
    a:hover {
      color: #A9A9A9;
    }
  </style>
</head>
<body>
  <div class="container">
    <lottie-player
      src="https://assets3.lottiefiles.com/packages/lf20_NlLnID.json"
      background="transparent"
      speed="1"
      style="width: 600px; height: 600px;"
      loop autoplay
    ></lottie-player>
    <a href="{{ route('home') }}">กลับสู่หน้าหลัก</a>
  </div>
</body>
</html>