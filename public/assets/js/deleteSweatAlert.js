function deleteBankAccount(id) {
    // Tampilkan SweetAlert untuk konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Rekening ini akan dihapus dan tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika user mengkonfirmasi penghapusan, jalankan AJAX
                $.ajax({
                    url: '/branchBankDetail/' + id,  // Ganti sesuai URL untuk penghapusan data
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(result) {
                        // Berikan feedback jika berhasil
                        Swal.fire(
                            'Dihapus!',
                            'Rekening berhasil dihapus.',
                            'success'
                        ).then(() => {
                            location.reload();  // Refresh halaman setelah penghapusan berhasil
                        });
                    },
                    error: function(xhr) {
                        // Tampilkan pesan error jika gagal
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat menghapus rekening.',
                            'error'
                        );
                    }
                });
            }
        });
    }