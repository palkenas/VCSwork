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
        <div id="scroll">
            <table id="table" class="table table-transparent">
                <thead>
                    <tr>
                        <th scope="col"><i>Lietuviškas pavadinimas</i></th>
                        <th scope="col"><i>Lotyniškas pavadinimas</i></th>
                        <th scope="col"><i>Daugiametis/Vienmetis</i></th>
                        <th scope="col"><i>Maksimalus amžius</i></th>
                        <th scope="col"><i>Maksimalus aukštis</i></th>
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
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</body>
<a id="btnback" href="./formal.php" class="btn btn-outline-dark" role="button">Sugrįžti</a>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>