@extends('layouts.app')
@section('title', 'Nusa-Advocates | Practice Area')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Practice Area</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Practice Area</li>
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
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="card-title">List Practice Area</h5>
                            <div class="py-3">
                                <a href="{{ route('practice.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle me-1"></i> New Practice Area
                                </a>
                            </div>
                        </div>
                        <!-- Table with stripped rows -->

                        <div class="table-responsive">
                            <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Language</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection



@push('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            scrollX: true,
            language: {          
                processing: "<div class='spinner-border text-primary' role='status'><span class='visually-hidden'>Loading...</span></div>",
            },
            ajax: "{{ route('practice.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description',
                },
                {
                    data: 'lang',
                    name: 'lang',
                    render: function(data, type, full, meta) {
                        return data == 'id' ? 'Indonesia' : 'English';
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            createdRow: function(row, data, dataIndex) {
                $('td', row).eq(4).addClass('text-center');
            }
        });

        // Handle delete button click
        $('.data-table').on('click', '.delete-item', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('practice.delete') }}",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            itemID: id
                        },
                        success: function(data) {
                            table.ajax.reload();
                            if (data.status == 'success') {
                                Swal.fire('Deleted!', data.message, 'success');
                            } else {
                                Swal.fire('Error', data.message, 'error');
                            }
                        },
                        error: function(data) {
                            console.error('Error:', data);
                            Swal.fire('Error', data.message, 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endpush