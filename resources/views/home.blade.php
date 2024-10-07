<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Daftar Users</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table td, .table th {
            vertical-align: middle;
        }
        .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Penonton Film</h1>
        
        <!-- Tombol Create User -->
        <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Create User</a>
        
        <!-- Tabel Data Users -->
        <table class="table table-striped table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->umur }}</td>
                        <td>
                            <!-- Tombol Info -->
                            <button type="button" class="btn btn-info btn-sm btn-info-user" 
                                    data-toggle="modal" 
                                    data-target="#infoModal"
                                    data-nama="{{ $user->nama }}"
                                    data-umur="{{ $user->umur }}"
                                    data-judul="{{ $user->judul }}"
                                    data-harga="Rp. {{ $user->harga }}">
                                Info
                            </button>
                            
                            <!-- Tombol Edit -->
                            <a href="{{ route('users.edit', $user->id_user) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Delete dengan Modal -->
                            <button type="button" class="btn btn-danger btn-sm btn-delete-user" 
                                    data-toggle="modal" 
                                    data-target="#deleteModal"
                                    data-id="{{ $user->id_user }}"
                                    data-nama="{{ $user->nama }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data user</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Bootstrap untuk Info -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Detail User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama:</strong> <span id="modalNama"></span></p>
                    <p><strong>Umur:</strong> <span id="modalUmur"></span></p>
                    <p><strong>Judul:</strong> <span id="modalJudul"></span></p>
                    <p><strong>Harga:</strong> <span id="modalHarga"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bootstrap untuk Konfirmasi Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus user <strong id="deleteUserName"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Script untuk mempopulasi modal dengan data user
        $(document).on('click', '.btn-info-user', function() {
            var nama = $(this).data('nama');
            var umur = $(this).data('umur');
            var judul = $(this).data('judul');
            var harga = $(this).data('harga');

            // Set konten modal dengan data user
            $('#modalNama').text(nama);
            $('#modalUmur').text(umur);
            $('#modalJudul').text(judul);
            $('#modalHarga').text(harga);
        });

        // Script untuk menampilkan modal delete dengan data dinamis
        $(document).on('click', '.btn-delete-user', function() {
            var nama = $(this).data('nama');
            var id = $(this).data('id');
            $('#deleteUserName').text(nama);
            $('#deleteForm').attr('action', '/users/' + id);
        });
    </script>
</body>
</html>
