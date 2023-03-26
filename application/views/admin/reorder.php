<!DOCTYPE html>
<html lang="zxx">
<head>
     <?php $this->load->view('admin/include/head');?>
     <style>
.filters th:nth-child(2) input{
          display: none;
}
.ui-sortable-handle  {
    cursor: move;
    background: #f9f9f9;
    margin: 9px 0;
    border: 1px solid #ccc;
          }
    </style>
</head>
<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php $this->load->view('admin/include/header');?>
        <?php $this->load->view('admin/include/sidebar');?>
  
  <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
              
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                              <div class="white_box_tittle list_header">
                                    <h4>Services Reorder</h4>
                                 
                                </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                              
                              
                              	<div class="gallery">
		<ul class="reorder-gallery">
	 <?php
                                            if($data->num_rows() > 0){    
                                        foreach ($data->result() as $row ) {
                                         		
		?>
			<li id="<?=$row->id;?>" class="ui-sortable-handle"><img style="    height: 36px;width: 36px;margin-right: 10px;" class="user_thumb" src="<?=base_url()?><?=$row->image;?>"><?=$row->name;?></li>
		<?php } } ?>
		</ul>
	</div>
	</div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    
                </div>
            </div>
        </div>
    </div>
 </div>
   <!-- Footer section starts here -->
  <?php $this->load->view('admin/include/footerscript');?>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
 <script>
     $(document).ready(function(){	
	$("ul.reorder-gallery").sortable({		
		update: function( event, ui ) {
			updateOrder();
		}
	});  
});
function updateOrder() {	
	var item_order = new Array();
	$('ul.reorder-gallery li').each(function() {
		item_order.push($(this).attr("id"));
	});
	var order_string = 'order='+item_order;
	$.ajax({
		type: "GET",
		url: "<?=base_url()?>master/reorder_product_action",
		data: order_string,
		cache: false,
		success: function(data){			
		}
	});
}
 </script>
</body>
</html>