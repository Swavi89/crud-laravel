@extends('layouts.admin')
@section('title', 'View Student')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y student-section">
    <h4 class="fw-bold py-3"><span class="text-muted fw-light">Students</span></h4>
    @include('elements.flash')
    <div class="card">
        <div class="p-4">
            <div class="d-sm-flex flex-wrap">
                <div class="me-sm-auto d-flex mb-2">
                    <a class="btn btn-primary" type="button" href='{{ url("students/add") }}'>
                        <i class="fa-solid fa-circle-plus me-1"></i>
                        <span class="d-none d-sm-inline-block">Add</span>
                    </a>
                </div>
                <a href="{{ url('/students') }}" class="btn clear-all text-primary mb-2 mb-sm-1 ps-0" style="display: none;">
                    Clear All
                </a>
                <div class="d-flex justify-content-sm-center justify-content-start">
                    <form id="form" action="{{ url('/students') }}" method="GET" autocomplete="off" class="search-form">
                        <div class="input-group input-group-merge">
                            <input id="search" type="search" name="q" class="form-control" placeholder="Search..." value="{{app('request')->get('q') ?? ''}}">
                            <button class="input-group-text cursor-pointer" type="submit"><i class='fa-solid fa-magnifying-glass'></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            @if($students->isEmpty())
            <p class="text-danger text-center">No student found.</p>
            @else
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th class='text-center'>Status</th>
                        <th class='text-center'>Action(s)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>
                            <div class="d-flex flex-column">
                                <h6 class="m-0">{{$student->name}}</h6>
                            </div>
                        </td>
                        <td>
                            {{$student->mobile}}
                        </td>
                        <td>
                            {{$student->email}}
                        </td>
                        <td class="text-center">
                            @if($student->status == 'inactive')
                            <span class="badge bg-warning me-1 text-capitalize">{{ $student->status }}</span>
                            @elseif($student->status == 'active')
                            <span class="badge bg-success me-1 text-capitalize">{{$student->status}}</span>
                            @else
                            <span class="badge bg-secondary me-1 text-capitalize">{{ $student->status }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown d-flex align-items-sm-center justify-content-sm-center">
                                <button class="btn p-0" type="button" id="totalProject" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalProject">
                                    <a class="dropdown-item" href='{{ url("students/$student->id/edit") }}'><i class="fa-regular fa-pen-to-square me-1"></i> Edit</a>   
                                    <a class="dropdown-item" href='{{ url("students/$student->id/delete") }}'><i class="fa-regular fa-trash-can me-1"></i> Delete</a>                                  
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <div class="card-footer">
            @include('elements.table-pagination',['records' => $students])
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('form');
        const searchInput = document.getElementById('search');
        const clearAllBtn = document.querySelector('.clear-all');

        function toggleClearAllButton() {
            if (searchInput.value.trim()) {
                clearAllBtn.style.display = 'inline-block';
            } else {
                clearAllBtn.style.display = 'none';
            }
        }
        if (searchInput.value.trim()) {
            clearAllBtn.style.display = 'inline-block';
        }
    });
</script>
@endsection