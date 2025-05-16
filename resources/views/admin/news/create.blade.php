@extends('layouts.app')
@section('title', 'Nusa-Advocates | News')

@push('styles')
<style>
    .tox-promotion {
        display: none;
    }
</style>
@endpush

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>News</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News</a></li>
                <li class="breadcrumb-item active">New News</li>
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
                        <h5 class="card-title">Form New News</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Short Description</label>
                                        <textarea class="form-control" name="short_desc" rows="8" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date</label>
                                                <input type="date" name="date" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">File Upload</label>
                                                <input type="file" name="image" id="upload_image" accept="image/png, image/gif, image/jpeg" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Language</label>
                                                <select name="lang" id="lang" class="form-control">
                                                    <option value="id">Indonesia</option>
                                                    <option value="en">English</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Type</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option value="news">News</option>
                                                    <option value="update">Update</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <select name="category" class="form-control" id="category" required>
                                                    <option value="" hidden readonly>-Select Category -</option>
                                                    <option value="news-hyperbaric">News - Hyperbaric</option>
                                                    <option value="news-physiotherapy">News - Physiotherapy</option>
                                                    <option value="blog">Blog</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <!-- <input type="text" name="category" class="form-control" required> -->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Slug</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon3">{{ url('/news') }}/</span>
                                                    <input type="text" class="form-control" name="slug" id="basic-url" aria-describedby="basic-addon3" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Link Redirect</label>
                                                <input type="text" name="link_redirect" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="tinymce-editor" name="desc">
                                            <p>Hello World!</p>
                                        </textarea>

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