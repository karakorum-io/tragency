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
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3 class=" h5 mr-2">Update Setings</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php $this->load->view('admin/include/message-alert'); ?>
                                        <form action="<?php echo base_url('admin/settings/edit/'.$settings->id) ?>"
                                            method="post" enctype='multipart/form-data'>
                                              <div class="row">
            
                             <div class="form-group col-sm-12">
                                <label for="email">INR to USD Conversion Rate </label>
                                <input name="conversion_rate" class="form-control " id="email" type="number" value="<?=$settings->conversion_rate?>" min="0" step="any" required>
                             </div>
                              <div class="form-group col-sm-12">
                                <label for="email">Conversion Alpha</label>
                                <input name="currency_alpha" class="form-control " id="email" type="text" value="<?=$settings->currency_alpha?>" required>
                             </div>
                              <div class="form-group col-sm-12">
                                <label for="email">Conversion Symbol</label>
                                <input name="currency_symbol" class="form-control " id="email" type="text" value="<?=$settings->currency_symbol?>" required>
                             </div>
                               
                           
                             
                                  
                            <div class="form-group col-sm-12">
                                 
                                 <button type="submit" class="btn btn-primary btn-lg">Update</button> 
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
    </div>
    <?php $this->load->view('admin/include/footerscript'); ?>
   
</body>

</html>