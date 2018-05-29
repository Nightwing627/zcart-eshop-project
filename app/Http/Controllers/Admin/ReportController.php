<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{

    /**
     * Get the performance indicators for the application.
     *
     * @return Response
     */
    public function visitors()
    {
    	return "visitors reports";

        return response()->json([
            'indicators' => $this->indicators->all(60),
            'last_month' => $this->indicators->forDate(Carbon::today()->subMonths(1)),
            'last_year' => $this->indicators->forDate(Carbon::today()->subYears(1)),
        ]);
    }

}
