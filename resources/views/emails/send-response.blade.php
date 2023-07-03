<!DOCTYPE html>
<html dir="rtl">

<head>
  <meta charset="utf-8">
  <title>{{ $subject }}</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
    }

    h2 {
      color: #333;
    }

    p {
      color: #555;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .signature {
      font-style: italic;
      color: #888;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>{{ $greeting }}</h2>

    <p>{{ $intro }}</p>

    <p style="white-space: pre-wrap;">{{ $content }}</p>

    <p>{{ $farewell }}</p>

    <p class="signature">{{ $signature }}</p>
  </div>
</body>

</html>
