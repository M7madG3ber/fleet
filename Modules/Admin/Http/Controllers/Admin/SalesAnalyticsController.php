<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Modules\Order\Entities\Order;
use Illuminate\Routing\Controller;

class SalesAnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        return response()->json([
            'labels' => trans('admin::dashboard.sales_analytics.day_names'),
            'data' => $order->salesAnalytics(),
        ]);
    }
}
