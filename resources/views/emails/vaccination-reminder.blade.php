<!-- resources/views/emails/vaccination_reminder.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaccination Reminder</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      color: #333;
    }

    .container {
      max-width: 600px;
      margin: auto;
      padding: 20px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #007BFF;
    }

    p {
      line-height: 1.6;
    }

    .button {
      display: inline-block;
      padding: 10px 15px;
      color: white;
      background-color: #007BFF;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
    }

    .footer {
      margin-top: 20px;
      text-align: center;
      font-size: 0.8em;
      color: #666;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Vaccination Reminder</h1>
    <p>Dear {{ $registration->user->name }},</p>
    <p>This is a friendly reminder that you have a vaccination scheduled on
      <strong>{{ \Carbon\Carbon::parse($registration->scheduled_date)->format('F j, Y') }}</strong>.</p>
    <p>Please ensure you bring your identification and any necessary documents.</p>
    <a href="{{ url('/registration') }}" class="button">View Registration Details</a>
    <p>Thank you for taking the time to stay healthy!</p>
    <div class="footer">
      <p>&copy; {{ date('Y') }} Your Organization Name. All Rights Reserved.</p>
    </div>
  </div>
</body>

</html>
