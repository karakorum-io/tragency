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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h1 class=" h5 mr-2"><b>Update User</b></h1>
                                    </div>
                                    <div class="card-body">
                                        <?php $this->load->view('admin/include/message-alert'); ?>
                                        <form id="addUser" action="<?= base_url('admin/users/edit/'.$user->id) ?>" method="post"
                                            enctype='multipart/form-data'>
                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="<?php echo $user->name; ?>" required />
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="email">Email</label>
                                                    <input type="text" name="email" class="form-control"
                                                        value="<?php echo $user->email; ?>" required />
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" name="phone" class="form-control"
                                                        value="<?php echo $user->phone; ?>" maxlength="15" required />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <label for="address">Address</label>
                                                    <input type="text" name="address"
                                                        value="<?php echo $user->address; ?>" class="form-control" />
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="city">City</label>
                                                    <input type="text" name="city" value="<?php echo $user->city; ?>"
                                                        class="form-control" />
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="country">Country</label>
                                                    <select onchange="getStates(this.value)" class="form-control"
                                                        id="country" name="country">
                                                        <option value="">Choose Country</option>
                                                        <?php
                                                        foreach ($countries as $country) {
                                                            ?>
                                                            <option value="<?php echo $country->id ?>"><?php echo $country->name ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label for="state">State</label>
                                                    <select class="form-control" name="state" id="state">
                                                        <option value="">Choose State</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12 text-right">
                                                    <br />
                                                    <a href="<?php echo $this->controllerUrl ?>"
                                                        class="btn btn-secondary">Back</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        const getStates = (countryId) => {
            if (countryId) {
                $.ajax({
                    url: '<?= base_url() ?>utility/get_country_states/' + countryId,
                    method: 'get',
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
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
            $("#addUser").validate({
                rules: {
                    password: {
                        minlength: 5,
                    },
                    password_confirm: {
                        minlength: 5,
                        equalTo: "#password"
                    }
                }
            });

            $("#country").val('<?php echo $user->country; ?>');
        });

        const setState = async (countryId) => {
            await getStates(countryId);
        }

        setState('<?php echo $user->country; ?>').then(
            function () {
                setTimeout(() => {
                    $("#state").val('<?php echo $user->state; ?>');
                }, 500);
            }
        );
    </script>
</body>

</html>