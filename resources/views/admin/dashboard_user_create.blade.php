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

    <title>Tambah User</title>
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
                <h1>Tambah User</h1>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Add User</h3>

                </div>
                <form role="form" method="post" action="{{ route('add_user') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama : </label><br>
                        <input class="form-control" type="text" name="name" /><br>
                        <label>Email : </label><br>
                        <input class="form-control" type="email" name="email" /><br>
                        <label>Password : </label><br>
                        <input class="form-control" type="password" name="password" /><br>
                        <label>Role : </label><br>
                        <div class="custom-select" style="width:200px;">
                            <select style="font-size: 18px ; padding: 6px 5px; margin: 5px 0px" name="is_admin" id="" class="form-control">
                                <option value="" selected disabled>Pilih Role</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select><br>
                        </div>
                        <label>Phone Number : </label><br>
                        <input class="form-control" type="text" name="call_num" oninput="this.value = this.value.replace(/[^0-9]/g, '')" /><br>
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
