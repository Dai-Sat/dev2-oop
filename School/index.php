<!doctype html>
<html lang="en">

<head>
    <title>Registration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <main>
        <div class="container w-50 mx-auto mt-3">
            <form action="" method="post">
                <h4 class="text-center fw-bold text-uppercase">Registration</h4>

                <br>

                <div class="mb-3">
                    <label for="name" class="mb-2">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                </div>

                <div class="mb-3">
                    <label for="level" class="mb-2">Year Level</label>
                    <select name="level" id="level" class="form-select">
                        <option hidden>Choose your year level</option>
                        <option value="1">Year 1</option>
                        <option value="2">Year 2</option>
                        <option value="3">Year 3</option>
                        <option value="4">Year 4</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="units" class="mb-2">Total Units</label>
                    <input type="number" name="units" id="units" class="form-control" placeholder="Maximum of 23" max=23>
                </div>

                <div class="mb-3 text-center mx-auto">
                    <input type="radio" name="lab" id="with" value="with">
                    <label class="" for="with">
                        With lab
                    </label>
                    &nbsp &nbsp
                    <input type="radio" name="lab" id="without" value="without">
                    <label class="" for="without">
                        Without lab
                    </label>
                </div>

                <button type="submit" class="btn btn-dark form-control" name="submit">Submit</button>

                <?php
                if (isset($_POST["submit"])) {
                    include "School.php";
                    $Total_price = new PriceCalculation;
                    $Total_price->setDetails($_POST["level"], $_POST["units"], $_POST["lab"]);
                ?>

                    <div class="form-control border-0">
                        <p>Student name: <strong><?= $_POST["name"] ?></strong></p>
                        <p>Year level: <strong><?= $_POST["level"] ?></strong></p>
                        <p>No. of units: <strong><?= $_POST["units"] ?></strong></p>
                        <p><strong>Total Price: <?= $Total_price->getTotal() ?></strong></p>
                    </div>
                <?php } ?>
            </form>
        </div>
    </main>

</body>
