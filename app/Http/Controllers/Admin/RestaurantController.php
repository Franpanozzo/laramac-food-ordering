<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Inertia\Inertia;
use Inertia\Response;

class RestaurantController extends Controller
{
    use AuthorizesRequests;

    public function index(): Response
    {
        $this->authorize('restaurant.viewAny');

        return Inertia::render('Admin/Restaurants/Index', [
            'restaurants' => Restaurant::with(['city', 'owner'])->get(),
        ]);
    }
}
