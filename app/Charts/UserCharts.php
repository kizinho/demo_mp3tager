<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Echarts\Chart;

class UserCharts extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct($title) {
        parent::__construct();
        $this->export(false);
        $this->labels($title);
        
    }
}
