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
          <a class="btn btn-secondary" href="students.html">Cancel</a>
          <button class="btn btn-danger" id="deleteStudentBtn"><i class="fa-solid fa-trash-can"></i> Delete</button>
          <button class="btn btn-primary" id="updateStudentBtn"><i class="fa-solid fa-floppy-disk"></i> Update Student</button>
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

        </div>

        <div class="stack">
          <div class="card card-pad">
            <div class="card-section-title mb-md">Personal Details</div>
             <div class="field-row">
            <div class="field">
              <label for="fullName">First Name</label>
              <input type="text" class="input" id="fullName" placeholder="e.g. Jane Doe" required>
            </div>
            <div class="field">
              <label for="fullName">Last Name</label>
              <input type="text" class="input" id="fullName" placeholder="e.g. Jane Doe" required>
            </div>
             </div>
            <div class="field-row">
              <div class="field">
                <label for="dob">Date of Birth</label>
                <input type="date" class="input" id="dob">
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
             <div class="field">
              <label for="cnic">Cnic</label>
              <input type="text" class="input" id="fullName" placeholder="987*****89" required>
            </div>
          </div>

         

         
        </div>
        
      </div>
       <div class="card card-pad mt-3">
            <div class="card-section-title mb-md">Contact & Address</div>
            <div class="field-row">
              <div class="field">
                <label for="parentName">Parent/Guardian Name</label>
                <input type="text" class="input" id="parentName" placeholder="Full Name">
              </div>
              <div class="field">
                <label for="parentContact">Parent Contact Number</label>
                <input type="tel" class="input" id="parentContact" placeholder="+1 (555) 000-0000">
              </div>
            </div>
            <div class="field mb-0">
              <label for="homeAddress">Home Address</label>
              <textarea class="textarea" id="homeAddress" rows="3" placeholder="Street address, City, State, ZIP"></textarea>
            </div>
          </div>
    </main>
 @endsection