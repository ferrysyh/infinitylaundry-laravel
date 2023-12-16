<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\Package;
use App\Models\TransactionHistory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $role = auth()->user()->role;

        if ($role === 'customer') {
            $transactionHistories = TransactionHistory::where('user_id', $userId)->get();
            $transactionHistories = TransactionHistory::with('LaundryOrder')->where('user_id', $userId)->get();
            return view('pages.customers.dashboard', ['transactionHistories' => $transactionHistories]);
        } elseif ($role === 'owner') {
            $transactionHistories = TransactionHistory::where('user_id', $userId)->get();
            $transactionHistories = TransactionHistory::with('LaundryOrder')->where('laundry_id', $userId)->get();
            return view('pages.owner.dashboard', ['transactionHistories' => $transactionHistories]);
        } elseif ($role === 'admin') {
            $laundry = Laundry::get();
            $package = Package::get();
            return view('pages.admin.dashboard', ['laundry' => $laundry, 'package' => $package]);
        }
    }

    public function riwayat(){
        $userId = auth()->user()->id;

        $transactionHistories = TransactionHistory::where('user_id', $userId)->get();
        $transactionHistories = TransactionHistory::with('LaundryOrder')->where('user_id', $userId)->get();

        $role = auth()->user()->role;

        if ($role === 'customer') {
            return view('pages.customers.order.riwayat', ['transactionHistories' => $transactionHistories]);
        } elseif ($role === 'owner') {
            return view('pages.owner.dashboard', ['transactionHistories' => $transactionHistories]);
        }
    }
}
