<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/head'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .btn_remove_area {
            position: absolute;
            top: 16px;
            right: 10px;
            padding: 0 3px;
            font-size: 9px;
        }
    </style>
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php $this->load->view('admin/include/header'); ?>
        <?php $this->load->view('admin/include/sidebar'); ?>
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3 class="mr-2">Add Content</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php $this->load->view('admin/include/message-alert'); ?>
                                        <form id="addContent" action="<?php echo $this->controllerUrl ?>add"
                                            method="POST" enctype='multipart/form-data'>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="needle">Needle</label>
                                                    <input name="needle" class="form-control " id="needle" type="text"
                                                        required>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="title">Title</label>
                                                    <input name="title" class="form-control " id="title" type="text">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="sub_title">Sub Title</label>
                                                    <input name="sub_title" class="form-control " id="sub_title" type="text">
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="media">Media</label>
                                                    <input name="media[]" class="form-control " id="media" type="file"
                                                        multiple="multiple">
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="short_desc">Short Description</label>
                                                    <textarea name="short_desc" class="form-control " 
                                                        rows="4"></textarea>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" class="form-control"
                                                    rows="10" ></textarea>
                                                </div>
                                                <div class="form-group col-sm-12 text-right">
                                                    <a href="<?php echo $this->controllerUrl ?>" class="btn btn-default">
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
        <div class="flex-grow-1"></div>
    </div>
    <?php $this->load->view('admin/include/footerscript'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        $("#addContent").validate();
    </script>
</body>

</html>