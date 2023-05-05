<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductsAttributes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderProductController extends Controller
{
    private function random_color()
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
    public function OrderProduct()
    {

        Session::put('page', 'order-product-total');

        $productTotal = ProductsAttributes::join('products', 'products_attributes.product_id', 'products.id')
            ->select('products_attributes.product_id', 'products.product_name', 'products.product_price', DB::raw('SUM(products_attributes.stock) AS total_stock'), DB::raw('SUM(products_attributes.total) AS total_price'))
            ->groupBy('products_attributes.product_id', 'products.product_name', 'products.product_price')
            ->get();
        $productTotalJson = $productTotal->toJson();

        return view('admin.order-product.order-product-total')->with(compact('productTotal', 'productTotalJson'));
    }

    public function searchProducts(Request $request)
    {
        Session::put('page', 'order-product');

        $start_date = $request->input('start_date') ?? Carbon::now()->subDays(30)->format('Y-m-d');
        $end_date = $request->input('end_date') ?? Carbon::now()->format('Y-m-d');

        $product = DB::select("
            SELECT product_name, DATE_FORMAT(created_at, '%m-%Y') AS month, SUM(product_qty) AS total_quantity
            FROM orders_products
            WHERE created_at BETWEEN ? AND ?
            GROUP BY product_name, month
            ORDER BY DATE_FORMAT(created_at, '%Y-%m'), total_quantity DESC", [$start_date, $end_date]);

        $datasets = [];
        $colors = [];

        foreach ($product as $p) {
            $name = $p->product_name;
            $month = $p->month;
            $quantity = $p->total_quantity;

            if (!isset($data[$name][$month])) {
                $data[$name][$month] = 0;
            }
            $data[$name][$month] += $quantity;

            if (!isset($colors[$name])) {
                $colors[$name] = $this->random_color();
            }

            $datasetIndex = array_search($name, array_column($datasets, 'label'));

            if ($datasetIndex === false) {
                $datasets[] = [
                    'label' => $name,
                    'data' => [$data[$name][$month]],
                    'backgroundColor' => $colors[$name],
                ];
            } else {
                $datasets[$datasetIndex]['data'][] = $data[$name][$month];
            }
        }

        $chart_data = [
            'labels' => array_values(array_unique(array_column($product, 'month'))),
            'datasets' => array_values($datasets),
        ];

        $chart_data_json = json_encode($chart_data);

        return view('admin.order-product.order-product', compact('product', 'start_date', 'end_date', 'chart_data_json'));
    }


    public function orderDate(Request $request)
    {
        Session::put('page', 'order-date');

        $date = $request->input('month') ?? date('Y-m');

        $week = DB::table('orders')
            ->selectRaw("CONCAT(YEAR(created_at), '-', WEEK(created_at)) as week, SUM(grand_total) as revenue")
            ->whereRaw("YEAR(created_at) = ? AND MONTH(created_at) = ?", [substr($date, 0, 4), substr($date, 5)])
            ->groupBy('week')
            ->get();
        // dd($week);

        $dateAndRevenue = DB::table('orders')
            ->selectRaw("DATE_FORMAT(orders.created_at, '%d-%m-%Y') as date, SUM(orders.grand_total) as revenue,
        SUBSTRING_INDEX(GROUP_CONCAT(products.product_name ORDER BY orders_products.product_qty DESC SEPARATOR '|'), '|', 1) as best_selling_product")
            ->join('orders_products', 'orders.id', '=', 'orders_products.order_id')
            ->join('products', 'orders_products.product_id', '=', 'products.id')
            ->whereRaw("YEAR(orders.created_at) = ? AND MONTH(orders.created_at) = ?", [substr($date, 0, 4), substr($date, 5)])
            ->groupBy('date')
            ->get();
        $productTotalJson = $dateAndRevenue->toJson();

        return view('admin.order-product.order-date', compact('dateAndRevenue', 'productTotalJson', 'date'));
    }
}
