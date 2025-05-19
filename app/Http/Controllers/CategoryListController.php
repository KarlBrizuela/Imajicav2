<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CategoryListController extends Controller
{
    public function index(){
        $categories = category::all();
        return view('page.category-list', compact('categories'));
    }

    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'categoryTitle' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:categories',
                'description' => 'nullable|string',
                'categoryImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
    
            if ($request->hasFile('categoryImage')) {
                $image = $request->file('categoryImage');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/categories'), $imageName);
                $data['categoryImage'] = 'uploads/categories/' . $imageName;
            }
    
            $category = category::create($data);
    
            // Check if it's an AJAX request (returns JSON)
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Category created successfully',
                    'data' => $category
                ]);
            }
    
            // If not an AJAX request, redirect to the list page with success message
            return redirect()->route('page.category-list')->with('success', 'Category created successfully!');
        } catch (\Exception $e) {
            // Handle errors differently for AJAX and non-AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
    
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
    
    /**
     * Returns all categories
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        $categories = category::all();
        return response()->json($categories);
    }

    public function getCategory($id)
    {
        try {
            $category = category::findOrFail($id);
            return response()->json($category);
        } catch (\Exception $e) {
            Log::error('Error fetching category:', ['message' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch category details'
            ], 500);
        }
    }

    public function delete(Request $request)
    {
        $categoryId = $request->input('category_id');
        
        try {
            Log::info('Attempting to delete category:', ['category_id' => $categoryId]);
            
            // Check if there are related products
            $relatedProductsCount = DB::table('new_product')->where('category_id', $categoryId)->count();
            
            if ($relatedProductsCount > 0) {
                // Option 1: Prevent deletion and notify user
                if ($request->input('force_delete') !== 'true') {
                    $message = "Cannot delete category: {$relatedProductsCount} product(s) are using this category. Please remove or reassign these products first, or use force delete option.";
                    
                    if ($request->ajax()) {
                        return response()->json([
                            'success' => false,
                            'message' => $message,
                            'relatedProductsCount' => $relatedProductsCount,
                            'needsForceDelete' => true
                        ], 400);
                    }
                    
                    return redirect()->back()->with('error', $message);
                }
                
                // Option 2: If force delete is selected, update related products to a default category
                $defaultCategoryId = $request->input('default_category_id');
                if (!$defaultCategoryId) {
                    // Find another category or create a default one
                    $defaultCategory = category::where('category_id', '!=', $categoryId)->first();
                    $defaultCategoryId = $defaultCategory ? $defaultCategory->category_id : null;
                    
                    if (!$defaultCategoryId) {
                        // Create a default category if no other exists
                        $defaultCategory = category::create([
                            'categoryTitle' => 'Uncategorized',
                            'slug' => 'uncategorized',
                            'description' => 'Default category for products with no category'
                        ]);
                        $defaultCategoryId = $defaultCategory->category_id;
                    }
                }
                
                // Update all related products to use the default category
                DB::table('new_product')
                    ->where('category_id', $categoryId)
                    ->update(['category_id' => $defaultCategoryId]);
            }
            
            // Now it's safe to delete the category
            $category = category::findOrFail($categoryId);
            $category->delete();
            
            Log::info('Category deleted successfully:', ['category_id' => $categoryId]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Category deleted successfully!'
                ]);
            }

            return redirect()->route('page.category-list')->with('success', 'Category deleted successfully!');
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Category not found:', ['category_id' => $categoryId, 'error' => $e->getMessage()]);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Category not found'
                ], 404);
            }
            
            return redirect()->back()->with('error', 'Category not found');
            
        } catch (\Exception $e) {
            Log::error('Error deleting category:', [
                'category_id' => $categoryId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred while deleting the category: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()->with('error', 'An error occurred while deleting the category: ' . $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            Log::info('Received category update data:', $request->all());

            $data = $request->validate([
                'category_id' => 'required|exists:categories,category_id',
                'categoryTitle' => 'required|string|max:255',
                'description' => 'nullable|string',
                'categoryImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $category = category::findOrFail($request->category_id);
            
            // Update basic fields
            $category->categoryTitle = $request->categoryTitle;
            $category->description = $request->description;

            // Handle image upload if new image is provided
            if ($request->hasFile('categoryImage')) {
                // Delete old image if it exists
                if ($category->categoryImage && file_exists(public_path($category->categoryImage))) {
                    unlink(public_path($category->categoryImage));
                }
                
                $image = $request->file('categoryImage');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/categories'), $imageName);
                $category->categoryImage = 'uploads/categories/' . $imageName;
            }

            $category->save();

            return redirect()->route('page.category-list')
                ->with('success', 'Category updated successfully!');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Category not found:', ['category_id' => $request->category_id]);
            return redirect()->back()
                ->with('error', 'Category not found')
                ->withInput();
                
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation errors:', $e->errors());
            throw $e;
            
        } catch (\Exception $e) {
            Log::error('Error updating category:', ['message' => $e->getMessage()]);
            return redirect()->back()
                ->with('error', 'An error occurred while updating the category: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function countOrders()
    {
        $categories = category::all()
            ->map(function ($category) {
                return [
                    'category_id' => $category->category_id,
                    'categoryTitle' => $category->categoryTitle,
                    'categoryImage' => $category->categoryImage,
                    'description' => $category->description,
                    'products_count' => $category->products_count,
                    'total_earnings' => $category->total_earnings
                ];
            });

        return view('page.category-list', compact('categories'));
    }
}
