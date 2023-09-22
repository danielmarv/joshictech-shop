<?php
// app/Http/Controllers/ShopController.php
namespace App\Http\Controllers\Api\V2\Shop;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return response()->json(['shops' => $shops], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'string',
            'address' => 'string',
            'contact' => 'string',
        ]);

        $shop = Shop::create($request->all());

        return response()->json(['shop' => $shop], 201);
    }

    public function show($id)
    {
        $shop = Shop::find($id);

        if (!$shop) {
            return response()->json(['message' => 'Shop not found'], 404);
        }

        return response()->json(['shop' => $shop], 200);
    }

    public function update(Request $request, $id)
    {
        $shop = Shop::find($id);

        if (!$shop) {
            return response()->json(['message' => 'Shop not found'], 404);
        }

        $this->validate($request, [
            'name' => 'string',
            'description' => 'string',
            'address' => 'string',
            'contact' => 'string',
        ]);

        $shop->update($request->all());

        return response()->json(['shop' => $shop], 200);
    }

    public function destroy($id)
    {
        $shop = Shop::find($id);

        if (!$shop) {
            return response()->json(['message' => 'Shop not found'], 404);
        }

        $shop->delete();

        return response()->json(['message' => 'Shop deleted'], 204);
    }
}
