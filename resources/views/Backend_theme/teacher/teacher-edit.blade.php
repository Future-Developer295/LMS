@extends("Backend_theme.master")
@section('teacher')
open
@endsection
@section('edit_teacher')
active
@endsection
   @section("body")
    <main class="page">
      <div class="page-header">
        <div>
          <h1>Edit Teacher</h1>
          <p>Update Eleanor Shellstrop's profile and employment details.</p>
        </div>
        <div class="page-header-actions">
          <a class="btn btn-secondary" href="teachers.html">Cancel</a>
          <button class="btn btn-danger" id="deleteTeacherBtn"><i class="fa-solid fa-trash-can"></i> Delete</button>
          <button class="btn btn-primary" id="updateTeacherBtn"><i class="fa-solid fa-floppy-disk"></i> Update Teacher</button>
        </div>
      </div>

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
            <div class="card-section-title mb-md">Professional Information</div>
              <div class="field">
                <label for="salary">Salary</label>
                <input type="number" class="input" id="salary" placeholder="e.g. 4500">
            </div>
            <div class="field mb-0">
              <label for="cnic">CNIC</label>
              <input type="text" class="input" id="cnic" placeholder="00000-0000000-0">
            </div>
          </div>
        </div>

        <div class="stack">
          <div class="card card-pad">
            <div class="card-section-title mb-md">Personal Details</div>
             <div class="field-row">
            <div class="field">
              <label for="fullName">First name</label>
              <input type="text" class="input"  placeholder="e.g. Eleanor Shellstrop" required>
            </div>
            <div class="field">
              <label for="fullName">Last name</label>
              <input type="text" class="input"  placeholder="e.g. Eleanor Shellstrop" required>
            </div>
             </div>
            <div class="field-row">
              <div class="field">
                <label for="email">Email Address</label>
                <input type="email" class="input" id="email" placeholder="name@eduadmin.edu">
              </div>
              <div class="field">
                <label for="gender">Gender</label>
                <select class="select" id="gender">
                  <option value="">Select...</option>
                  <option>Female</option>
                  <option>Male</option>
                  <option>Other</option>
                </select>
              </div>
            </div>
            <div class="field mb-0">
              <label for="contactNo">Contact Number</label>
              <input type="tel" class="input" id="contactNo" placeholder="+1 (555) 000-0000">
            </div>
          </div>

         

          <div class="card card-pad">
            <div class="card-section-title mb-md">Contact & Address</div>
            <div class="field mb-0">
              <label for="address">Home Address</label>
              <textarea class="textarea" id="address" rows="3" placeholder="Street address, City, State, ZIP"></textarea>
            </div>
          </div>
        </div>
      </div>
    </main>
 @endsection