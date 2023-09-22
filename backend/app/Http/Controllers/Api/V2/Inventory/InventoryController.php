<?php
// app/Http/Controllers/InventoryController.php
namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::all();
        return response()->json(['inventory' => $inventory], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'shop_id' => 'required|integer|exists:shops,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer',
        ]);

        $inventory = Inventory::create($request->all());

        return response()->json(['inventory' => $inventory], 201);
    }

    public function show($id)
    {
        $inventory = Inventory::find($id);

        if (!$inventory) {
            return response()->json(['message' => 'Inventory not found'], 404);
        }

        return response()->json(['inventory' => $inventory], 200);
    }

    public function update(Request $request, $id)
    {
        $inventory = Inventory::find($id);

        if (!$inventory) {
            return response()->json(['message' => 'Inventory not found'], 404);
        }

        $this->validate($request, [
            'shop_id' => 'integer|exists:shops,id',
            'product_id' => 'integer|exists:products,id',
            'quantity' => 'integer',
        ]);

        $inventory->update($request->all());

        return response()->json(['inventory' => $inventory], 200);
    }

    public function destroy($id)
    {
        $inventory = Inventory::find($id);

        if (!$inventory) {
            return response()->json(['message' => 'Inventory not found'], 404);
        }

        $inventory->delete();

        return response()->json(['message' => 'Inventory deleted'], 204);
    }
}
