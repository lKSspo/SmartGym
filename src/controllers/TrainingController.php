<?php
session_start();

require_once '../models/Traing.php';
require_once '../config.php';

    class Training {
        private $trainingModel = new Training($connection);
    }
?>