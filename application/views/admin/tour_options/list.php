<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/head'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
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
                                        <h3 class="mr-2">Tour Options</h3>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="float-right">
                                            <a href="<?php echo base_url() ?>admin/tour_options/add/<?=$package->id?>"
                                                class="btn btn-primary btn-block btn-rounded ">Add New</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php $this->load->view('admin/include/message-alert'); ?>
                                <div class="table-responsive table table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#ID</th>
                                                <th>Name</th>
                                               
                                                <th width="20%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (count($tour_options) > 0) {
                                                foreach ($tour_options as $tour_option) {
                                                    ?>
                                                    <tr>
                                                        <td class="text-right">#
                                                            <?php echo $tour_option->id; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $tour_option->title; ?>
                                                        </td>
                                                      
                                                        <td class="text-center">
                                                            <a class="text-primary mr-2"
                                                                href="<?php echo $this->controllerUrl . 'edit/' . $tour_option->id; ?>">
                                                                <span class="btn btn-sm btn-primary">
                                                                    <i class="nav-icon i-Pen-3"></i> Edit
                                                                </span>
                                                            </a>
                                                            <?php
                                                            if ($tour_option->status) {
                                                                ?>
                                                                <a href="<?php echo $this->controllerUrl ?>activate_deactivate/<?php echo $tour_option->id ?>/<?php echo $tour_option->status ?>"
                                                                    class="text-primary mr-2">
                                                                    <span class="btn btn-sm btn-warning">
                                                                        <i class="fa fa trash"></i>Deactivate
                                                                    </span>
                                                                </a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a href="<?php echo $this->controllerUrl ?>activate_deactivate/<?php echo $tour_option->id ?>/<?php echo $tour_option->status ?>"
                                                                    class="text-primary mr-2">
                                                                    <span class="btn btn-sm btn-success">
                                                                        <i class="fa fa trash"></i>Activate
                                                                    </span>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                            <a onclick="deleteRow(<?php echo $tour_option->id ?>)"
                                                                class="text-primary mr-2">
                                                                <span class="btn btn-sm btn-danger">
                                                                    <i class="fa fa trash"></i>Delete
                                                                </span>
                                                            </a>
                                                           
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="5">No Record Found</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
                location.href = "<?php echo base_url() ?>admin/tour_options/delete/" + id;
            }
        }
    </script>
</body>

</html>