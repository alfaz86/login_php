<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        .btn-primary {
            background-color : #6558F5;
            border-color : #6558F5;
        }
        .btn-primary:active,
        .btn-primary:hover,
        .btn-primary:focus {
            background-color : #4d40e1 !important;
            border-color : #4d40e1 !important;
        }
        tbody tr:hover {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['status'])) {
            if ($_SESSION['status'] != "login") header("Location: http://login_php.test/login.php");
        }
    ?>

    <div class="container mt-5">
        <h1 class="text-left mt-5 mb-5">Data User</h1>
        <table id="index-table" class="table table-bordered mb-5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
    
            </tbody>
        </table>

        <button type="button" class="btn btn-primary mb-3 mr-3" data-toggle="modal" data-target="#addModal">Buat User</button>
        <button type="button" class="btn btn-primary mb-3 mr-3" onclick="setEditModal()">Ubah User</button>
        <button type="button" class="btn btn-primary mb-3 mr-3" onclick="setDeleteModal()">Hapus User</button>
        <button id="logout" type="button" class="btn btn-primary mb-3 mr-3">Logout User</button>
    </div>


    <!-- addModal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createData">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="username" class="col-sm-3">User Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" id="username" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3">Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="password" id="password" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-modal">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- editModal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editData">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id-edit">
                        <div class="form-group row">
                            <label for="username" class="col-sm-3">User Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" id="username-edit" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3">Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="password" id="password-edit" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-modal">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- deleteModal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="deleteData">
                    <div class="modal-body mt-3">
                        <input type="hidden" name="id" id="id-delete">
                        <h4 class="text-center m-3">Apakah Anda yakin ingin menghapus data ini?</h4>
                    </div>
                    <div class="text-center mb-5">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" id="btn-modal">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="fixed-bottom m-3">
        Develop by <a href="https://github.com/alfaz86" target="blank">Muhammad Alfaz</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Script -->
    <script>
        let dataset = null;

        function readData(){
            $.get( "read.php", function(data) {
                $("#index-table > tbody").children().remove();
                $("#index-table > tbody").append(data);
                $("#index-table > tbody").children().children().addClass("align-middle");
            });
            dataset = null;
        }
        readData();
        
        function setdata(e, data){
            dataset = data;
            $("tbody > tr").removeClass("table-secondary");
            $(e).addClass("table-secondary");
        }

        $(document).click(function(e){
            if (!$(e.target).closest('tbody > tr').length) {
                $("tbody > tr").removeClass("table-secondary");
                dataset = null;
            }
        });

        $("#createData").submit(function(e){
            e.preventDefault();
            let serializedData = $(this).serialize();
            let post = $.post("create.php", serializedData)
            
            post.done(function(data) {
                $("#createData").trigger("reset");
                $("#addModal").modal("hide");
                readData();
            });
            
            post.fail(function(data) {
                alert( "error" );
            });
        });

        function setEditModal() {
            if (dataset == null) return false;
            $("#editModal").modal('show');
            $("#id-edit").val(dataset.id);
            $("#username-edit").val(dataset.username);
            $("#password-edit").val(dataset.password);
        }

        $("#editData").submit(function(e){
            e.preventDefault();
            let serializedData = $(this).serialize();
            let post = $.post("update.php", serializedData)
            
            post.done(function(data) {
                $("#editModal").modal("hide");
                readData();
            });
            
            post.fail(function(data) {
                alert( "error" );
            });
        });

        function setDeleteModal(){
            if (dataset == null) return false;
            $("#deleteModal").modal('show');
            $("#id-delete").val(dataset.id);
        }

        $("#deleteData").submit(function(e){
            e.preventDefault();
            let serializedData = $(this).serialize();
            let post = $.post("delete.php", serializedData)
            
            post.done(function(data) {
                $("#deleteModal").modal("hide");
                readData();
            });
            
            post.fail(function(data) {
                alert( "error" );
            });
        });

        $("#logout").click(function(e){
            let get = $.get("auth.php")
            
            get.done(function(data) {
                window.location.href = "http://login_php.test/login.php?msg=logout";
            });
            
            get.fail(function(data) {
                alert( "error" );
            });
        });
    </script>
</body>
</html>