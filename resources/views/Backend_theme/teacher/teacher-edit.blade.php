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
          <a class="btn btn-secondary" href="{{ route('teacher') }}">Cancel</a>
          <form action="{{ route('teacher_destroy', $teacher->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete this teacher?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Delete</button>
          </form>
          <button class="btn btn-primary" type="submit" form="teacherEditForm"><i class="fa-solid fa-floppy-disk"></i> Update Teacher</button>
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

      <form id="teacherEditForm" action="{{ route('teacher_update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
       <div class="form-grid">
        <div class="stack">
          <div class="card card-pad">
            <div class="upload-photo" id="photoTrigger" style="background-size:cover;background-position:center;{{ $teacher->profile_img ? 'background-image:url(' . asset('storage/' . $teacher->profile_img) . ')' : '' }}">
              <i class="fa-solid fa-camera" @if($teacher->profile_img) style="display:none;" @endif></i>
            </div>
            <div class="upload-title">Profile Photo</div>
            <div class="upload-hint" id="photoHint">JPG or PNG. Max 2MB.</div>
            <button class="btn btn-secondary btn-block" type="button" id="uploadImageBtn">Upload Image</button>
            <input type="file" name="profile_img" id="photoInput" accept="image/png, image/jpeg" style="display:none;">
          </div>

           <div class="card card-pad">
            <div class="card-section-title mb-md">Professional Information</div>
              <div class="field">
                <label for="salary">Salary</label>
                <input type="number" step="0.01" class="input" id="salary" name="salary" placeholder="e.g. 4500" value="{{ old('salary', $teacher->salary) }}" required>
            </div>
            <div class="field mb-0">
              <label for="cnic">CNIC</label>
              <input type="text" class="input" id="cnic" name="cnic" placeholder="00000-0000000-0" value="{{ old('cnic', $teacher->cnic) }}" required>
            </div>
          </div>
        </div>

        <div class="stack">
          <div class="card card-pad">
            <div class="card-section-title mb-md">Personal Details</div>
             <div class="field-row">
            <div class="field">
              <label for="full_name">First name</label>
              <input type="text" class="input" id="full_name" name="full_name" placeholder="e.g. Eleanor Shellstrop" value="{{ old('full_name', $teacher->full_name) }}" required>
            </div>
            <div class="field">
              <label for="last_name">Last name</label>
              <input type="text" class="input" id="last_name" name="last_name" placeholder="e.g. Eleanor Shellstrop" value="{{ old('last_name', $teacher->last_name) }}" required>
            </div>
             </div>
            <div class="field-row">
              <div class="field">
                <label for="email">Email Address</label>
                <input type="email" class="input" id="email" name="email" placeholder="name@eduadmin.edu" value="{{ old('email', $teacher->email) }}" required>
              </div>
              <div class="field">
                <label for="gender">Gender</label>
                <select class="select" id="gender" name="gender" required>
                  <option value="">Select...</option>
                  <option value="female" @selected(old('gender', $teacher->gender) == 'female')>Female</option>
                  <option value="male" @selected(old('gender', $teacher->gender) == 'male')>Male</option>
                  <option value="other" @selected(old('gender', $teacher->gender) == 'other')>Other</option>
                </select>
              </div>
            </div>
            <div class="field mb-0">
              <label for="contactNo">Contact Number</label>
              <input type="tel" class="input" id="contactNo" name="contact_number" placeholder="+1 (555) 000-0000" value="{{ old('contact_number', $teacher->contact_number) }}" required>
            </div>
          </div>

         

          <div class="card card-pad">
            <div class="card-section-title mb-md">Contact & Address</div>
            <div class="field mb-0">
              <label for="address">Home Address</label>
              <textarea class="textarea" id="address" name="address" rows="3" placeholder="Street address, City, State, ZIP">{{ old('address', $teacher->address) }}</textarea>
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
              var icon = photoTrigger.querySelector('i');
              if (icon) icon.style.display = 'none';
            };
            reader.readAsDataURL(file);
          }
        });
      })();
    </script>
 @endsection