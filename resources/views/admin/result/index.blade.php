@extends('layouts.app')

@section('title', 'Result')

@section('content')
    <div class="p-4 mt-20 sm:p-6 lg:p-8">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Result</h1>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="relative overflow-auto rounded-lg shadow-md">
            @include('admin.result.table-result')
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.btn-delete').on('click', function(e) {
                e.preventDefault();

                const url = $(this).data('url');

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(resp) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: resp.message ||
                                        'Data berhasil dihapus',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: xhr.responseJSON?.message ||
                                        'Gagal menghapus data',
                                });
                            }
                        });

                    }
                });
            });
        });
    </script>
@endsection
