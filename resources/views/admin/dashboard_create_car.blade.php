<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('user/img/logo.png') }}">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/style.css') }}">

    <title>Tambah Kapal</title>
    <style>
        .form-group {
            margin-bottom: 1rem;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 0.5rem;
            border-radius: 0.25rem;
            border: 1px solid #ccc;
            margin-bottom: 0.5rem;
        }

        input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            border-radius: 0.25rem;
            border: 1px solid #ccc;
            margin-bottom: 0.5rem;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 0.5rem;
            border-radius: 0.25rem;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0069d9;
        }
    </style>
</head>

<body>
    <x-sidebar-admin />
    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Tambah Kapal</h1>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Tambah Kapal</h3>

                </div>
                <form role="form" method="post" action="{{ route('store_car') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Kapal : </label><br>
                        <input class="form-control" type="text"name="name" /><br>
                        <label>Jenis Kapal : </label><br>
                        <div class="custom-select" style="width:100%;">
                            <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="category"
                                id="" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select><br>
                        </div>
                        {{-- <input class="form-control" type="text"name="category" /><br> --}}
                        <label>Warna : </label><br>
                        {{-- <input class="form-control" type="text"name="colour" /><br> --}}
                        <div class="custom-select" style="width:100%;">
                            <select style="font-size: 18px ; padding: 6px 5px; margin: 12px 0px; width: 100%" name="colour"
                                id="" class="form-control">
                                <option value="Hitam">Hitam</option>
                                <option value="Putih">Putih</option>
                                <option value="Biru">Biru</option>
                                <option value="Gold">Gold </option>
                                <option value="Silver">Silver</option>
                            </select><br>
                        </div>
                        <label>Kapasitas Penumpang : </label><br>
                        <input class="form-control"type="number" name="capacity" /><br>
                        <label>Fuel : </label><br>
                        <input class="form-control" type="text"name="fuel" /><br>
                        <label>Harga/Hari : </label><br>
                        <input class="form-control"type="number" name="price" /><br>
                        <input type="file" name="boat_img"><br>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </main>
    <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="{{ asset('admin/assets/script.js') }}"></script>
</body>

</html>
