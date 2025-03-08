<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/head'); ?>
    <style>
        .auth-logo img {
            width: auto;
        }
    </style>

<body>
    <div class="auth-layout-wrap" style="background: url(<?= base_url() ?>assets/premium/images/jaipur07.jpg) repeat fixed;
        background-size: cover;
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;">
        <div class="auth-content">
            <div class="card o-hidden" style="background-color: #fff;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-4">
                            <center>
                                <img src="<?= base_url() ?>assets/images/saGA1.png" style="height: 91px;" alt="">
                                <h1 class="mb-3 text-18">The Underworld</h1>
                            </center>
                            <?php $this->load->view('admin/include/message-alert'); ?>
                            <form action="<?= base_url('admin/users/login') ?>" id="login" method="post"
                                enctype='multipart/form-data' class="authentication-form">
                                <div class="form-group">
                                    <label for="username">Email / Phone</label>
                                    <input name="username" class="form-control " id="username" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" class="form-control " id="password" type="password" required>
                                </div>
                                <button type="submit" class="btn btn-rounded btn-primary btn-block mt-2">Log In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('admin/include/footerscript'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#login").validate();
        });
    </script>
</body>

</html>