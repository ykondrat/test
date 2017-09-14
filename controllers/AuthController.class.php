<?php
    include_once ROOT . '/models/ModelAuth.class.php';

    class AuthController {
        public function actionSignup() {
            ModelAuth::signup($_POST);

            return (true);
        }
        public function actionSignin() {
            ModelAuth::signin($_POST);

            return (true);
        }
        public function actionLogout() {
            ModelAuth::logout($_POST);

            return (true);
        }
    }
