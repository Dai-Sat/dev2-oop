<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <main>
        <form action="" method="post">
            <div class="card w-25 mx-auto mt-5">
                <div class="card-header text-center">
                    <h6 class="text-center fw-bold">FARE</h6>
                </div>

                <div class="card-body">
                    <input type="number" name="age" id="" class="form-control mt-3 mb-3" placeholder="Age">
                    <input type="number" name="distance" id="" class="form-control mb-3" placeholder="Distance">
                </div>

                <button type="submit" class="btn btn-outline-primary mx-auto mb-3" name="compute">compute</button>


                <?php
                if (isset($_POST["compute"])) {

                    include "Fare.php";
                    $fare = new Fare;
                    $fare->setDetails($_POST["age"], $_POST["distance"]);

                    echo '<div class="form-control border-0">';

                    echo "Age: " . $_POST["age"] . " years old";
                    echo "<br>";
                    echo "Distance: " . $_POST["distance"] . " km";
                    echo "<br>";
                    echo "<h6 class='text-danger'>Fare: " . $fare->getFare() . "</h6>";

                    echo '</div>';
                } ?>
            </div>
        </form>


    </main>

</body>

</html>

<?php
