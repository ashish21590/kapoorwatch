<?php
include('admin/include/config.php');
include("admin/include/function.php");
$query_men=mysql_query("Select * from product_cat where is_active='1' ORDER BY  `category`  ");
$query_women=mysql_query("Select * from product_cat where  is_active='1' ORDER BY  `category` ");
$metaRs = mysql_fetch_array(mysql_query("SELECT `keyword`,`metatags`,`metadescription`,`title` FROM `product` WHERE `id` = '".$_GET['product_category']."'"));
$catTitle = mysql_fetch_array(mysql_query("SELECT `category` FROM `product_cat` WHERE `id` = '".$_GET['product_category']."'"));
$textData = mysql_fetch_array(mysql_query("Select * from product_cat where category like '%".$catTitle['category']."%'"));
$Accessories_rs = mysql_fetch_array(mysql_query("SELECT * FROM `product_acc` WHERE `id` = '".$_GET['id']."'"));
if($_GET['brand']){
	$Brands = mysql_fetch_array(mysql_query("SELECT * FROM `accessories_subcat` WHERE `sub_cat` = '".$_GET['brand']."'"));
}
if($_GET['id']){
	$searchPage = mysql_fetch_array(mysql_query("select * from seo_data where page_name = '".$tab."' and page_id = '".$_GET['id']."'"));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="<?php echo $base_url;?>/images/favicon.png" type="image/ico" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="">
<meta name="format-detection" content="telephone=no">
<?php
if($tab=='Index' || $tab=='Stores'  || $tab=='Contact' || $tab=='Pricesearch'  || $tab=='Brands' || $tab=='Accessoriesbrand'){
	//echo "select * from seo_data where page_name='".$title."'";
	$query= mysql_query("select * from seo_data where page_name = '".$tab."'");
	while($seo_result= mysql_fetch_array($query))
	{
	?>
<meta name="Keywords" content="<?php echo $seo_result['keyword']; ?>"/>
<meta name="description" content="<?php echo $seo_result['description']; ?>">
<title><?php echo $seo_result['title'];?></title>
<meta property="og:title" content="<?php echo $seo_result['title'];?>" />
<meta property="og:description" content="<?php echo $textData['description']; ?>" />
<?php }} elseif($_GET['page']=='Brands'){?>
<meta name="Keywords" content="<?php echo $textData['keyword']; ?>"/>
<meta property="og:title" content="<?php echo $seo_result['title'];?>" />
<meta name="description" content="<?php echo $textData['description']; ?>">
<meta property="og:description" content="<?php echo $textData['description']; ?>" />
<title><?php echo $textData['title'];?></title>
<?php }elseif($tab=='Search'){ ?>
<meta name="Keywords" content="<?php echo $textData['keyword']; ?>"/>
<meta property="og:title" content="<?php if($_GET['gender']==0){echo "Men's ";} else if($_GET['gender']==1) { echo "Women's ";} else if($myvalgg) {  echo ""; }echo $textData['title'];?>" />
<meta property="og:description" content="<?php echo $textData['description']; ?>" />
<meta name="description" content="<?php echo $textData['description']; ?>">
<title>
<?php if($_GET['gender']=='') { echo "";}elseif($_GET['gender']==0){echo "Men's ";} elseif ($_GET['gender']==1) { echo "Women's ";}  echo $textData['title'];?>
</title>
<?php }elseif($tab=='Accessoriesbrand'){?>

<meta name="Keywords" content="<?php echo $seo_result['keyword']; ?>"/>
<meta property="og:title" content="<?php echo $seo_result['title'];?>" />
<meta property="og:description" content="<?php echo $textData['description']; ?>" />
<meta name="description" content="<?php echo $seo_result['description']; ?>">
<title><?php echo $seo_result['title'];?>Hi</title>
<?php }elseif($_GET['brand']){?>
<meta property="og:title" content="<?php echo $seo_result['title'];?>" />
<meta property="og:description" content="<?php echo $textData['description']; ?>" />
<meta name="Keywords" content="<?php echo $Brands['keyword']; ?>"/>
<meta name="description" content="<?php echo $Brands['description']; ?>">
<title><?php echo $Brands['title'];?></title>
<?php }elseif($tab=='Search1'){?>
<meta property="og:title" content="<?php echo $seo_result['title'];?>" />
<meta property="og:description" content="<?php echo $textData['description']; ?>" />
<meta name="Keywords" content="<?php echo $searchPage['keyword']; ?>"/>
<meta name="description" content="<?php echo $searchPage['description']; ?>">
<title><?php echo $searchPage['title'];?></title>
<?php }elseif($tab=='Accessoriessearch'){?>
<meta property="og:title" content="<?php echo $seo_result['title'];?>" />
<meta property="og:description" content="<?php echo $textData['description']; ?>" />
<meta name="Keywords" content="<?php echo $Accessories_rs['keyword']; ?>"/>
<meta name="description" content="<?php echo $Accessories_rs['metadescription']; ?>">
<title><?php echo $Accessories_rs['title'];?></title>
<?php }else{?>
<meta name="keywords" content="<?php echo $metaRs['keyword'];?>">
<meta property="og:title" content="<?php echo $seo_result['title'];?>" />
<meta property="og:description" content="<?php echo $textData['description']; ?>" />
<meta name="description" content="<?php echo $metaRs['metadescription'];?>">
<title><?php echo $metaRs['title'];?></title>
<?php }?>
<meta property="og:url" content=" <?php echo $tab;?>" />
<meta name="msvalidate.01" content="025467F4D742EB07A3C7F29855C8576E"/>
<meta name="google-site-verification" content="PvHaTpHHxShLnWeHv-IWmsJ9vlXXEl814A7II8SIXC4" />
<meta name="robots" content="INDEX,FOLLOW" />
<meta name="RATING" content="GENERAL" />
<meta name="distribution" content="Global"/>
<meta name="RATING" content="GENERAL" />
<link rel="canonical" href="http://www.kapoorwatch.com" />

<!-- Bootstrap Core CSS -->

<link href="<?php echo $base_url;?>/css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" media="only screen and (max-device-width: 480px)" href="<?php echo $base_url;?>/css/modern-business.css" />
<link rel="stylesheet" href="http://kapoorwatch.com/scroll/jquery.mCustomScrollbar.css">
<style>
.sidebar_con {
	width: 100%;
}
</style>

<!-- Custom CSS -->

<link href="<?php echo $base_url;?>/css/modern-business.css" rel="stylesheet">

<!-- Custom Fonts -->

<link href="<?php echo $base_url;?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/css/columns.css">
<style>
.search-bar {
	display: none;
}
.search:hover .search-bar {
	display: inline-block;
	float: right;
	margin-top: 10px;
	margin-left: 10px;
	transition: width 2s;
}
ul.navbar-right li:hover ul.watchlist {
	display: block !important;
}
ul.navbar-right li ul li:hover ul.menlist {
	display: block !important;
}
.navbar-inverse .navbar-nav>.open>a {
	background-color: transparent !important;
	color: #c7ad73 !important;
}
ul.navbar-right li ul li:hover ul.womenlist {
	display: inline-block !important;
}
ul.navbar-right li:hover ul.morelist {
	display: block !important;
}

</style>
</head>

<body>

<!-- Navigation -->

<nav class="navbar navbar-inverse" role="navigation">
  <div class="container">
    <div class="col span_1_of_3">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" onclick="btn_up();"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="<?php echo $base_url;?>"><img src="<?php echo $base_url;?>/images/Logo.png" /></a> </div>
      
      <!-- Collect the nav links, forms, and other content for toggling --> 
      
    </div>
    <div class="col span_2_of_3 navbar-collapse collapse in" id="btn_up" style="display:none;" aria-expanded="">
      <div class="top-bar dark-bg">
        <div class="">
          <div class="row">
            <div class="col-lg-12">
              <ul class="top-bar-icons">
                <li><a class="facebook" href="https://www.facebook.com/kapoorwatch/" target="_blank"></a></li>
                <li><a class="twitter" href="https://twitter.com/kapoorwatch" target="_blank"></a></li>
                <li><a class="instagram" href="https://instagram.com/kapoorwatch/" target="_blank"></a></li>
                <li><a class="linkedin" href="https://www.linkedin.com/in/kapoorwatches" target="_blank"></a></li>
                <li><a class="rss" href="#"></a></li>
                <li class="search_li"><a class="search " id="show" onClick="mymodelsearch();"></a>
                  <input id="search_search" placeholder="Search" name="search"  class="search-bar top_search" value="" style="" type="text">
                </li>
                <li> </li>
                
                <!-- <li><a class="popup-btn_1 fb-log"></a> </li>--> 
                
                <!-- <li><fb:login-button scope="public_profile,email" data-auto-logout-link="true" onlogin="checkLoginState();">
</fb:login-button>-->
                
                <input type="hidden" id="lg" value="0"/>
                </li>
                <li>
                  <?php if($_SESSION['userid']!=''){ ?>
                  <a href="<?php echo $base_url;?>/mywishlist.php" class="wishlist"></a>
                  <?php }?>
                </li>
                <li>
                  <?php if($_SESSION['userid']!=''){ ?>
                  <a class="status popup-btn_1" href="logout.php"></a>
                  <?php } else {?>
                  <a class="popup-btn_1 fb-log" ></a>
                  <?php }?>
                </li>
                
                <!--<li><div id="status"></div> </li>-->
                
              </ul>
            </div>
          </div>
          <!--/row--> 
        </div>
        <!--/.container--> 
      </div>
      <!--/.top-bar--> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class=" navbar-collapse" id="#bs-example-navbar-collapse-1">
        <div class="header-ctc-info">
          <h3 class="gold">Speak to an Expert Now</h3>
          <h3 class="gold">+91-9910555111</h3>
        </div>
        <ul class="nav navbar-nav navbar-right" style="display:block;" >
          <li class="dropdown open"> <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown" onclick="openList1()">watches<b class="caret"></b></a>
            <ul class="dropdown-menu dropdown-level-one watchlist" id="ollist" style="display:none;">
              <li class="dropdown open"> <a href="<?php echo $base_url;?>/brands.php">All</a> 
                <!--<ul class="dropdown-menu dropdown-level-two_brands" dropdown2();>
                                             <h2><a href="">BRANDS </a></h2>
                                            <li>
                                                <a href="#">Audemars Piguet</a>
                                            </li>
                                            <li>
                                                <a href="#">Breitling</a>
                                            </li>
                                           <li>
                                               <a href="#">Bvlgari</a>
                                           </li>
                                            <li>

                                                <a href="#">Tag Heuer</a>

                                           </li>

                                           <li>







                                                <a href="#">Roger Dubuis</a>







                                            </li>







                                        </ul>--> 
                
              </li>
              <li class="dropdown open" id="menlist"> <a data-toggle="dropdown js-activated" class="btn dropdown-toggle" data-hover="dropdown" aria-expanded="false" onclick="openList3()">Men</a>
                <ul class="dropdown-menu dropdown-level-two_brands menlist" dropdown3(); id="openList3" style="display:none;">
                  <h2><a href="<?php echo $base_url;?>/brands.php">BRANDS </a></h2>
                  <li><a class="rolex_btn">Rolex</a></li>
                  <?php  
                                          while($result_men=mysql_fetch_array($query_men))
                                          { 
                                              $querysearch=mysql_query("select * from product where product_category='".$result_men['id']."'");
                                     $rows=mysql_num_rows($querysearch);
                                     if($rows){
                                          ?>
                  <li> <a href="<?php echo $base_url;?>/Watches/<?php echo $result_men['category']; ?>/Men/<?php echo $result_men['id']; ?>/0"><?php echo $result_men['category']; ?></a></li>
                  <?php } }?>
                </ul>
              </li>
              <li class="dropdown open" id="womenlist"> <a data-toggle="dropdown js-activated" class="btn dropdown-toggle " data-hover="dropdown" aria-expanded="false" onclick="openList4()">Women</a>
                <ul class="dropdown-menu dropdown-level-two_brands womenlist" dropdown4(); id="openList4" style="display:none;">
                  <h2><a href="<?php echo $base_url;?>/brands.php">BRANDS </a></h2>
                  <li><a class="rolex_btn">Rolex</a></li>
                  <?php  
                    while($result_women=mysql_fetch_array($query_women))
                  {
                    $querysearch=mysql_query("select * from product where product_category='".$result_women['id']."'");
                     $rows=mysql_num_rows($querysearch);
                 if($rows){
                  ?>
                  <li> <a href="<?php echo $base_url;?>/Watches/<?php echo $result_women['category']; ?>/Women/<?php echo $result_women['id']; ?>/1"><?php echo $result_women['category']; ?></a></li>
                  
                  <!--<li> <a href="<?php echo $base_url;?>/NewBrand<?php echo $result_women['id']; ?>/1/<?php echo $result_women['category']; ?>.html"><?php echo $result_women['category']; ?></a> </li>-->
                  
                  <?php }} ?>
                </ul>
              </li>
              <li> <a href="<?php echo $base_url;?>/pricesearch.php">Price</a> </li>
            </ul>
          </li>
          <li class="dropdown open" id="access"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="openList2();">accessories<b class="caret"></b></a>
            <ul class="dropdown-menu dropdown-level-one morelist" id="openList2" style="display:none;">
              <li class="dropdown "> <a href="<?php echo $base_url;?>/accessoriesbrand.php">All</a> </li>
              <li> <a href="<?php echo $base_url;?>/Accessories/Pen/1.html">Pens</a> </li>
              <li> <a href="<?php echo $base_url;?>/Accessories/Leather/2.html">Leather</a> </li>
              <li> <a href="<?php echo $base_url;?>/Accessories/Cufflinks/3.html">Cufflinks</a> </li>
              <li> <a href="<?php echo $base_url;?>/Accessories/Clocks/4.html">Clocks</a> </li>
            </ul>
          </li>
          <li> <a href="<?php echo $base_url;?>/stores.php">stores</a> </li>
          <li> <a href="<?php echo $base_url;?>/contact.php">contact us</a> </li>
        </ul>
      </div>
      
      <!-- /.navbar-collapse --> 
      
    </div>
  </div>
  
  <!-- /.container --> 
  
</nav>
<div class="popup_1" id="popup_1">
  <div class="popup-inner"> <a href="#" class="close login_close">CLOSE</a>
    <form class="inner_frm" style="text-align:center;" >
      <h1 style="color:#fff;">Sign in via facebook </h1>
      <fb:login-button scope="public_profile,email" data-auto-logout-link="true" onlogin="checkLoginState();"> </fb:login-button>
      <input type="hidden" id="lg" value="0"/>
      <div id="status" style="color:#fff;"></div>
    </form>
  </div>
  <!--/pop-inner--> 
</div>

<!--Popup Test end-->

<div class="enquiry" id="enquiry">
  <div class="enquiry-inner">
    <div id="msg" style="margin-top:20px;color:#fff;">*</div>
    <div class="tagline_enq">
      <h2>Enquiry Form </h2>
    </div>
    <a href="#" class="close">CLOSE</a>
    <div class="col span_1_of_2_48 ">
      <div id="msg_rolex"></div>
      <form class="inner_frm rolex-form" name="myform_rolex" method="post" action="">
        <img src="<?php echo $base_url;?>/images/rolex-new-logo.png">
        <h4>Please fill in the details below. </h4>
        <input type="text" name="name_rolex" id="name_rolex" value="" placeholder="Name" class="textbox_d" />
        <input type="text" name="email_rolex" id="email_rolex" value="" placeholder="Email" class="textbox_d" />
        <input type="text" name="number_rolex" id="number_rolex" value="" placeholder="Mobile" class="textbox_d " />
        <input type="text" name="location_rolex" id="location_rolex" value="" placeholder="Location" class="textbox_d " />
        <textarea class="textbox_d " rows="4" onBlur="if(this.value == ''){this.value='query'}" onFocus="if(this.value == 'Message'){this.value=''}" id="query_rolex" value="Tell us your Rolex Query" name="query_rolex" placeholder="Tell us your Rolex Query"></textarea>
        
        <!--<div onClick=" return validate();">Submit</div>   -->
        
        <input type="button" value="SUBMIT" name="submit" onClick="return validate_rolex();" class="textbox submit_btn" style="padding-top:4px;" />
      </form>
    </div>
    
    <!--/span_1_of_2-->
    
    <div class="col span_1_of_2_48 ">
      <div class="img_bordr"> <img src="<?php echo $base_url;?>/images/rolex_enquiry.jpg" class="rolex_right"> </div>
    </div>
  </div>
  
  <!--/pop-inner--> 
  
</div>
<!--Popup Test end--> 
<!-- jQuery --> 
<script src="<?php echo $base_url;?>/js/jquery.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="<?php echo $base_url;?>/js/bootstrap.min.js"></script> 
<!-- Script to Activate the Carousel --> 
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })

 </script> 
