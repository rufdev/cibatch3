<?= $this->extend('template/admin_template'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Author Management</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalID">
                    Add Author
                </button>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-12">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>AUTHOR ID</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>EMAIL</th>
                            <th>BIRTH DATE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="modal fade" id="modalID">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Author Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-primary">
                            <form class="needs-validation" novalidate>
                                <div class="card-body">
                                    <input type="hidden" id="id" name="id">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter a valid first name
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter a valid last name
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email Name</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter a valid email name
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="birthdate">Birth Date</label>
                                        <div class="input-group date" id="birthdatedatepicker" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#birthdatedatepicker" id="birthdate" name="birthdate" placeholder="Enter Birth Date" required>
                                            <div class="input-group-append" data-target="#birthdatedatepicker" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('pagescript'); ?>
<script>
    $(function() {
        $("#birthdatedatepicker").datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $('form').submit(function(e) {
            e.preventDefault();

            let formdata = $(this).serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});

            let jsondata = JSON.stringify(formdata);

            if (this.checkValidity()) {
                if (!formdata.id) {
                    //create
                    $.ajax({
                        url: "<?= base_url('authors') ?>",
                        type: "POST",
                        data: jsondata,
                        success: function(data) {
                            $(document).Toasts('create', {
                                class: 'bg-success',
                                title: 'Success',
                                body: data.messages,
                                autohide: true,
                                delay: 3000
                            });
                            $('#modalID').modal('hide');
                            clearform();
                            table.ajax.reload();
                        },
                        error: function(data) {
                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: 'Error',
                                body: "Record not added",
                                autohide: true,
                                delay: 3000
                            });
                        }
                    });
                } else {
                    //update
                    $.ajax({
                        url: "<?= base_url('authors') ?>/" + formdata.id,
                        type: "PUT",
                        data: jsondata,
                        success: function(data) {
                            $(document).Toasts('create', {
                                class: 'bg-success',
                                title: 'Success',
                                body: data.messages,
                                autohide: true,
                                delay: 3000
                            });
                            $('#modalID').modal('hide');
                            clearform();
                            table.ajax.reload();
                        },
                        error: function(data) {
                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: 'Error',
                                body: "Record not added",
                                autohide: true,
                                delay: 3000
                            });
                        }
                    });
                }

            }


        });
    });

    $(document).ready(function() {
        'use strict';

        let form = $(".needs-validation");

        form.each(function() {
            $(this).on('submit', function(e) {
                if (this.checkValidity() === false) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                $(this).addClass('was-validated');
            });
        });
    });

    let table = $("#dataTable").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "<?= base_url('authors/list') ?>",
            type: "POST"
        },
        columns: [{
                data: "id"
            },
            {
                data: "first_name"
            },
            {
                data: "last_name"
            },
            {
                data: "email"
            },
            {
                data: "birthdate"
            },
            {
                data: "",
                defaultContent: `<td>
                <button class="btn btn-sm btn-warning btn-edit" id="editRow">Edit</button>
                <button class="btn btn-sm btn-danger btn-delete" id="deleteRow">Delete</button>
                </td>`
            }
        ],
        paging: true,
        lengthChange: true,
        lengthMenu: [5, 10, 15, 20, 50],
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
    });

    $(document).on("click", "#editRow", function() {
        let row = $(this).parents("tr")[0];
        let id = table.row(row).data().id;

        $.ajax({
            url: "<?= base_url('authors') ?>/" + id,
            type: "GET",
            success: function(data) {
                $('#modalID').modal('show');
                $('#id').val(data.id);
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#email').val(data.email);
                $('#birthdate').val(data.birthdate);
            },
            error: function(data) {
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Error',
                    body: "Record not found",
                    autohide: true,
                    delay: 3000
                });
            }
        })
    });

    $(document).on("click", "#deleteRow", function() {
        let row = $(this).parents("tr")[0];
        let id = table.row(row).data().id;

        if(confirm("Are you sure you want to delete this record?")){
            $.ajax({
                url: "<?= base_url('authors') ?>/" + id,
                type: "DELETE",
                success: function(data) {
                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'Success',
                        body: data.messages,
                        autohide: true,
                        delay: 3000
                    });
                    table.ajax.reload();
                },
                error: function(data) {
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Error',
                        body: "Record not deleted",
                        autohide: true,
                        delay: 3000
                    });
                }
            })
        }

    });

    function clearform(){
        $('#id').val('');
        $('#first_name').val('');
        $('#last_name').val('');
        $('#email').val('');
        $('#birthdate').val('');
    }
</script>
<?= $this->endSection(); ?>