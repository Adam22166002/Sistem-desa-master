<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\UsahaEkonomi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UsahaEkonomiRequest;
use App\Models\Desa;
use App\Models\Kategori;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UsahaEkonomiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $usahaEkonomis = UsahaEkonomi::with('desa')->paginate();

        return view('superadmin.usaha-ekonomi.index', compact('usahaEkonomis'))
            ->with('i', ($request->input('page', 1) - 1) * $usahaEkonomis->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $kategoris = Kategori::all();
        $usahaEkonomi = new UsahaEkonomi();
        $desas = Desa::all();

        return view('superadmin.usaha-ekonomi.create', compact('kategoris','usahaEkonomi', 'desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsahaEkonomiRequest $request): RedirectResponse
    {
        UsahaEkonomi::create($request->validated());

        return Redirect::route('superadmin.usaha-ekonomi.index')
            ->with('success', 'UsahaEkonomi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $usahaEkonomi = UsahaEkonomi::find($id);

        return view('superadmin.usaha-ekonomi.show', compact('usahaEkonomi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $kategoris = Kategori::all();
        $usahaEkonomi = UsahaEkonomi::find($id);

        return view('superadmin.usaha-ekonomi.edit', compact('kategoris','usahaEkonomi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsahaEkonomiRequest $request, UsahaEkonomi $usahaEkonomi): RedirectResponse
    {
        $usahaEkonomi->update($request->validated());

        return Redirect::route('superadmin.usaha-ekonomi.index')
            ->with('success', 'UsahaEkonomi updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        UsahaEkonomi::find($id)->delete();

        return Redirect::route('superadmin.usaha-ekonomi.index')
            ->with('success', 'UsahaEkonomi deleted successfully');
    }
}
