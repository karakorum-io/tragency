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
                                        <form id="edit" action="<?php echo $this->controllerUrl ?>edit/<?php echo $lead->id?>" method="POST"
                                            enctype='multipart/form-data'>
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="source_id">Source</label>
                                                    <select name="source_id" class="form-control" required>
                                                        <?php
                                                            foreach ($sources as $source) {
                                                        ?>
                                                        <option value="<?php echo $source->id;?>"><?php echo $source->name;?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="name">Name</label>
                                                    <input name="name" class="form-control" type="text"
                                                        value="<?php echo $lead->name?>" required />
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="email">Email</label>
                                                    <input name="email" class="form-control" type="text"
                                                        value="<?php echo $lead->email?>" required />
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="phone">Phone</label>
                                                    <input name="phone" class="form-control" type="text"
                                                        value="<?php echo $lead->phone?>" required />
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="city">City</label>
                                                    <input name="city" class="form-control" type="text"
                                                        value="<?php echo $lead->city?>" required />
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="state">State</label>
                                                    <select name="state" id="state" class="form-control" required>

                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="country">Country</label>
                                                    <select onchange="getStates(this.value)" name="country" id="country" class="form-control" required>
                                                        <?php
                                                            foreach ($countires as $c) {
                                                        ?>
                                                        <option value="<?php echo $c->id;?>"><?php echo $c->name;?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="conversation">Conversation</label>
                                                    <textarea name="conversation" class="form-control" required><?php echo $lead->conversation?></textarea>
                                                </div>
                                                <div class="form-group col-sm-12 text-right">
                                                    <a href="<?php echo $this->controllerUrl ?>" class="btn btn-default">
                                                        Cancel
                                                    </a>
                                                    <button type="submit" class="btn btn-primary">Save</button>
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
        CKEDITOR.replace('conversation');
    </script>
    <script>

        const getStates = (countryId) => {
            if (countryId) {
                $.ajax({
                    url: '<?= base_url() ?>utility/get_country_states/' + countryId,
                    method: 'get',
                    dataType: 'json',
                    success: function (response) {
                        if(response.success){
                            let html = `<option value="">Choose State</option>`;
                            response.payload.forEach(state => {
                                html += `
                                    <option value="${state.id}">${state.name}</option>
                                `;
                            });

                            $("#state").html("").html(html);
                        }
                    }
                });
            }
        }

        // form validation
        $(document).ready(function () {

            $("#edit").validate();
            $("#country").val('<?php echo $lead->country; ?>');

        });

        const setState = async (countryId) => {
            await getStates(countryId);
        }

        setState('<?php echo $lead->country; ?>').then(
            function () {
                setTimeout(() => {
                    $("#state").val('<?php echo $lead->state; ?>');
                }, 500);
            }
        );
    </script>
</body>

</html>