<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bookings</title>
</head>
<body>
    <h1>Your Bookings</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($bookings as $booking)
            <li>
                Room ID: {{ $booking->room_id }} | Date: {{ $booking->booking_date }}
            </li>
        @endforeach
    </ul>

    <h2>Book a Room</h2>
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <label for="room_id">Room ID:</label>
        <input type="number" name="room_id" required>
        <label for="booking_date">Booking Date:</label>
        <input type="date" name="booking_date" required>
        <button type="submit">Book Now</button>
    </form>
</body>
</html>
