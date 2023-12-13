<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\LaundryOrder;
use App\Models\Package;
use App\Models\SelectedLaundryItem;
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
            // 'laundry_id' => 'required|exists:laundries,id',
            // 'package_id' => 'required|exists:packages,id',
            // 'selected_items' => 'required|array',
            // 'selected_items.*.name' => 'required|string',
            // 'selected_items.*.quantity' => 'required|integer|min:1',
            // Add any other validation rules as needed
        ]);
    
        $laundryOrder = new LaundryOrder();
        $laundryOrder->laundry_id = $request->input('laundry_id');
        $laundryOrder->package_id = $request->input('package_id');
        $laundryOrder->statuspembayaran = 'Menunggu Pembayaran';
        $laundryOrder->save();
    
        foreach ($request->input('selected_items') as $item) {
            list($itemName, $itemQuantity) = explode(':', $item);
            $selectedLaundryItem = new SelectedLaundryItem();
            $selectedLaundryItem->laundry_order_id = $laundryOrder->id;
            $selectedLaundryItem->name = $itemName;
            $selectedLaundryItem->quantity = $itemQuantity;
            $selectedLaundryItem->save();
        }
        
        return redirect()->route('confirm', ['order_id' => $laundryOrder->id]);
    }
}
