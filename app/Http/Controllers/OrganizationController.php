<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Lecture;
use Illuminate\Http\Request;

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

        Organization::create($request->all());

        return redirect()->route('organization.index')
                         ->with('success', 'Organization berhasil ditambahkan');
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

        $organization->update($request->all());

        return redirect()->route('organization.index')
                         ->with('success', 'Organization berhasil diupdate');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();

        return redirect()->route('organization.index')
                         ->with('success', 'Organization berhasil dihapus');
    }
}