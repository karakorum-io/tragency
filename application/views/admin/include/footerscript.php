
    <script src="<?= base_url('assets/admin/js/plugins/jquery-3.3.1.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/plugins/bootstrap.bundle.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/plugins/perfect-scrollbar.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/scripts/script.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/scripts/sidebar.large.script.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/plugins/echarts.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/scripts/echart.options.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/scripts/dashboard.v2.script.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/plugins/datatables.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/plugins/sweetalert2.min.js')?>"></script>
    
    <script src="<?= base_url('assets/admin/js/scripts/customizer.script.min.js')?>"></script>
  
  
  <?php if($this->session->flashdata('error_message')!=''){ ?>
            <script>
$( document ).ready(function() {
    swal('Error', '<?=$this->session->flashdata('error_message');?>', 'warning', 3000, false);
 
}); 
</script>
                                     
                        <?php }?>
                        
                         <?php if($this->session->flashdata('success_message')!=''){ ?>
            <script>
$( document ).ready(function() {
    swal('Success', '<?=$this->session->flashdata('success_message');?>', 'success', 3000, false);
 
}); 
</script>
                                     
                        <?php }?>
 