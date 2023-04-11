<?php

class Income
{
    // properties
    private $position;
    private $civil_status;
    private $emp_status;
    private $r_hours;


    // setters
    public function __construct($input_list)
    {
        // $input_list = [$_POST["pos"], $_POST["c_status"], $_POST["e_status"], $_POST["hours"]];
        $this->position = $input_list[0];
        $this->civil_status = $input_list[1];
        $this->emp_status = $input_list[2];
        $this->r_hours = $input_list[3];
    }

    public function getRegularPay()
    {
        if ($this->position == "staff") {
            if ($this->emp_status == "C") {
                $h_wage = 300 / 8;
            } elseif ($this->emp_status == "P") {
                $h_wage = 350 / 8;
            } else {
                $h_wage = 400 / 8;
            }
        } else {
            if ($this->emp_status == "C") {
                $h_wage = 350 / 8;
            } elseif ($this->emp_status == "P") {
                $h_wage = 400 / 8;
            } else {
                $h_wage = 500 / 8;
            }
        }
        return $h_wage * $this->r_hours;
    }

    public function getOvertimePay($ov_hours)
    {
        if ($this->position == "staff") {
            if ($this->emp_status == "C") {
                $h_wage = 10;
            } elseif ($this->emp_status == "P") {
                $h_wage = 25;
            } else {
                $h_wage = 30;
            }
        } else {
            if ($this->emp_status == "C") {
                $h_wage = 15;
            } elseif ($this->emp_status == "P") {
                $h_wage = 30;
            } else {
                $h_wage = 40;
            }
        }
        return $h_wage * $ov_hours;
    }

    public function Deductions($gross)
    {
        if ($this->civil_status == "single") {
            $care = 200;
            if ($gross <= 1000) {
                $tax = 0;
            } else {
                $tax = $gross * 0.05;
            }
        } else {
            $care = 75;
            if ($gross <= 1500) {
                $tax = 0;
            } else {
                $tax = $gross * 0.03;
            }
        }
        $d_list = [$care, $tax];
        return $d_list;
    }
}
