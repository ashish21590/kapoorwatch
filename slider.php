<?php
include('admin/include/config.php');
$query = mysql_query('SELECT * FROM `slider` WHERE `is_active` = 1 order by `id` ASC ');
 while($rs= mysql_fetch_array($query)){
	 $ar[] = $rs['h1Tag'];
 }
 

?>


<header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
           <li data-target="#myCarousel" data-slide-to="3"></li>
           <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
        <?php
        $query = mysql_query('SELECT * FROM `slider` WHERE `is_active` = 1 order by `id` ASC');
 while($rs= mysql_fetch_array($query)){
	 //print_r($rs);
 

		?>
            <div class="<?php echo $rs['class'];?>">
                <div class="fill" style="background-image: url(admin/<?php echo $rs['sliderImage'];?>);"></div>
                <div class="carousel-caption">
                	<div class="carousel-caption-inner">
                      <!--<img src="admin/<?php //echo $rs['caption'];?>" />-->
                      <h2><?php echo $rs['h1Tag'];?></h2>
                      <!--<a target="_blank" class="slider-cta slider_btn" href="<?php echo $rs['getTouch'];?>"> Get in touch</a>-->
                    </div>
                </div>
            </div>
            <?php }?>
          
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>