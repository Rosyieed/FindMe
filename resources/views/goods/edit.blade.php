<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Barang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Menambahkan sedikit padding pada elemen form */
        form {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <form action="{{ route('goods.update', $goods->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Barang:</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $goods->name) }}" required>
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Barang:</label>
                <textarea class="form-control" id="description" name="description" required>{{ old('description', $goods->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Foto Barang:</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/png, image/jpeg">
                @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="photo" class="form-label">Foto Sekarang:</label>
                @if ($goods->photo)
                    <img src="{{ asset('storage/' . $goods->photo) }}" alt="{{ $goods->name }}" class="img-thumbnail"
                        width="100">
                @else
                    <p>Foto tidak tersedia</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="where_found" class="form-label">Lokasi Ditemukan Barang:</label>
                <input type="text" class="form-control" id="where_found" name="where_found"
                    value="{{ old('where_found', $goods->where_found) }}" required>
                @error('where_found')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status Barang:</label>
                <select class="form-select" id="status" name="status">
                    <option value="found" {{ old('status', $goods->status) == 'found' ? 'selected' : '' }}>Found
                    </option>
                    <option value="lost" {{ old('status', $goods->status) == 'lost' ? 'selected' : '' }}>Lost
                    </option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
