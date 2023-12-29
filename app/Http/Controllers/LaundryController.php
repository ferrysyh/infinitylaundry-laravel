<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\LaundryOrder;
use App\Models\Package;
use App\Models\SelectedLaundryItem;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laundry = Laundry::get();
        return view('pages.customers.order.laundry', ['laundries' => $laundry]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.formlaundry', [
            'title' => 'Tambah',
            'method' => 'POST',
            'action' => 'laundry'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $laundry = new Laundry;
        $laundry->name = $request->name;
        $laundry->address = $request->address;
        $laundry->rating = $request->rating;
        $laundry->img_path = $request->img_path;
        $laundry->save();
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Laundry::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('layouts.formlaundry', [
            'title' => 'Edit',
            'method' => 'PUT',
            'action' => "laundry/$id",
            'laundry' => Laundry::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $laundry = Laundry::find($id);
        $laundry->name = $request->name;
        $laundry->address = $request->address;
        $laundry->rating = $request->rating;
        $laundry->img_path = $request->img_path;
        $laundry->save();
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Laundry::destroy($id);
        return redirect('/dashboard');
    }

    public function showPackage(Request $request, $id)
    {
        $decryptedId = decrypt($id);
        $selectedLaundry = Laundry::find($decryptedId);
        if (!$selectedLaundry) {
            abort(404);
        }
        $selectedLaundry->load('packages');
        return view('pages.customers.order.package', compact('selectedLaundry'));
    }

    public function showItems($laundryId, $packageId)
    {
        $decryptedLaundryId = decrypt($laundryId);
        $decryptedPackageId = decrypt($packageId);
        $selectedLaundry = Laundry::find($decryptedLaundryId);
        $selectedPackage = Package::find($decryptedPackageId);
        if (!$selectedLaundry || !$selectedPackage) {
            abort(404); 
        }
        return view('pages.customers.order.items', compact('selectedLaundry', 'selectedPackage'));
    }

    public function submitOrder(Request $request)
    {
        $request->validate([
            'selected_items' => 'required|array',
            'selected_items.*' => 'required|string',
        ]);
    
        $laundryOrder = new LaundryOrder();
        $laundryOrder->laundry_id = $request->input('laundry_id');
        $laundryOrder->package_id = $request->input('package_id');
        $laundryOrder->save();
    
        foreach ($request->input('selected_items') as $item) {
            list($itemName, $itemQuantity) = explode(':', $item);
            $selectedLaundryItem = new SelectedLaundryItem();
            $selectedLaundryItem->laundry_order_id = $laundryOrder->id;
            $selectedLaundryItem->name = $itemName;
            $selectedLaundryItem->quantity = $itemQuantity;
            $selectedLaundryItem->save();
        }
        
        $encryptedLaundryId = encrypt($request->input('laundry_id'));
        $encryptedPackageId = encrypt($request->input('package_id'));
        $encryptedOrderId = encrypt($laundryOrder->id);
        
        return redirect()->route('confirm', [
            'laundry_id' => $encryptedLaundryId,
            'package_id' => $encryptedPackageId,
            'order_id' => $encryptedOrderId,
        ]);
    }

    private function calculateTotalWeight($selectedItems)
    {
        $itemWeights = [
            'Kemeja' => 0.5, 
            'Kaos' => 0.3,
            'Celana Panjang' => 0.7,
            'Celana Pendek' => 0.5,
            'Handuk' => 0.8,
        ];

        $defaultWeight = 1.0; 
        $totalWeight = 0;

        foreach ($selectedItems as $selectedItem) {
            $itemName = $selectedItem->name;
            $itemQuantity = $selectedItem->quantity;

            if (isset($itemWeights[$itemName])) {
                $totalWeight += $itemWeights[$itemName] * $itemQuantity;
            } else {
                $totalWeight += $defaultWeight * $itemQuantity;
            }
        }

        return $totalWeight;
    }

    public function submitConfirmation(Request $request)
    {
        $userId = $request->input('user_id');
        $laundryId = $request->input('laundry_id');
        $packageId = $request->input('package_id');
        $orderId = $request->input('order_id');
        $price = $request->input('price');
        $points = $request->input('points');
        $finalPrice = $price - $points;
        TransactionHistory::create([
            'user_id' => $userId,
            'laundry_id' => $laundryId,
            'package_id' => $packageId,
            'order_id' => $orderId,
            'price' => $finalPrice,
        ]);

        $user = User::find($userId);
        $user->poin -= $points;
        $user->save();

        $encryptedOrderId = encrypt($orderId);

        return redirect()->route('payment', ['id' => $encryptedOrderId]);
    }

    public function confirm($laundry_id, $package_id, $order_id) {
        $decryptedLaundryId = decrypt($laundry_id);
        $decryptedPackageId = decrypt($package_id);
        $decryptedOrderId = decrypt($order_id);

        $selectedLaundry = Laundry::find($decryptedLaundryId);
        $selectedPackage = Package::find($decryptedPackageId);
        $laundryOrder = LaundryOrder::find($decryptedOrderId);

        $totalWeight = $laundryOrder->selectedLaundryItems->sum('quantity');
        $totalWeight = $this->calculateTotalWeight($laundryOrder->selectedLaundryItems);
        $totalCost = $selectedPackage->price * $totalWeight;

        return view('pages.customers.order.confirm', compact('selectedLaundry', 'selectedPackage', 'laundryOrder', 'totalWeight', 'totalCost'));
    }

    public function payment($id){
        $decryptedOrderId = decrypt($id);
        $transaction = TransactionHistory::where('order_id', $decryptedOrderId)->first();
        return view('pages.customers.order.payment', ['transaction' => $transaction]);
    }

    public function ordered(Request $request){
        $userId = $request->id;
        $price = $request->price;
        $transactionId = $request->transaction_id;
        $balanceAwal = User::find($userId)->balance;
        $transaction = TransactionHistory::find($transactionId);
        $user = User::find($userId);
        if ($balanceAwal < $price){
            return redirect('/dashboard')->with('msg', 'Saldo tidak cukup');
        } else {
            $balance = $balanceAwal - $price;
            $transaction->statuspembayaran = 'Sedang diproses';
            $user->balance = $balance;
            $user->poin += 10;
            $user->levelPoin += 1;
            $user->save();
            $transaction->save();
            return redirect('/dashboard');
        }
    }
}
