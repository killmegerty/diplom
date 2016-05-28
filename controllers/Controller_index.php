<?php

require 'models/Model_user.php';
require 'models/Model_question.php';

class Controller_index extends Controller {

    public function index() {
        $modelUser = new Model_user();
        $users = $modelUser->getAllUsers();
        $this->registry->set('users', $users);
    }
    
    public function tutorial() {
    }
    
    public function test() {
        $modelQuestion = new Model_question();
        $questions = $modelQuestion->getAll();
        
        // form handler
        if ($_POST) {
            if (isset($_POST['questions']) && !empty($_POST['questions'])) {
                $questionsPost = $_POST['questions'];
                $correctCounter = 0;
                $checkQuestionCounter = 0;
                $inCirle = false;
                
                foreach ($questionsPost as $questionId => $answers) {
                    foreach ($answers as $answerId) {
                        if (is_array($answerId)) { //matching type
                            if (!$modelQuestion->checkMatchingQuestion($questionId, $answerId['answer_text'], $answerId['answer_text_match'])) {
                                continue 2;
                            }
                        } else {
                            if (!$modelQuestion->checkQuestion($questionId, $answerId)) {
                                continue 2;
                            } else {
                                $inCirle = true;
                                $checkQuestionCounter++;
                            }
                        }
                    }
                    if ($checkQuestionCounter < $modelQuestion->checkCorrectQuestionCount($questionId) && $inCirle) {
                        continue;
                    }
                    $correctCounter++;
                }
            }
            echo 'Правильных: ' . $correctCounter . "\n";
        }
        
        
        // determine type of question
        foreach ($questions as &$question) {
            // matching type
            if (!is_null($question['answers'][0]['answer_text_match'])) {
                $question['type'] = $modelQuestion::TYPE_MATCHING;
                continue;
            }
            // many or one answers type
            $count = 0;
            foreach ($question['answers'] as $answer) {
                if ($answer['is_correct'] == 1) {
                    $count++;
                }
            }
            if ($count > 1) {
                $question['type'] = $modelQuestion::TYPE_MANY_ANSWERS;
            } else {
                $question['type'] = $modelQuestion::TYPE_ONE_ANSWER;
            }
        }

        shuffle($questions);
        $this->registry->set('questions', array_slice($questions, 0, TEST_QUESTIONS_LIMIT));
    }

}