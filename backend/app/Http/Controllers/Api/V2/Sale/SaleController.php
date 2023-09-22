<?php
// app/Http/Controllers/SaleController.php
namespace App\Http\Controllers\Api\V2\Sale;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return response()->json(['sales' => $sales], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'shop_id' => 'required|integer|exists:shops,id',
            'user_id' => 'required|integer|exists:users,id',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'date' => 'date',
        ]);

        $sale = Sale::create($request->all());

        return response()->json(['sale' => $sale], 201);
    }

    public function show($id)
    {
        $sale = Sale::find($id);

        if (!$sale) {
            return response()->json(['message' => 'Sale not found'], 404);
        }

        return response()->json(['sale' => $sale], 200);
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::find($id);

        if (!$sale) {
            return response()->json(['message' => 'Sale not found'], 404);
        }

        $this->validate($request, [
            'shop_id' => 'integer|exists:shops,id',
            'user_id' => 'integer|exists:users,id',
            'total_amount' => 'numeric',
            'payment_method' => 'string',
            'date' => 'date',
        ]);

        $sale->update($request->all());

        return response()->json(['sale' => $sale], 200);
    }

    public function destroy($id)
    {
        $sale = Sale::find($id);

        if (!$sale) {
            return response()->json(['message' => 'Sale not found'], 404);
        }

        $sale->delete();

        return response()->json(['message' => 'Sale deleted'], 204);
    }
}
