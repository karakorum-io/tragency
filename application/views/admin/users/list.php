<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/head'); ?>
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">

        <?php $this->load->view('admin/include/header'); ?>
        <?php $this->load->view('admin/include/sidebar'); ?>

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                <div class="row mb-4">
                    <div class="col-md-12 mb-3">
                        <div class="card text-left">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <h3 class="mr-2">Users</h3>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="float-right">
                                            <a href="<?php echo base_url() ?>admin/users/add"
                                                class="btn btn-primary btn-block btn-rounded ">Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php $this->load->view('admin/include/message-alert'); ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#ID</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Contact</th>
                                                <th class="text-center">Address</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (count($users) > 0) {
                                                foreach ($users as $key => $user) {
                                                    ?>
                                                    <tr>
                                                        <td class="text-right">#
                                                            <?php echo $user->id; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user->name; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user->email; ?><br />
                                                            <?php echo $user->phone; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $user->address; ?>,
                                                            <?php echo $user->city; ?>,
                                                            <?php echo getStateName($this->db, $user->state); ?>,
                                                            <?php echo getCountryName($this->db, $user->country); ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php echo User::STATUS[$user->status]; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="<?php echo base_url() ?>/admin/users/edit/<?php echo $user->id; ?>"
                                                                class="btn btn-success btn-rounded">Edit</a>
                                                            <button onclick="deleteRow(<?php echo $user->id; ?>)"
                                                                class="btn btn-danger btn-rounded">Delete</button>
                                                            <?php
                                                            if ($user->status == User::STATUS_ACTIVE) {
                                                                ?>
                                                                <a href="<?php echo base_url() ?>/admin/users/activate_deactivate/<?php echo $user->id; ?>/<?php echo $user->status; ?>"
                                                                    class="btn btn-warning btn-rounded">De-Activate</a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a href="<?php echo base_url() ?>/admin/users/activate_deactivate/<?php echo $user->id; ?>/<?php echo $user->status; ?>"
                                                                    class="btn btn-success btn-rounded">Activate</a>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="pagination">
                                    <?php echo $this->pagination->create_links(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-grow-1"></div>
        </div>
    </div>

    <?php $this->load->view('admin/include/footerscript'); ?>
    <script>
        function deleteRow(id) {
            if (confirm("Are you sure?")) {
                location.href = "<?php echo base_url() ?>/admin/users/delete/" + id;
            }
        }
    </script>
</body>

</html>