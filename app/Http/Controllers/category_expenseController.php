<?php

namespace App\Http\Controllers;
use App\Models\category_expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class category_expenseController extends Controller
{
    public function index()
    {
        $categories = category_expense::all();
        return view('page.category-expense-list', compact('categories'));
    }
    
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:category_expenses',
            'description' => 'nullable|string',
        ]);

        $category = category_expense::create($data);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Category created successfully',
                'data' => $category
            ]);
        }

        return redirect()->route('page.categoryexpenses-list')
            ->with('success', 'Category created successfully');
    }

    public function getAll()
    {
        $categories = category_expense::all();
        return response()->json($categories);
    }

    public function getCategory($id)
    {
        $category = category_expense::find($id);
        if ($category) {
            return response()->json($category);
        } else {
            return response()->json(['message' => 'Category not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // First try to convert ID to integer to ensure we're using the correct type
            $id = (int) $id;
            
            // Log the attempt to update the category
            Log::info('Attempting to update category expense', ['id' => $id]);
            
            $category = category_expense::find($id);
            
            if (!$category) {
                Log::warning('Category expense not found for update', ['id' => $id]);
                return redirect()->route('page.categoryexpenses-list')
                    ->with('error', 'Category not found with ID: ' . $id);
            }
            
            $data = $request->validate([
                'name' => 'required|string|max:255|unique:category_expenses,name,' . $id . ',category_expense_id',
                'description' => 'nullable|string',
            ]);

            $category->update($data);
            
            Log::info('Category expense updated successfully', [
                'id' => $id, 
                'name' => $category->name
            ]);
            
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Category updated successfully',
                    'data' => $category
                ]);
            }

            return redirect()->route('page.categoryexpenses-list')
                ->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            Log::error('Error updating category expense', [
                'id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false, 
                    'message' => 'Error updating category: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Error updating category: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            Log::info('Attempting to delete category expense', ['id' => $id]);
            $category = category_expense::find($id);
            
            if (!$category) {
                Log::warning('Category expense not found for deletion', ['id' => $id]);
                
                if (request()->wantsJson()) {
                    return response()->json(['success' => false, 'message' => 'Category not found'], 404);
                }
                
                return redirect()->back()->with('error', 'Category not found');
            }
            
            $category->delete();
            Log::info('Category expense deleted successfully', ['id' => $id, 'name' => $category->name]);
            
            if (request()->wantsJson()) {
                return response()->json(['success' => true, 'message' => 'Category deleted successfully']);
            }
            
            return redirect()->route('page.categoryexpenses-list')
                ->with('success', 'Category deleted successfully');
                
        } catch (\Exception $e) {
            Log::error('Error deleting category expense', [
                'id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => false, 
                    'message' => 'Error deleting category: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Error deleting category: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            // First try to convert ID to integer to ensure we're using the correct type
            $id = (int) $id;
            
            // Log the attempt to find the category
            Log::info('Attempting to find category expense for editing', ['id' => $id]);
            
            // Use find instead of findOrFail for additional error checking
            $category = category_expense::find($id);
            
            if (!$category) {
                Log::warning('Category expense not found for editing', ['id' => $id]);
                return redirect()->route('page.categoryexpenses-list')
                    ->with('error', 'Category not found with ID: ' . $id);
            }
            
            Log::info('Successfully found category expense for editing', [
                'id' => $id, 
                'name' => $category->name
            ]);
            
            return view('page.edit-category-expense', compact('category'));
        } catch (\Exception $e) {
            Log::error('Error finding category expense for editing', [
                'id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('page.categoryexpenses-list')
                ->with('error', 'Error occurred while editing category: ' . $e->getMessage());
        }
    }
}
