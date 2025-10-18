<?php

namespace App\Policies;

use App\Models\HealthRecord;
use App\Models\User;

class HealthRecordPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Semua user yang login bisa lihat list
    }

    public function view(User $user, HealthRecord $healthRecord): bool
    {
        return true; // Bisa lihat detail
    }

    public function create(User $user): bool
    {
        return true; // Semua user bisa create
    }

    public function update(User $user, HealthRecord $healthRecord): bool
    {
        // Admin bisa edit semua, user hanya edit data sendiri
        return $user->hasRole('admin') || $user->id === $healthRecord->user_id;
    }

    public function delete(User $user, HealthRecord $healthRecord): bool
    {
        // Admin bisa hapus semua, user hanya hapus data sendiri
        return $user->hasRole('admin') || $user->id === $healthRecord->user_id;
    }
}
