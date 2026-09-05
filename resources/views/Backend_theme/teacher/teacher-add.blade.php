@extends("Backend_theme.master")
@section('teacher')
open
@endsection
@section('add_teacher')
active
@endsection
   @section("body")
    <main class="page">
      <div class="page-header">
        <div>
          <h1>Add New Teacher</h1>
          <p>Enter the teacher's details to add them to the faculty directory.</p>
        </div>
        <div class="page-header-actions">
          <a class="btn btn-secondary" href="{{ route('teacher') }}">Cancel</a>
          <button class="btn btn-primary" type="submit" form="teacherAddForm"><i class="fa-solid fa-floppy-disk"></i> Save Teacher</button>
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

      <form id="teacherAddForm" action="{{ route('teacher_store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-grid">
        <div class="stack">
          <div class="card card-pad">
            <div class="upload-photo" id="photoTrigger" style="background-size:cover;background-position:center;"><i class="fa-solid fa-camera"></i></div>
            <div class="upload-title">Profile Photo</div>
            <div class="upload-hint" id="photoHint">JPG or PNG. Max 2MB.</div>
            <button class="btn btn-secondary btn-block" type="button" id="uploadImageBtn">Upload Image</button>
            <input type="file" name="profile_img" id="photoInput" accept="image/png, image/jpeg" style="display:none;">
          </div>

           <div class="card card-pad">
            <div class="card-section-title mb-md">Professional Information</div>
              <div class="field">
                <label for="salary">Salary</label>
                <input type="number" step="0.01" class="input" id="salary" name="salary" placeholder="e.g. 4500" value="{{ old('salary') }}" required>
            </div>
            <div class="field mb-0">
              <label for="cnic">CNIC</label>
              <input type="text" class="input" id="cnic" name="cnic" placeholder="00000-0000000-0" value="{{ old('cnic') }}" required>
            </div>
          </div>
        </div>

        <div class="stack">
          <div class="card card-pad">
            <div class="card-section-title mb-md">Personal Details</div>
             <div class="field-row">
            <div class="field">
              <label for="full_name">First name</label>
              <input type="text" class="input" id="full_name" name="full_name" placeholder="e.g. Eleanor Shellstrop" value="{{ old('full_name') }}" required>
            </div>
            <div class="field">
              <label for="last_name">Last name</label>
              <input type="text" class="input" id="last_name" name="last_name" placeholder="e.g. Eleanor Shellstrop" value="{{ old('last_name') }}" required>
            </div>
             </div>
            <div class="field-row">
              <div class="field">
                <label for="email">Email Address</label>
                <input type="email" class="input" id="email" name="email" placeholder="name@eduadmin.edu" value="{{ old('email') }}" required>
              </div>
              <div class="field">
                <label for="gender">Gender</label>
                <select class="select" id="gender" name="gender" required>
                  <option value="">Select...</option>
                  <option value="female" @selected(old('gender') == 'female')>Female</option>
                  <option value="male" @selected(old('gender') == 'male')>Male</option>
                  <option value="other" @selected(old('gender') == 'other')>Other</option>
                </select>
              </div>
            </div>
            <div class="field mb-0">
              <label for="contactNo">Contact Number</label>
              <input type="tel" class="input" id="contactNo" name="contact_number" placeholder="+1 (555) 000-0000" value="{{ old('contact_number') }}" required>
            </div>
          </div>

         

          <div class="card card-pad">
            <div class="card-section-title mb-md">Contact & Address</div>
            <div class="field mb-0">
              <label for="address">Home Address</label>
              <textarea class="textarea" id="address" name="address" rows="3" placeholder="Street address, City, State, ZIP">{{ old('address') }}</textarea>
            </div>
          </div>
        </div>
      </div>
      </form>
    </main>
    <script>
      (function () {
        var photoInput = document.getElementById('photoInput');
        var photoTrigger = document.getElementById('photoTrigger');
        var uploadBtn = document.getElementById('uploadImageBtn');
        var hint = document.getElementById('photoHint');

        [photoTrigger, uploadBtn].forEach(function (el) {
          el.addEventListener('click', function () {
            photoInput.click();
          });
        });

        photoInput.addEventListener('change', function () {
          if (photoInput.files && photoInput.files[0]) {
            var file = photoInput.files[0];
            hint.textContent = file.name;
            var reader = new FileReader();
            reader.onload = function (e) {
              photoTrigger.style.backgroundImage = 'url(' + e.target.result + ')';
              photoTrigger.querySelector('i').style.display = 'none';
            };
            reader.readAsDataURL(file);
          }
        });
      })();
    </script>
 @endsection