<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(Request $request)
    {
        $query = Asset::query();

         // Search
        if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('asset_code', 'like', "%{$search}%")
              ->orWhere('name', 'like', "%{$search}%")
              ->orWhere('brand', 'like', "%{$search}%")
              ->orWhere('model', 'like', "%{$search}%");
    });
    }

        // Filter status
        if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $assets = $query->latest()->get();

    $totalAssets = Asset::count();
    $totalAktif = Asset::where('status', 'Aktif')->count();
    $totalMaintenance = Asset::where('status', 'Maintenance')->count();
    $totalRusak = Asset::where('status', 'Rusak')->count();

    return view('assets.index', compact(
        'assets',
        'totalAssets',
        'totalAktif',
        'totalMaintenance',
        'totalRusak'
    ));

    return view('assets.index', compact('assets'));
    }

    public function create()
    {
        return view('assets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'asset_code' => 'required|string|max:255|unique:assets,asset_code',
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'nullable|string|max:255',
            'processor' => 'nullable|string|max:255',
            'ram' => 'nullable|string|max:255',
            'storage' => 'nullable|string|max:255',
            'status' => 'required|in:Aktif,Rusak,Maintenance',
            'location' => 'nullable|string|max:255',
        ]);

        Asset::create($validated);

        return redirect()
            ->route('assets.index')
            ->with('success', 'Asset berhasil ditambahkan.');
    }

    public function show(Asset $asset)
    {
        return view('assets.show', compact('asset'));
    }

    public function edit(Asset $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    public function update(Request $request, Asset $asset)
    {
        $validated = $request->validate([
            'asset_code' => 'required|string|max:255|unique:assets,asset_code,' . $asset->id,
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'nullable|string|max:255',
            'processor' => 'nullable|string|max:255',
            'ram' => 'nullable|string|max:255',
            'storage' => 'nullable|string|max:255',
            'status' => 'required|in:Aktif,Rusak,Maintenance',
            'location' => 'nullable|string|max:255',
        ]);

        $asset->update($validated);

        return redirect()
            ->route('assets.index')
            ->with('success', 'Asset berhasil diperbarui.');
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect()
            ->route('assets.index')
            ->with('success', 'Asset berhasil dihapus.');
    }
}
