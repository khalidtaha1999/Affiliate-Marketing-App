<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\User;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SampleChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $userId = Auth::id();
        $refreall=User::where('referred_by',$userId)->count();
        return Chartisan::build()
            ->labels([''])
            ->dataset('Sample', [$refreall]);

    }
}
