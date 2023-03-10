@extends('admin.layouts.master')
@section('content')
    <div class="row no-margin-padding">
        <div class="col-md-6">
            <h3 class="block-title">Edit Doctor</h3>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">
                        <span class="ti-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-item">Doctors</li>
                <li class="breadcrumb-item active">Edit Doctor</li>
            </ol>
        </div>
    </div>
    <!-- /Page Title -->

    <!-- /Breadcrumb -->
    <!-- Main Content -->
    <div class="container-fluid">
        @if (Session::has('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('warning') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        <div class="row">
            <!-- Widget Item -->
            <div class="col-md-12">
                <div class="widget-area-2 proclinic-box-shadow">
                    <h3 class="widget-title">Edit Doctor</h3>
                    <form action="{{ route('doctor.update', $doctor->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Doctor-name">Doctor Name</label>
                                <input type="text" name="name" value="{{ $doctor->name }}" class="form-control"
                                    placeholder="Doctor name" id="Doctor-name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" name="dob" value="{{ $doctor->dob }}" placeholder="Date of Birth"
                                    class="form-control" id="dob">
                                @error('dob')
                                    <div class="alert alert-danger ">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="specialization">Specialization</label>
                                <select class="form-control" id="specialization" name="specialization">
                                    <option disabled>Select a department</option>
                                    @foreach ($speciallist as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('specialization') == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('specialization')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="experience">Experience</label>
                                <input type="text" name="experience" value="{{ $doctor->experience }}"
                                    placeholder="Experience" class="form-control" id="experience">
                                @error('experience')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="age">Age</label>
                                <input type="text" name="age" value="{{ $doctor->age }}" placeholder="Age"
                                    class="form-control" id="age">
                                @error('age')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" value="{{ $doctor->phone }}" placeholder="Phone"
                                    class="form-control" id="phone">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ $doctor->email }}" placeholder="email"
                                    class="form-control" id="Email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label>
                                <select class="form-control" value="{{ $doctor->gender }}" name="gender" id="gender">
                                    <option {{ $doctor->gender == 'male' ? 'selected' : '' }} value="male">Male</option>
                                    <option {{ $doctor->gender == 'female' ? 'selected' : '' }} value="female">Female
                                    </option>
                                    <option {{ $doctor->gender == 'other' ? 'selected' : '' }} value="other">Other
                                    </option>
                                </select>
                                @error('gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="about-doctor">Doctor Details</label>
                                <textarea placeholder="Doctor Details" name="details" class="form-control" id="about-doctor" rows="3">{{ $doctor->details }}</textarea>
                                @error('details')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <textarea placeholder="Address" name="address" class="form-control" id="address" rows="3">{{ $doctor->address }}</textarea>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @php $d=json_decode($doctor->working_days); @endphp
                            <div class="form-group col-md-6 ">
                                <label for="address">Working Days</label><br>
                                @if (!isset($d[0]))
                                    <input type="checkbox" id="sat" name="working_days[]" value="6">
                                    <label for="sat"> Saturday</label>

                                    <input type="checkbox" id="sun" name="working_days[]" value="0">
                                    <label for="sun"> Sunday</label>

                                    <input type="checkbox" id="mon" name="working_days[]" value="1">
                                    <label for="mon"> Monday</label>

                                    <input type="checkbox" id="tue" name="working_days[]" value="2">
                                    <label for="tue"> Tuesday</label>

                                    <input type="checkbox" id="wed" name="working_days[]" value="3">
                                    <label for="wed"> Wednesday</label>

                                    <input type="checkbox" id="thu" name="working_days[]" value="4">
                                    <label for="thu"> Thursday</label>

                                    <input type="checkbox" id="fri" name="working_days[]" value="5">
                                    <label for="fri"> Friday</label>
                                @endif
                                @if (isset($d[0]) && !isset($d[1]))
                                    <input type="checkbox" id="sat" name="working_days[]" value="6"
                                        @if ($d[0] == 6) checked @endif>
                                    <label for="sat"> Saturday</label>

                                    <input type="checkbox" id="sun" name="working_days[]" value="0"
                                        @if ($d[0] == 0) checked @endif>
                                    <label for="sun"> Sunday</label>

                                    <input type="checkbox" id="mon" name="working_days[]" value="1"
                                        @if ($d[0] == 1) checked @endif>
                                    <label for="mon"> Monday</label>

                                    <input type="checkbox" id="tue" name="working_days[]" value="2"
                                        @if ($d[0] == 2) checked @endif>
                                    <label for="tue"> Tuesday</label>

                                    <input type="checkbox" id="wed" name="working_days[]" value="3"
                                        @if ($d[0] == 3) checked @endif>
                                    <label for="wed"> Wednesday</label>

                                    <input type="checkbox" id="thu" name="working_days[]" value="4"
                                        @if ($d[0] == 4) checked @endif>
                                    <label for="thu"> Thursday</label>
                                    <input type="checkbox" id="fri" name="working_days[]" value="5"
                                        @if ($d[0] == 5) checked @endif>
                                    <label for="fri"> Friday</label>
                                @endif

                                @if (isset($d[1]) && !isset($d[2]))
                                    <input type="checkbox" id="sat" name="working_days[]" value="6"
                                        @if ($d[0] == 6) checked @endif>
                                    <label for="sat"> Saturday</label>

                                    <input type="checkbox" id="sun" name="working_days[]" value="0"
                                        @if ($d[0] == 0 || $d[1] == 0) checked @endif>
                                    <label for="sun"> Sunday</label>

                                    <input type="checkbox" id="mon" name="working_days[]" value="1"
                                        @if ($d[0] == 1 || $d[1] == 1) checked @endif>
                                    <label for="mon"> Monday</label>

                                    <input type="checkbox" id="tue" name="working_days[]" value="2"
                                        @if ($d[0] == 2 || $d[1] == 2) checked @endif>
                                    <label for="tue"> Tuesday</label>

                                    <input type="checkbox" id="wed" name="working_days[]" value="3"
                                        @if ($d[0] == 3 || $d[1] == 3) checked @endif>
                                    <label for="wed"> Wednesday</label>

                                    <input type="checkbox" id="thu" name="working_days[]" value="4"
                                        @if ($d[0] == 4 || $d[1] == 4) checked @endif>
                                    <label for="thu"> Thursday</label>
                                    <input type="checkbox" id="fri" name="working_days[]" value="5"
                                        @if ($d[0] == 5 || $d[1] == 5) checked @endif>
                                    <label for="thu"> Friday</label>
                                @endif

                                @if (isset($d[2]) && !isset($d[3]))
                                    <input type="checkbox" id="sat" name="working_days[]" value="6"
                                        @if ($d[0] == 6) checked @endif>
                                    <label for="sat"> Saturday</label>

                                    <input type="checkbox" id="sun" name="working_days[]" value="0"
                                        @if ($d[0] == 0 || $d[1] == 0) checked @endif>
                                    <label for="sun"> Sunday</label>

                                    <input type="checkbox" id="mon" name="working_days[]" value="1"
                                        @if ($d[0] == 1 || $d[1] == 1 || $d[2] == 1) checked @endif>
                                    <label for="mon"> Monday</label>

                                    <input type="checkbox" id="tue" name="working_days[]" value="2"
                                        @if ($d[0] == 2 || $d[1] == 2 || $d[2] == 2) checked @endif>
                                    <label for="tue"> Tuesday</label>

                                    <input type="checkbox" id="wed" name="working_days[]" value="3"
                                        @if ($d[0] == 3 || $d[1] == 3 || $d[2] == 3) checked @endif>
                                    <label for="wed"> Wednesday</label>

                                    <input type="checkbox" id="thu" name="working_days[]" value="4"
                                        @if ($d[0] == 4 || $d[1] == 4 || $d[2] == 4) checked @endif>
                                    <label for="thu"> Thursday</label>
                                    <input type="checkbox" id="fri" name="working_days[]" value="5"
                                        @if ($d[0] == 5 || $d[1] == 5 || $d[2] == 5) checked @endif>
                                    <label for="thu"> Friday</label>
                                @endif

                                @if (isset($d[3]) && !isset($d[4]))
                                    <input type="checkbox" id="sat" name="working_days[]" value="6"
                                        @if ($d[0] == 6) checked @endif>
                                    <label for="sat"> Saturday</label>

                                    <input type="checkbox" id="sun" name="working_days[]" value="0"
                                        @if ($d[0] == 0 || $d[1] == 0) checked @endif>
                                    <label for="sun"> Sunday</label>

                                    <input type="checkbox" id="mon" name="working_days[]" value="1"
                                        @if ($d[0] == 1 || $d[1] == 1 || $d[2] == 1) checked @endif>
                                    <label for="mon"> Monday</label>

                                    <input type="checkbox" id="tue" name="working_days[]" value="2"
                                        @if ($d[0] == 2 || $d[1] == 2 || $d[2] == 2 || $d[3] == 2) checked @endif>
                                    <label for="tue"> Tuesday</label>

                                    <input type="checkbox" id="wed" name="working_days[]" value="3"
                                        @if ($d[0] == 3 || $d[1] == 3 || $d[2] == 3 || $d[3] == 3) checked @endif>
                                    <label for="wed"> Wednesday</label>

                                    <input type="checkbox" id="thu" name="working_days[]" value="4"
                                        @if ($d[0] == 4 || $d[1] == 4 || $d[2] == 4 || $d[3] == 4) checked @endif>
                                    <label for="thu"> Thursday</label>
                                    <input type="checkbox" id="fri" name="working_days[]" value="5"
                                        @if ($d[0] == 5 || $d[1] == 5 || $d[2] == 5 || $d[3] == 5) checked @endif>
                                    <label for="thu"> Friday</label>
                                @endif

                                @if (isset($d[4]) && !isset($d[5]))
                                    <input type="checkbox" id="sat" name="working_days[]" value="6"
                                        @if ($d[0] == 6) checked @endif>
                                    <label for="sat"> Saturday</label>

                                    <input type="checkbox" id="sun" name="working_days[]" value="0"
                                        @if ($d[0] == 0 || $d[1] == 0) checked @endif>
                                    <label for="sun"> Sunday</label>

                                    <input type="checkbox" id="mon" name="working_days[]" value="1"
                                        @if ($d[0] == 1 || $d[1] == 1 || $d[2] == 1) checked @endif>
                                    <label for="mon"> Monday</label>

                                    <input type="checkbox" id="tue" name="working_days[]" value="2"
                                        @if ($d[0] == 2 || $d[1] == 2 || $d[2] == 2 || $d[3] == 2 || $d[4] == 2) checked @endif>
                                    <label for="tue"> Tuesday</label>

                                    <input type="checkbox" id="wed" name="working_days[]" value="3"
                                        @if ($d[0] == 3 || $d[1] == 3 || $d[2] == 3 || $d[3] == 3 || $d[4] == 3) checked @endif>
                                    <label for="wed"> Wednesday</label>

                                    <input type="checkbox" id="thu" name="working_days[]" value="4"
                                        @if ($d[0] == 4 || $d[1] == 4 || $d[2] == 4 || $d[3] == 4 || $d[4] == 4) checked @endif>
                                    <label for="thu"> Thursday</label>
                                    <input type="checkbox" id="fri" name="working_days[]" value="4"
                                        @if ($d[0] == 5 || $d[1] == 5 || $d[2] == 5 || $d[3] == 5 || $d[4] == 5) checked @endif>
                                    <label for="thu"> Friday</label>
                                @endif

                                @if (isset($d[5]) && !isset($d[6]))
                                    <input type="checkbox" id="sat" name="working_days[]" value="6"
                                        @if ($d[0] == 6) checked @endif>
                                    <label for="sat"> Saturday</label>

                                    <input type="checkbox" id="sun" name="working_days[]" value="0"
                                        @if ($d[0] == 0 || $d[1] == 0) checked @endif>
                                    <label for="sun"> Sunday</label>

                                    <input type="checkbox" id="mon" name="working_days[]" value="1"
                                        @if ($d[0] == 1 || $d[1] == 1 || $d[2] == 1) checked @endif>
                                    <label for="mon"> Monday</label>

                                    <input type="checkbox" id="tue" name="working_days[]" value="2"
                                        @if ($d[0] == 2 || $d[1] == 2 || $d[2] == 2 || $d[3] == 2 || $d[4] == 2) checked @endif>
                                    <label for="tue"> Tuesday</label>

                                    <input type="checkbox" id="wed" name="working_days[]" value="3"
                                        @if ($d[0] == 3 || $d[1] == 3 || $d[2] == 3 || $d[3] == 3 || $d[4] == 3 || $d[5] == 3) checked @endif>
                                    <label for="wed"> Wednesday</label>

                                    <input type="checkbox" id="thu" name="working_days[]" value="4"
                                        @if ($d[0] == 4 || $d[1] == 4 || $d[2] == 4 || $d[3] == 4 || $d[4] == 4 || $d[5] == 4) checked @endif>
                                    <label for="thu"> Thursday</label>
                                    <input type="checkbox" id="fri" name="working_days[]" value="5"
                                        @if ($d[0] == 5 || $d[1] == 5 || $d[2] == 5 || $d[3] == 5 || $d[4] == 5 || $d[5] == 5) checked @endif>
                                    <label for="thu"> Friday</label>
                                @endif

                                @if (isset($d[6]))
                                    <input type="checkbox" id="sat" name="working_days[]" value="6"
                                        @if ($d[0] == 6) checked @endif>
                                    <label for="sat"> Saturday</label>

                                    <input type="checkbox" id="sun" name="working_days[]" value="0"
                                        @if ($d[0] == 0 || $d[1] == 0) checked @endif>
                                    <label for="sun"> Sunday</label>

                                    <input type="checkbox" id="mon" name="working_days[]" value="1"
                                        @if ($d[0] == 1 || $d[1] == 1 || $d[2] == 1) checked @endif>
                                    <label for="mon"> Monday</label>

                                    <input type="checkbox" id="tue" name="working_days[]" value="2"
                                        @if ($d[0] == 2 || $d[1] == 2 || $d[2] == 2 || $d[3] == 2 || $d[4] == 2) checked @endif>
                                    <label for="tue"> Tuesday</label>

                                    <input type="checkbox" id="wed" name="working_days[]" value="3"
                                        @if ($d[0] == 3 || $d[1] == 3 || $d[2] == 3 || $d[3] == 3 || $d[4] == 3 || $d[5] == 3) checked @endif>
                                    <label for="wed"> Wednesday</label>

                                    <input type="checkbox" id="thu" name="working_days[]" value="4"
                                        @if ($d[0] == 4 || $d[1] == 4 || $d[2] == 4 || $d[3] == 4 || $d[4] == 4 || $d[5] == 4 || $d[6] == 4) checked @endif>
                                    <label for="fri"> Thursday</label>
                                    <input type="checkbox" id="fri" name="working_days[]" value="5"
                                        @if ($d[0] == 5 || $d[1] == 5 || $d[2] == 5 || $d[3] == 5 || $d[4] == 5 || $d[5] == 5 || $d[6] == 5) checked @endif>
                                    <label for="thu"> Friday</label>
                                @endif
                                @error('working_days')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fees">fees</label>
                                <input type="text" name="fees" placeholder="fees" value="{{ $doctor->fees }}"
                                    class="form-control" id="fees">
                                @error('fees')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="file">File</label>
                                <input type="file" name="photo" class="form-control" id="file">
                                old photo:
                                <img class="img-fluid" style="width: 70px;" src="{{ asset($doctor->photo) }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="availability">Availability</label>
                                <select class="form-control" value="{{ $doctor->availability }}" name="availability"
                                    id="availability">
                                    <option {{ $doctor->availability == 1 ? 'selected' : '' }} value="1">Abailable
                                    </option>
                                    <option {{ $doctor->availability == 0 ? 'selected' : '' }} value="0">Unabailable
                                    </option>
                                </select>
                                @error('availability')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-check col-md-12 mb-2">
                                <div class="text-left">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="ex-check-2">
                                        <label class="custom-control-label" for="ex-check-2">Please Confirm</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Widget Item -->
        </div>
    </div>
@endsection
