<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $incomingCount = auth()->user()->calls()->incoming()->count();
        $outgoingCount = auth()->user()->calls()->outgoing()->count();
        $missedCount = auth()->user()->calls()->missed()->count();
        $averageDuration = auth()->user()->calls()->avg('duration');

        $callsGraph = auth()->user()->calls()->whereMonth('created_at', now()->month)->orderBy('created_at')->get()->groupBy(function ($call) {
            return $call->created_at->format('d M Y');
        })
            ->sortKeys()
            ->map(function ($calls) {
                return $calls->count();
            });

        return view('app.home.index', [
            'incomingCount' => $incomingCount,
            'outgoingCount' => $outgoingCount,
            'missedCount' => $missedCount,
            'avgDuration' => $averageDuration,
            'callsGraph' => $callsGraph,
        ]);

    }
}
