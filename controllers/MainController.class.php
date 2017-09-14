<?php
    include_once ROOT . '/models/ModelMain.class.php';

    class MainController {
        public function actionStart() {
            ModelMain::start();

            return (true);
        }

        public function actionList() {
            ModelMain::list($_POST);

            return (true);
        }

        public function actionTest() {
            require_once ROOT. '/dayside/index.php';

            return (true);
        }
    }
