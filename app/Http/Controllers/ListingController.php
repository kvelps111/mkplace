<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\School;
use App\Models\Category;
use App\Http\Requests\StoreListingRequest;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    // Main listings page with filters
    public function index()
    {
        $filters = [
            'region' => request('region'),
            'school' => request('school'),
            'category' => request('category')
        ];

        return view('listings.index', [
            'listings' => Listing::with('school', 'photos')
                ->latest()
                ->filter($filters)
                ->paginate(10),
            'regions' => School::distinct()->pluck('region'),
            'schools' => School::all(),
            'categories' => Category::all()
        ]);
    }

    // Show create form
    public function create()
    {
        return view('listings.create', [
            'schools' => School::orderBy('region')->orderBy('name')->get(),
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    // Store new listing
    public function store(StoreListingRequest $request)
    {
        $validated = $request->validated();

        // Create listing
        $listing = Listing::create(array_merge($validated, [
            'user_id' => auth()->id()
        ]));

        // Handle multiple uploaded photos
        if ($request->hasFile('photos')) { // Make sure your input name="photos[]"
            foreach ($request->file('photos') as $photo) {
                $listing->photos()->create([
                    'photo' => $photo->store('photos', 'public')
                ]);
            }
        }

        return redirect()->route('listings.index')
            ->with('success', 'Sludinājums veiksmīgi izveidots!');
    }

    // Show single listing
    public function show(Listing $listing)
    {
        // Load related photos
        $listing->load('photos', 'school');

        return view('listings.show', compact('listing'));
    }

    // User's listings
    public function myListings()
    {
        return view('listings.user.index', [
            'listings' => auth()->user()->listings()
                ->with('school', 'photos')
                ->get()
        ]);
    }

    // Delete listing
    public function destroy(Listing $listing)
    {
        $this->authorize('delete', $listing);

        $listing->delete();

        return back()->with('success', 'Sludinājums dzēsts!');
    }
}
