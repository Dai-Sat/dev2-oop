<?php

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class PriceCalculation
{

    public $level;
    public $units;
    public $lab;
    public $total;

    // setters
    public function setDetails($level, $units, $lab)
    {
        $this->level = $level;
        $this->units = $units;
        $this->lab = $lab;
    }

    // getters
    public function getTotal()
    {
        $wl = 0;

        if ($this->level == 1) {
            $ppu = 550;
            if ($this->lab == "with") {
                $wl = 3359;
            }
        } elseif ($this->level == 2) {
            $ppu = 630;
            if ($this->lab == "with") {
                $wl = 4000;
            }
        } elseif ($this->level == 3) {
            $ppu = 470;
            if ($this->lab == "with") {
                $wl = 2890;
            }
        } else {
            $ppu = 501;
            if ($this->lab == "with") {
                $wl = 3555;
            }
        }

        return $this->total = ($this->units * $ppu) + $wl;
    }
}
