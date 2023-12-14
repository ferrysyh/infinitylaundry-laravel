<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;

        $transactionHistories = TransactionHistory::where('user_id', $userId)->get();
        $transactionHistories = TransactionHistory::with('LaundryOrder')->where('user_id', $userId)->get();

        $role = auth()->user()->role;

        if ($role === 'customer') {
            return view('pages.customers.dashboard', ['transactionHistories' => $transactionHistories]);
        } elseif ($role === 'owner') {
            return view('pages.owner.dashboard', ['transactionHistories' => $transactionHistories]);
        }
    }
}
