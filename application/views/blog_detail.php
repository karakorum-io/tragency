<!DOCTYPE html>
<html lang="en">
<head><?php include 'includes/head.php' ?>
     <title><?=$data->title?></title>
    <meta name="description" content="<?=$data->short_description?>">
    <meta property="og:title" content="<?=$data->title?>" />
    <meta property="og:description" content="<?=$data->short_description?>" />
    <meta property="og:image" content="<?=base_url().'uploads/blogs/'.$data->media?>" />
    <meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@travel" />
<meta name="twitter:creator" content="@travel" />
<meta property="og:url" content="<?=base_url($_SERVER['REQUEST_URI'])?>" />
<meta property="og:title" content="<?= $data->title;?>" />
<meta property="og:description" content="<?= $data->short_description;?>" />
<meta property="og:image" content="<?=base_url().'uploads/blogs/'.$data->media;?>" />
<style>
    .single-blog .thumb img {
    border-radius: 10px;
    height: auto;}
     .single-blog {
    height: auto;}
    .title:after {
    display: none;}
</style>
</head>
<body>
    <?php include 'includes/header.php' ?>
    
 
     
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area jarallax" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="page-title"><?=$data->title?></h1>
                        <ul class="page-list">
                            <li><a href="<?=base_url()?>">Home</a></li>
                            <li>Blogs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area End -->

 
    <!-- blog area start -->
    <div class="blog-details-area pd-top-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-blog mb-0">
                        <div class="thumb">
                            <img src="<?=base_url().'uploads/blogs/'.$data->media?>" alt="blog">
                        </div>
                        <div class="my-4">
                            <p class="date mb-0"><?=date('M d, y',strtotime($data->created_at))?></p>
                            <h3 class="title"><?=$data->title?></h3>
                            
                        </div>
                    </div>
                   <div><?=$data->description?></div>
 
                    <div class="row tag-share-area">
                        <div class="col-lg-6">
                            <span class="mr-2">Share:</span>
                            <ul class="social-icon style-two">
                                
											  <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>     
 
										 
                                <li>
                                    <a class="facebook" target="_blank" href="https://www.facebook.com/sharer.php?u=<?=$actual_link?>&display=popup"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="twitter" target="_blank" href="https://twitter.com/intent/tweet?url=<?=$actual_link?>&via=travel"><i class="fa fa-twitter"></i></a>
                                </li>
                               <li>
                                    <a class="pinterest" target="_blank" href="https://web.whatsapp.com/send?text=<?=$actual_link?>"><i class="fa fa-whatsapp"></i></a>
                                </li>
                                <li>
                                    <a class="linkedin" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?=$actual_link?>&title=<?=$data->title?>&summary=<?=$data->short_description;?>"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                         
                    </div>
                     
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area sidebar-area-4">
                        
                      
                        <div class="widget widget-recent-post">
                            <h2 class="widget-title">Recent Post</h2>
                            <ul>
                                 <?php
            if(count($blogs)>0){
                $i = 1;
                foreach($blogs as $row){
                 ?>
                 
                <li>
                                    <div class="media pt-3">
                                        <img src="<?=base_url().'uploads/blogs/'.$row->media;?>" alt="widget" style="height: 117px;width: 95px;object-fit: cover;">
                                        <div class="media-body">
                                            <span class="post-date"><?=date('M d, y',strtotime($row->created_at))?></span>
                                            <h6 class="title"><a href="<?=base_url()?>blog/<?=$row->slug?>"><?=$row->title?></a></h6>
                                        </div>
                                    </div>
                                </li>
                
                <?php 
                } }?>
                                
                                
                            </ul>
                        </div>
                       
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area End -->
    
     
    <?php include 'includes/footer.php' ?>
</body>
</html>