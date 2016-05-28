<?php if (isset($_SESSION['user']) && !is_null($_SESSION['user']) ) : ?>
    <h3>This is test page</h3>
    
    <!-- FORM -->
    <form action="/index/test" method="post">
        <?php foreach ($registry->get('questions') as $question) : ?>
            <div class="question-container">
                <p>
                    <strong><?= $question['text'] ?></strong>
                </p>
                <?php if (Model_question::TYPE_ONE_ANSWER == $question['type']) : ?>
                    <?php foreach ($question['answers'] as $answer) : ?>
                        <p>
                            <label for="questions[<?= $question['id'] ?>][]"><?= $answer['answer_text'] ?></label>
                            <input type="radio" name="questions[<?= $question['id'] ?>][]" value="<?= $answer['answer_id'] ?>">
                        </p>
                    <?php endforeach; ?>
                <?php elseif (Model_question::TYPE_MANY_ANSWERS == $question['type']) : ?>
                    <?php foreach ($question['answers'] as $answer) : ?>
                        <p>
                            <label for="questions[<?= $question['id'] ?>][]"><?= $answer['answer_text'] ?></label>
                            <input type="checkbox" name="questions[<?= $question['id'] ?>][]" value="<?= $answer['answer_id'] ?>">
                        </p>
                    <?php endforeach; ?>
                <?php elseif (Model_question::TYPE_MATCHING == $question['type']) : ?>
                    <?php 
                        $answer_text_match = $question['answers'];
                        shuffle($answer_text_match);
                        $counter = 0;
                    ?>
                    <?php foreach ($question['answers'] as $answer) : ?>
                        <p>
                            <input type="hidden" name="questions[<?= $question['id'] ?>][<?= $counter ?>][answer_text]" value="<?= $answer['answer_text'] ?>">
                            <label for="questions[<?= $question['id'] ?>][<?= $counter ?>]"><?= $answer['answer_text'] ?></label>
                            <select name="questions[<?= $question['id'] ?>][<?= $counter ?>][answer_text_match]">
                                <?php foreach ($answer_text_match as $answer): ?>
                                    <?php shuffle($answer_text_match); ?>
                                    <option value="<?= $answer['answer_text_match'] ?>"><?= $answer['answer_text_match'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </p>
                        <?php $counter++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <input type="submit">
    </form>
    <!-- /FORM -->
<?php else : ?>
    <h3>This is test page</h3>
    <p>
        Please log in first
    </p>
<?php endif; ?>
