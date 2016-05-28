<?php

class Model_question extends Model {

    const TYPE_MATCHING = 1;
    const TYPE_ONE_ANSWER = 2;
    const TYPE_MANY_ANSWERS = 3;

    public function getAll() {
        $sqlQuestions = "
            SELECT q.id, q.text, theme_id, qt.text as theme_text
            FROM `questions` q
            join question_themes qt on q.theme_id=qt.id";
            
        $sqlAnswers = "
            SELECT id as answer_id, question_id, text as answer_text, text_match as answer_text_match, is_correct
            FROM `question_answers";

        $resultQ = $this->db->query($sqlQuestions);
        $resultA = $this->db->query($sqlAnswers);

        $data = [];

        while ($rowQ = $resultQ->fetch_assoc()) {
            $arrayQ[] = $rowQ;
        }
        while ($rowA = $resultA->fetch_assoc()) {
            $arrayA[] = $rowA;
        }
        foreach ($arrayQ as &$rowQ) {
            foreach ($arrayA as $rowA) {
                if ((int)$rowA['question_id'] == (int)$rowQ['id']) {
                    $rowQ['answers'][] = $rowA;
                }
            }
        }
        $data = $arrayQ;

        return $data;
    }
    
    public function checkMatchingQuestion($questionId, $text, $text_match) {
        $sql = "
            SELECT *
            FROM question_answers
            WHERE question_id=$questionId and text='$text' and text_match='$text_match'";
        
        $result = $this->db->query($sql);

        if ($result->num_rows <= 0) {
            return false;
        }
        return true;
    }
    
    public function checkQuestion($questionId, $answerId) {
        $sql = "
            SELECT *
            FROM question_answers
            WHERE question_id=$questionId and id=$answerId and is_correct=1";
        
        $result = $this->db->query($sql);

        if ($result->num_rows <= 0) {
            return false;
        }
        return true;
    }
    
    public function checkCorrectQuestionCount($questionId) {
        $sql = "
            SELECT *
            FROM question_answers
            WHERE question_id=$questionId and is_correct=1";
        
        $result = $this->db->query($sql);

        if ($result) {
            return $result->num_rows;
        }
        return 0;
    }

}