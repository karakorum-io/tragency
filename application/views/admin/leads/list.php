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
                                        <h3 class="mr-2">Leads <small>(<?php echo $all_leads;?>)</small></h3>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="float-right">
                                            <a href="<?php echo base_url() ?>admin/leads/add"
                                                class="btn btn-primary btn-block btn-rounded ">Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo $this->controllerUrl ?>" method="GET">
                                <div class="row  mb-4">
                                    <div class="form-group col-sm-3">
                                        <label for="search_by">Search By</label>
                                        <select name="search_by" id="search_by" class="form-control">
                                            <option value="">--select search by --</option>
                                            <option value="name">Name</option>
                                            <option value="email">Email</option>
                                            <option value="phone">Phone</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="search">Search</label>
                                        <input name="search" id="search" class="form-control" type="text" placeholder="Email, Phone, Name ..."/>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="filter">Filter Status</label>
                                        <select name="filter" id="filter" class="form-control">
                                            <option value="">--select filter by --</option>
                                            <?php
                                                foreach (Lead::STATUS as $key => $status) {
                                            ?>
                                            <option value="<?php echo $key?>"><?php echo $status?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-3 text-right">
                                        <br/>
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                    </form>
                                </div>
                                <?php $this->load->view('admin/include/message-alert'); ?>
                                <div class="table-responsive table table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#ID</th>
                                                <th>Source</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Location</th>
                                                <th class="text-center">Status</th>
                                                <th width="20%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (count($leads) > 0) {
                                                foreach ($leads as $lead) {
                                                    ?>
                                                    <tr>
                                                        <td class="text-right">#<?php echo $lead->id; ?></td>
                                                        <td class="text-center"><?php echo getSourceName($this->db, $lead->source_id); ?></td>
                                                        <td>
                                                            <?php echo $lead->name ? "Name: <br/><b>".$lead->name."</b><br/>" : ""; ?>
                                                            <?php echo $lead->corporate ? "Corporate: <br/><b>".$lead->corporate."</b>" : ""; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $lead->email ? "Email: <br/><b>".$lead->email."</b><br/>" : ""; ?>
                                                            <?php echo $lead->phone ? "Phone: <br/><b>".$lead->phone."</b>" : ""; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $lead->city ? $lead->city."," : ""; ?>
                                                            <?php echo $lead->state ? getStateName($this->db, $lead->state)."," : ""; ?>
                                                            <?php echo $lead->country ? getCountryName($this->db, $lead->country) : ""; ?>
                                                        </td>
                                                        <td class="text-center"><?php echo Lead::STATUS[$lead->status]; ?></td>
                                                        <td class="text-center">
                                                            <a class="text-primary mr-2"
                                                                href="<?php echo $this->controllerUrl . 'edit/' . $lead->id; ?>">
                                                                <span class="btn btn-sm btn-primary">
                                                                    <i class="nav-icon i-Pen-3"></i> Edit
                                                                </span>
                                                            </a>
                                                            <?php
                                                            if ($lead->status) {
                                                                ?>
                                                                <a href="<?php echo $this->controllerUrl ?>activate_deactivate/<?php echo $lead->id ?>/<?php echo $lead->status ?>"
                                                                    class="text-primary mr-2">
                                                                    <span class="btn btn-sm btn-warning">
                                                                        <i class="fa fa trash"></i>Dead
                                                                    </span>
                                                                </a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a href="<?php echo $this->controllerUrl ?>activate_deactivate/<?php echo $lead->id ?>/<?php echo $lead->status ?>"
                                                                    class="text-primary mr-2">
                                                                    <span class="btn btn-sm btn-success">
                                                                        <i class="fa fa trash"></i>Alive
                                                                    </span>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                            <a onclick="deleteRow(<?php echo $lead->id ?>)"
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
                                                <tr class="text-center">
                                                    <td colspan="8">No Record Found</td>
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
                location.href = "<?php echo base_url() ?>admin/leads/delete/" + id;
            }
        }

        $(document).ready(()=>{
            // set sserach filters
            let search_by = '<?php echo $this->input->get('search_by')?>';
            let search = '<?php echo $this->input->get('search')?>';
            let filter = '<?php echo $this->input->get('filter')?>';

            $("#search_by").val(search_by);
            $("#search").val(search);
            $("#filter").val(filter);
        });
    </script>
</body>

</html>