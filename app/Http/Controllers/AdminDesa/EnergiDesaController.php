<?php

namespace App\Http\Controllers\AdminDesa;

use App\Http\Controllers\Controller;
use App\Models\EnergiDesa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EnergiDesaRequest;
use App\Models\Desa;
use App\Models\Kategori;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EnergiDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $energiDesas = EnergiDesa::with('desa', 'rtRwDesa')->paginate();

        return view('admin_desa.energi-desa.index', compact('energiDesas'))
            ->with('i', ($request->input('page', 1) - 1) * $energiDesas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $kategoris = Kategori::all();
        $energiDesa = new EnergiDesa();
        $desas = Desa::all();

        return view('admin_desa.energi-desa.create', compact('kategoris','energiDesa', 'desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnergiDesaRequest $request): RedirectResponse
    {
        EnergiDesa::create($request->validated());

        return Redirect::route('admin_desa.energi-desa.index')
            ->with('success', 'EnergiDesa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $energiDesa = EnergiDesa::find($id);

        return view('admin_desa.energi-desa.show', compact('energiDesa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $kategoris = Kategori::all();
        $energiDesa = EnergiDesa::find($id);
        $desas = Desa::all();

        return view('admin_desa.energi-desa.edit', compact('kategoris','energiDesa', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EnergiDesaRequest $request, EnergiDesa $energiDesa): RedirectResponse
    {
        $energiDesa->update($request->validated());

        return Redirect::route('admin_desa.energi-desa.index')
            ->with('success', 'EnergiDesa updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        EnergiDesa::find($id)->delete();

        return Redirect::route('admin_desa.energi-desa.index')
            ->with('success', 'EnergiDesa deleted successfully');
    }
}
