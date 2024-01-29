<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Barang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        label {
            margin-top: 10px;
        }

        .error {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <form action="{{ route('goods.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <h1 class="mb-4">Form Barang Hilang</h1>

        <!-- Nama Barang -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama Barang:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Deskripsi Barang -->
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Barang:</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Foto Barang -->
        <div class="mb-3">
            <label for="photo" class="form-label">Foto Barang:</label>
            <input type="file" class="form-control" id="photo" name="photo"
                accept="image/png, image/jpeg, image/jpg" required>
            @error('photo')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Lokasi Ditemukan Barang -->
        <div class="mb-3">
            <label for="where_found" class="form-label">Lokasi Ditemukan Barang:</label>
            <input type="text" class="form-control" id="where_found" name="where_found"
                value="{{ old('where_found') }}" required>
            @error('where_found')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Status Barang -->
        <div class="mb-3">
            <label for="status" class="form-label">Status Barang:</label>
            <select class="form-select" id="status" name="status">
                <option value="found" {{ old('status') == 'found' ? 'selected' : '' }}>Found</option>
                <option value="lost" {{ old('status') == 'lost' ? 'selected' : '' }}>Lost</option>
            </select>
            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
