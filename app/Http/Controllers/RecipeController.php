<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Recipe;

use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{


    public function searchRecipes()
    {
        $query = \Illuminate\Support\Facades\Request::input('query');


        // Search in the database
        $dbResults = Recipe::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('title', 'LIKE', '%' . $query . '%')
            ->get();

        // Search in the API
        $apiResponse = Http::get('https://api.edamam.com/api/recipes/v2', [
            'q' => $query,
            'type' => 'public',
            'app_id' => config('services.edamam.app_id'),
            'app_key' => config('services.edamam.app_key'),
        ]);

        $apiResults = $apiResponse->json()['hits'];

        // Save API results to your database
        foreach ($apiResults as $hit) {
            $recipeData = $hit['recipe'];

            // Extracted values
            $title = $recipeData['label'];
            
            $regularImageUrl = $recipeData['images']['REGULAR'];
            $yield = is_array($recipeData['yield']) ? $recipeData['yield']['total'] : $recipeData['yield'];
            if (is_array($recipeData['calories'])) {
                // Assuming the calories array has a 'total' key
                $calories = $recipeData['calories']['total'];
            } else {
                // If it's not an array, treat it as a single number
                $calories = $recipeData['calories'];
            }
            Recipe::updateOrCreate(
                ['external_id' => $recipeData['uri']],
                [
                    'title' => $title,
                    'calories' => $calories,
                    'image_url' => $regularImageUrl,
                    'yield' => $yield,
                
                ]
            );
        }

        return view('recipes.search', [
            'dbResults' => $dbResults,
            'apiResults' => $apiResults,
        ]);
    }


    public function fetchRecipes()
    {
        $response = Http::get('https://api.edamam.com/api/recipes/v2', [
            'q' => 'anything',
            'type' => 'public',
            'app_id' => config('services.edamam.app_id'),
            'app_key' => config('services.edamam.app_key'),
        ]);

        $data = $response->json();

        foreach ($data['hits'] as $hit) {
            $recipeData = $hit['recipe'];
        
            // Extracted values
            $title = $recipeData['label'];
            $calories = is_array($recipeData['calories']) ? $recipeData['calories']['total'] : $recipeData['calories'];
            $yield = is_array($recipeData['yield']) ? $recipeData['yield']['total'] : $recipeData['yield'];
        
        
            // Save to database using Eloquent
            Recipe::updateOrCreate(
                ['external_id' => $recipeData['uri']],
                [
                    'title' => $title,
                    'calories' => $calories,
                    'yield' => $yield,
                ]
            );
        }
        

        return 'Recipes fetched and saved!';
    }

   
}
