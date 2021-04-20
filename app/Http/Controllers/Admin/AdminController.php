<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sale;
use App\Models\User;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\StockAlert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(Request $request){
        $productCount = Product::count();
        $adminCount = User::role('admin')->count();
        $customerCount = Customer::count();
        $supplierCount = Supplier::count();

        $day = date('d');
        $month = date('m');
        $year = date('Y');

        if($request->q=='yearly'){
            $totalSales = Sale::whereYear('created_at',$year)->sum('total_amount');
            $totalExpense = Expense::whereYear('created_at',$year)->sum('price');
            $revenue = Sale::whereYear('created_at',$year)->sum('paid_amount');
            $income = Income::whereYear('created_at',$year)->sum('price');   
            $purchase = Purchase::whereYear('created_at',$year)->sum('cost_price');   

        }else if($request->q == 'monthly'){   
            $totalSales = Sale::whereMonth('created_at',$month)->whereYear('created_at',$year)->sum('total_amount');
            $totalExpense = Expense::whereMonth('created_at',$month)->whereYear('created_at',$year)->sum('price');
            $revenue = Sale::whereMonth('created_at',$month)->whereYear('created_at',$year)->sum('paid_amount');
            $income = Income::whereMonth('created_at',$month)->whereYear('created_at',$year)->sum('price');
            $purchase = Purchase::whereMonth('created_at',$month)->whereYear('created_at',$year)->sum('cost_price');

        }else{
            $totalSales = Sale::whereDay('created_at',$day)->whereYear('created_at',$year)->sum('total_amount');
            $totalExpense = Expense::whereDay('created_at',$day)->whereYear('created_at',$year)->sum('price');
            $revenue = Sale::whereDay('created_at',$day)->whereYear('created_at',$year)->sum('paid_amount');
            $income = Income::whereDay('created_at',$day)->whereYear('created_at',$year)->sum('price');
            $purchase = Purchase::whereDay('created_at',$day)->whereYear('created_at',$year)->sum('cost_price');
            
        }
        
        $totalIncome = $revenue + $income;
        $totalProfit = $totalIncome - $totalExpense - $purchase;

        $lowStocks = StockAlert::with('product')->get();
        
        return view('admin.dashboard',compact('productCount','customerCount','adminCount','supplierCount',
            'totalIncome','totalExpense','totalProfit','totalSales','lowStocks',
        ));
    }

}
