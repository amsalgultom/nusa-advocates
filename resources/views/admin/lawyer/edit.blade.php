@extends('layouts.app')
@section('title', 'Nusa-Advocates | Principal Lawyer')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Principal Lawyer</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('lawyer.index') }}">Principal Lawyer</a></li>
                <li class="breadcrumb-item active">Edit Principal Lawyer</li>
            </ol>
        </nav>
    </div><!-- End Page Name -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @elseif (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <h5 class="card-title">Form Edit Principal Lawyer</h5>

                        <!-- General Form Elements -->

                        <form action="{{ route('lawyer.update',$lawyer->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="5" required>{{ $lawyer->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" required value="{{ $lawyer->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="text" name="email" class="form-control" required value="{{ $lawyer->email }}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Level</label>
                                                <input type="text" name="level" class="form-control" required value="{{ $lawyer->level }}">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    File Upload
                                                    <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#showimage">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </button></label>
                                                <input type="file" name="image" class="form-control mb-2">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label class="form-label">Language</label>
                                                <select name="lang" id="lang" class="form-control">
                                                    <option value="id" {{ $lawyer->lang == 'id' ? 'selected' : '' }}>Indonesia</option>
                                                    <option value="en" {{ $lawyer->lang == 'en' ? 'selected' : '' }}>English</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="text-center mt-3 mb-2">
                        <button type="submit" class="btn btn-primary">Submit Form</button>
                    </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>
        </div>
        </div>
    </section>

</main><!-- End #main -->

<div class="modal fade" id="showimage" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$lawyer->image}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/lawyer') }}/{{$lawyer->image}}" width="100%">
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $('input[name="image"]').change(function() {
        console.log('tes')
        var maxSizeBytes = 10 * 1024 * 1024;
        var fileSize = this.files[0].size;
        if (fileSize > maxSizeBytes) {
            $(this).val('');
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "File size exceeds the maximum allowed size of 10MB!",
            });
        }
    });
</script>
@endpush