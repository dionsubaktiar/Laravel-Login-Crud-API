<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit-button').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    url: '/crud/' + id + '/edit', // Replace with your edit route
                    type: 'GET',
                    success: function(data) {
                        $('#editModal').find('#editForm').attr('action', '/crud/' + id);
                        $('#editModal').find('#nama').val(data.nama);
                        $('#editModal').find('#umur').val(data.umur);
                        $('#editModal').find('#pekerjaan').val(data.pekerjaan);
                        $('#editModal').modal('show');
                    }
                });
            });
        });
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <title>Earth Tones Table</title>
    <style>
        @font-face {
            font-family: 'MyFont';
            src: url('../res/Product Sans Regular.ttf') format('truetype');
        }

        input[type="text"],
        input[type="number"] {
            font-family: 'MyFont', sans-serif;
            width: 100%;
            padding: 10px;
            border: 1px solid #8f6b51;
            border-radius: 5px;
        }

        input[type="submit"] {
            font-family: 'MyFont', sans-serif;
            padding: 10px;
            border: 1px solid #8f6b51;
            border-radius: 5px;
        }

        body {
            font-family: 'MyFont', sans-serif;
            background-color: #d1b590;
            /* Earthy background color */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            min-width: 95vw;
        }

        .container {
            background-color: #f5f2e6;
            /* Earthy table background color */
            border-radius: 15px;
            margin-top: 20px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 95vw;
            border-collapse: collapse;
            /* margin-top: 20px; */
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #8f6b51;
            /* Earthy border color */
        }

        th {
            background-color: #c39b77;
            /* Earthy table header background color */
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ url('/') }}"
            style="font-family: 'MyFont', sans-serif;border: 1px solid #8f6b51;background-color:#333333"
            class="btn btn-primary
            ">Kembali</a>
        <!-- Insert Data modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="font-family: 'MyFont', sans-serif;border: 1px solid #8f6b51;background-color:#333333">
            Tambah Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('crud.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan Nama">
                            </div>
                            <div class="mb-3">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="number" class="form-control" id="umur" name="umur"
                                    placeholder="Masukkan Umur">
                            </div>
                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                    placeholder="Masukkan Pekerjaan">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" id="liveToastBtn"
                                style="font-family: 'MyFont', sans-serif;border: 1px solid #8f6b51;background-color:#333333">Simpan
                                Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Data modal -->
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/crud" method="POST" id="editForm">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan Nama">
                            </div>
                            <div class="mb-3">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="number" class="form-control" id="umur" name="umur"
                                    placeholder="Masukkan Umur">
                            </div>
                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                    placeholder="Masukkan Pekerjaan">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" id="liveToastBtn"
                                style="font-family: 'MyFont', sans-serif;border: 1px solid #8f6b51;background-color:#333333">Simpan
                                Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <form action="/search" method="GET">
            <input type="text" name="cari" placeholder="Search by Name.." style="width: 70%">
            <input type="submit" class="cta-btn" value="Cari">
        </form>
        <h1 style="margin-top:8px">CRUD Project</h1>
        <table class="table table-bordered table-hover" id="datatable"
            style="border: #8f6b51;border-radius: 5px solid #8f6b51">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Pekerjaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                @foreach ($data as $datas)
                    <td>{{ $datas->nama }}</td>
                    <td>{{ $datas->umur }}</td>
                    <td>{{ $datas->pekerjaan }}</td>
                    <td>
                        <button type="button" class="cta-btn edit-button" id="edit-button"
                            data-id="{{ $datas->id }}" style="padding:6px 17px">Edit</button>
                        {{-- <a class="cta-btn" href="{{ route('crud.edit', [$datas->id]) }}"
                            style="padding: 6px 18px 6px 18px;font-size:16px">Edit</a> --}}
                        <form method="POST" action="/crud/{{ $datas->id }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div class="form-group">
                                <input type="submit" class="cta-btn" style="padding: 6px 8px 6px 8px;font-size:16px"
                                    value="Delete">
                            </div>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
            </tbody>

        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        < /scrip> <
        script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin = "anonymous" >
    </script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
</body>

</html>
