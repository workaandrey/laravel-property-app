<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SearchPropertyRequest;
use App\Models\Property;

class PropertyController extends Controller
{
    public function search(SearchPropertyRequest $request)
    {
        $query = Property::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', $request->bedrooms);
        }

        if ($request->filled('bathrooms')) {
            $query->where('bathrooms', $request->bathrooms);
        }

        if ($request->filled('storeys')) {
            $query->where('storeys', $request->storeys);
        }

        if ($request->filled('garages')) {
            $query->where('garages', $request->garages);
        }

        if ($request->filled('price_from')) {
            $query->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $query->where('price', '<=', $request->price_to);
        }

        return response()->json($query->get());
    }
}
