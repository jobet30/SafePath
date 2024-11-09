<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCase extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural of the model name
    protected $table = 'child_cases';

    // Define fillable attributes
    protected $fillable = [
        'date_of_birth',
        'gender',
        'guardian_information',
        'case_number',
        'status',
        'risk_level',
        'date_opened',
        'date_closed',
        'notes_comments',
        'ethnicity',
        'disability_status',
        'school_information',
        'special_needs',
        'last_updated_at',
        'assigned_social_worker_id',
    ];

    // Cast specific fields to desired types
    protected $casts = [
        'date_of_birth' => 'date',
        'date_opened' => 'date',
        'date_closed' => 'date',
        'last_updated_at' => 'datetime',
        'disability_status' => 'boolean',
    ];

    // Define the relationship to the User (Assigned Social Worker)
    public function assignedSocialWorker()
    {
        return $this->belongsTo(User::class, 'assigned_social_worker_id');
    }
}
