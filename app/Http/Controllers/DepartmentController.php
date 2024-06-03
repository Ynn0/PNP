<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\PlantillaItem;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $plantillaItems = PlantillaItem::all();
        return view('departments.index', compact('departments', 'plantillaItems'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('departments.create', compact('departments'));
    }

    public function store(Request $request)
    {
        if ($request->has('item_number')) {
            // Store Plantilla Item
            $request->validate([
                'item_number' => 'required|unique:plantilla_items',
                'position_title' => 'required',
                'department_id' => 'required|exists:departments,id',
            ]);

            PlantillaItem::create($request->all());

            return redirect()->route('departments.index')->with('success', 'Plantilla Item created successfully.');
        } else {
            // Store Department
            $request->validate([
                'name' => 'required|unique:departments',
            ]);

            Department::create($request->all());

            return redirect()->route('departments.index')->with('success', 'Department created successfully.');
        }
    }

    public function show($id)
    {
        $department = Department::find($id);
        $plantillaItem = PlantillaItem::find($id);

        if ($department) {
            return view('departments.show', compact('department'));
        } elseif ($plantillaItem) {
            return view('departments.show-plantilla-item', compact('plantillaItem'));
        } else {
            return redirect()->route('departments.index')->with('error', 'Item not found.');
        }
    }

    public function edit($id)
    {
        $department = Department::find($id);
        $plantillaItem = PlantillaItem::find($id);
        $departments = Department::all();

        if ($department) {
            return view('departments.edit', compact('department'));
        } elseif ($plantillaItem) {
            return view('plantilla_items.edit', compact('plantillaItem', 'departments'));
        } else {
            return redirect()->route('departments.index')->with('error', 'Item not found.');
        }
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

    public function destroy($id)
    {
        $department = Department::find($id);
        $plantillaItem = PlantillaItem::find($id);

        if ($department) {
            $department->delete();
            return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
        } elseif ($plantillaItem) {
            $plantillaItem->delete();
            return redirect()->route('departments.index')->with('success', 'Plantilla Item deleted successfully.');
        } else {
            return redirect()->route('departments.index')->with('error', 'Item not found.');
        }
    }
}

