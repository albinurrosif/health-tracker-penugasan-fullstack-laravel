<?php

namespace App\Http\Controllers;

use App\Models\HealthRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HealthRecordController extends Controller
{
    public function index()
    {
        $healthRecords = Auth::user()->healthRecords()->latest()->get();
        return view('health-records.index', compact('healthRecords'));
    }

    public function create()
    {
        return view('health-records.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'value' => 'required|string',
            'measurement_date' => 'required|date'
        ]);

        Auth::user()->healthRecords()->create($request->all());

        return redirect()->route('health-records.index')
            ->with('success', 'Data kesehatan berhasil disimpan!');
    }

    public function edit(HealthRecord $healthRecord)
    {
        return view('health-records.edit', compact('healthRecord'));
    }

    public function update(Request $request, HealthRecord $healthRecord)
    {
        $request->validate([
            'type' => 'required|string',
            'value' => 'required|string',
            'measurement_date' => 'required|date'
        ]);

        $healthRecord->update($request->all());

        return redirect()->route('health-records.index')
            ->with('success', 'Data kesehatan berhasil diperbarui!');
    }

    public function destroy(HealthRecord $healthRecord)
    {
        $healthRecord->delete();

        return redirect()->route('health-records.index')
            ->with('success', 'Data kesehatan berhasil dihapus!');
    }
}
