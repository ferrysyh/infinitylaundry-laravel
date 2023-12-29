<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\Package;
use App\Models\TransactionHistory;
use App\Models\User;
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
        }
    }

    public function laporan(){
        $laundryid = auth()->user()->id;
        $laporan = TransactionHistory::where('laundry_id', $laundryid)->get();
        $laporan = TransactionHistory::with('LaundryOrder')
        ->where('laundry_id', $laundryid)->get();

        $role = auth()->user()->role;

        if($role === 'owner'){
            return view('pages.owner.laporan',['laporan' => $laporan]);
        }

    }
}
