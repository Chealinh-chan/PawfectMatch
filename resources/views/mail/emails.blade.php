<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Appointment Confirmation</title>
</head>
<body>
    <h2>Appointment Confirmation</h2>

    <p>Dear Customer,</p>

    <p>You have successfully booked an appointment with us regarding <strong>{{ $pet->name }}</strong>.</p>

    <p><strong>Appointment Date & Time:</strong> {{ \Carbon\Carbon::parse($appointmentDate)->format('F j, Y \a\t g:i A') }}</p>

    <p>Our team will review your request and get back to you shortly. Thank you for choosing our service.</p>

    <p>Best regards,<br>The Pawfect Match Team</p>
</body>
</html>
