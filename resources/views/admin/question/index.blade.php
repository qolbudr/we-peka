@extends('layouts.app')

@section('title', 'Question')

@section('content')
    <div class="p-4 mt-20 sm:p-6 lg:p-8">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Question Management</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage your questions</p>
                </div>
                <!-- Button Create -->
                <button data-modal-target="create-modal" data-modal-toggle="create-modal"
                    class="inline-flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-700 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    <x-icon-plus />
                    Create Question
                </button>
            </div>

            {{-- Modal Create --}}
            @include('admin.question.create-modal')
        </div>

        <!-- Table Section -->
        <div class="relative overflow-auto rounded-lg shadow-md">
            @include('admin.question.table-question')
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Select quiz & hidden intelligence
            const quizSelect = document.getElementById('quiz-id');
            const intelligenceWrapper = document.getElementById('intelligence-wrapper');
            const intelligenceSelect = document.getElementById('intelligence-id');

            // Hidden and show intelligence (create)
            function hiddenCreateIntteligence() {
                const selectedOption = quizSelect.options[quizSelect.selectedIndex];

                if (!selectedOption) return;
                const category = selectedOption.getAttribute('data-category');

                if (category === 'efikasi_karir') {
                    intelligenceWrapper.style.display = 'none';
                    intelligenceSelect.required = false;
                } else if (category === 'multiple_intelligence') {
                    intelligenceWrapper.style.display = 'block';
                    intelligenceSelect.required = true;
                } else {
                    intelligenceWrapper.style.display = 'none';
                    intelligenceSelect.required = false;
                }
            }

            quizSelect.addEventListener('change', hiddenCreateIntteligence);

            hiddenCreateIntteligence();

            // Create
            $('#formCreate').on('submit', function(e) {
                if (!this.checkValidity()) {
                    e.preventDefault();

                    if (!this.quiz_id.value) iziToast.error({
                        title: 'Error',
                        message: 'Quiz wajib diisi',
                    });

                    if (!this.question.value.trim()) iziToast.error({
                        title: 'Error',
                        message: 'Pertanyaan wajib diisi',
                    });

                    return;
                }

                e.preventDefault();

                $.ajax({
                    url: this.action,
                    method: 'POST',
                    data: $(this).serialize(),
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(resp) {
                        $('#create-modal').addClass('hidden');

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: resp.message ||
                                'Data berhasil ditambahkan',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.reload();
                        });
                    },
                    error: function(xhr) {
                        if (xhr.status === 422 && xhr.responseJSON?.errors) {
                            Object.values(xhr.responseJSON.errors).flat().forEach(function(
                                msg) {
                                iziToast.error({
                                    title: 'Error',
                                    message: msg,
                                    position: 'topRight'
                                });
                            });
                        } else {
                            const msg = xhr.responseJSON?.message ||
                                'Terjadi kesalahan. Coba lagi.';
                            iziToast.error({
                                title: 'Gagal',
                                message: msg,
                                position: 'topRight'
                            });
                        }
                    }
                });
            });

            // Update
            $('.form-edit').on('submit', function(e) {
                const form = this;
                const modal = $(form).closest('div[id^="edit-modal_"]');

                const questionVal = $(form).find('[name="question"]').val().trim();
                const intelligenceSelect = $(form).find('[name="intelligence_id"]');

                if (!this.checkValidity()) {
                    e.preventDefault();

                    if (!questionVal) {
                        iziToast.error({
                            title: 'Error',
                            message: 'Question wajib diisi',
                        });
                        return;
                    }

                    if (intelligenceSelect.length > 0 && intelligenceSelect.is(':visible')) {
                        const intelligenceVal = intelligenceSelect.val();
                        if (!intelligenceVal) {
                            iziToast.error({
                                title: 'Error',
                                message: 'Intelligence wajib diisi',
                            });
                            return;
                        }
                    }
                }

                e.preventDefault();

                $.ajax({
                    url: form.action,
                    method: 'POST',
                    data: $(form).serialize(),
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(resp) {
                        modal.addClass('hidden');

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: resp.message || 'Data berhasil diupdate',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.reload();
                        });
                    },
                    error: function(xhr) {
                        if (xhr.status === 422 && xhr.responseJSON?.errors) {
                            Object.values(xhr.responseJSON.errors).flat().forEach(function(
                                msg) {
                                iziToast.error({
                                    title: 'Error',
                                    message: msg,
                                    position: 'topRight'
                                });
                            });
                        } else {
                            const msg = xhr.responseJSON?.message ||
                                'Terjadi kesalahan. Coba lagi.';
                            iziToast.error({
                                title: 'Gagal',
                                message: msg,
                                position: 'topRight'
                            });
                        }
                    }
                });
            });

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
