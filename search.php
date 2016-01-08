<?php 

include("admin/include/config.php");

include("header.php");

include("testing");

include ("admin/include/class_pagination.php");

?><body style="background: none repeat scroll 0 0 #e9e9e9;">

  <div id="loading" style="display:none;width:69px;height:89px;position:absolute;top:70%;left:50%;padding:2px;z-index:12345;"><img src='<?php echo $base_url;?>/demo_wait.gif' width="64" height="64" /><br>Loading..</div>

  <div class="mr-container gray-bg">  

    <!--Section title-->

    <div class="full gold-bg section-title-container">

    	 <div class="container">

         	<div class="row">

            	<div class="col-lg-12">

    				<h1 class="section-title lt-spc pd-tp">search your timepiece</h1>

                </div>

            </div>

        </div>

    </div>

    <!--/Section title-->

   <div class="col span_2_of_2"> 

  <div class="sidebar col span_1_of_5">

     <div id="sidebar_1">

     <div class="sidebar_con section">

         <a href="#" onClick="toggle_visibility('foo');">

             <div class="sidebar_tagline">

                 <h3>Price <img src="<?php echo $base_url;?>/images/contacts/arrow_bottom.png" class="arrow_drop" > </h3>

             </div>

         </a>  <!-- /sidebar_tagline-->

         <div class="filter_sectn" id="foo">

          

                      

                      <ul>



                    <li><input type="checkbox" name="price_select" onClick="return searchproduct(this.id,1);" value="0and50000" class="check_price12" id="mycheck1"> <label> Below Rs 50,000 </label> </li>



                    <li><input type="checkbox" name="price_select" onClick="return searchproduct(this.id,1);" value="50000and200000" class="check_price12" id="mycheck2"> <label>Rs 50,000 - Rs 2 Lac </label> </li>



                    <li><input type="checkbox" name="price_select" onClick="return searchproduct(this.id,1);" value="200000and400000" class="check_price12" id="mycheck3"> <label>Rs 2 Lac - Rs 4 Lac </label> </li>



                    <li><input type="checkbox" name="price_select" onClick="return searchproduct(this.id,1);" value="400000and700000" class="check_price12" id="mycheck4"> <label>Rs 4 Lac - Rs 7 Lac </label> </li>



                    <li><input type="checkbox" name="price_select" onClick="return searchproduct(this.id,1);" value="700000and1200000" class="check_price12" id="mycheck5"> <label> Rs 7 Lac - Rs 12 Lac </label> </li>

                    

                    <li><input type="checkbox" name="price_select" onClick="return searchproduct(this.id,1);" value="1200000and2000000" class="check_price12" id="mycheck6"> <label> Rs 12 Lac - Rs 20 Lac </label> </li>



                    <li><input type="checkbox" onClick="return searchproduct(this.id,1);" name="price_select" value="2000000" class="check_price12" id="mycheck7"> <label>  Above Rs 20 Lac </label> </li>

                   

                    </ul> 

         

              

         </div> 

         

           <a href="#" onClick="toggle_visibility('foo_2');">

             <div class="sidebar_tagline">

                 <h3>gender  <img src="<?php echo $base_url;?>/images/contacts/arrow_bottom.png" class="arrow_drop" ></h3>

             </div>  <!-- /sidebar_tagline-->

         </a>

         <div class="filter_sectn" id="foo_2">

            <ul>

            

          

            

             <li><input type="checkbox" name="0" value="0" class="check" <?php if($_GET['gender']!=''){ if($_GET['gender']==0)

{echo "checked";}}?> onClick="return searchproduct('this.name',1);"> <label>Men </label></li>

             <li><input type="checkbox" name="1" value="1"  <?php if($_GET['gender']!=''){  if($_GET['gender']==1)

{echo "checked";} }?> class="check" onClick="return searchproduct('this.name',1);"> <label>Women</label></li>

            </ul> 

         </div>

         

         <!--/filter_sectn-->

          <a href="#" onClick="toggle_visibility('foo_1');">





              <div class="sidebar_tagline" >

                 <h3>brands <img src="<?php echo $base_url;?>/images/contacts/arrow_bottom.png" class="arrow_drop" > </h3>

             </div>  <!-- /sidebar_tagline-->

         </a>

         <div class="filter_sectn" id="foo_1"> 

            <ul>

            <!-- <li><input type="text" name="" value="" placeholder="Search by Brands" class="filter_search"></li>-->

             <?php

			$product_brand= mysql_query("select * from product_cat where id>2  and is_active='1' ORDER BY  `category` ");

			while($result_brands=mysql_fetch_array($product_brand)){

			//echo "select * from product where product_category='".$result_brands['id']."'";

			  $querysearch=mysql_query("select * from product where product_category='".$result_brands['id']."'");

                                      $rows=mysql_num_rows($querysearch);

                                      if($rows){

                                          

			  ?>

             <li><input type="checkbox" name="<?php echo $result_brands['id']; ?>" onClick="return searchproduct('this.name',1);" <?php if($result_brands['id']==$_GET['product_category']){echo "checked";} ?> value="<?php echo $result_brands['id'] ?>" class="check1"> <label><?php echo $result_brands['category']; ?> </label></li>

             

             <?php }}?>

             <!--<li><input type="checkbox" name="" value="" class="check1"> <label>Audemars Piguet </label></li>

             <li><input type="checkbox" name="" value="" class="check1"> <label>Hublot </label></li>

             <li><input type="checkbox" name="" value="" class="check1"> <label>Roger Dubuis </label></li>

             <li><input type="checkbox" name="" value="" class="check1"> <label>Tissot </label></li>-->

            </ul>

         </div> <!--/filter_sectn-->

         

        <!--/filter_sectn-->

          

     </div><!--/ sidebar_con-->

     </div>

  </div> <!-- /sidebar-->

  <?php if($_GET['model']){ 

  //pagination content

  $total_products = mysql_num_rows(mysql_query("select * from product where is_active = 1 order by order_no asc" ));



$records_per_page = 1000;

$pagination = new Zebra_Pagination();

// set position of the next/previous page links

$pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');





// the number of total records is the number of records in the array

$pagination->records($total_products);

// records per page

$pagination->records_per_page($records_per_page);

 

$query= mysql_query("select * from product where  `model` ='".$_GET['model']."' or `product_name` like '%".$_GET['model']."%'  ORDER BY  `product_name`,`modelNo`  LIMIT " . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page);





  $other_page= mysql_num_rows($query);



if($other_page<1)

{

$mynewsearch=$_GET['model'];

header("location:search1.php?model=".$mynewsearch."");

}



  

  //pagination content ends here

  

  

  

  

  //$query=mysql_query("select * from product WHERE `model` ='".$_GET['model']."'");

	  

  } else if($_GET['product_category']!='' && $_GET['gender']!=''){

	  

	//echo "gender coming";

	

	    $total_products = mysql_num_rows(mysql_query("select * from product where is_active = 1 and `product_category` ='".$_GET['product_category']."' and gender='".$_GET['gender']."' order by order_no asc" ));



$records_per_page = 120;

$pagination = new Zebra_Pagination();

// set position of the next/previous page links

$pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');





// the number of total records is the number of records in the array

$pagination->records($total_products);

// records per page

$pagination->records_per_page($records_per_page);

 //echo "select * from product where is_active='1' and `product_category` ='".$_GET['product_category']."' and `gender` ='".$_GET['gender']."'  ORDER BY  `product_name`";

$query= mysql_query("select * from product where is_active='1' and `product_category` ='".$_GET['product_category']."' and `gender` ='".$_GET['gender']."'  ORDER BY  `product_name`,model LIMIT " . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page);



	  }

	  else{

		  

		  //echo "gender not coming";

		   $total_products = mysql_num_rows(mysql_query("select * from product where is_active = 1 and `product_category` ='".$_GET['product_category']."'  order by order_no asc" ));



$records_per_page = 120;

$pagination = new Zebra_Pagination();

// set position of the next/previous page links

$pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');





// the number of total records is the number of records in the array

$pagination->records($total_products);

// records per page

$pagination->records_per_page($records_per_page);

// echo "select * from product where is_active='1' and `product_category` ='".$_GET['product_category']."' and `gender` ='".$_GET['gender']."'  ORDER BY  `product_name`".".................";

$query= mysql_query("select * from product where is_active='1' and `product_category` ='".$_GET['product_category']."' ORDER BY  `product_name`,model LIMIT " . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page);



		  

		  

		  }

	

  

  ?>

 <div class="right_col col span_6_of_8">   

    <div class="">

        <!-- Marketing Icons Section -->

        <div class="row" id="ajax_response">

        

                           <?php

        

	while($result_products=mysql_fetch_array($query))

	{
		$mybrandid= mysql_query("select * from product_cat where id='".$result_products['product_category']."'  and is_active='1' ORDER BY  `category` LIMIT 0 , 1" );
		$mybrandid_result=mysql_fetch_array($mybrandid);

		?>

            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4"> 

    

                <div class="panel panel-default mr-box">

     

                	<div class="mr-box-inner">

                      <div class="panel-heading mr-heading">

                      

                      

                     <?php
                    // $exp = explode("/",$mybrandid_result['category']);
					// $impurl = implode(".",$exp);
					 ?>

                         <a href="<?php echo $base_url;?>/Watch/<?php $exp = explode(" ",$mybrandid_result['category']); $impurl = implode(".",$exp); echo $impurl;?>/<?php $exp_1 = explode(" ",$result_products['product_name']); $impurl1 = implode(".",$exp_1); echo $impurl1; ?>/<?php $exp1 = explode("/",$result_products['model']); $impurl1 = implode(".",$exp1); $myexp=explode(" ",$impurl1); $myimp=implode(".",$myexp); echo $myimp;?>/<?php echo $result_products['id'];?>.html">

 <img class="lazy"  data-src="<?php echo $base_url;?>/admin/<?php echo $result_products['product_image'];?>" src="<?php echo $base_url;?>/admin/<?php echo $result_products['product_image'];?>" alt="<?php echo $result_products['product_name'];?>" /></a>



                      </div>

                      <div class="panel-body">

                      <input type="hidden" id="gettouch" value="<?php echo $result_products['model'];?>"/>

                            <h3 class="mr-box-name cap lt-spc"><?php echo $result_products['product_name'];?></h3>

                          <p class="model-no" id=""><?php echo $result_products['model'];?></p>

                          <p class="price_1"> &nbsp;<?php if($result_products['product_category']==24){ } else { echo "INR".number_format($result_products['price']) ;}?></p>

                         <a  class="get-in-touch-btn kwc-btn" onClick="showoverlay('<?php echo $result_products['model'];?>');">Get in touch</a>

                          <a href="#" onClick="whislist(<?php echo $result_products['id'];?>,'Watch');" class="wish-list-btn black-btn kwc-btn" id="ajax_response1">Wishlist</a>

                      </div>

                    </div><!--/mr-box-inner-->

                


                </div>

                

              <!--/mr-box-->

            </div>      <?php }?>

            

            <div class="container_pg" style="float:right;"> <!--this is for pagination-->

                      <!-- DC Pagination:A12 Start -->

                        <ul class="tsc_pagination tsc_paginationA tsc_paginationA12" style="list-style:outside none none;">

                          <?php echo $pagination->render();?><script type="text/javascript" src="<?php echo $base_url;?>/admin/include/zebra_pagination.js"></script>

                       

                        </ul>

                <!-- DC Pagination:A12 End -->

                    </div>

            

        </div>

        <!-- /.row -->



	</div>

    <!-- /.container -->

         <!--<div class="col span_1_of_2" style="float:right;"> <!--this is for pagination-->

                      <!-- DC Pagination:A12 Start -->

                        <ul class="tsc_pagination tsc_paginationA tsc_paginationA12" style="list-style:outside none none;">

                          <?php //echo $pagination->render();?><script type="text/javascript" src="<?php echo $base_url;?>/admin/include/zebra_pagination.js"></script>

                       

                        </ul>

                <!-- DC Pagination:A12 End -->

                    </div>

    <!--<section class="container_pg">

    <nav class="pagination">

      <a href="index.html" class="prev">&lt;</a>

      <a href="index.html">1</a>

      <a href="index.html">2</a>

      <a href="index.html">3</a>

      <span>4</span>

      <a href="index.html">5</a>

      <a href="index.html" class="next">&gt;</a>

    </nav>

  </section>-->

 </div>  <!--/right_col-->  



 </div> <!--main-con section -->

   </div> <!-- /.gray-bg -->  

    

    

    <div class="popup" id="popup">

        <div class="popup-inner">



