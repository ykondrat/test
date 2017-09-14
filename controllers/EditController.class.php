<?php
    include_once ROOT . '/models/ModelEdit.class.php';

    class EditController {
        public function actionStart() {
            ModelEdit::start();

            return (true);
        }

        public function actionAdd() {
            ModelEdit::add($_POST, $_FILES);

            return (true);
        }
        public function actionSet() {
            ModelEdit::edit($_POST);

            return (true);
        }
    }
