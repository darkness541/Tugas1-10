<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::with('lecture')->latest()->get();
        return view('organization.index', compact('organizations'));
    }

    public function create()
    {
        $lectures = Lecture::all();
        return view('organization.create', compact('lectures'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'lecture_id' => 'required|exists:lectures,id',
        ]);

        try {
            DB::beginTransaction();

            $organization = Organization::create($request->all());

            DB::commit();

            return redirect()->route('organization.index')
                             ->with('success', 'Organization berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('organization.create')
                             ->with('error', 'Data gagal ditambahkan. ' . $e->getMessage());
        }
    }

    public function edit(Organization $organization)
    {
        $lectures = Lecture::all();
        return view('organization.edit', compact('organization', 'lectures'));
    }

    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'lecture_id' => 'required|exists:lectures,id',
        ]);

        try {
            DB::beginTransaction();

            $organization->update($request->all());

            DB::commit();

            return redirect()->route('organization.index')
                             ->with('success', 'Organization berhasil diupdate');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('organization.edit', $organization)
                             ->with('error', 'Data gagal diupdate. ' . $e->getMessage());
        }
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();
        return redirect()->route('organization.index')
                         ->with('success', 'Organization berhasil dihapus');
    }
}