<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Create User</h1>
        
        <!-- Tampilkan error validasi -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ old('nama') }}" required>
            </div>
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="number" name="umur" class="form-control" placeholder="Umur" value="{{ old('umur') }}" required>
            </div>
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Judul" value="{{ old('judul') }}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Harga" value="{{ old('harga') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <!-- Tombol Kembali -->
            <a href="{{ route('users.index') }}" class="btn btn-secondary ml-2">Kembali</a>
        </form>
    </div>
</body>
</html>
