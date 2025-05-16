@extends('layouts.app')
@section('title', 'Nusa-Advocates | Blog & Article')

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
        <h1>Blog & Article</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Blog & Article</a></li>
                <li class="breadcrumb-item active">Edit Blog & Article</li>
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
                        <h5 class="card-title">Form Edit Blog & Article</h5>

                        <!-- General Form Elements -->

                        <form action="{{ route('news.update',$news->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Short Description</label>
                                        <textarea class="form-control" name="short_desc" rows="8" required>{{ $news->short_desc }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control" required value="{{ $news->title }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date</label>
                                                <input type="date" name="date" class="form-control" required value="{{ $news->date }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    File Upload
                                                    <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#showimage">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </button></label>
                                                <input type="file" name="image" class="form-control mb-2">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Language</label>
                                                <select name="lang" id="lang" class="form-control">
                                                    <option value="en" {{ $news->lang == 'en' ? 'selected' : '' }}>English</option>
                                                    <option value="id" {{ $news->lang == 'id' ? 'selected' : '' }}>Indonesia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Type</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option value="news" {{ $news->type == 'news' ? 'selected' : '' }}>News</option>
                                                    <option value="update" {{ $news->type == 'update' ? 'selected' : '' }}>Update</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <input type="text" name="category" class="form-control" required value="{{ $news->category }}">
                                            </div>
                                        </div> -->
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="form-label">Slug</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon3">{{ url('/news') }}/</span>
                                                    <input type="text" class="form-control" name="slug" id="basic-url" aria-describedby="basic-addon3" value="{{ $news->slug }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="form-label">Link Redirect</label>
                                                <input type="text" name="link_redirect" class="form-control" value="{{ $news->link_redirect }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="tinymce-editor" name="desc">
                                        {{ $news->desc }}
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

<div class="modal fade" id="showimage" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$news->image}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/news') }}/{{$news->image}}" width="100%">
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