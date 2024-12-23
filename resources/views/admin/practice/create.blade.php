@extends('layouts.app')
@section('title', 'Nusa-Advocates | Practice Area')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Practice Area</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('practice.index') }}">Practice Area</a></li>
                <li class="breadcrumb-item active">New Practice Area</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

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
                        <h5 class="card-title">Form New Practice Area</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('practice.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Slug</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon3">{{ url('/practice-area') }}/</span>
                                                    <input type="text" class="form-control" name="slug" id="basic-url" aria-describedby="basic-addon3">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Language</label>
                                                <select name="lang" id="lang" class="form-control">
                                                    <option value="id">Indonesia</option>
                                                    <option value="en">English</option>
                                                </select>
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

@endsection


@push('scripts')
<!-- <script>
    $('input[name="image"]').change(function() {
        console.log('tes')
        var maxSizeBytes = 2 * 1024 * 1024;
        var fileSize = this.files[0].size;
        if (fileSize > maxSizeBytes) {
            $(this).val('');
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "File size exceeds the maximum allowed size of 2MB!",
            });
        }
    });
</script> -->
@endpush