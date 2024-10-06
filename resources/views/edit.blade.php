<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit User</h1>
        <form action="{{ route('update', $user->id_user) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>
            </div>

            <!-- Umur -->
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="number" name="umur" class="form-control" value="{{ $user->umur }}" required>
            </div>

            <!-- Judul -->
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $user->judul }}" required>
            </div>

            <!-- Harga -->
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $user->harga }}" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
