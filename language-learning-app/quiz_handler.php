<?php
// Include database configuration
require_once 'config.php';

// Create questions table if not exists
$sql = "CREATE TABLE IF NOT EXISTS quiz_questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    option1 VARCHAR(255) NOT NULL,
    option2 VARCHAR(255) NOT NULL,
    option3 VARCHAR(255) NOT NULL,
    option4 VARCHAR(255) NOT NULL,
    correct_answer INT NOT NULL,
    category VARCHAR(50) NOT NULL,
    level VARCHAR(20) NOT NULL
)";

if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Create user_answers table if not exists
$sql = "CREATE TABLE IF NOT EXISTS user_answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    question_id INT NOT NULL,
    selected_answer INT,
    is_correct BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (question_id) REFERENCES quiz_questions(id)
)";

if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Function to get questions by category and level
function getQuestions($category, $level) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM quiz_questions WHERE category = ? AND level = ? ORDER BY RAND() LIMIT 3");
    $stmt->bind_param("ss", $category, $level);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $questions = array();
    while ($row = $result->fetch_assoc()) {
        $questions[] = array(
            'id' => $row['id'],
            'question' => $row['question'],
            'options' => array(
                $row['option1'],
                $row['option2'],
                $row['option3'],
                $row['option4']
            ),
            'correct_answer' => $row['correct_answer']
        );
    }
    return json_encode($questions);
}

// Function to save user's answer
function saveAnswer($userId, $questionId, $selectedAnswer, $isCorrect) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO user_answers (user_id, question_id, selected_answer, is_correct) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiii", $userId, $questionId, $selectedAnswer, $isCorrect);
    return $stmt->execute();
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    switch($data['action']) {
        case 'getQuestions':
            echo getQuestions($data['category'], $data['level']);
            break;
            
        case 'submitAnswer':
            $result = saveAnswer(
                $data['userId'],
                $data['questionId'],
                $data['selectedAnswer'],
                $data['isCorrect']
            );
            echo json_encode(['success' => $result]);
            break;
            
        default:
            http_response_code(400);
            echo json_encode(['error' => 'Invalid action']);
    }
}

// Close database connection
$conn->close();
?>