<?php

    $token = "7610220591:AAHBm4qGtn-ge_3Rjljg0QV4Wb9dbcS_cZM";
    $telegram_api_url = "https://api.telegram.org/bot$token/sendMessage";
    $chat_id = "-1002366744061";
    
    $db_host = "localhost";
    $db_user = "mystical_tour_user";
    $db_pass = "V^^M(q1Z5nvS";
    $db_name = "mystical_tour_db";
    
    function getDBConnection() {
        global $db_host, $db_user, $db_pass, $db_name;
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
        
        if ($conn->connect_error) {
            error_log("Database Connection Error: " . $conn->connect_error);
            die(json_encode(['status' => false, 'message' => "Database Connection Failed"]));
        }
        
        return $conn;
    }
    
    function sendTelegramMessage($chat_id, $message) {
        global $telegram_api_url;
    
        $data = [
            'chat_id' => $chat_id,
            'text' => $message,
        ];
    
        $options = [
            'http' => [
                'header'  => "Content-Type: application/json",
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];
    
        $context = stream_context_create($options);
        $result = file_get_contents($telegram_api_url, false, $context);
    
        return $result !== false;
    }
    
    function saveMessageToDB($userId, $chat_id, $sender, $message) {
        $conn = getDBConnection();
    
        $stmt = $conn->prepare("INSERT INTO messages (user_id, chat_id, sender, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $userId, $chat_id, $sender, $message);
    
        if (!$stmt->execute()) {
            error_log("Database Insert Error: " . $stmt->error);
        }
    
        $stmt->close();
        $conn->close();
    }
    
    function fetchMessagesFromDB($userId) {
        $conn = getDBConnection();
    
        $stmt = $conn->prepare("SELECT sender, message, created_at FROM messages WHERE user_id = ? ORDER BY created_at ASC");
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $messages = [];
    
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    
        $stmt->close();
        $conn->close();
    
        return json_encode(['status' => true, 'messages' => $messages]);
    }
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $flow = isset($_POST['flow']) ? trim($_POST['flow']) : '';
    
        if ($flow === "customer") {
            $message = isset($_POST['message']) ? trim($_POST['message']) : '';
            $userId = isset($_POST['userId']) ? trim($_POST['userId']) : '';
    
            if (!empty($message) && !empty($userId)) {
                $formattedMessage = "@$userId\n$message";
    
                if (sendTelegramMessage($chat_id, $formattedMessage)) {
                    saveMessageToDB($userId, $chat_id, "Web Visitor", $formattedMessage);
                    echo json_encode(['status' => true, 'message' => "Message sent!"]);
                } else {
                    echo json_encode(['status' => false, 'message' => "Failed to send message"]);
                }
            } else {
                echo json_encode(['status' => false, 'message' => "Invalid input"]);
            }
    
            exit();
        }
    
        $update = json_decode(file_get_contents("php://input"), true);
    
        if (isset($update["message"]["text"])) {
            $messageText = trim($update["message"]["text"]);
            preg_match("/^@(\S+)/", $messageText, $matches);
            $userId = $matches[1] ?? null;
    
            if ($userId) {
                $replyMessage = trim(str_replace($matches[0], "", $messageText));
                $sender = $update["message"]["from"]["first_name"] ?? "Unknown";
    
                saveMessageToDB($userId, $chat_id, $sender, $replyMessage);
            }
        }
        
        if (isset($update["message"]["reply_to_message"])) {
            $originalMessage = $update["message"]["reply_to_message"]["text"] ?? "";
            
            if (preg_match("/^@(\S+)/", $originalMessage, $matches)) {
                $userId = $matches[1];
                $sender = $update["message"]["from"]["first_name"];
                $replyMessage = trim($messageText);
            }
            
            saveMessageToDB($userId, $chat_id, $sender, $replyMessage);
        }
        
    } elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
        
        $userId = isset($_GET['userId']) ? trim($_GET['userId']) : '';
    
        if (!empty($userId)) {
            echo fetchMessagesFromDB($userId);
        } else {
            echo json_encode(['status' => false, 'message' => "Invalid user ID"]);
        }

        exit();
    } else {
        echo json_encode(['status' => false, 'message' => "Invalid request!"]);
        exit();
    }
    
    