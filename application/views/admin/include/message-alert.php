<?php
if ($this->session->flashdata('success')) {
    ?>
    <div class="alert alert-success">
        <strong>Success!</strong>
        <?php echo $this->session->flashdata('success') ?>
    </div>
    <?php
}
?>
<?php
if ($this->session->flashdata('error')) {
    ?>
    <div class="alert alert-danger">
        <strong>Error!</strong>
        <?php echo $this->session->flashdata('error') ?>
    </div>
    <?php
}
?>