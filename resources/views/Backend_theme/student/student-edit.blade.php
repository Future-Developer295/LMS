@extends("Backend_theme.master")
@section('student')
open
@endsection
@section('add_student')
active
@endsection
@section("body")
    <main class="page">
      <div class="page-header">
        <div>
          <h1>Edit Student</h1>
          <p>Update Eleanor Vance's enrollment and contact details.</p>
        </div>
        <div class="page-header-actions">
          <a class="btn btn-secondary" href="{{ route('student') }}">Cancel</a>
          <form action="{{ route('student_destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this student?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Delete</button>
          </form>
          <button class="btn btn-primary" type="submit" form="studentEditForm"><i class="fa-solid fa-floppy-disk"></i> Update Student</button>
        </div>
      </div>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="studentEditForm" action="{{ route('student_update', $student->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
           <div class="form-grid">
        <div class="stack">
          <div class="card card-pad">
            <div class="upload-photo" id="photoTrigger"><i class="fa-solid fa-camera"></i></div>
            <div class="upload-title">Profile Photo</div>
            <div class="upload-hint">JPG or PNG. Max 2MB.</div>
            <button class="btn btn-secondary btn-block" type="button" id="uploadImageBtn">Upload Image</button>
            <input type="file" id="photoInput" accept="image/png, image/jpeg" style="display:none;">
          </div>

          <div class="card card-pad">
            <div class="card-section-title mb-md">Enrollment</div>
            <div class="field">
              <label for="class_id">Class</label>
              <select class="select" id="class_id" name="class_id" required>
                <option value="">Select...</option>
                @foreach ($classes as $class)
                  <option value="{{ $class->id }}" @selected(old('class_id', $student->class_id) == $class->id)>{{ $class->class_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="field mb-0">
              <label for="batch_code">Batch Code</label>
              <input type="text" class="input" id="batch_code" name="batch_code" placeholder="e.g. B-2026" value="{{ old('batch_code', $student->batch_code) }}" required>
            </div>
          </div>

        </div>

        <div class="stack">
          <div class="card card-pad">
            <div class="card-section-title mb-md">Personal Details</div>
             <div class="field-row">
            <div class="field">
              <label for="full_name">First Name</label>
              <input type="text" class="input" id="full_name" name="full_name" placeholder="e.g. Jane Doe" value="{{ old('full_name', $student->full_name) }}" required>
            </div>
            <div class="field">
              <label for="last_name">Last Name</label>
              <input type="text" class="input" id="last_name" name="last_name" placeholder="e.g. Jane Doe" value="{{ old('last_name', $student->last_name) }}" required>
            </div>
             </div>
            <div class="field-row">
              <div class="field">
                <label for="dob">Date of Birth</label>
                <input type="date" class="input" id="dob" name="dob" value="{{ old('dob', optional($student->dob)->format('Y-m-d')) }}" required>
              </div>
              <div class="field">
                <label for="gender">Gender</label>
                <select class="select" id="gender" name="gender" required>
                  <option value="">Select...</option>
                  <option value="female" @selected(old('gender', $student->gender) == 'female')>Female</option>
                  <option value="male" @selected(old('gender', $student->gender) == 'male')>Male</option>
                  <option value="other" @selected(old('gender', $student->gender) == 'other')>Other</option>
                </select>
              
              </div>
               
            </div>
             <div class="field">
              <label for="cnic">Cnic</label>
              <input type="text" class="input" id="cnic" name="cnic" placeholder="987*****89" value="{{ old('cnic', $student->cnic) }}" required>
            </div>
            <div class="field mb-0">
              <label for="email_address">Email Address</label>
              <input type="email" class="input" id="email_address" name="email_address" placeholder="name@eduadmin.edu" value="{{ old('email_address', $student->email_address) }}">
            </div>
          </div>

         

         
        </div>
        
      </div>
       <div class="card card-pad mt-3">
            <div class="card-section-title mb-md">Contact & Address</div>
            <div class="field-row">
              <div class="field">
                <label for="father_name">Parent/Guardian Name</label>
                <input type="text" class="input" id="father_name" name="father_name" placeholder="Full Name" value="{{ old('father_name', $student->father_name) }}" required>
              </div>
              <div class="field">
                <label for="contact_number">Contact Number</label>
                <input type="tel" class="input" id="contact_number" name="contact_number" placeholder="+1 (555) 000-0000" value="{{ old('contact_number', $student->contact_number) }}" required>
              </div>
            </div>
            <div class="field-row">
              <div class="field">
                <label for="emergency_contact">Emergency Contact</label>
                <input type="tel" class="input" id="emergency_contact" name="emergency_contact" placeholder="+1 (555) 000-0000" value="{{ old('emergency_contact', $student->emergency_contact) }}" required>
              </div>
            </div>
            <div class="field mb-0">
              <label for="address">Home Address</label>
              <textarea class="textarea" id="address" name="address" rows="3" placeholder="Street address, City, State, ZIP">{{ old('address', $student->address) }}</textarea>
            </div>
          </div>
      </form>
    </main>
 @endsection