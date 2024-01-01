<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\Package;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $role = auth()->user()->role;

        if ($role === 'customer') {
            $transactionHistories = TransactionHistory::where('user_id', $userId)->get();
            $transactionHistories = TransactionHistory::with('LaundryOrder')->where('user_id', $userId)->get();
            $user = User::find($userId);            
            if ($user->levelPoin < 100) {
                $user->level = 'Bronze';
                $user->save();
            } elseif ($user->levelPoin >= 100) {
                $user->level = 'Silver';
                $user->save();
            } elseif ($user->levelPoin >= 200) {
                $user->level = 'Gold';
                $user->save();
            } elseif ($user->levelPoin >= 300) {
                $user->level = 'Platinum';
                $user->save();
            }
            return view('pages.customers.dashboard', ['transactionHistories' => $transactionHistories]);
        } elseif ($role === 'owner') {
            $transactionHistories = TransactionHistory::where('user_id', $userId)->get();
            $transactionHistories = TransactionHistory::with('LaundryOrder')->where('laundry_id', $userId)->get();

            $currentMonth = Carbon::now()->month;
            $lastMonth = Carbon::now()->subMonth()->month;
            $lastLastMonth = Carbon::now()->subMonths(2)->month;

            $customerCountCurrent = TransactionHistory::whereMonth('created_at', $currentMonth)
                ->where('statuspembayaran', 'Selesai')
                ->count();
            $customerCountLast = TransactionHistory::whereMonth('created_at', $lastMonth)
                ->where('statuspembayaran', 'Selesai')
                ->count();
            $customerCountLastLast = TransactionHistory::whereMonth('created_at', $lastLastMonth)
                ->where('statuspembayaran', 'Selesai')
                ->count();
            
            $totalEarningsCurrent = TransactionHistory::whereMonth('created_at', $currentMonth)
                ->where('statuspembayaran', 'Selesai')
                ->sum('price');
            $totalEarningsLast = TransactionHistory::whereMonth('created_at', $lastMonth)
                ->where('statuspembayaran', 'Selesai')
                ->sum('price');
            $totalEarningsLastLast = TransactionHistory::whereMonth('created_at', $lastLastMonth)
                ->where('statuspembayaran', 'Selesai')
                ->sum('price');

            $laundry = Laundry::find($userId);
            $user = User::find($userId);            
            if ($user->levelPoin < 100) {
                $user->level = 'Bronze';
                $user->save();
            } elseif ($user->levelPoin >= 100) {
                $user->level = 'Silver';
                $user->save();
            } elseif ($user->levelPoin >= 200) {
                $user->level = 'Gold';
                $user->save();
            } elseif ($user->levelPoin >= 300) {
                $user->level = 'Platinum';
                $user->save();
            }
            return view('pages.owner.dashboard', ['transactionHistories' => $transactionHistories, 'laundry' => $laundry, 'customerCountCurrent' => $customerCountCurrent, 'customerCountLast' => $customerCountLast, 'customerCountLastLast' => $customerCountLastLast, 'totalEarningsCurrent' => $totalEarningsCurrent, 'totalEarningsLast' => $totalEarningsLast, 'totalEarningsLastLast' => $totalEarningsLastLast]);
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
        }
    }

    public function laporan(){
        $laundryid = auth()->user()->id;
        
        $laporan = TransactionHistory::with('LaundryOrder')
            ->where('laundry_id', $laundryid)
            ->get();

        $ordersByMonth = $laporan->where('statuspembayaran', 'Selesai')->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->format('Y-m');
        });

        $role = auth()->user()->role;

        if ($role === 'owner') {
            return view('pages.owner.laporan', ['ordersByMonth' => $ordersByMonth]);
        }
    }

    public function status(Request $request){
        $orderId = $request->input('id');
        $status = $request->input('status');
        $transactionHistory = TransactionHistory::find($orderId);
        $transactionHistory->statuspembayaran = $status;
        $laundry = User::find($transactionHistory->laundry_id);
        $laundry->balance += $transactionHistory->price;
        $laundry->save();
        $transactionHistory->save();
        return redirect('/dashboard');
    }
}
