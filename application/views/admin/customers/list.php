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
                                <h3>Customers</h3>
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
                                                            <?php echo $user->address ? $user->address."," : ""; ?>
                                                            <?php echo $user->city ? $user->city."," : "" ?>
                                                            <?php echo $user->state ? getStateName($this->db, $user->state)."," : "" ; ?>
                                                            <?php echo $user->country ? getCountryName($this->db, $user->country)."," : "" ; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php echo Customer::STATUS[$user->status]; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php
                                                            if ($user->status == Customer::STATUS_ACTIVE) {
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