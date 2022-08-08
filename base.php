<?php
include './controllers/PlantController.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['save'])) {
        $hasErrors = PlantController::store();
        if (!$hasErrors) {
            header("Location:" . $_SERVER['REQUEST_URI']);
        }
    }
    if (isset($_POST['edit'])) {
        $plant = PlantController::show();
    }
    if (isset($_POST['update'])) {
        if (isset($_POST['update'])) {
            $hasErrors = PlantController::update();
            if (!$hasErrors) {
                header("Location:" . $_SERVER['REQUEST_URI']);
            }
        }
    }
    if (isset($_POST['destroy'])) {
        PlantController::destroy();
        header("Location:" . $_SERVER['REQUEST_URI']);
    }
}
$plants = PlantController::index();

?>