<script>















 function openList1() {
    var list = document.getElementById("ollist");
	document.getElementById('openList2').style.display='none';
    if (list.style.display == "none"){
		document.getElementById("ollist").className = "dropdown-menu dropdown-level-one watchlist1";
        list.style.display = "block";
    }else{
	//document.getElementById("ollist").className = "dropdown-menu dropdown-level-one watchlist";
        list.style.display = "none";
    }
}

function openList2() {
    var list = document.getElementById("openList2");
	document.getElementById('ollist').style.display='none';
    if (list.style.display == "none"){
		document.getElementById("openList2").className = "dropdown-menu dropdown-level-one morelist1";
        list.style.display = "block";
    }else{
        list.style.display = "none";
	}
}

function openList3() {
    var list = document.getElementById("openList3");
	document.getElementById('openList4').style.display='none';
    if (list.style.display == "none"){
		document.getElementById("openList3").className = "dropdown-menu dropdown-level-two_brands menlist1";
        list.style.display = "block";
    }else{
        list.style.display = "none";
    }
}

function openList4() {
    var list = document.getElementById("openList4");
	document.getElementById('openList3').style.display='none';
    if (list.style.display == "none"){
		document.getElementById("openList4").className = "dropdown-menu dropdown-level-two_brands womenlist1";
        list.style.display = "block";
    }else{
        list.style.display = "none";
    }
}







