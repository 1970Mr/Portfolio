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

    a {
        text-decoration: none;
        padding: .6rem .5rem;
        background: #222;
        color: #f8f8f8;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

	.center {
		text-align: center;
		margin: 1rem;
	}
  </style>
</head>

<body>
  <div class="container">
    <h2>{{ $greeting }}</h2>

    <p style="white-space: pre-wrap;">{{ $content }}</p>

    <div class="center">
		<a href="{{ route('admin.panel.contact.messages.show', ['message' => $messageID]) }}">لینک پیام کاربر</a>
	</div>
  </div>
</body>

</html>
