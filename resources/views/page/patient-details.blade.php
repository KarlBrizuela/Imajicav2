@extends('layouts.app')

<!DOCTYPE html>
<html
  lang="en"
  class="layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-skin="default" 
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
  data-bs-theme="light"
>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Patient Details - Imajica Booking System</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../../assets/vendor/fonts/iconify-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>

    <!-- Add this before </head> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

    <!-- Add this in the <head> section -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        
    .avatar-wrapper {
        width: 150px;
        height: 150px;
        overflow: hidden;
        border-radius: 50%;
        border: 3px solid #FFFFFF;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .avatar-preview {
        width: 100%;
        height: 100%;
        position: relative;
        border-radius: 50%;
        overflow: hidden;
    }

    .avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .avatar-placeholder {
        width: 100%;
        height: 100%;
        background: #E6EEFF;
        border-radius: 50%;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .avatar-circle {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .avatar-silhouette {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .avatar-head {
        position: absolute;
        width: 60px;
        height: 60px;
        background: #1B3F8F;
        border-radius: 50%;
        top: 20%;
        left: 50%;
        transform: translateX(-50%);
    }

    .avatar-body {
        position: absolute;
        width: 90px;
        height: 45px;
        background: #1B3F8F;
        border-radius: 45px 45px 0 0;
        bottom: 10%;
        left: 50%;
        transform: translateX(-50%);
    }

    .initials {
        color: #FFFFFF;
        font-size: 3rem;
        font-weight: 600;
        position: relative;
        z-index: 2;
        text-transform: uppercase;
    }

    .patient-info-card {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 1.5rem;
        height: 100%;
    }

    .nav-tabs .nav-link {
        color: #566a7f;
        border: none;
        border-bottom: 2px solid transparent;
        padding: 0.5rem 1rem;
    }

    .nav-tabs .nav-link.active {
        color: #696cff;
        background: none;
        border-bottom: 2px solid #696cff;
    }

    .text-muted.small {
        font-size: 0.875rem;
        display: block;
        margin-bottom: 0.25rem;
    }

    .edit-mode {
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #696cff;
        box-shadow: 0 0 0 0.2rem rgba(105, 108, 255, 0.25);
    }

    .view-mode p {
        padding: 0.375rem 0;
        margin-bottom: 0;
    }

    .edit-mode-toggle {
        min-width: 60px;
    }

    .avatar-edit {
        text-align: center;
        margin-top: 1rem;
    }

    .avatar-edit label {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .avatar-edit label:hover {
        background-color: #696cff;
        color: white;
    }

    .patient-details {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
    }

    .detail-item {
        display: flex;
        flex-direction: column;
        margin-bottom: 1rem;
        padding: 0.5rem;
        border-bottom: 1px solid #dee2e6;
    }

    .detail-label {
        color: #666;
        font-weight: 500;
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .detail-value {
        color: #333;
        padding: 0.375rem 0;
    }

    .edit-mode .form-control {
        margin-bottom: 0.5rem;
    }

    .edit-mode.d-none {
        display: none !important;
    }

    .view-mode.d-none {
        display: none !important;
    }

    .card-header {
        background-color: transparent;
        border-bottom: 1px solid rgba(0,0,0,0.125);
    }

    .card-title {
        color: #566a7f;
        font-size: 1.1rem;
        margin-bottom: 0;
    }

    /* Add these styles for smooth tab transitions */
    .tab-pane {
        transition: opacity 0.15s linear;
    }

    .tab-pane:not(.show) {
        display: none;
        opacity: 0;
    }

    .tab-pane.show {
        opacity: 1;
    }

    /* Style improvements for tabs */
    .nav-tabs .nav-link {
        color: #566a7f;
        border: none;
        border-bottom: 2px solid transparent;
        padding: 0.5rem 1rem;
        transition: all 0.2s ease;
    }

    .nav-tabs .nav-link:hover {
        color: #696cff;
        border-bottom-color: rgba(105, 108, 255, 0.3);
    }

    .nav-tabs .nav-link.active {
        color: #696cff;
        background: none;
        border-bottom: 2px solid #696cff;
    }

    /* Card styles for tab content */
    .tab-content .card {
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
    }

    .tab-content .card-header {
        background-color: transparent;
        border-bottom: 1px solid rgba(67, 89, 113, 0.1);
        padding: 1.5rem;
    }

    .tab-content .card-body {
        padding: 1.5rem;
    }
    </style>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('components.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
              

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Back Button -->
                        <div class="mb-4">
                            <a href="{{ route('page.patient-list') }}" class="btn btn-primary">
                                <i class="ti tabler-arrow-left me-1"></i>Back to Patient List
                            </a>
                        </div>
                    
                        <!-- Patient Header -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="d-flex flex-column align-items-center gap-3">
                                            <div class="avatar-wrapper">
                                                <div class="avatar-preview">
                                                    @if($patient->image_path && Storage::disk('public')->exists($patient->image_path))
                                                        <img id="imagePreview" 
                                                             src="{{ asset('storage/'.$patient->image_path) }}" 
                                                             alt="Profile Preview"
                                                             class="rounded-circle"
                                                             style="width: 100%; height: 100%; object-fit: cover;">
                                                    @else
                                                        <div class="avatar-placeholder">
                                                            <div class="avatar-circle">
                                                                <div class="avatar-silhouette">
                                                                    <div class="avatar-head"></div>
                                                                    <div class="avatar-body"></div>
                                                                </div>
                                                                <span class="initials">
                                                                    {{ strtoupper(substr($patient->firstname ?? '', 0, 1) . substr($patient->lastname ?? '', 0, 1)) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div>
                                                <h3 class="mb-0">{{ $patient->firstname }} {{ $patient->lastname }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Tabs -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#profile" data-tab="profile">Patient Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#allergies" data-tab="allergies">Allergies</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#medications" data-tab="medications">Medications</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#health-concerns" data-tab="health-concerns">Health Concerns</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#prescriptions" data-tab="prescriptions">Prescriptions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#attachments" data-tab="attachments">Attachments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- After the navigation tabs, add tab content containers -->
                        <div class="tab-content">
                            <!-- Patient Profile Tab Content -->
                            <div class="tab-pane fade show active" id="profile">
                                <div class="row">
                                    <!-- Left Side - Personal Information in ONE CARD -->
                                    <div class="col-md-7 mb-4">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="card-title mb-0">Personal Information</h5>
                                                <button class="btn btn-primary edit-mode-toggle">Edit</button>
                                            </div>
                                            <div class="card-body">
                                                <form id="patient-info-form" action="{{ route('patient.update', ['id' => $patient->patient_id]) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    
                                                    <!-- Full Name -->
                                                    <div class="mb-3 border-bottom pb-3">
                                                        <div class="detail-label"><i class="ti tabler-user text-muted me-2"></i>Full Name:</div>
                                                        <div class="view-mode">
                                                            <span class="detail-value" data-field="firstname">{{ $patient->firstname }}</span>
                                                            <span class="detail-value" data-field="lastname">{{ $patient->lastname }}</span>
                                                        </div>
                                                        <div class="edit-mode d-none">
                                                            <input type="text" name="firstname" class="form-control mb-2" value="{{ $patient->firstname }}" placeholder="First Name">
                                                            <input type="text" name="lastname" class="form-control" value="{{ $patient->lastname }}" placeholder="Last Name">
                                                        </div>
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="mb-3 border-bottom pb-3">
                                                        <div class="detail-label"><i class="ti tabler-mail text-muted me-2"></i>Email:</div>
                                                        <div class="view-mode">
                                                            <span class="detail-value" data-field="email">{{ $patient->email ?? 'N/A' }}</span>
                                                        </div>
                                                        <div class="edit-mode d-none">
                                                            <input type="email" name="email" class="form-control" value="{{ $patient->email }}" placeholder="Email">
                                                        </div>
                                                    </div>

                                                    <!-- Contact -->
                                                    <div class="mb-3 border-bottom pb-3">
                                                        <div class="detail-label"><i class="ti tabler-phone text-muted me-2"></i>Contact:</div>
                                                        <div class="view-mode">
                                                            <span class="detail-value" data-field="contact_number">{{ $patient->contact_number ?? 'N/A' }}</span>
                                                        </div>
                                                        <div class="edit-mode d-none">
                                                            <input type="text" name="contact_number" class="form-control" value="{{ $patient->contact_number }}" placeholder="Contact Number">
                                                        </div>
                                                    </div>

                                                    <!-- Address -->
                                                    <div class="mb-3 border-bottom pb-3">
                                                        <div class="detail-label"><i class="ti tabler-map-pin text-muted me-2"></i>Address:</div>
                                                        <div class="view-mode">
                                                            <span class="detail-value" data-field="address">{{ $patient->address ?? 'N/A' }}</span>
                                                        </div>
                                                        <div class="edit-mode d-none">
                                                            <textarea name="address" class="form-control" rows="2" placeholder="Address">{{ $patient->address }}</textarea>
                                                        </div>
                                                    </div>

                                                    <!-- Birthdate -->
                                                    <div class="mb-3 border-bottom pb-3">
                                                        <div class="detail-label"><i class="ti tabler-calendar text-muted me-2"></i>Birthdate:</div>
                                                        <div class="view-mode">
                                                            <span class="detail-value" data-field="birthdate">{{ $patient->birthdate ?? 'N/A' }}</span>
                                                        </div>
                                                        <div class="edit-mode d-none">
                                                            <input type="date" name="birthdate" class="form-control" value="{{ $patient->birthdate }}">
                                                        </div>
                                                    </div>

                                                    <!-- Gender -->
                                                    <div class="mb-3">
                                                        <div class="detail-label"><i class="ti tabler-user text-muted me-2"></i>Gender:</div>
                                                        <div class="view-mode">
                                                            <span class="detail-value" data-field="gender">{{ $patient->gender ?? 'N/A' }}</span>
                                                        </div>
                                                        <div class="edit-mode d-none">
                                                            <select name="gender" class="form-control">
                                                                <option value="">Select Gender</option>
                                                                <option value="Male" {{ $patient->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                                <option value="Female" {{ $patient->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                                <option value="Other" {{ $patient->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Side Cards -->
                                    <div class="col-md-5">
                                        <!-- Appointments Section -->
                                        <div class="card mb-4">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5 class="card-title mb-0">Appointment</h5>
                                                    <small class="text-muted">Today</small>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="text-center py-3">
                                                    <p class="text-muted mb-0">No appointments to show today</p>
                                                    <a href="#" class="text-primary">See all</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Medical Records Section -->
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="card-title mb-0">Medical Records</h5>
                                            </div>
                                            <div class="card-body">
                                                @if(isset($medicalRecords) && count($medicalRecords) > 0)
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Description</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($medicalRecords as $record)
                                                                <tr>
                                                                    <td>{{ $record->date }}</td>
                                                                    <td>{{ $record->description }}</td>
                                                                    <td>
                                                                        <a href="#" class="btn btn-icon btn-sm btn-text-secondary rounded-pill">
                                                                            <i class="ti ti-download"></i>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-sm btn-text-secondary rounded-pill">
                                                                            <i class="ti ti-eye"></i>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-sm btn-text-secondary rounded-pill">
                                                                            <i class="ti ti-edit"></i>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-sm btn-text-danger rounded-pill delete-record" data-id="{{ $record->id ?? '' }}">
                                                                            <i class="ti ti-trash"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <div class="text-center py-3">
                                                        <p class="text-muted">No medical records available</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Allergies Tab Content -->
                            <div class="tab-pane fade" id="allergies">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="card-title mb-0">Allergies</h5>
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addAllergyModal">Add Allergy</button>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <table class="table table-striped" id="allergies-table">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Allergen</th>
                                                                <th>Reaction</th>
                                                                <th>Severity</th>
                                                                <th>Date Identified</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           @if(isset($allergies) && count($allergies) > 0)
                                                            @foreach($allergies as $allergy)
                                                            <tr>
                                                                <td>{{ $allergy->allergen }}</td>
                                                                <td>{{ $allergy->reaction }}</td>
                                                                <td>{{ $allergy->severity }}</td>
                                                                <td>{{ $allergy->date_identified }}</td>
                                                                <td>
                                                                    <div class="d-inline-block">
                                                                      <button type="button" class="btn btn-sm btn-info edit-allergy" 
                                                                        data-id="{{ $allergy->id }}"
                                                                        data-allergen="{{ $allergy->allergen }}"
                                                                        data-reaction="{{ $allergy->reaction }}"
                                                                        data-severity="{{ $allergy->severity }}"
                                                                        data-date="{{ $allergy->date_identified }}">
                                                                        <i class="ti tabler-edit me-1"></i> Edit
                                                                      </button>
                                                                      
                                                                      <button class="btn btn-sm btn-danger delete-record" 
                                                                        data-id="{{ $allergy->id }}">
                                                                        <i class="ti tabler-trash me-1"></i> Delete
                                                                      </button>
                                                                    </div>
                                                                  </td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td colspan="5" class="text-center">No allergies recorded</td>
                                                            </tr>
                                                            @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Medications Tab Content -->
                            <div class="tab-pane fade" id="medications">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="card-title mb-0">Current Medications</h5>
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMedicationModal">Add Medication</button>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <table class="table table-striped" id="medications-table">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Medication Name</th>
                                                                <th>Dosage</th>
                                                                <th>Frequency</th>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($medications) && count($medications) > 0)
                                                                @foreach($medications as $medication)
                                                                <tr>
                                                                    <td>{{ $medication->medication_name }}</td>
                                                                    <td>{{ $medication->dosage }}</td>
                                                                    <td>{{ $medication->frequency }}</td>
                                                                    <td>{{ $medication->start_date }}</td>
                                                                    <td>{{ $medication->end_date ?? 'Ongoing' }}</td>
                                                                    <td>
                                                                        <div class="d-inline-block">
                                                                          <button type="button" class="btn btn-sm btn-info edit-medication" 
                                                                            data-id="{{ $medication->id }}"
                                                                            data-name="{{ $medication->medication_name }}"
                                                                            data-dosage="{{ $medication->dosage }}"
                                                                            data-frequency="{{ $medication->frequency }}"
                                                                            data-start="{{ $medication->start_date }}"
                                                                            data-end="{{ $medication->end_date }}">
                                                                            <i class="ti tabler-edit me-1"></i> Edit
                                                                          </button>
                                                                          
                                                                          <button class="btn btn-sm btn-danger delete-record" 
                                                                            data-id="{{ $medication->id }}">
                                                                            <i class="ti tabler-trash me-1"></i> Delete
                                                                          </button>
                                                                        </div>
                                                                      </td>
                                                                </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="6" class="text-center">No medications recorded</td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Health Concerns Tab Content -->
                            <div class="tab-pane fade" id="health-concerns">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="card-title mb-0">Health Concerns</h5>
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addHealthConcernModal">Add Health Concern</button>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <table class="table table-striped" id="health-concerns-table">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Concern</th>
                                                                <th>Date Reported</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           @if(isset($healthConcerns) && count($healthConcerns) > 0)
                                                            @foreach($healthConcerns as $concern)
                                                            <tr>
                                                                <td>{{ $concern->concern }}</td>
                                                                <td>{{ $concern->date_reported }}</td>
                                                                <td>{{ $concern->status }}</td>
                                                              
                                                                <td>
                                                                    <div class="d-inline-block">
                                                                      <button type="button" class="btn btn-sm btn-info edit-concern" 
                                                                        data-id="{{ $concern->id }}"
                                                                        data-concern="{{ $concern->concern }}"
                                                                        data-date="{{ $concern->date_reported }}"
                                                                        data-status="{{ $concern->status }}">
                                                                        <i class="ti tabler-edit me-1"></i> Edit
                                                                      </button>
                                                                      
                                                                      <button class="btn btn-sm btn-danger delete-record" 
                                                                        data-id="{{ $concern->id }}">
                                                                        <i class="ti tabler-trash me-1"></i> Delete
                                                                      </button>
                                                                    </div>
                                                                  </td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td colspan="5" class="text-center">No health concerns recorded</td>
                                                            </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Prescriptions Tab Content -->
                            <div class="tab-pane fade" id="prescriptions">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="card-title mb-0">Prescriptions</h5>
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPrescriptionModal">Add Prescription</button>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <table class="table table-striped" id="prescriptions-table">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Prescription #</th>
                                                                <th>Date</th>
                                                                <th>Doctor</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($prescriptions) && count($prescriptions) > 0)
                                                                @foreach($prescriptions as $prescription)
                                                                <tr>
                                                                    <td>{{ $prescription->prescription_number }}</td>
                                                                    <td>{{ $prescription->date }}</td>
                                                                    <td>{{ $prescription->doctor }}</td>
                                                                    <td>{{ $prescription->status }}</td>
                                                                    <td>
                                                                        <div class="d-inline-block">
                                                                          <button type="button" class="btn btn-sm btn-info edit-prescription" 
                                                                            data-id="{{ $prescription->id }}"
                                                                            data-number="{{ $prescription->prescription_number }}"
                                                                            data-date="{{ $prescription->date }}"
                                                                            data-doctor="{{ $prescription->doctor }}"
                                                                            data-status="{{ $prescription->status }}">
                                                                            <i class="ti tabler-edit me-1"></i> Edit
                                                                          </button>
                                                                      
                                                                          <button class="btn btn-sm btn-danger delete-record" 
                                                                            data-id="{{ $prescription->id }}">
                                                                            <i class="ti tabler-trash me-1"></i> Delete
                                                                          </button>
                                                                        </div>
                                                                      </td>
                                                                </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="5" class="text-center">No prescriptions found</td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Attachments Tab Content -->
                            <div class="tab-pane fade" id="attachments">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="card-title mb-0">Attachments</h5>
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addAttachmentModal">Upload File</button>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <table class="table table-striped" id="attachments-table">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>File Name</th>
                                                                <th>Type</th>
                                                                <th>Date Uploaded</th>
                                                                <th>Size</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($attachments) && count($attachments) > 0)
                                                                @foreach($attachments as $attachment)
                                                                <tr>
                                                                    <td>{{ $attachment->filename }}</td>
                                                                    <td>{{ $attachment->file_type }}</td>
                                                                    <td>{{ $attachment->created_at ? $attachment->created_at->format('Y-m-d H:i:s') : 'N/A' }}</td>
                                                                    <td>{{ $attachment->getFileSizeForHumans() }}</td>
                                                                    <td>
                                                                        <div class="d-inline-block">
                                                                            <a href="{{ route('patient.attachment.download', $attachment->id) }}" 
                                                                                class="btn btn-sm btn-info"
                                                                                download="{{ $attachment->filename }}"
                                                                                target="_blank">
                                                                                 <i class="ti tabler-download me-1"></i> Download
                                                                             </a>
                                                                        
                                                                            <button class="btn btn-sm btn-danger delete-record" 
                                                                              data-id="{{ $attachment->id }}">
                                                                              <i class="ti tabler-trash me-1"></i> Delete
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                <tr>
                                                                    <td colspan="5" class="text-center">No attachments found</td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    @include('components.footer')
                </div>
                <!-- / Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- MODALS -->
    <!-- Add Allergy Modal -->
    <div class="modal fade" id="addAllergyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Allergy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="allergy-form" action="{{ route('patient.allergy.add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="allergy_name" class="form-label">Allergen</label>
                                <input type="text" id="allergen" name="allergen" class="form-control" placeholder="e.g., Penicillin, Peanuts" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="reaction" class="form-label">Reaction</label>
                                <input type="text" id="reaction" name="reaction" class="form-control" placeholder="e.g., Rash, Swelling" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="severity" class="form-label">Severity</label>
                                <select id="severity" name="severity" class="form-select" required>
                                    <option value="">Select severity</option>
                                    <option value="Mild">Mild</option>
                                    <option value="Moderate">Moderate</option>
                                    <option value="Severe">Severe</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="date_identified" class="form-label">Date Identified</label>
                                <input type="date" id="date_identified" name="date_identified" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Medication Modal -->
    <div class="modal fade" id="addMedicationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Medication</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="medication-form" action="{{ route('patient.medication.add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="medication_name" class="form-label">Medication Name</label>
                                <input type="text" id="medication_name" name="medication_name" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="dosage" class="form-label">Dosage</label>
                                <input type="text" id="dosage" name="dosage" class="form-control" placeholder="e.g., 10mg" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="frequency" class="form-label">Frequency</label>
                                <input type="text" id="frequency" name="frequency" class="form-control" placeholder="e.g., Once daily" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" id="end_date" name="end_date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Health Concern Modal -->
    <div class="modal fade" id="addHealthConcernModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Health Concern</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="health-concern-form" action="{{ route('patient.health-concern.add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="concern" class="form-label">Concern</label>
                                <input type="text" id="concern" name="concern" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="date_reported" class="form-label">Date Reported</label>
                                <input type="date" id="date_reported" name="date_reported" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status" class="form-select" required>
                                    <option value="">Select status</option>
                                    <option value="Active">Active</option>
                                    <option value="Resolved">Resolved</option>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Under observation">Under observation</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Prescription Modal -->
    <div class="modal fade" id="addPrescriptionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Prescription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="prescription-form" action="{{ route('patient.prescription.add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="prescription_number" class="form-label">Prescription #</label>
                                <input type="text" id="prescription_number" name="prescription_number" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="prescription_date" class="form-label">Date</label>
                                <input type="date" id="date" name="date" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="doctor" class="form-label">Doctor</label>
                                <input type="text" id="doctor" name="doctor" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="prescription_status" class="form-label">Status</label>
                                <select id="prescription_status" name="status" class="form-select" required>
                                    <option value="">Select status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Filled">Filled</option>
                                    <option value="Refill required">Refill required</option>
                                    <option value="Expired">Expired</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Attachment Modal -->
    <div class="modal fade" id="addAttachmentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="attachment-form" action="{{ route('patient.attachment.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="file" class="form-label">File</label>
                                <input type="file" id="file" name="file" class="form-control" required>
                                <small class="text-muted">Maximum file size: 10MB</small>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="file_type" class="form-label">Type</label>
                                <select id="file_type" name="file_type" class="form-select" required>
                                    <option value="">Select file type</option>
                                    <option value="Medical Report">Medical Report</option>
                                    <option value="Lab Result">Lab Result</option>
                                    <option value="X-Ray">X-Ray</option>
                                    <option value="MRI">MRI</option>
                                    <option value="CT Scan">CT Scan</option>
                                    <option value="Prescription">Prescription</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Appointment Modal -->
    <div class="modal fade" id="addAppointmentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="appointment-form" action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="appointment_date" class="form-label">Date</label>
                                <input type="date" id="appointment_date" name="date" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="appointment_time" class="form-label">Time</label>
                                <input type="time" id="appointment_time" name="time" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="purpose" class="form-label">Purpose</label>
                                <input type="text" id="purpose" name="purpose" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="doctor_id" class="form-label">Doctor</label>
                                <select id="doctor_id" name="doctor_id" class="form-select" required>
                                    <option value="">Select doctor</option>
                                    <!-- Add options dynamically from database -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Medical Record Modal -->
    <div class="modal fade" id="addMedicalRecordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Medical Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="medical-record-form" action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="record_date" class="form-label">Date</label>
                                <input type="date" id="record_date" name="date" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="record_description" class="form-label">Description</label>
                                <input type="text" id="record_description" name="description" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="record_file" class="form-label">File (optional)</label>
                                <input type="file" id="record_file" name="file" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END MODALS -->

    <!-- Core JS -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>




<script>
    // Add this code after your existing scripts
document.addEventListener('DOMContentLoaded', function() {
    // Add click handler for download buttons
    document.querySelectorAll('[download]').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const downloadUrl = this.href;
            const filename = this.getAttribute('download');

            Swal.fire({
                title: 'Download File?',
                text: `Are you sure you want to download ${filename}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, download',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#0A3622',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        title: 'Downloading...',
                        text: 'Please wait while we prepare your download',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        willOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Create hidden link and trigger download
                    const link = document.createElement('a');
                    link.href = downloadUrl;
                    link.download = filename;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                    // Show success message
                    setTimeout(() => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'File download started successfully',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }, 1000);
                }
            });
        });
    });
});
</script>


    <script>
document.addEventListener('DOMContentLoaded', function() {
    const editButton = document.querySelector('.edit-mode-toggle');
    const form = document.getElementById('patient-info-form');
    const viewModes = document.querySelectorAll('.view-mode');
    const editModes = document.querySelectorAll('.edit-mode');

    if (editButton && form) {
        let isEditing = false;

        editButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (!isEditing) {
                // Switch to Edit mode
                isEditing = true;
                editButton.textContent = 'Save Changes';
                editButton.classList.replace('btn-primary', 'btn-success');
                
                viewModes.forEach(el => el.classList.add('d-none'));
                editModes.forEach(el => el.classList.remove('d-none'));
            } else {
                Swal.fire({
                    title: 'Save Changes?',
                    text: 'Do you want to save these changes?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        editButton.disabled = true;
                        editButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';

                        const formData = new FormData(form);

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Update displayed values
                                Object.keys(data.patient).forEach(key => {
                                    const viewElement = document.querySelector(`[data-field="${key}"]`);
                                    if (viewElement) {
                                        viewElement.textContent = data.patient[key] || 'N/A';
                                    }
                                });

                                // Switch back to view mode
                                isEditing = false;
                                editButton.textContent = 'Edit';
                                editButton.classList.replace('btn-success', 'btn-primary');
                                editButton.disabled = false;

                                viewModes.forEach(el => el.classList.remove('d-none'));
                                editModes.forEach(el => el.classList.add('d-none'));

                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Changes saved successfully',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            editButton.disabled = false;
                            editButton.textContent = 'Save Changes';
                            
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to save changes. Please try again.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        });
                    }
                });
            }
        });
    }

    // Get all tab links
    const tabLinks = document.querySelectorAll('.nav-link');
    
    // Add click event listener to each tab
    tabLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all tabs
            tabLinks.forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Hide all tab panes
            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.remove('show', 'active');
            });
            
            // Show the selected tab pane
            const targetId = this.getAttribute('href').substring(1);
            const targetPane = document.getElementById(targetId);
            if (targetPane) {
                targetPane.classList.add('show', 'active');
            }
        });
    });

    // Add click handlers for the add buttons
    const addButtons = {
        'addAllergyBtn': '#addAllergyModal',
        'addMedicationBtn': '#addMedicationModal',
        'addHealthConcernBtn': '#addHealthConcernModal',
        'addPrescriptionBtn': '#addPrescriptionModal',
        'addAttachmentBtn': '#addAttachmentModal'
    };

    Object.entries(addButtons).forEach(([btnId, modalId]) => {
        const btn = document.getElementById(btnId);
        if (btn) {
            btn.addEventListener('click', function() {
                const modal = new bootstrap.Modal(document.querySelector(modalId));
                modal.show();
            });
        }
    });

    // Handle form submissions for all modals
    const formHandlers = {
        'allergy-form': {
            table: '#allergies-table tbody',
            modal: '#addAllergyModal'
           
        },
        'medication-form': {
            table: '#medications-table tbody',
            modal: '#addMedicationModal'
           
        },
        'health-concern-form': {
            table: '#health-concerns-table tbody',
            modal: '#addHealthConcernModal'
         
        },
        'prescription-form': {
            table: '#prescriptions-table tbody',
            modal: '#addPrescriptionModal',
            
        },
        'attachment-form': {
            table: '#attachments-table tbody',
            modal: '#addAttachmentModal',
           
        }
    };

    // Add click handlers for edit buttons
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('edit-record')) {
            const row = e.target.closest('tr');
            const recordData = JSON.parse(row.getAttribute('data-record'));
            
            // Find the correct modal based on the table section
            let modalId = '';
            if (row.closest('#allergies-table')) {
                modalId = 'addAllergyModal';
            } else if (row.closest('#medications-table')) {
                modalId = 'addMedicationModal';
            } else if (row.closest('#health-concerns-table')) {
                modalId = 'addHealthConcernModal';
            } else if (row.closest('#prescriptions-table')) {
                modalId = 'addPrescriptionModal';
            } else if (row.closest('#attachments-table')) {
                modalId = 'addAttachmentModal';
            }

            console.log('Edit clicked for modal:', modalId); // Debug log

            const modal = document.getElementById(modalId);
            if (modal) {
                const form = modal.querySelector('form');
                
                // Update modal title to indicate editing
                const modalTitle = modal.querySelector('.modal-title');
                if (modalTitle) {
                    modalTitle.textContent = 'Edit ' + modalTitle.textContent.replace('Add ', '');
                }
                
                // Fill form with existing data
                Object.keys(recordData).forEach(key => {
                    const input = form.querySelector(`[name="${key}"]`);
                    if (input) {
                        if (input.type === 'select-one') {
                            // Handle select elements
                            const option = Array.from(input.options).find(opt => opt.value === recordData[key]);
                            if (option) {
                                option.selected = true;
                            }
                        } else {
                            // Handle other input types
                            input.value = recordData[key];
                        }
                    }
                });

                // Add edit mode flag and record ID to form
                form.setAttribute('data-edit-mode', 'true');
                form.setAttribute('data-record-id', row.getAttribute('data-id'));

                // Show modal
                const bsModal = new bootstrap.Modal(modal);
                bsModal.show();
            } else {
                console.error('Modal not found:', modalId); // Debug log
            }
        }
    });

    // Update form submit handlers
    Object.entries(formHandlers).forEach(([formId, config]) => {
        const form = document.getElementById(formId);
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const isEditMode = this.getAttribute('data-edit-mode') === 'true';
                const recordId = this.getAttribute('data-record-id');
                
                // Show loading state
                Swal.fire({
                    title: isEditMode ? 'Updating...' : 'Saving...',
                    text: 'Please wait',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Simulate API call (replace with actual API endpoint)
                setTimeout(() => {
                    // Convert FormData to object
                    const data = {};
                    formData.forEach((value, key) => {
                        data[key] = value;
                    });

                    if (isEditMode) {
                        // Update existing row
                        const tbody = document.querySelector(config.table);
                        const existingRow = tbody.querySelector(`tr[data-id="${recordId}"]`);
                        if (existingRow) {
                            existingRow.outerHTML = config.rowTemplate({...data, id: recordId});
                        }
                    } else {
                        // Add new row
                        const tbody = document.querySelector(config.table);
                        const noRecordsRow = tbody.querySelector('tr td[colspan]');
                        if (noRecordsRow) {
                            tbody.innerHTML = '';
                        }
                        tbody.insertAdjacentHTML('beforeend', config.rowTemplate(data));
                    }

                    // Close modal
                    const modal = bootstrap.Modal.getInstance(document.querySelector(config.modal));
                    modal.hide();

                    // Reset form and edit mode
                    form.reset();
                    form.removeAttribute('data-edit-mode');
                    form.removeAttribute('data-record-id');

                    // Reset modal title
                    const modalTitle = document.querySelector(`${config.modal} .modal-title`);
                    if (modalTitle) {
                        modalTitle.textContent = modalTitle.textContent.replace('Edit ', 'Add ');
                    }

                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: `Record has been ${isEditMode ? 'updated' : 'saved'} successfully.`,
                        timer: 1000,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload(); // Reload page after success
                    });
                }, 1000);
            });
        }
    });

    // Delete record handler
    $(document).on('click', '.delete-record', function() {
        const row = $(this).closest('tr');
        const id = $(this).data('id');
        let type = '';
        let endpoint = '';

        // Determine record type based on the table
        if (row.closest('#allergies-table').length) {
            type = 'allergy';
            endpoint = '/patient/allergy/';
        } else if (row.closest('#medications-table').length) {
            type = 'medication';
            endpoint = '/patient/medication/';
        } else if (row.closest('#health-concerns-table').length) {
            type = 'health-concern';
            endpoint = '/patient/health-concern/';
        } else if (row.closest('#attachments-table').length) {
            type = 'attachment';
            endpoint = '/patient/attachment/';
        } else if (row.closest('#prescriptions-table').length) {
            type = 'prescription'; 
            endpoint = '/patient/prescription/';
        }

        if (!endpoint) {
            console.error('Unknown record type');
            return;
        }

        Swal.fire({
            title: `Delete ${type}?`,
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: endpoint + id,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: response.message || `${type} has been deleted successfully.`,
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: xhr.responseJSON?.message || 'Failed to delete record'
                        });
                    }
                });
            }
        });
    });

    // Add console.log for debugging
    console.log('JavaScript loaded and event listeners attached');
});
</script>

<script>
$(document).ready(function() {
    // Common function to handle form submissions
    function handleFormSubmit(formId, successCallback) {
        const form = $(formId);
        const submitBtn = form.find('button[type="submit"]');
        const modal = form.closest('.modal');
        
        form.on('submit', function(e) {
            e.preventDefault();
            submitBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> Saving...');
            
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        form[0].reset();
                        modal.modal('hide');
                        if (successCallback) successCallback(response.data);
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    }
                },
                error: function(xhr) {
                    let message = xhr.responseJSON?.message || 'An error occurred while processing your request.';
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: message
                    });
                },
                complete: function() {
                    submitBtn.prop('disabled', false).text('Save');
                }
            });
        });
    }

    // Delete record handler with proper type detection
    $(document).on('click', '.delete-record', function() {
        const row = $(this).closest('tr');
        const id = $(this).data('id');
        let type = '';
        let endpoint = '';

        // Determine record type based on the table
        if (row.closest('#allergies-table').length) {
            type = 'allergy';
            endpoint = '/patient/allergy/';
        } else if (row.closest('#medications-table').length) {
            type = 'medication';
            endpoint = '/patient/medication/';
        } else if (row.closest('#health-concerns-table').length) {
            type = 'health-concern';
            endpoint = '/patient/health-concern/';
        } else if (row.closest('#attachments-table').length) {
            type = 'attachment';
            endpoint = '/patient/attachment/';
        } else if (row.closest('#prescriptions-table').length) {
            type = 'prescription'; 
            endpoint = '/patient/prescription/';
        }
    

        if (!endpoint) {
            console.error('Unknown record type');
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: endpoint + id,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: response.message,
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: xhr.responseJSON?.message || 'Failed to delete record'
                        });
                    }
                });
            }
        });
    });

    // Initialize form handlers
    handleFormSubmit('#allergy-form');
    handleFormSubmit('#medication-form');
    handleFormSubmit('#health-concern-form');
    handleFormSubmit('#prescription-form');
    // handleFormSubmit('#attachment-form');

});

// Remove all the previous individual form handlers
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    const attachmentsTable = document.getElementById('attachments-table');
    if (attachmentsTable) {
        new DataTable(attachmentsTable, {
            responsive: true,
            searching: true,
            lengthChange: true,
            info: true,
            language: {
                paginate: {
                    next: '<i class="ti tabler-chevron-right"></i>',
                    previous: '<i class="ti tabler-chevron-left"></i>'
                }
            }
        });
    }
    const prescriptionsTable = document.getElementById('prescriptions-table');
    if (prescriptionsTable) {
        new DataTable(prescriptionsTable, {
            responsive: true,
            searching: true,
            lengthChange: true,
            info: true,
            language: {
                paginate: {
                    next: '<i class="ti tabler-chevron-right"></i>',
                    previous: '<i class="ti tabler-chevron-left"></i>'
                }
            }
        });
    }

    const healthConcernsTable = document.getElementById('health-concerns-table');
    if (healthConcernsTable) {
        new DataTable(healthConcernsTable, {
            responsive: true,
            searching: true,
            lengthChange: true,
            info: true,
            language: {
                paginate: {
                    next: '<i class="ti tabler-chevron-right"></i>',
                    previous: '<i class="ti tabler-chevron-left"></i>'
                }
            }
        });
    }
    
    const medicationsTable = document.getElementById('medications-table');
    if (medicationsTable) {
        new DataTable(medicationsTable, {
            responsive: true,
            searching: true,
            lengthChange: true,
            info: true,
            language: {
                paginate: {
                    next: '<i class="ti tabler-chevron-right"></i>',
                    previous: '<i class="ti tabler-chevron-left"></i>'
                }
            }
        });
    }
     
    const allergiesTable = document.getElementById('allergies-table');
    if (allergiesTable) {
        new DataTable(allergiesTable, {
            responsive: true,
            searching: true,
            lengthChange: true,
            info: true,
            language: {
                paginate: {
                    next: '<i class="ti tabler-chevron-right"></i>',
                    previous: '<i class="ti tabler-chevron-left"></i>'
                }
            }
        });
    }

   
});
</script>

<script>

 const attachmentForm = document.getElementById('attachment-form');
    if (attachmentForm) {
        attachmentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Uploading...';

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Upload';
                
                if (data.success) {
                    // Close modal immediately 
                    bootstrap.Modal.getInstance(document.getElementById('addAttachmentModal')).hide();
                    
                    // Show quick success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message || 'File uploaded successfully',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Failed to upload file'
                    });
                }
            })
            .catch(error => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Upload';
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while uploading the file'
                });
            });
        });
    }
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // File input change handler
    const fileInput = document.querySelector('#file');
    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            console.log('File input change event triggered');
            console.log('Files selected:', this.files);
            console.log('Number of files:', this.files.length);
            if (this.files.length > 0) {
                console.log('File details:', {
                    name: this.files[0].name,
                    type: this.files[0].type,
                    size: this.files[0].size
                });
            }
        });
    }

    // // Form submit handler with additional logging
    // const attachmentForm = document.getElementById('attachment-form');
    // if (attachmentForm) {
    //     attachmentForm.addEventListener('submit', function(e) {
    //         e.preventDefault();
            
    //         console.log('Form submission started');
    //         const formData = new FormData(this);
            
    //         // Log FormData contents
    //         console.log('FormData entries:');
    //         for (let pair of formData.entries()) {
    //             console.log(pair[0], pair[1] instanceof File ? `File: ${pair[1].name}` : pair[1]);
    //         }

    //         const submitBtn = this.querySelector('button[type="submit"]');
    //         submitBtn.disabled = true;
    //         submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...';

    //         fetch(this.action, {
    //             method: 'POST',
    //             body: formData,
    //             headers: {
    //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    //             }
    //         })
    //         .then(response => {
    //             console.log('Response status:', response.status);
    //             return response.json();
    //         })
    //         .then(data => {
    //             console.log('Response data:', data);
    //             submitBtn.disabled = false;
    //             submitBtn.innerHTML = 'Upload';
                
    //             if (data.success) {
    //                 Swal.fire({
    //                     customClass: {
    //                         confirmButton: 'btn btn-success'
    //                     },
    //                     buttonsStyling: false,
    //                     icon: 'success',
    //                     title: 'Success!',
    //                     text: data.message || 'File uploaded successfully',
    //                     timer: 2000,
    //                     showConfirmButton: false,
    //                     didClose: () => {
    //                         bootstrap.Modal.getInstance(document.getElementById('addAttachmentModal')).hide();
    //                         location.reload();
    //                     }
    //                 });
    //             } else {
    //                 // Show validation errors
    //                 let errorMessage = data.message;
    //                 if (data.errors) {
    //                     errorMessage = '<ul class="text-start mb-0">';
    //                     Object.values(data.errors).forEach(error => {
    //                         errorMessage += `<li>${error[0]}</li>`;
    //                     });
    //                     errorMessage += '</ul>';
    //                 }
                    
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Error',
    //                     html: errorMessage
    //                 });
    //             }
    //         })
    //         .catch(error => {
    //             submitBtn.disabled = false;
    //             submitBtn.innerHTML = 'Upload';
                
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Error',
    //                 text: 'An error occurred while uploading the file'
    //             });
    //         });
    //     });
    // }
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle edit allergy button clicks
    document.querySelectorAll('.edit-allergy').forEach(button => {
        button.addEventListener('click', function() {
            const modal = document.getElementById('addAllergyModal');
            const form = modal.querySelector('form');
            
            // Update modal title
            modal.querySelector('.modal-title').textContent = 'Edit Allergy';
            
            // Fill form with data
            form.querySelector('#allergen').value = this.dataset.allergen;
            form.querySelector('#reaction').value = this.dataset.reaction;
            form.querySelector('#severity').value = this.dataset.severity;
            form.querySelector('#date_identified').value = this.dataset.date;
            
            // Update form for edit mode
            form.action = `{{ url('/patient/allergy') }}/${this.dataset.id}`;
            if (!form.querySelector('input[name="_method"]')) {
                form.insertAdjacentHTML('beforeend', '<input type="hidden" name="_method" value="PUT">');
            }
            
            // Show modal
            new bootstrap.Modal(modal).show();
        });
    });

    // Handle edit medication button clicks
    document.querySelectorAll('.edit-medication').forEach(button => {
        button.addEventListener('click', function() {
            const modal = document.getElementById('addMedicationModal');
            const form = modal.querySelector('form');
            
            // Update modal title
            modal.querySelector('.modal-title').textContent = 'Edit Medication';
            
            // Fill form with data
            form.querySelector('#medication_name').value = this.dataset.name;
            form.querySelector('#dosage').value = this.dataset.dosage;
            form.querySelector('#frequency').value = this.dataset.frequency;
            form.querySelector('#start_date').value = this.dataset.start;
            form.querySelector('#end_date').value = this.dataset.end || '';
            
            // Update form for edit mode
            form.action = `{{ url('/patient/medication') }}/${this.dataset.id}`;
            if (!form.querySelector('input[name="_method"]')) {
                form.insertAdjacentHTML('beforeend', '<input type="hidden" name="_method" value="PUT">');
            }
            
            // Show modal
            new bootstrap.Modal(modal).show();
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle edit health concern button clicks
    document.querySelectorAll('.edit-concern').forEach(button => {
        button.addEventListener('click', function() {
            const modal = document.getElementById('addHealthConcernModal');
            const form = modal.querySelector('form');
            
            // Update modal title
            modal.querySelector('.modal-title').textContent = 'Edit Health Concern';
            
            // Fill form with data
            form.querySelector('#concern').value = this.dataset.concern;
            form.querySelector('#date_reported').value = this.dataset.date;
            form.querySelector('#status').value = this.dataset.status;
            
            // Update form for edit mode
            form.action = `{{ url('/patient/health-concern') }}/${this.dataset.id}`;
            if (!form.querySelector('input[name="_method"]')) {
                form.insertAdjacentHTML('beforeend', '<input type="hidden" name="_method" value="PUT">');
            }
            
            // Show modal
            new bootstrap.Modal(modal).show();
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle edit prescription button clicks
    document.querySelectorAll('.edit-prescription').forEach(button => {
        button.addEventListener('click', function() {
            const modal = document.getElementById('addPrescriptionModal');
            const form = modal.querySelector('form');
            
            // Update modal title
            modal.querySelector('.modal-title').textContent = 'Edit Prescription';
            
            // Fill form with data
            form.querySelector('#prescription_number').value = this.dataset.number;
            form.querySelector('#date').value = this.dataset.date;
            form.querySelector('#doctor').value = this.dataset.doctor;
            form.querySelector('#prescription_status').value = this.dataset.status;
            
            // Update form action and method
            form.action = `/patient/prescription/${this.dataset.id}`;
            
            // Remove any existing method field
            const existingMethod = form.querySelector('input[name="_method"]');
            if (existingMethod) {
                existingMethod.remove();
            }
            
            // Add PUT method field and ensure CSRF token
            form.insertAdjacentHTML('beforeend', `
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            `);

            // Update form submit handler
            form.onsubmit = function(e) {
                e.preventDefault();
                const submitBtn = form.querySelector('button[type="submit"]');
                const formData = new FormData(form);

                // Show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Saving...';

                // Make the AJAX request
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin'
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => Promise.reject(err));
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Hide modal
                        bootstrap.Modal.getInstance(modal).hide();
                        
                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: data.message || 'Prescription updated successfully',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        throw new Error(data.message || 'Failed to update prescription');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    
                    // Show error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error.message || 'An error occurred while updating the prescription. Please try again.'
                    });
                })
                .finally(() => {
                    // Reset button state
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Save';
                });
            };
            
            // Show modal
            new bootstrap.Modal(modal).show();
        });
    });
});
</script>

<script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="../../assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
<script src="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>

<script src="../../assets/vendor/libs/moment/moment.js"></script>
<script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
<script src="../../assets/vendor/libs/%40form-validation/popular.js"></script>
<script src="../../assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
<script src="../../assets/vendor/libs/%40form-validation/auto-focus.js"></script>





</body>
</html>