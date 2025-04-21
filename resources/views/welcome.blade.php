@extends('layouts.chat-app')

@section('chat-content')
    <x-recive-message message="Hey Nipun, I'm AI Assistance of University of Colombo. How can I help you?sssssssssssssssssssssssssssssssssssssssssssssss" />

    <x-send-message message="Hi! Can you tell me my class schedule for today?" />

    <x-recive-message
        message="Of course! Here's your schedule for today:<br>
🕘 9:00 AM – 11:00 AM: Computer Science Lecture – Room 204<br>
🕚 11:30 AM – 1:00 PM: Mathematics Tutorial – Lab 3<br>
🕒 3:00 PM – 5:00 PM: Software Engineering Lab – Lab 1<br><br>
Is there anything else you'd like to know?" />

    <x-send-message message="Yes, when is the next assignment due?" />

    <x-recive-message
        message="Your next assignment for 'Software Engineering' is due on <strong>April 25th, 2025</strong>.<br>
Don't forget to submit it via Moodle before 11:59 PM!" />

    <x-send-message message="Thanks! That’s all for now." />

    <x-recive-message message="You're welcome, Nipun! 😊<br>
Feel free to message me anytime. Have a great day!" />


    <x-voice-message />
@endsection
