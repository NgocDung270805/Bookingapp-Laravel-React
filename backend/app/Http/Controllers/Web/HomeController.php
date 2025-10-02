<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Services\StatsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\BookingStatsUpdated;

class HomeController extends Controller
{
    protected $statsService;

    public function __construct(StatsService $statsService)
    {
        $this->statsService = $statsService;
    }

    public function index()
    {
        $stats = $this->statsService->getStats();
        
        // Broadcast stats khi load trang
        try {
            broadcast(new BookingStatsUpdated($stats))->toOthers();
        } catch (\Exception $e) {
        }
        
        return view('index', compact('stats'));
    }

    public function pJM()
    {
        return view('dashboard/project-management');
    }

    public function product()
    {
        return view('app/e-commerce/admin/product');
    }

    public function addProduct()
    {
        return view('app/e-commerce/admin/add-product');
    }
}
