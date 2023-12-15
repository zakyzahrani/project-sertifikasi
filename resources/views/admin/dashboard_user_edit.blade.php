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
                <h1>User</h1>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Edit User</h3>

                </div>
                <form role="form" method="post" action="{{ route('update_user', $user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>Name : </label>
                        <input class="form-control" type="text"name="name"value="{{ $user->name }}" />
                        <label>Email : </label>
                        <input class="form-control" type="text"name="email"value="{{ $user->email }}" />
                        <label>Password : </label>
                        <input class="form-control"type="password" name="password" />
                        <label>Role : </label>
                        <div class="custom-select" style="width:200px;">
                            <select style="font-size: 18px ; padding: 6px 5px; margin: 5px 0px" name="is_admin"
                                id="" class="form-control" >
                                
                                    @if ($user->is_admin == '1')
                                        <option value="1" selected>Admin</option>
                                        <option value="0" >User</option>
                                    @else
                                        <option value="1" >Admin</option>
                                        <option value="0" selected>User</option>
                                    @endif</option>
                                
                                
                            </select><br>
                        <label>Phone Number: </label>
                        <input class="form-control" type="text"name="call_num"value="{{ $user->call_num }}" />
                        </div>

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
