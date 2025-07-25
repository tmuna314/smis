@extends('layouts.master')

@section('main_content')
<div class="container mt-5">
  <h2>Edit Address Info</h2>

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form action="{{ route('addressinfo.update', $address->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="student_id">Student ID</label>
        <input type="text" name="student_id" class="form-control" value="{{ old('student_id', $address->student_id) }}" required>
    </div>
    <div class="form-group">
        <label for="province_name">Province Name</label>
        <input type="text" name="province_name" class="form-control" value="{{ old('province_name', $address->province_name) }}" required>
    </div>
    <div class="form-group">
        <label for="district_name">District Name</label>
        <input type="text" name="district_name" class="form-control" value="{{ old('district_name', $address->district_name) }}" required>
    </div>
    <div class="form-group">
        <label for="ward_vdc">Ward/VDC</label>
        <input type="text" name="ward_vdc" class="form-control" value="{{ old('ward_vdc', $address->ward_vdc) }}" required>
    </div>
    <div class="form-group">
        <label for="tole_street">Tole/Street</label>
        <input type="text" name="tole_street" class="form-control" value="{{ old('tole_street', $address->tole_street) }}" required>
    </div>
    <div class="form-group">
        <label for="is_permanent">Is Permanent</label>
        <select name="is_permanent" class="form-control" required>
            <option value="">-- Select --</option>
            <option value="1" {{ old('is_permanent', $address->is_permanent) == '1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ old('is_permanent', $address->is_permanent) == '0' ? 'selected' : '' }}>No</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('addressinfo.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection
