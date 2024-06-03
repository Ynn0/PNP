<?php
namespace App\Http\Controllers;

use App\Models\PlantillaItem;
use App\Models\Department;
use Illuminate\Http\Request;

class PlantillaItemController extends Controller
{
    public function index()
    {
        $plantillaItems = PlantillaItem::all();
        return view('plantilla_items.index', compact('plantillaItems'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('plantilla_items.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_number' => 'required|unique:plantilla_items',
            'position_title' => 'required',
            'department_id' => 'required|exists:departments,id',
        ]);

        PlantillaItem::create($request->all());

        return redirect()->route('plantilla-items.index')->with('success', 'Plantilla Item created successfully.');
    }

    public function show(PlantillaItem $plantillaItem)
    {
        return view('plantilla_items.show', compact('plantillaItem'));
    }

    public function edit(PlantillaItem $plantillaItem)
    {
        $departments = Department::all();
        return view('plantilla_items.edit', compact('plantillaItem', 'departments'));
    }

    public function update(Request $request, $id)
{
    if ($request->has('item_number')) {
        // Update Plantilla Item
        $plantillaItem = PlantillaItem::find($id);

        $request->validate([
            'item_number' => 'required|unique:plantilla_items,item_number,' . $plantillaItem->id,
            'position_title' => 'required',
            'department_id' => 'required|exists:departments,id',
        ]);

        $plantillaItem->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Plantilla Item updated successfully.');
    } else {
        // Update Department
        $department = Department::find($id);

        $request->validate([
            'name' => 'required|unique:departments,name,' . $department->id,
        ]);

        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }
}


    public function destroy(PlantillaItem $plantillaItem)
    {
        $plantillaItem->delete();

        return redirect()->route('plantilla-items.index')->with('success', 'Plantilla Item deleted successfully.');
    }
}

