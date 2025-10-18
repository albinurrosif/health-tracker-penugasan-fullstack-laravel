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
            'measurement_date' => 'required|date',
            'file_upload' => 'nullable|file|max:2048'
        ]);

        try {
            $data = $request->only(['type', 'value', 'measurement_date', 'notes']);

            if ($request->hasFile('file_upload')) {
                $path = $request->file('file_upload')->store('health_records', 'public');
                $data['file_path'] = $path;
            }

            Auth::user()->healthRecords()->create($data);

            return redirect()->route('health-records.index')
                ->with('success', 'Data rekam medis berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambah data: ' . $e->getMessage());
        }
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
            'measurement_date' => 'required|date',
            'file_upload' => 'nullable|file|max:2048'
        ]);

        try {
            $data = $request->only(['type', 'value', 'measurement_date', 'notes']);

            if ($request->hasFile('file_upload')) {
                $path = $request->file('file_upload')->store('health_records', 'public');
                $data['file_path'] = $path;
            }

            $healthRecord->update($data);

            return redirect()->route('health-records.index')
                ->with('success', 'Data rekam medis berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(HealthRecord $healthRecord)
    {
        try {
            $healthRecord->delete();
            return redirect()->route('health-records.index')
                ->with('success', 'Data rekam medis berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
