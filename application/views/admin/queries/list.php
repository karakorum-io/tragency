<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/head'); ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript">
        google.charts.load('current', { packages: ['corechart'] });     
    </script>
    <style>
        .critical {
            background-color: #ffeded !important;
        }

        .moderate {
            background-color: #ffffe0 !important;
        }

        .normal {
            background-color: #d9ffd9 !important;
        }
    </style>
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php $this->load->view('admin/include/header'); ?>
        <?php $this->load->view('admin/include/sidebar'); ?>
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="row mb-4">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mr-2">Queries</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php $this->load->view('admin/include/message-alert'); ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#ID</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Text</th>
                                                <th>Preferences</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($queries as $query) {
                                                ?>
                                                <tr>
                                                    <td class="text-right">
                                                        <?php echo $query->id; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo Query::TYPE[$query->type]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $query->name; ?>
                                                    </td>
                                                    <td>
                                                        <b>Contact</b><br>
                                                        <?php echo $query->phone; ?>
                                                        <br />
                                                        <?php echo $query->email; ?>
                                                        <br>
                                                        <b>Received</b><br>
                                                        <?php echo date('d-m-Y', strtotime($query->created_at)); ?>
                                                        <br>
                                                        <?php echo date('h:i A', strtotime($query->created_at)); ?>
                                                        <br>
                                                        <b>Status</b><br>
                                                        <?php echo Query::STATUS[$query->status]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $query->query; ?>
                                                    </td>
                                                    <td width="20%">
                                                        <?php
                                                            if($query->type == 3){
                                                        ?>
                                                        <b>Recent Plan: </b><br> <?php echo $query->is_planning == "yes" ? "Yes" : "No"; ?><br>
                                                        <b>Days: </b><br><?php echo $query->stays; ?><br>
                                                        <b>Arrival: </b><br><?php echo $query->arrival; ?><br>
                                                        <b>We book flights: </b><br><?php echo $query->book_flights == "yes" ? "Yes" : "No"; ?><br>
                                                        <b>We apply visa: </b><br><?php echo $query->apply_visa == "yes" ? "Yes" : "No"; ?><br>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        if ($query->status) {
                                                            ?>
                                                            <a href="<?php echo $this->controllerUrl ?>activate_deactivate/<?php echo $query->id ?>/<?php echo $query->status ?>"
                                                                class="text-primary mr-2">
                                                                <span class="btn btn-sm btn-warning">
                                                                    <i class="fa fa trash"></i>UnAnswered
                                                                </span>
                                                            </a>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a href="<?php echo $this->controllerUrl ?>activate_deactivate/<?php echo $query->id ?>/<?php echo $query->status ?>"
                                                                class="text-primary mr-2">
                                                                <span class="btn btn-sm btn-success">
                                                                    <i class="fa fa trash"></i>Answered
                                                                </span>
                                                            </a>
                                                            <?php
                                                        }
                                                        ?>
                                                        <a onclick="deleteRow(<?php echo $query->id ?>)"
                                                            class="text-primary mr-2">
                                                            <span class="btn btn-sm btn-danger">
                                                                <i class="fa fa trash"></i>Delete
                                                            </span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
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
                location.href = "<?php echo base_url() ?>admin/queries/delete/" + id;
            }
        }
    </script>
</body>

</html>