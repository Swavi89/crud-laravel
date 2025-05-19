@extends('layouts.admin')
@section('title','Student Form')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y student-section">
    <div class="d-flex flex-wrap justify-content-between align-items-center">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="fw-bold py-3"><span class="text-muted fw-light"><a href="{{ url('students') }}" class='text-muted text-hover-primary'>Students /</a></span> {{ $student->id ? 'Edit' : 'Add' }}</h4>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
            @if(!empty($student->id))
            <a class="btn btn-danger" href='{{ url("students/$student->id/delete") }}'><i class='fa-solid fa-trash-can me-1'></i>Delete</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @include('elements.flash')
            <div class="card mb-4 ">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Student Details</h5>
                </div>
                <div class="card-body">
                    <form id="studentForm" action="{{url('/students/save')}}" method="POST" autocomplete="off">
                        @csrf
                        <input type="hidden" name="id" value="{{$student->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input type="text" name="name" id="name" class="form-control" minlength="1" maxlength="100" placeholder="e.g. Swaviman Sahoo" value="{{ !empty($student->name) ? $student->name : '' }}">
                                    <label for="floatingInput">Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input type="text" class="form-control date-input" name="date_of_birth"
                                        placeholder="DD-MM-YYYY"
                                        value="{{ !empty($student->date_of_birth) ? $student->date_of_birth : '' }}" />
                                    <label for="floatingInput">Date of Birth</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="radio-buttons mt-3">
                                    <label class="d-block form-label">Gender</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" {{ old('gender', $student->gender) == 'male' ? 'checked' : ''  }} />
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" {{ old('gender', $student->gender) === 'female' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="other" {{ old('gender', $student->gender) === 'other' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="inlineRadio3">Other</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input type="text" name="email" id="email" class="form-control" maxlength="100" placeholder="e.g. swaviman89@carrybell.com" value="{{ !empty($student->email) ? $student->email : '' }}" />
                                    <label>Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input type="tel" name="mobile" id="mobile" minlength="10" maxlength="10" class="form-control numeric-only" placeholder="e.g. 8093478546" value="{{ !empty($student->mobile) ? $student->mobile : '' }}" />
                                    <label>Mobile</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <textarea class="form-control" name="address" rows="2" minlength="1" maxlength="255"
                                        placeholder="#49, CDA, Cuttack, Odisha, 751003">{{ !empty($student->address) ? $student->address : '' }}</textarea>
                                    <label for="floatingInput">Address</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input type="text" name="roll_number" id="roll_number" minlength="1" maxlength="50" class="form-control" placeholder="e.g. 1901109342" value="{{ !empty($student->roll_number) ? $student->roll_number : '' }}" />
                                    <label>Roll Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input type="text" name="class" id="class" class="form-control" minlength="1" maxlength="50" placeholder="e.g. 10th" value="{{ !empty($student->class) ? $student->class : '' }}" />
                                    <label>Class<small class="text-light text-capitalize"> (Optional)</small></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mt-3">
                                    <input type="text" name="section" id="section" class="form-control" minlength="1" maxlength="50" placeholder="e.g. A" value="{{ !empty($student->section) ? $student->section : '' }}" />
                                    <label>Section<small class="text-light text-capitalize"> (Optional)</small></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label d-block mt-3">Status</label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="status" id="status" class="form-check-input" {{ old('status', $student->status) == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="float-end">
                            <button type="submit" class="btn btn-primary me-1"><i class="fa-solid fa-check fa-sm me-1"></i> Save</button>
                            <a type="submit" class="btn btn-label-secondary" href="{{ url('students')}}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.numeric-only').on('input', function(e) {
            var input = $(this);
            var value = input.val();
            value = value.replace(/\D/g, '');
            input.val(value);
        });
        $('.date-input').datepicker({
            format: "dd-mm-yyyy",
            autoclose: !0,
            clearBtn: true,
            todayHighlight: true,
        })
        $('#studentForm').validate({
            rules: {
                name: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    },
                    minlength: 1,
                    maxlength: 100
                },
                date_of_birth: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                gender: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                email: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    },
                    pattern: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
                    maxlength: 100
                },
                mobile: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    },
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                address: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    },
                    minlength: 1,
                    maxlength: 255
                },
                roll_number: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    },
                    minlength: 1,
                    maxlength: 50
                },
                class: {
                    required: false,
                    normalizer: function(value) {
                        return $.trim(value);
                    },
                    minlength: 1,
                    maxlength: 50
                },
                section: {
                    required: false,
                    normalizer: function(value) {
                        return $.trim(value);
                    },
                    minlength: 1,
                    maxlength: 50
                }
            },
            messages: {
                name: {
                    required: "Please enter name",
                    minlength: 'Please enter name',
                    maxlength: 'Please enter name'
                },
                date_of_birth: {
                    required: "Please enter date of birth",
                },
                gender: {
                    required: "Please enter gender",
                },
                email: {
                    required: 'Please enter email',
                    pattern: 'Please enter valid email',
                    maxlength: 'Please enter valid email',
                },
                mobile: {
                    required: 'Please enter mobile number',
                    number: 'Please enter mobile number',
                    minlength: 'Please enter mobile number',
                    maxlength: 'Please enter mobile number'
                },
                address: {
                    required: "Please enter city",
                    minlength: 'Please enter city',
                    maxlength: 'Please enter city'
                },
                roll_number: {
                    required: "Please enter roll number",
                    minlength: 'Please enter roll number',
                    maxlength: 'Please enter roll number'
                },
                class: {
                    required: "Please enter class",
                    minlength: 'Please enter class',
                    maxlength: 'Please enter class'
                },
                section: {
                    required: "Please enter section",
                    minlength: 'Please enter section',
                    maxlength: 'Please enter section'
                }
            },
            onkeyup: function(element) {
                this.element(element);
            },
            errorPlacement: function(error, element) {
                if (element.parent().hasClass("input-group"))
                    error.insertAfter(element.parent());
                else if (element.parent().hasClass("form-floating"))
                    error.insertAfter(element.parent());
                else if (element.parent().hasClass('form-check') && element.attr("name") === "gender")
                    error.insertAfter(element.closest('.radio-buttons'));
                else
                    error.insertAfter(element);
            }
        });
    });
</script>
@endsection