<input type="hidden" id="overlay_model" name="overlay_model" value=""/>

        <div id="msg1"></div>

        <a href="#" class="close get_in_touch_close">CLOSE</a>

        	<form class="inner_frm" name="myform_search" >



          <input type="text" name="name" id="name_search" value="" placeholder="NAME" class="textbox_d textbox_name_1" />

          <input type="text" name="phone_no" id="number_search" value="" placeholder="Mobile" class="textbox_d  textbox_ph_1" />

          <input type="text" name="email" id="email_search" value="" placeholder="EMAIL" class="textbox_d textbox_email_1" />

          <!-- <input type="text" name="contact-via" id="contact-via1" value="" placeholder="Contact via" class="textbox_d  textbox_via" />-->

           <select name="contact-via" id="contact_search" value="" placeholder="Contact via" class="textbox_d  textbox_via">

         

               <option value="Contact via">Contact via</option>

              <option value="Email">Email</option>

              <option value="Call">Call</option>

              <option value="Any One">Any One</option>

           </select>

          <textarea class="textbox_d textbox_box_1 " rows="4" id="query_search" onBlur="if(this.value == ''){this.value='query'}" onFocus="if(this.value == 'Message'){this.value=''}" id="query" value="Query" name="msg" placeholder="Query"></textarea>

       <div onClick="return validate();" class="textbox submit_btn">Submit</div>   

         <!-- <input type="submit" value="SUBMIT" name="submit" onClick=" return validate();"  />-->



          



      </form>



       </div><!--/pop-inner-->

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



