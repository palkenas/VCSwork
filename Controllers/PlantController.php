<?php
include './Models/Plant.php';
class PlantController {

    public static function index() {
        $plants = Plant ::all();
        return $plants;
    }

    public static function show(){
        $plant = Plant::find($_POST['id']);
        return $plant;
    }

    public static function update()
    {
        session_start();
        $hasErrors = false;

        if (preg_match('/[^a-zA-ZĄČĘĖĮŠŲŪŽąčęėįšųūž _\-]/i', $_POST['namelt']) || preg_match('/[^a-zA-Z _\-]/i', $_POST['namelat']) || (is_numeric($_POST['height']) == false)) {
            $hasErrors = true;
            $_SESSION['errors'][] = "Patikslinkite augalo pavadinimą";
        }

        if ((is_numeric($_POST['age']) == false) || is_numeric($_POST['height']) == false) {
            $hasErrors = true;
            $_SESSION['errors'][] = "Patikslinkite augalo amžių/aukštį";
        }

        if (strlen($_POST['namelt']) > 20) {
            $_SESSION['errors'][] = "Lietuviškas pavadinimas negali būti ilgesnis nei 20 simbolių";
            $hasErrors = true;
        }
        if (strlen($_POST['namelat']) > 30) {
            $_SESSION['errors'][] = "Lotyniškas pavadinimas negali būti ilgesnis nei 30 simbolių";
            $hasErrors = true;
        }
        if (strlen($_POST['age']) > 5) {
            $_SESSION['errors'][] = "Augalo amžius negali būti ilgesnis nei 5 simboliai";
            $hasErrors = true;
        }
        if (strlen($_POST['height']) > 5) {
            $_SESSION['errors'][] = "Augalo aukštis negali būti ilgesnis nei 5 simboliai";
            $hasErrors = true;
        }
        if ($hasErrors) {
            return true;
        } else {
            Plant::update();
            return false;
        }
    }
    

    public static function destroy()
    {
        Plant::destroy();
    }


    public static function store()
    {
        session_start();
        $hasErrors = false;

        if(preg_match('/[^a-zA-ZĄČĘĖĮŠŲŪŽąčęėįšųūž _\-]/i', $_POST['namelt']) || preg_match('/[^a-zA-Z _\-]/i', $_POST['namelat']) || (is_numeric($_POST['height']) == false)){
            $hasErrors = true;
            $_SESSION['errors'][] = "Patikslinkite augalo pavadinimą";
        }
        
        if((is_numeric($_POST['age']) == false)||is_numeric($_POST['height']) == false){
            $hasErrors = true;
            $_SESSION['errors'][] = "Patikslinkite augalo amžių/aukštį";
        }

        if(strlen($_POST['namelt']) > 20){
            $_SESSION['errors'][] = "Lietuviškas pavadinimas negali būti ilgesnis nei 20 simbolių";
            $hasErrors = true;
        }
        if(strlen($_POST['namelat']) > 30){
            $_SESSION['errors'][] = "Lotyniškas pavadinimas negali būti ilgesnis nei 30 simbolių";
            $hasErrors = true;
        }
        if(strlen($_POST['age']) > 5){
            $_SESSION['errors'][] = "Augalo amžius negali būti ilgesnis nei 5 simboliai";
            $hasErrors = true;
        }
        if (strlen($_POST['height']) > 5) {
            $_SESSION['errors'][] = "Augalo aukštis negali būti ilgesnis nei 5 simboliai";
            $hasErrors = true;
        }
        if($hasErrors){
            return true;
        } else {
        Plant ::create();
        return false;
        }
    }
}