function openList5() {







    var list = document.getElementById("openList5");







    if (list.style.display == "none"){







        list.style.display = "block";







    }else{







        list.style.display = "none";







    }







}







function openList6() {







    var list = document.getElementById("openList6");







    if (list.style.display == "none"){







        list.style.display = "block";







    }else{







        list.style.display = "none";







    }







}















function openList7() {







    var list = document.getElementById("openList7");







    if (list.style.display == "none"){







        list.style.display = "block";







    }else{







        list.style.display = "none";







    }







}







function openList8() {







    var list = document.getElementById("openList8");







    if (list.style.display == "none"){







        list.style.display = "block";







    }else{







        list.style.display = "none";







    }







}















function btn_up() {







    var list = document.getElementById("btn_up");







    if (list.style.display == "none"){







        list.style.display = "block";







    }else{















        list.style.display = "none";















    }







}







$("#search_search").keypress(function(event){







	if(event.which==13){















	var tosearch=$("#search_search").val();















	if(tosearch!=''){







	//window.location.href = 'search.php?model='+model+'';







	//window.location.href = 'search.php';















	window.location.href = '<?php echo $base_url;?>/search.php?model='+tosearch+'';







	//window.open('search.php?model='+model+'');







	}







		}







	});



	



function mymodelsearch(){



	



		var tosearch=$("#search_search").val();















	if(tosearch!=''){







	//window.location.href = 'search.php?model='+model+'';







	//window.location.href = 'search.php';















	window.location.href = '<?php echo $base_url;?>/search.php?model='+tosearch+'';







	//window.open('search.php?model='+model+'');







	}



	



	



	}



