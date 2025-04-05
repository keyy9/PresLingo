# PresLingo Language Learning App

A web-based application for learning Chinese languages with interactive lessons, quizzes, and practice exercises.

## Database Setup Instructions

1. **Configure MySQL Database**:
   - Open phpMyAdmin
   - Create a new database named `preslingo`
   - Import the `quiz_data.sql` file to create and populate the quiz tables

2. **Update Database Configuration**:
   - Open `config.php`
   - Update the following variables with your MySQL credentials:
     ```php
     $servername = "localhost";
     $username = "your_username";
     $password = "your_password";
     $dbname = "preslingo";
     ```

## File Structure
```
language-learning-app/
├── config.php           # Database configuration
├── quiz_handler.php     # Backend API for quiz functionality
├── quiz_data.sql       # SQL file with sample quiz questions
├── index.html          # Homepage
├── lessons.html        # Lessons page
├── lesson-detail.html  # Individual lesson page
├── practice.html       # Practice exercises page
├── quiz.html          # Quiz interface
└── profile.html       # User profile page
```

## Quiz System Features
- Multiple choice questions
- Three difficulty levels: Beginner, Intermediate, Advanced
- Progress tracking
- Score calculation and feedback
- Answer submission and storage in database

## Database Schema

### quiz_questions Table
- id (INT, AUTO_INCREMENT, PRIMARY KEY)
- question (TEXT)
- option1 (VARCHAR)
- option2 (VARCHAR)
- option3 (VARCHAR)
- option4 (VARCHAR)
- correct_answer (INT)
- category (VARCHAR)
- level (VARCHAR)

### user_answers Table
- id (INT, AUTO_INCREMENT, PRIMARY KEY)
- user_id (INT)
- question_id (INT)
- selected_answer (INT)
- is_correct (BOOLEAN)
- created_at (TIMESTAMP)

## Testing the Application
1. Start your local PHP server
2. Access the application through your web browser
3. Navigate to the Quiz section
4. Select a language and difficulty level
5. Complete the quiz to test the database integration

## Note
- Make sure PHP and MySQL are properly installed and configured
- The application uses Tailwind CSS via CDN (not recommended for production)
- For production, install Tailwind CSS locally and compile the CSS