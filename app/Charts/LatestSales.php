<?php

namespace App\Charts;

use App\Helpers\CharttHelper;
use ConsoleTVs\Charts\Classes\Highcharts\Chart;

class LatestSales extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

		$dates = CharttHelper::Days(15);

		$this->displayLegend(false)
			->height(200)
			->labels($dates)
			->options([
				'yAxis' => [
					'title' => [
						'text' => null,
					],
					'labels' => [
						'format' => config('system_settings.currency.symbol') . '{value}',
					],
				],
			]);
    }
}
