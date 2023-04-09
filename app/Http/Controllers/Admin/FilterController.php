<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductsFilter;
use App\Models\ProductsFiltersValue;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class FilterController extends Controller
{
    public function index()
    {
        Session::put('page', 'filters');
        $filters = ProductsFilter::get()->toArray();
        // dd($filters);
        return view('admin.filters.filters')->with(compact('filters'));
    }
    public function filterValue()
    {
        $filters_values = ProductsFiltersValue::get()->toArray();
        // dd($filters);
        return view('admin.filters.filters-value')->with(compact('filters_values'));
    }
    public function updateStatusFilter(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            ProductsFilter::where('id', $data['filter_id'])->update(['status' => $status]);

            return response()->json(['status' => $status, 'filter_id' => $data['filter_id']]);
        }
    }
    public function updateStatusFilterValue(Request $request)
    {
        Session::put('page', 'filters');

        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            ProductsFiltersValue::where('id', $data['filterValue_id'])->update(['status' => $status]);

            return response()->json(['status' => $status, 'filterValue_id' => $data['filterValue_id']]);
        }
    }
    public function addEditFilter(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Thêm Bộ Lọc";
            $filter = new ProductsFilter;
            $message = "Thêm Bộ Lọc Thành Công";
        } else {
            $title = "Chỉnh Sửa Bộ Lọc";
            $filter = ProductsFilter::find($id);
            $message = "Cập Nhật Bộ Lọc Thành Công";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            // echo "<pre>";
            // print_r($data);
            // die;
            $cat_ids = implode(',', $data['cat_ids']);
            $filter->cat_ids = $cat_ids;
            $filter->filter_name = $data['filter_name'];
            $filter->filter_column = $data['filter_column'];
            $filter->status = 1;
            $filter->save();
            DB::statement('Alter table products add ' . $data['filter_column'] . ' varchar(255)
                after description');
            return redirect('admin/filters')->with('success_message', $message);
        }
        $categories = Section::with('categories')->get()->toArray();
        return view('admin.filters.add-edit-filter')->with(compact('title', 'categories', 'filter'));
    }
    public function addEditFilterValue(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Thêm Giá Trị Bộ Lọc";
            $filterValue = new ProductsFiltersValue();
            $message = "Thêm Giá Trị Bộ Lọc Thành Công";
        } else {
            $title = "Chỉnh Sửa Giá Trị Bộ Lọc";
            $filterValue = ProductsFiltersValue::find($id);
            $message = "Cập Nhật Giá Trị Bộ Lọc Thành Công";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();

            $filterValue->filter_id = $data['filter_id'];
            $filterValue->filter_value = $data['filter_value'];
            $filterValue->status = 1;
            $filterValue->save();

            return redirect('admin/filters-value')->with('success_message', $message);
        }
        $filters = ProductsFilter::where('status', 1)->get()->toArray();
        return view('admin.filters.add-edit-filter-value')->with(compact('title', 'filters', 'filterValue'));
    }

    public function categoryFilter(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $category_id = $data['category_id'];
            return response()->json([
                'view' => (string)View::make('admin.filters.category-filter')->with(compact('category_id'))
            ]);
        }
    }
}
