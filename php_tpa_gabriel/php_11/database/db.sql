CREATE DATABASE `20201713_quiz`;

USE `20201713_quiz`;

-- CREATE SCHEMA q_question_types
-- 
CREATE TABLE `q_question_types` (
    `id` int(10) UNSIGNED NOT NULL,
    `name` varchar(255) NOT NULL
);

-- CREATE SCHEMA q_questions
-- 
CREATE TABLE `q_questions` (
    `id` int(10) UNSIGNED NOT NULL,
    `q_question_type_id` int(10) UNSIGNED NOT NULL,
    `question` varchar(255) NOT NULL
);

-- CREATE SCHEMA q_answers
-- 
CREATE TABLE `q_answers` (
    `id` int(10) UNSIGNED NOT NULL,
    `q_question_id` int(10) UNSIGNED NOT NULL,
    `answer` varchar(255) NOT NULL,
    `is_correct` BOOLEAN NOT NULL DEFAULT 0
);

-- Make column `id` PRIMARY KEY
-- 
-- ATTACH PRIMARY KEYS q_question_types
-- 
ALTER TABLE `q_question_types`
  ADD PRIMARY KEY (`id`);

-- ATTACH PRIMARY KEYS q_question_types
-- 
ALTER TABLE `q_questions`
  ADD PRIMARY KEY (`id`);

-- ATTACH PRIMARY KEYS q_question_types
-- 
ALTER TABLE `q_answers`
  ADD PRIMARY KEY (`id`);


-- Make PRIMARY KEY AUTO_INCREMENT
-- 
-- AUTO_INCREMENT q_question_types
-- 
ALTER TABLE `q_question_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

-- AUTO_INCREMENT q_question_types
-- 
ALTER TABLE `q_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

-- AUTO_INCREMENT q_question_types
-- 
ALTER TABLE `q_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;


-- ATTACH FOREIGN KEYS
-- 
-- FOREIGN KEY q_questions
-- 
ALTER TABLE `q_questions`
  ADD FOREIGN KEY (`q_question_type_id`) REFERENCES `q_question_types`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;


-- FOREIGN KEY q_answers
-- 
ALTER TABLE `q_answers`
  ADD FOREIGN KEY (`q_question_id`) REFERENCES `q_questions`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

