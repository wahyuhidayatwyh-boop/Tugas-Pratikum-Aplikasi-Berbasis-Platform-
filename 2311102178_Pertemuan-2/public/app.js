$(document).ready(function() {
    // --- 1. INISIALISASI DATATABLES (Halaman Tabel) ---
    if ($('#tabelPegawai').length) {
        var table = $('#tabelPegawai').DataTable({
            ajax: {
                url: '/api/users',
                dataSrc: '' // Mengambil root array dari response JSON
            },
            columns: [
                { data: 'id' },
                { data: 'nama' },
                { data: 'email' },
                { data: 'divisi' },
                { 
                    data: null,
                    render: function(data, type, row) {
                        return `
                            <button class="btn btn-sm btn-warning btn-edit" data-id="${row.id}">Edit</button>
                            <button class="btn btn-sm btn-danger btn-delete" data-id="${row.id}">Hapus</button>
                        `;
                    }
                }
            ]
        });

        // Event listener Hapus Data (SweetAlert2 jQuery Plugin)
        $('#tabelPegawai tbody').on('click', '.btn-delete', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Yakin hapus data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/users/${id}`,
                        type: 'DELETE',
                        success: function(res) {
                            Swal.fire('Terhapus!', res.message, 'success');
                            table.ajax.reload(); // Reload tabel (Refresh JSON otomatis)
                        }
                    });
                }
            });
        });

        // Event listener Edit Data (Redirect ke form.html dengan URL Parameter)
        $('#tabelPegawai tbody').on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            window.location.href = `form.html?id=${id}`;
        });
    }

    // --- 2. LOGIKA FORM INPUT / EDIT (Halaman Form) ---
    if ($('#pegawaiForm').length) {
        // Cek apakah mode Edit (ada parameter ?id=X di URL)
        const urlParams = new URLSearchParams(window.location.search);
        const editId = urlParams.get('id');

        if (editId) {
            $('#formTitle').text('Edit Data Pegawai');
            // Fetch data user via JSON
            $.get(`/api/users/${editId}`, function(data) {
                $('#pegawaiId').val(data.id);
                $('#nama').val(data.nama);
                $('#email').val(data.email);
                $('#divisi').val(data.divisi);
            });
        }

        // Submit Form via AJAX
        $('#pegawaiForm').submit(function(e) {
            e.preventDefault();
            
            var id = $('#pegawaiId').val();
            var payload = {
                nama: $('#nama').val(),
                email: $('#email').val(),
                divisi: $('#divisi').val()
            };

            var method = id ? 'PUT' : 'POST';
            var url = id ? `/api/users/${id}` : '/api/users';

            $.ajax({
                url: url,
                type: method,
                contentType: 'application/json',
                data: JSON.stringify(payload),
                success: function(res) {
                    Swal.fire('Berhasil!', res.message, 'success').then(() => {
                        window.location.href = 'tabel.html';
                    });
                }
            });
        });
    }
});