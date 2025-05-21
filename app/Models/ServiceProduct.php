<?php

// app/Models/ServiceProduct.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceProduct extends Model
{
    // Define relationship to Patient (Customer)
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id'); // Adjust foreign key if needed
    }

    // Define relationship to Staff
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id'); // Adjust foreign key if needed
    }

    // Define relationship to Branch
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id'); // Adjust foreign key if needed
    }
}
