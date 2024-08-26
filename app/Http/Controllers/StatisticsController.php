<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use App\Http\Requests\StorestatisticsRequest;
use App\Http\Requests\UpdatestatisticsRequest;
use App\Repositories\StatisticsRepositoryInterface;
use App\Models\statistics;
use App\Services\StatisticService;

class StatisticsController extends Controller
{
    protected $statisticService;

    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    public function index()
    {
        $statistics  = $this->statisticService->getTopUsers(10);
        return view('backend.statistic.index', compact('statistics'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestatisticsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(statistics $statistics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(statistics $statistics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestatisticsRequest $request, statistics $statistics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(statistics $statistics)
    {
        //
    }
}
