<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/head'); ?>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo $this->config->item('map-key'); ?>&libraries=places"></script>
    <style>
        .book_fixed {
            display: none;
        }

        #pac-input {
            display: none;
            background: none padding-box rgb(255, 255, 255);
            width: 476px;
            max-width: 100%;
            padding: 0px 17px;
            text-transform: none;
            overflow: hidden;
            height: 40px;
            color: rgb(0, 0, 0);
            font-family: Roboto, Arial, sans-serif;
            font-size: 18px;
            border-bottom-left-radius: 2px;
            border-top-left-radius: 2px;
            box-shadow: rgb(0 0 0 / 30%) 0px 1px 4px -1px;
            min-width: 35px;
            font-weight: 500;
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
                                        <h3 class="mr-2">Add Lead</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php $this->load->view('admin/include/message-alert'); ?>
                                        <form id="add" action="<?php echo $this->controllerUrl ?>add" method="POST"
                                            enctype='multipart/form-data'>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="name">Name</label>
                                                    <input name="name" class="form-control" type="text"
                                                        required />
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="subject">Subject</label>
                                                    <input name="subject" class="form-control" type="text"
                                                        required />
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="body">Body</label>
                                                    <textarea name="body" class="form-control" required></textarea>
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
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
    <script>
        // form validation
        $(document).ready(function () {
            $("#add").validate();
        });
    </script>
</body>

</html>