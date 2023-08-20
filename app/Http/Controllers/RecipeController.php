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


        
        $dbResults = Recipe::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('title', 'LIKE', '%' . $query . '%')
            ->get();

       
        $apiResponse = Http::get('https://api.edamam.com/api/recipes/v2', [
            'q' => $query,
            'type' => 'public',
            'app_id' => config('services.edamam.app_id'),
            'app_key' => config('services.edamam.app_key'),
        ]);

        $apiResults = $apiResponse->json()['hits'];

        
        foreach ($apiResults as $hit) {
            $recipeData = $hit['recipe'];

            // Extracted values
            $title = $recipeData['label'];
            
            $regularImageUrl = $recipeData['images']['REGULAR'];
            $yield = is_array($recipeData['yield']) ? $recipeData['yield']['total'] : $recipeData['yield'];
            if (is_array($recipeData['calories'])) {
                
                $calories = $recipeData['calories']['total'];
            } else {
                
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
        
        foreach ($apiResults as &$hit) {
            $hit['recipe']['randomPrice'] = rand(1000, 30000); 
        }
        return view('home', [
            'dbResults' => $dbResults,
            'apiResults' => $apiResults,
        ]);

        
    }

    public function viewAllRecipes()
    
        {
            $recipes = Recipe::all();
            
            return response()->json(['recipes' => $recipes]);
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
        
           
            $title = $recipeData['label'];
            $calories = is_array($recipeData['calories']) ? $recipeData['calories']['total'] : $recipeData['calories'];
            $yield = is_array($recipeData['yield']) ? $recipeData['yield']['total'] : $recipeData['yield'];
        
        
         
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