</script> 
<script src="https://code.jquery.com/jquery-1.10.2.js"></script> 
<script>window.jQuery || document.write('<script src="<?php echo $base_url;?>/js/vendor/jquery-1.10.2.min.js"><\/script>')</script> 

<!--Popup script--> 

<script>







			$(document).ready(function() {







			  $(".popup-btn_1").click(function(e) {







				  $("body").append(''); $(".popup_1").show(); 







				  $(".overlay").show();















				  $(".close").click(function(e) { 















				  $(".popup_1, .overlay").hide(); 















				   location.reload();







				  }); 







			  }); 







		  });







		  function fb_login(){







			   $("body").append(''); $(".popup_1").show(); 







				  $(".overlay").show();







				  $(".close").click(function(e) { 







				  $(".popup_1, .overlay").hide(); 















				  }); 







}  















</script> 

<!--Popup script end--> <script>































 $(document).ready(function() {































			































			  $(".rolex_btn").click(function(e) {































				  $("body").append(''); $(".enquiry").show(); 































				  $(".overlay").show();































				  $(".close").click(function(e) { 































				  $(".enquiry, .overlay").hide(); 































				  }); 































			  }); 































		  });































		















		















		















		















	function validation11(){















	 //var name1= document.getElementById('name').value;















    	    var name =$("#home_name").val();















    	var email =$("#home_email").val();  















    	var number = $("#home_number").val(); 















	var message=$("#home_query").val();















	var product=$("#product_info").val();















	var via=$("#home_contact-via").val();















	var overlay_model=$("#overlay_model").val();















	//--- rolex---





































if(document.myform1.email.value == '')















{















//alert("Please Enter Email");















document.getElementById('msg1').innerHTML="Please Enter Email";















document.myform1.email.focus();































}



























if(via=="Email" || document.myform1.email.value == ''){















if(document.myform1.email.value == '')















{















//alert("Please Enter Email");















document.getElementById('msg1').innerHTML="Please Enter Email";















document.myform1.email.focus();































}else{















            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;















            var address = document.myform1.email.value;















            if(reg.test(address) == false) {















 document.getElementById('msg1').innerHTML="Invalid Email Address";















               // alert('Invalid Email Address');















               















            }















        }















}































if(via=="Call" || document.myform1.number.value == '' ){















if(isNaN(document.myform1.number.value))

















{















 document.getElementById('msg1').innerHTML="Please Enter Only Numeric Number";















document.myform1.number.focus();















// this will not allow form to submit















}















else















{















document.getElementById('msg1').innerHTML="Please Enter Number";















document.myform1.number.focus();































}































}































if(email){















	// $("#msg").val("Your Query has been submitted !");   















	//document.getElementById('msg').innerHTML="Your Query has been submitted !";















	//alert("hi");















	















    var data = "&message=" + message + "&phone=" + number+ "&name=" + name + "&email=" + email +"&product=" +product+"&via="+via+"&model="+overlay_model+"&location="+location+"&query="+textArea;















   















    $.ajax({















     type: "POST",















  //url: "https://1flamingo.com/flamingo_graph/sendmail.php",















      url: "<?php echo $base_url;?>/mail.php",















	 data:data,















     success: function(html){



















		 window.location.href = 'http://kapoorwatch.com/thankyou.php';















		// alert('Thank you!');















		 /*var url = 'http://kapoorwatch.com/googleConverstion.html';















         window.open(url, '_blank');*/















		//window.location.href = "http://kapoorwatch.com/googleConverstion.html"















		 /*document.write('<iframe src="http://kapoorwatch.com/googleConverstion.html" width="1" height="1" frameborder="0"></iframe>');*/















		 















	 // location.reload(true);















	  















	// con();















         // $("#msg").html(html);     















   }















	 















	































});   















  $.ajax({















     type: "POST",















  //url: "https://1flamingo.com/flamingo_graph/sendmail.php",















      url: "http://kapoorwatch.com/googleConverstion.html"})















return false;       















	}else{















		document.getElementById('msg1').innerHTML="Please Enter All fields";















		 //$('#msg').val("Please Enter All fields");  















		}































	















	  }















	















	// rolex form 















	















	















			function validate_rolex(){















	 //var name1= document.getElementById('name').value;















    	var name =$("#name_rolex").val();















    	var email =$("#email_rolex").val();  















    	var number = $("#number_rolex").val(); 















	    var message=$("#query_rolex").val();















		var location = $('#location_rolex').val();















	















	//--- rolex---















	















































if(document.myform_rolex.email_rolex.value == '')















{















//alert("Please Enter Email");















document.getElementById('msg_rolex').innerHTML="Please Enter Email";















document.myform_rolex.email_rolex.focus();































}else{















            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;















            var address = document.myform_rolex.email_rolex.value;















            if(reg.test(address) == false) {















 document.getElementById('msg_rolex').innerHTML="Invalid Email Address";















               // alert('Invalid Email Address');















               















            }















        }































































if(isNaN(document.myform_rolex.number_rolex.value))















{















 document.getElementById('msg_rolex').innerHTML="Please Enter Only Numeric Number";















document.myform_rolex.number_rolex.focus();















// this will not allow form to submit















}















else if(document.myform_rolex.number_rolex.value=='')















{















	 document.getElementById('msg_rolex').innerHTML="Please Enter Number";















document.myform_rolex.number_rolex.focus();















	}































































if(email){















	// $("#msg").val("Your Query has been submitted !");   















	//document.getElementById('msg').innerHTML="Your Query has been submitted !";















	//alert("hi");















	















    var data = "&message=" + message + "&phone=" + number+ "&name=" + name + "&email=" + email +"&location="+location;















   















    $.ajax({















     type: "POST",















  //url: "https://1flamingo.com/flamingo_graph/sendmail.php",















      url: "<?php echo $base_url;?>/mail1.php",















	 data:data,















     success: function(html){















		 















		 var url=document.URL;















		 















		 window.location.href=url;















		 //window.location.href = 'http://kapoorwatch.com/thankyou.php';































		 /*var url = 'http://kapoorwatch.com/googleConverstion.html';















         window.open(url, '_blank');*/















		//window.location.href = "http://kapoorwatch.com/googleConverstion.html"















		 /*document.write('<iframe src="http://kapoorwatch.com/googleConverstion.html" width="1" height="1" frameborder="0"></iframe>');*/















		 















	 // location.reload(true);















	  















	// con();















         // $("#msg").html(html);     















   }















	 















	































}); 































  















  $.ajax({















     type: "POST",















  //url: "https://1flamingo.com/flamingo_graph/sendmail.php",


      url: "http://kapoorwatch.com/googleConverstion.html"})

return false;       

	}else{
		document.getElementById('msg1').innerHTML="Please Enter All fields";

		 //$('#msg').val("Please Enter All fields");  

		}

	  }
	</script>
<?php

include("fb.php");
 ?>
