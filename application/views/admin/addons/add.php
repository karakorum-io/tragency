<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/head'); ?>
    
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<!-- Script -->
 
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
                                        <h3 class="mr-2">Add Addon</h3>
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
                                                    <label for="price">Price</label>
                                                    <input name="price" class="form-control" type="number" required />
                                                </div>                                                
                                                <div class="form-group col-sm-12">
                                                    <label for="description">Description</label>
                                                    <textarea rows="5" name="description" class="form-control" required></textarea>
                                                </div>
                                                
                                                  <div class="form-group col-sm-12">
                                                    <label for="description">Tours <small>Left blank for all</small></label>
                                                    <select name="tour[]" class="form-control js-example-basic-single" multiple>
                                                        <?php
                                                        if(!empty($tour)){
                                                        foreach($tour as $t){
                                         echo'<option value="'.$t->id.'">'.$t->name.'</option>';     
                                                            }
                                                        }
                                                        ?>
                                                    </select>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    
    <script>
        $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
        // form validation
        $(document).ready(function () {
            $("#add").validate();
        });
    </script>
</body>

</html>