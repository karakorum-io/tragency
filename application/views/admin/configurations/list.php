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
                                        <h3 class="mr-2">Configurations</h3>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="float-right">
                                            <a href="#" data-toggle="modal" data-backdrop="static" data-target="#myModal"
                                                class="btn btn-primary btn-block btn-rounded ">Add New
                                            </a>
                                            <div id="myModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <form id="add" action="<?php echo $this->controllerUrl ?>add" method="POST">
                                                                    <div class="row">
                                                                        <div class="form-group col-sm-12">
                                                                            <label for="key">Key</label>
                                                                            <input name="key" class="form-control" type="text" required/>
                                                                        </div>
                                                                        <div class="form-group col-sm-12">
                                                                            <label for="value">Value</label>
                                                                            <input name="value" class="form-control" type="text" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-sm-12 text-right">
                                                                            <br/>
                                                                            <a data-dismiss="modal" class="btn btn-default">
                                                                                Cancel
                                                                            </a>
                                                                            <button type="submit" class="btn btn-primary">Add</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                                <th>Key</th>
                                                <th>Value</th>
                                                <th class="text-center">Status</th>
                                                <th width="20%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($configurations as $config) {
                                            ?>
                                            <tr>
                                                <form action="<?php echo $this->controllerUrl ?>edit/<?php echo $config->id?>" method="POST">
                                                    <td class="text-right"><?php echo $config->id?></td>
                                                    <td><input class="form-control" type="text" name="key" value="<?php echo $config->key?>"></td>
                                                    <td><input class="form-control" type="text" name="value" value="<?php echo $config->value?>"></td>
                                                    <td class="text-center"><?php echo Configuration::STATUS[$config->status]?></td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-primary mr-2">Update</button>
                                                        <?php
                                                        if ($config->status) {
                                                            ?>
                                                            <a href="<?php echo $this->controllerUrl ?>activate_deactivate/<?php echo $config->id ?>/<?php echo $config->status ?>"
                                                                class="text-primary mr-2">
                                                                <span class="btn btn-sm btn-warning">
                                                                    <i class="fa fa trash"></i>UnPublish
                                                                </span>
                                                            </a>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a href="<?php echo $this->controllerUrl ?>activate_deactivate/<?php echo $config->id ?>/<?php echo $config->status ?>"
                                                                class="text-primary mr-2">
                                                                <span class="btn btn-sm btn-success">
                                                                    <i class="fa fa trash"></i>Publish
                                                                </span>
                                                            </a>
                                                            <?php
                                                        }
                                                        ?>
                                                        <a onclick="deleteRow(<?php echo $config->id ?>)"
                                                            class="text-primary mr-2">
                                                            <span class="btn btn-sm btn-danger">
                                                                <i class="fa fa trash"></i>Delete
                                                            </span>
                                                        </a>
                                                    </td>
                                                </form>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>Add a new configuration and update the exiting configuration value.</p>
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
                location.href = "<?php echo base_url() ?>admin/configurations/delete/" + id;
            }
        }
    </script>
</body>

</html>