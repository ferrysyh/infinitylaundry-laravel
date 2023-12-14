<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\LaundryOrder;
use App\Models\Package;
use App\Models\SelectedLaundryItem;
use App\Models\TransactionHistory;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showPackage(Request $request, $id)
    {
        $selectedLaundry = Laundry::find($id);
        if (!$selectedLaundry) {
            abort(404);
        }
        $selectedLaundry->load('packages');
        return view('pages.customers.order.package', compact('selectedLaundry'));
    }

    public function showItems($laundryId, $packageId)
    {
        $selectedLaundry = Laundry::find($laundryId);
        $selectedPackage = Package::find($packageId);
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
        
        return redirect()->route('confirm', [
            'laundry_id' => $request->input('laundry_id'),
            'package_id' => $request->input('package_id'),
            'order_id' => $laundryOrder->id,
        ]);
    }

    public function confirm($laundry_id, $package_id, $order_id) {
        $selectedLaundry = Laundry::find($laundry_id);
        $selectedPackage = Package::find($package_id);
        $laundryOrder = LaundryOrder::find($order_id);

        $totalWeight = $laundryOrder->selectedLaundryItems->sum('quantity');
        $totalWeight = $this->calculateTotalWeight($laundryOrder->selectedLaundryItems);
        $totalCost = $selectedPackage->price * $totalWeight;

        return view('pages.customers.order.confirm', compact('selectedLaundry', 'selectedPackage', 'laundryOrder', 'totalWeight', 'totalCost'));
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

        TransactionHistory::create([
            'user_id' => $userId,
            'laundry_id' => $laundryId,
            'package_id' => $packageId,
            'order_id' => $orderId,
            'price' => $price,
        ]);

        return redirect()->route('payment');
    }
}
