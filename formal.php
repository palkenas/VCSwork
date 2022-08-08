<?php
include './base.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/reset.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/formal.css">
    <title>Plants</title>
</head>

<body>

    <div class="container">
        <div id="title">
            Augalų enciklopedija
        </div>
        <div id="form">
            <form id="form" class="form-inline" action="" method="post">
                <div class="form-row">
                    <div id="input1" class="form-group col-md-4">
                        <label for="namelt">Augalo pavadinimas</label>
                        <input type="text" class="form-control" id="namelt" name="namelt" placeholder="Lietuviškas" <?= isset($_POST['edit']) ? 'value="' . $plant->namelt . '"' : '' ?>>
                    </div>
                    <div id="input2" class="form-group col-md-4">
                        <label for="namelat">Augalo pavadinimas</label>
                        <input type="text" class="form-control" id="namlat" name="namelat" placeholder="Lotyniškas" <?= isset($_POST['edit']) ? 'value="' . $plant->namelat . '"' : '' ?>>
                    </div>
                    <div id="input3" class="form-group col-md-4">
                        <label for="isperennial">Daugiametis</label>
                        <input type="radio" class="form-check-input" id="radio1" name="isperennial" value="1" checked <?= isset($_POST['edit']) ? 'value="' . $plant->isperennial . '"' : '' ?>>
                        <label for="isperennial">Vienmetis</label>
                        <input type="radio" class="form-check-input" id="radio2" name="isperennial" value="0" <?= isset($_POST['edit']) ? 'value="' . $plant->isperennial . '"' : '' ?>>
                    </div>
                    <div id="input4" class="form-group col-md-4">
                        <label for="age">Augalo amžius</label>
                        <input type="text" class="form-control" id="age" name="age" placeholder="Maksimalus" <?= isset($_POST['edit']) ? 'value="' . $plant->age . '"' : '' ?>>
                    </div>
                    <div id="input5" class="form-group col-md-4">
                        <label for="height">Augalo aukštis</label>
                        <input type="text" class="form-control" id="height" name="height" placeholder="Maksimalus" <?= isset($_POST['edit']) ? 'value="' . $plant->height . '"' : '' ?>>
                    </div>
                    <?= isset($_POST['edit']) ? '<input type="hidden" name="id" value="' . $plant->id . '">' : "" ?>
                    <button id="btn" class="btn btn-outline-dark" type="submit" name=<?= isset($_POST['edit']) ? '"update" > Atnaujinti' : '"save" > Išsaugoti' ?> </button>
                        <a id="linkcont" href="./index.php" class="btn btn-outline-dark" role="button">Šiuolaikinis</a>
                        <a id="linkindigo" href="./indigo.php" class="btn btn-outline-dark" role="button">80-ųjų dizainas</a>
                        <a id="linktable" href="./tableformal.php" class="btn btn-outline-dark" role="button">Visa lentelė</a>
                </div>
            </form>
        </div>
    </div>
    <div id="alert2">
        <?php if (isset($_SESSION) && isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) { ?>
                <div id="alert" class="alert alert-danger" role="allert">
                    <?= $error; ?>
                </div>
        <?php  }
            unset($_SESSION['errors']);
        }
        ?>
    </div>

    <div class="container">
        <div id="scroll" class="table-responsive">
            <table id="table" class="table table-transparent">
                <thead>
                    <tr>
                        <th scope="col"><i>Lietuviškas pavadinimas</i></th>
                        <th scope="col"><i>Lotyniškas pavadinimas</i></th>
                        <th scope="col"><i>Daugiametis/Vienmetis</i></th>
                        <th scope="col"><i>Maksimalus amžius</i></th>
                        <th scope="col"><i>Maksimalus aukštis</i></th>
                        <th scope="col"><i>Redaguoti</i></th>
                        <th scope="col"><i>Ištrinti</i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($plants as $plant) { ?>
                        <tr>
                            <td><?= $plant->namelt ?></td>
                            <td><?= $plant->namelat ?></td>
                            <td><?= $plant->isperennial ? "augalas daugiametis" : "augalas vienmetis" ?></td>
                            <td><?= $plant->age . ' metai(-ų)' ?></td>
                            <td><?= $plant->height . ' m' ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $plant->id ?>">
                                    <button id="edit" class="btn btn-outline-warning" type="submit" name="edit">Redaguoti</button>
                                </form>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $plant->id ?>">
                                    <button id="delete" class="btn btn-outline-danger" type="submit" name="destroy">Ištrinti</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</body>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>