</body>

<script type="text/javascript">

			  <!--

				  function toggle_visibility(foo) {

					 var e = document.getElementById(foo);

					 if(e.style.display == 'block')

						e.style.display = 'none';

					 else

						e.style.display = 'block';

				  }

			  //-->

			  </script>

 <script type="text/javascript">

			  <!--

				  function toggle_visibility(foo_1) {

					 var e = document.getElementById(foo_1);

					 if(e.style.display == 'block')

						e.style.display = 'none';

					 else

						e.style.display = 'block';

				  }

			  //-->

			  </script>  

<script type="text/javascript">

			  <!--

				  function toggle_visibility(foo_2) {

					 var e = document.getElementById(foo_2);

					 if(e.style.display == 'block')

						e.style.display = 'none';

					 else

						e.style.display = 'block';

				  }

			  //-->

			  </script>      

              

              

              <script>

     function searchproduct(name,pn){









var my1=document.getElementById('mycheck7');

if(my1.checked)

{

	

	for(var i=1;i<=6;i++){

		

		

	document.getElementById("mycheck"+i).checked=false;

	}

	

	}



    var myselec=[];

    $(".check_price12:checked").each(function() { myselec.push($(this).attr("id")); });

   var first= myselec[0];

   var la=myselec.length-1;

   var last=myselec[la];

  // alert(first);

	//alert(last);

	var start = first.substring(7);

	var end = last.substring(7);

		for(var i=end;i>=start;i--){

		

		//alert(i);

	document.getElementById("mycheck"+i).checked=true;

	}

	

	







      jQuery("html, body").animate( {

      scrollTop : 0

       }, 100);









$(document).ready(function () {

    $(document).ajaxStart(function () {

        $("#loading").show();

		$("#ajax_response").hide();





    }).ajaxStop(function () {

        $("#loading").hide();

		$("#ajax_response").show();

    });

});







	//var amount2=$('#amount').val();

	//var amount1=$('#amount1	').val();

	//var amount=  $("input[name=price_select]:checked").val();







		var chkArray=[];

		var chksize=[];

		var chkprice=[];

		var newamount=[];

		 $(".check:checked").each(function() { chkArray.push($(this).val()); });

		 $(".check1:checked").each(function() { chksize.push($(this).val()); });

		  $(".checknew:checked").each(function() { chkprice.push($(this).val()); });

		    $(".check_price12:checked").each(function() { newamount.push($(this).val()); });

		  

		  

 

//var mat= $('#material').val();

//var amount=$('#amount').val();



/*

 $.ajax({

        url: ' sliderpriceset.php',

        type: 'get',

       // data: 'name='+chkArray+'&size='+chksize+'&material='+mat+'$amount='+amount,

		data: 'name='+chksize,

		async:true,

        success: function(response) {

			//alert(response);

                       // document.getElementById('amount').value="0";

                        // var x=document.getElementById('amount').value;

                        // document.getElementById('amount').value=x;

			//document.getElementById('amount1').value=response;

			//$("#ajax_response").html(response);

           

        }

    });

	

*/



    $.ajax({

        url: '<?php echo $base_url;?>/b_new.php',

        type: 'get',

       // data: 'name='+chkArray+'&size='+chksize+'&material='+mat+'$amount='+amount,

		data: 'name='+chksize+'&gender='+chkArray+'&price='+newamount+'&pn='+pn,

		async:true,

        success: function(response) {

			//alert(response);

			$("#ajax_response").html(response);

           

        }

    });

	}

	

	

			   	function whislist(wid,product_type){





					

					var st=document.getElementById('lg').value;

					//alert(st);

					if(st>0){

			   

			

			      $.ajax({

        url: '<?php echo $base_url;?>/whishlistinsert.php',

        type: 'get',

       // data: 'name='+chkArray+'&size='+chksize+'&material='+mat+'$amount='+amount,

		data:'id='+wid+'&product_type='+product_type,

		async:false,

        success: function(response) {

			//alert(response);

			if(response==1){

			alert('Already is in the list');	

			}else{

$('#mywishlistpixel').html('<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/965236706/?label=Di6lCIu7iWAQ4q-hzAM&amp;guid=ON&amp;script=0"/>');





ga('send', 'event', 'Button', 'Wishlist');

//alert(response);

			alert('Added to your Wishlist!');

ga('send', 'event', 'Button', 'Wishlist');	

			}

        }

    });

					}else{

						





   $("body").append(''); $(".popup_1").show(); 

				  $(".overlay").show();

				  $(".close").click(function(e) { 

				  $(".popup_1, .overlay").hide(); 

				  }); 

					//alert("Please login first");

						//fb_login();

						}

			}

	

	

	 function validate(){

	//var name1= document.getElementById('name').value;

    var name =$("#name_search").val();

    var email =$("#email_search").val();  

    var number = $("#number_search").val(); 



	var message=$("#query_search").val();

	var product=$("#product_info1").val();

	var via=$("#contact_search").val();

	var overlay_model=$("#overlay_model").val();









if(document.myform_search.email.value == '')

{

//alert("Please Enter Email");

document.getElementById('msg1').innerHTML="Please Enter Email";

document.myform_search.email.focus();

return false;



}else{

            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

            var address = document.myform_search.email.value;

            if(reg.test(address) == false) {

 document.getElementById('msg1').innerHTML="Invalid Email Address";

return false;

               // alert('Invalid Email Address');

               

            }

			

}





if(via=="Email" && document.myform_search.email.value == ''){

if(document.myform_search.email.value == '')

{

//alert("Please Enter Email");

document.getElementById('msg1').innerHTML="Please Enter Email";

document.myform_search.email.focus();

return false;



}else{

            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

            var address = document.myform_search.email.value;

            if(reg.test(address) == false) {

 document.getElementById('msg1').innerHTML="Invalid Email Address";

 document.myform_search.email.focus();

 return false;

               // alert('Invalid Email Address');

               

            }

        }

}



if(via=="Call" && document.myform_search.number.value == '' ){

if(isNaN(document.myform_search.number.value))
{

 document.getElementById('msg1').innerHTML="Please Enter Only Numeric Number";

document.myform_search.number.focus();

return false;

// this will not allow form to submit

}

else

{

document.getElementById('msg1').innerHTML="Please Enter Number";

document.myform_search.number.focus();

return false;



}



}



if( email ){

	// $("#msg").val("Your Query has been submitted !");   

	//document.getElementById('msg').innerHTML="Your Query has been submitted !";

	//alert("hi");

	

    var data = "&message=" + message + "&phone=" + number+ "&name=" + name + "&email=" + email +"&product=" +product+"&via="+via+"&model="+overlay_model;





    $.ajax({

     type: "POST",

  //url: "https://1flamingo.com/flamingo_graph/sendmail.php",

      url: "<?php echo $base_url;?>/mail.php",

	 data:data,

     success: function(html){



	ga('send', 'event', 'Form_btn', 'GIT');



document.getElementById('popup').style.display='none';

	   var name =$("#name_search").val();

	   

	   name="";





//window.open('http://www.kapoorwatch.com/t.php','_blank'); 

$('#mypixel').html('<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/965236706/?label=jzFKCPrt_V8Q4q-hzAM&amp;guid=ON&amp;script=0"/>');



    alert(html);

         // $("#msg").html(html);     

     }



});   


return false;       

	}else{

		document.getElementById('msg1').innerHTML="Please Enter All fields";

		return false;

		 //$('#msg').val("Please Enter All fields");  

		}



	

	  }

	

	

	

	

		  

	

