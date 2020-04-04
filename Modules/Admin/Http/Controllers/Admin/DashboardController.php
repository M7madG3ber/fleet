<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Modules\User\Entities\User;
use Modules\Order\Entities\Order;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Review\Entities\Review;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\SearchTerm;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with its widgets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalOrders = Order::withoutCanceledOrders()->count();

        // completed
        $completed = Order::where("status", "completed")->get()->count();
        $completedSales = DB::table('orders')->where("status", "completed")->sum('total');
        $rateCompleted = (int) (($completed / $totalOrders) * 100);

        // pending
        $pending = Order::where("status", "pending")->get()->count();
        $pendingSales = DB::table('orders')->where("status", "pending")->sum('total');
        $ratePending = (int) (($pending / $totalOrders) * 100);
        $ratePendingCompleted = (int) (($pending / $completed) * 100);

        return view('admin::dashboard.index', [
            'totalOrders' => $totalOrders, // 1
            'totalSales' => Order::totalSales(), // 2
            'completed' => $completed, // 3
            'completedSales' => $completedSales, // 4
            'rateCompleted' => $rateCompleted, // 5
            'pending' => $pending, // 6
            'pendingSales' => $pendingSales, // 7
            'ratePending' => $ratePending, // 8
            'ratePendingCompleted' => $ratePendingCompleted, // 9

            'totalProducts' => Product::withoutGlobalScope('active')->count(),
            'totalCustomers' => User::totalCustomers(),
            'latestSearchTerms' => $this->getLatestSearchTerms(),
            'latestOrders' => $this->getLatestOrders(),
            'latestReviews' => $this->getLatestReviews(),
        ]);
    }

    private function getLatestSearchTerms()
    {
        return SearchTerm::latest('updated_at')->take(5)->get();
    }

    /**
     * Get latest five orders.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getLatestOrders()
    {
        return Order::select([
            'id',
            'customer_first_name',
            'customer_last_name',
            'total',
            'status',
            'created_at',
        ])
            ->latest()
            ->take(5)
            ->get();
    }

    /**
     * Get latest five reviews.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getLatestReviews()
    {
        return Review::select('id', 'product_id', 'reviewer_name', 'rating')
            ->has('product')
            ->with('product:id')
            ->limit(5)
            ->get();
    }
}
