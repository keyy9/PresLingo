-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS preslingo;
USE preslingo;

-- Insert sample quiz questions for Mandarin Chinese
INSERT INTO quiz_questions (question, option1, option2, option3, option4, correct_answer, category, level) VALUES
('What is "你好" (Nǐ hǎo) in English?', 'Hello', 'Goodbye', 'Thank you', 'Please', 0, 'mandarin', 'beginner'),
('How do you say "Good morning" in Chinese?', '晚安 (Wǎn ān)', '早安 (Zǎo ān)', '下午好 (Xià wǔ hǎo)', '再见 (Zài jiàn)', 1, 'mandarin', 'beginner'),
('What does "谢谢" (Xièxie) mean?', 'Please', 'Hello', 'Goodbye', 'Thank you', 3, 'mandarin', 'beginner'),
('Which number is "三" (sān)?', 'One', 'Two', 'Three', 'Four', 2, 'mandarin', 'beginner'),
('What does "再见" (Zài jiàn) mean?', 'Hello', 'Good morning', 'Thank you', 'Goodbye', 3, 'mandarin', 'beginner');

-- Insert intermediate level questions
INSERT INTO quiz_questions (question, option1, option2, option3, option4, correct_answer, category, level) VALUES
('What does "我很好" (Wǒ hěn hǎo) mean?', 'How are you?', 'I am good', 'Thank you', 'Goodbye', 1, 'mandarin', 'intermediate'),
('Which is the correct way to say "I love you"?', '我要 (Wǒ yào)', '我的 (Wǒ de)', '我爱你 (Wǒ ài nǐ)', '我们 (Wǒ men)', 2, 'mandarin', 'intermediate'),
('What does "不客气" (Bù kèqi) mean?', 'Hello', 'Thank you', "You're welcome", 'Goodbye', 2, 'mandarin', 'intermediate'),
('How do you say "What is your name?"', '你叫什么名字? (Nǐ jiào shénme míngzì?)', '你好吗? (Nǐ hǎo ma?)', '再见 (Zài jiàn)', '谢谢 (Xièxie)', 0, 'mandarin', 'intermediate'),
('Which phrase means "Nice to meet you"?', '再见 (Zài jiàn)', '你好 (Nǐ hǎo)', '很高兴认识你 (Hěn gāoxìng rènshí nǐ)', '谢谢 (Xièxie)', 2, 'mandarin', 'intermediate');

-- Insert advanced level questions
INSERT INTO quiz_questions (question, option1, option2, option3, option4, correct_answer, category, level) VALUES
('What is the correct word order for "I want to eat noodles"?', '我面条要吃', '吃面条我要', '我要吃面条', '要吃我面条', 2, 'mandarin', 'advanced'),
('Which measure word is used for books?', '个 (gè)', '本 (běn)', '张 (zhāng)', '件 (jiàn)', 1, 'mandarin', 'advanced'),
('What is the difference between 了 (le) and 过 (guò)?', 'No difference', 'One is for past experience, one for completed action', 'One is formal, one is informal', 'One is positive, one is negative', 1, 'mandarin', 'advanced'),
('Which sentence structure is correct for expressing "because... therefore..."?', '因为...所以...', '虽然...但是...', '不但...而且...', '又...又...', 0, 'mandarin', 'advanced'),
('What does the grammar pattern "是...的" indicate?', 'Future tense', 'Past experience', 'Emphasis on manner or time', 'Possibility', 2, 'mandarin', 'advanced');