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

    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('pagescript'); ?>
<script>
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
                <button class="btn btn-sm btn-warning btn-edit">Edit</button>
                <button class="btn btn-sm btn-danger btn-delete">Delete</button>
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
</script>
<?= $this->endSection(); ?>