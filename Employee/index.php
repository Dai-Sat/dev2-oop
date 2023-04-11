<?php
function table_1($col_list)
{
    foreach ($col_list as $col => $val) {
        if ($col != "Name") {
            $val = number_format($val, 2);
        }

        echo '<div class="row pb-3">';
        echo ' <div class="col-8 fw-bold">' . $col . '</div>';
        if ($col == "Healthcare" or $col == "Tax") {
            echo ' <div class="col-4 text-danger">' . $val . '</div>';
        } else {
            echo ' <div class="col-4">' . $val . '</div>';
        }
        echo '</div>';
    }
}

function table_2($col_list)
{
    foreach ($col_list as $col => $val) {
        if ($col == "Net Income") {
            $val = number_format(round($val, 0), 2);
        } elseif ($val != "") {
            $val = number_format($val, 2);
        }

        if ($col == "Gross Income" or $col == "Deductions" or $col == "Net Income") {
            if ($col == "Gross Income" or $col == "Net Income") {
                echo '<div class="row border-top border-dark pt-2">';
            } else {
                echo '<div class="row">';
            }
            echo ' <div class="col-8 fw-bold">' . $col . '</div>';
            echo ' <div class="col-4 fw-bold">' . $val . '</div>';
            echo '</div>';
        } else {
            echo '<div class="row pb-3">';
            echo ' <div class="col-8 fst-italic pt-1" style="font-size:12px">' . $col . '</div>';
            echo ' <div class="col-4">' . $val . '</div>';
            echo '</div>';
        }
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <title>Income</title>
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
                <div class="card-header text-center bg-success">
                    <h5 class="text-center fw-bold text-white">Net Income Calculator</h5>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="fw-bold mb-2">Name</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="pos" class="fw-bold mb-1">Position</label>
                        <br>
                        <input type="radio" name="pos" id="staff" value="staff">
                        <label class="" for="staff">Staff</label>
                        &nbsp &nbsp
                        <input type="radio" name="pos" id="admin" value="admin">
                        <label class="" for="admin">Admin</label>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold mb-1">Civil Status</label>
                        <br>
                        <input type="radio" name="c_status" id="single" value="single">
                        <label class="" for="staff">Single</label>
                        &nbsp &nbsp
                        <input type="radio" name="c_status" id="married" value="married">
                        <label class="" for="admin">Married</label>
                    </div>

                    <div class="mb-3">
                        <label for="e_status" class=" fw-bold mb-2">Employment Status</label>
                        <select name="e_status" id="e_status" class="form-select">
                            <option hidden>Select status</option>
                            <option value="C">Casual</option>
                            <option value="P">Probationary</option>
                            <option value="R">Regular</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="hours" class="fw-bold mb-2">No. of Hours Worked</label>
                        <input type="number" name="hours" id="hours" class="form-control">
                    </div>

                    <br>

                    <button type="submit" name="submit" class="btn btn-outline-success mx-auto form-control" name="submit">Submit</button>
                </div>
            </div>
        </form>

        <?php
        if (isset($_POST["submit"])) {

            // hours_calculation
            if ($_POST["hours"] > 40) {
                $regular_hours = 40;
                $over_hours = $_POST["hours"] - 40;
            } else {
                $regular_hours = $_POST["hours"];
                $over_hours = 0;
            }

            include "Employee.php";
            $input_list = [$_POST["pos"], $_POST["c_status"], $_POST["e_status"], $regular_hours];
            $income = new Income($input_list);

            $regular_pay = $income->getRegularPay();

            $overtime_pay = 0;
            if ($_POST["hours"] > 40) {
                $overtime_pay = $income->getOvertimePay($over_hours);
            }

            $gross_income = $regular_pay + $overtime_pay;

            $deduction_list = $income->Deductions($gross_income);
            $health_care = $deduction_list[0];
            $tax = $deduction_list[1];
            $deductions = $health_care + $tax;

            $net_income = $gross_income - $deductions;

            // table
            $col_list_1 = [
                "Name" => $_POST["name"],
                "Regular Pay" => $regular_pay,
                "Overtime Pay" => $overtime_pay,
                "Healthcare" => $health_care,
                "Tax" => $tax
            ];
            $col_list_2 = [
                "Gross Income" => $gross_income,
                "Regular Pay + Overtime Pay" => "",
                "Deductions" => $deductions,
                "Healthcare + Tax" => "",
                "Net Income" =>  $net_income,
                "Gross Income - Deductions" => ""
            ];

            echo '<div class="bg-info w-25 mx-auto mt-2 p-4">';

            table_1($col_list_1);
            table_2($col_list_2);

            echo '</div>';
        }
        ?>


    </main>

</body>

</html>
