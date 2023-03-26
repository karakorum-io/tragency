<div class="body-overlay" id="body-overlay"></div>

<!-- navbar area start -->
<nav class="navbar navbar-area navbar-expand-lg nav-style-01">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="mobile-logo">
                <a href="<?=base_url()?>">
                    <img src="<?=base_url()?>assets/img/remotel-removebg-preview.png" alt="logo">
                </a>
            </div>
            <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#tp_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggle-icon">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </span>
            </button>
            <div class="nav-right-content">
                <ul class="pl-0">
                   
                       
                   
                        <?php if($this->session->userdata('user_data')){
                    ?>
                    <li class="notification">
                    <a class="" href="<?=base_url()?>welcome/bookings" style="font-size: 13px;">
                     <i class="fa fa-book" aria-hidden="true"></i>Bookings
                    </a>
                    </li>
                       
                    <li class="">
                            <a class="" title="Logout" href="<?=base_url()?>welcome/user_logout" style="font-size: 15px;color: #fff;">
                           <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </a>
                        </li>
                    <?php
                    }else{?>
                    <li class="notification">
                    <a class="" href="<?=base_url()?>welcome/user_login">
                            <i class="ti-user"></i>
                        </a>
                         </li>
                    <?php }?>
                    
                       
                
                
                </ul>
            </div>
        </div>
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="tp_main_menu">
            <div class="logo-wrapper desktop-logo">
                <a href="<?=base_url()?>" class="main-logo">
                    <img src="<?=base_url()?>assets/img/remotel-removebg-preview.png" alt="logo">
                </a>
                <a href="<?=base_url()?>" class="sticky-logo">
                    <img src="<?=base_url()?>assets/img/remotel-removebg-preview.png" alt="logo">
                </a>
            </div>
            <ul class="navbar-nav ml-auto flex-nowrap">
                <li class="menu-item-has-children">
                        <a href="#">About</a>
                        <ul class="sub-menu">
                            <li><a href="#0">ABOUT REMOTE LANDS</a></li>
                            <li><a href="<?=base_url()?>client-testimonials">CLIENT TESTIMONIALS</a></li>
                          
                        </ul>
                    </li>
                  <li class="menu-item-has-children">
                        <a href="#">By Destination</a>
                        <ul class="sub-menu">
                             <?php
                               $destination= $this->crud->get_data("category", "", "*", "full","", "", "order by id desc");
                                if($destination->num_rows()>=1){
                                    foreach($destination->result() as $rowl){
                                        echo'<li><a href="'.base_url().'destination/'.$rowl->slug.'">'.$rowl->name.'</a></li>';
                                    }
                                }?>
                        </ul>
                    </li>
                     <li class="menu-item-has-children">
                        <a href="#">Advisors</a>
                        <ul class="sub-menu">
                            <li><a href="#0">WHY REMOTE LANDS</a></li>
                            
                          
                        </ul>
                    </li>
                <li>
                    <a href="<?=base_url()?>blogs">Blog</a>
                </li>
                 
                <li>
                    <a href="<?=base_url()?>contact">Contact</a>
                </li>
            </ul>
        </div>
        <div class="nav-right-content">
            <ul>
             <!--<li class="">-->
             <!--               <a class=""  data-toggle="modal" data-target="#myModal" title="Logout" href="#myModal" style="font-size: 17px;color: #fff;">-->
             <!--              <i class="fa fa-search" aria-hidden="true"></i>-->
             <!--           </a>-->
             <!--           </li>-->
               
                    <?php if($this->session->userdata('user_data')){
                    ?>
                     <li class="notification">
                    <a href="<?=base_url()?>welcome/bookings">
                    <i class="fa fa-book" aria-hidden="true"></i>My Bookings
                    </a>
                     </li>
                  <li class="">
                            <a class="" title="Logout" href="<?=base_url()?>welcome/user_logout" style="font-size: 15px;color: #fff;">
                           <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </a>
                        </li>
                    <?php
                    }else{?>
                     <li class="notification">
                    <a href="<?=base_url()?>welcome/user_login">
                        <i class="ti-user"></i><span> Login / Register</span>
                    </a>
                     </li>
                    <?php }?>
               
            </ul>
        </div>
    </div>
</nav>
 

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?=base_url()?>welcome/tour" method="post">
                <div class="row">
                    <div class="col-lg-12">
               <h6 class="bt_bb_headline_tag text-center mb-4">Find Your Tour</h6>
               </div>
                    <div class="col-lg-12">
                        <div class="tp-search-single-wrap float-left w-100">
                            <select class="select w-100" required="" name="destination">
                                <option value="">Destination..</option>
                                <?php
                                if($destination->num_rows()>=1){
                                    foreach($destination->result() as $rw){
                                        echo'<option value="'.$rw->id.'">'.$rw->name.'</option>';
                                    }
                                }?>
                               
                            </select>
                            <i class="fa fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="tp-search-single-wrap float-left">
                            <div class="tp-search-date tp-departing-date-wrap">
                                <input type="text" class="departing-date" placeholder="Travel Date" required="">
                                <i class="fa fa-calendar-minus-o"></i>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-yellow find_tour" style="    border-radius: 8px;"><i class="ti-search"></i> Search</button>
                    </div>
                </div>
                 </form>
      </div>
 

    </div>
  </div>
</div>