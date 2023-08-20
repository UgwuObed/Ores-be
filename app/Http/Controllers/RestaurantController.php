<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function searchByLocation(Request $request)
    {
        $apiKey = '4270a7d638mshade3b5dca711827p16422djsna5178cdf653a';
        $response = Http::withHeaders([
            'X-RapidAPI-Key' => $apiKey,
            'X-RapidAPI-Host' => 'tripadvisor16.p.rapidapi.com'
        ])->get('https://tripadvisor16.p.rapidapi.com/api/v1/restaurant/searchLocation', [
            'query' => 'Lagos, Nigeria'
        ]);
        
        $data = $response->json();
        
        foreach ($data as $restaurantData) {
            Restaurant::create([
                'location_id' => $restaurantData['locationId'] ?? null,
                'name' => $restaurantData['localizedName'] ?? '',
                'address' => $restaurantData['streetAddress']['street1'] ?? '',
                'thumbnail' => $restaurantData['thumbnail']['photoSizeDynamic']['urlTemplate'] ?? '',
            ]);
        }
        

        $restaurants = Restaurant::select('location_id', 'name', 'address', 'thumbnail')->get();

        return view('restaurants.search', ['restaurants' => $restaurants]);
    }

    public function viewAllRestaurants()
        {
            $restaurants = Restaurant::all();
            
            return response()->json(['restaurants' => $restaurants]);
        }

}
