<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        //All Category Data
        $category_list =[];
        $categories = array("Design", "Sales", "Marketing", "Finance", "Technology", "Engineering", "Business", "Human Resource");
        foreach ($categories as $category) {
           $data = Job::where('category', $category)->count();
            array_push($category_list, (object)[
                'category' => $category,
                'available' => $data,
            ]);
        }

        return response([
            'data' => $category_list,
        ], 200);
    }

    public function store(Request $request)
    {

        $fields = $request->validate([
            'title' => 'required|string|unique:categories,title'
        ]);
        $data = Category::create([
            'title' => $fields['title'],
        ]);
        $response = [
            'message' => 'Category Created Successfully',
            'data' => $data,
        ];

        return response($response, 201);
    }
}