</script>



<script  src="<?php echo $base_url;?>/js/jquery-1.9.1.js"></script> 

   <script src="<?php echo $base_url;?>/js/jquery-ui.js"></script>

 <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/css/pagination.css">

<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/css/jquery-ui.css">

<script  src="<?php echo $base_url;?>/js/myjquery.js"></script>  

<script type="text/javascript">

   

   

$(document).ready(function() {

    $("img.lazy").lazy();

});





                  

       <!--Popup script--> 

      

			$(document).ready(function() {

			

			  $(".popup-btn").click(function(e) {

				  $("body").append(''); $(".popup").show(); 

				  $(".overlay").show();

				  $(".close").click(function(e) { 

				  $(".popup, .overlay").hide(); 

				  }); 

			  }); 

		  });

		  function downloadit()

		  {

			  document.abc.submit();

			  var myurl = document.getElementById('filename').value;

			  //alert(myurl);

			  window.open(myurl);

		 }

		 

		 function showoverlay(pmodel){

		 

		 document.getElementById('overlay_model').value=pmodel;

		 

		 				  $("body").append(''); $(".popup").show(); 

				  $(".overlay").show();

				  $(".close").click(function(e) { 

				  $(".popup, .overlay").hide(); 

				  }); 

			

		 

		 }

		</script>

	<style>

    

    .check12 {}

    </style>	





    

    <script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-48864090-1', 'auto');

  ga('send', 'pageview');



</script>

<!-- custom scrollbars plugin -->

     

        

        

       <script src="http://kapoorwatch.com/scroll/jquery.mCustomScrollbar.concat.min.js"></script>

        

        

<div style="display:none;" id="mypixel"></div>

<div id="mywishlistpixel" style="display:none;"></div>

</body>
<style>
.inner_frm .submit_btn {
    padding-top: 12px;
}
</style>
                 

</html>