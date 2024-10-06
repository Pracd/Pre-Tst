<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Info User</h1>
        <p><strong>Nama:</strong> {{ $user->nama }}</p>
        <p><strong>Umur:</strong> {{ $user->umur }}</p>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
