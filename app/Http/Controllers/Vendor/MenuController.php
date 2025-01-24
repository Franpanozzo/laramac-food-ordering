<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Inertia\Inertia;
use Inertia\Response;

class MenuController extends Controller
{
    use AuthorizesRequests;

    public function index(): Response
    {
        $this->authorize('category.viewAny');

        return Inertia::render('Vendor/Menu', [
            'categories' => Category::query()
                ->where('restaurant_id', auth()->user()->restaurant->id)
                ->with('products')
                ->get(),
        ]);
    }
}
