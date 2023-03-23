<?php

namespace App\Http\Controllers;

use App\Models\ShipmentType;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = ShipmentType::all();
        return view('Dashboard.shipment.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.shipment.type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        ShipmentType::create($request->all());

        return redirect()->route('types.index')
            ->with('success', 'تم إنشاء النوع بنجاح.');
    }
    /**
     * Display the specified resource.
     */
    public function show(ShipmentType $type)
    {
        return view('Dashboard.shipment.type.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShipmentType $type)
    {
        return view('Dashboard.shipment.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShipmentType $type)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $type->update($request->all());

        return redirect()->route('types.index')
            ->with('success', 'تم تحديث النوع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShipmentType $type)
    {
        $type->delete();

        return redirect()->route('types.index')
            ->with('success', 'تم حذف النو بنجاح');
    }
}
