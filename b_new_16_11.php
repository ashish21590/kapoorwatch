<?php include("admin/include/config.php");



include ("admin/include/pg.php");







//$term = $_GET['name']; 







$check_size=$_GET['name'];







$arr1=explode(",",$check_size);







for($j=0;$j<count($arr1);$j++){







	$myvar1[] = "'".$arr1[$j]."'";







}







//for material















$check_gender=$_GET['gender'];







$arr2=explode(",",$check_gender);















for($j=0;$j<count($arr2);$j++){







	$myvar2[] = "'".$arr2[$j]."'";







}





$size=implode(",",$myvar1);



$gender=implode(",",$myvar2);



//$my=explode("and",$price[$i]);

 $price=$_GET['price'];

$newmy=explode(",",$_GET['price']);

$pricecariable=implode(",",$newmy);


$pricecariable1=explode("and",$pricecariable);

$pricecariable2=implode(",",$pricecariable1);

  $pricecariable3 = explode(",",$pricecariable2);
 $pricecariable3[0];
  
   end($pricecariable3);
  


	




 $price=$_GET['price'];

$my=explode("and",$price);









	















// MY MAIN  CODE FOR SEARCHING STARTS FROM HERE 







$query = "select * from product where is_active='1'";



if($size!='' && $size!="''")



{



	 $query .= " and  product_category in (".$size.")" ;

}





if($gender !='' && $gender !="''"){

 $query .= " and  gender in (".$gender.")" ;



}



if($price!='' && $price>=2000000 )

{

	$query.= " AND price >='".end($pricecariable3)."'"; 

	}

	elseif($price == "")



	{

    $query.= " AND price <= '2000000'";

    }else



	{

		$query.= " AND price between '".$pricecariable3[0]."' and '".end($pricecariable3)."'"; 

		}


  $query .="ORDER BY  `product_name`,model asc ";
//echo $query;

//$result_set1= mysql_query($query);

//my pagination




 $sql = mysql_query($query);


//////////////////////////////////// Adam's Pagination Logic ////////////////////////////////////////////////////////////////////////
$nr = mysql_num_rows($sql); // Get total of Num rows from the database query

if (isset($_REQUEST['pn'])) { // Get pn from URL vars if it is present

   $pn = $_REQUEST['pn']; // filter everything but numbers for security(new)

    //$pn = ereg_replace("[^0-9]", "", $_GET['pn']); // filter everything but numbers for security(deprecated)


} else { // If the pn URL variable is not present force it to be value of page number 1


  $pn = 1;


} 


//This is where we set how many database items to show on each page 


$itemsPerPage = 500; 

// Get the value of the last page in the pagination result set

$lastPage = ceil($nr / $itemsPerPage);

// Be sure URL variable $pn(page number) is no lower than page 1 and no higher than $lastpage

/*if ($pn < 1) { // If it is less than 1
   $pn = 1; // force if to be 1

} else if ($pn > $lastPage) { // if it is greater than $lastpage

   $pn = $lastPage; // force it to be $lastpage's value

}*/ 







// This creates the numbers to click in between the next and back buttons







// This section is explained well in the video that accompanies this script







$centerPages = "";







$sub1 = $pn - 1;







$sub2 = $pn - 2;







$add1 = $pn + 1;







$add2 = $pn + 2;















// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query







 $limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 















 $myq=$query." ".$limit;







 $result_set1 = mysql_query($myq);  









//////////////////////////////// END Adam's Pagination Logic ////////////////////////////////////////////////////////////////////////////////







///////////////////////////////////// Adam's Pagination Display Setup /////////////////////////////////////////////////////////////////////







$paginationDisplay = ""; // Initialize the pagination output variable







// This code runs only if the last page variable is ot equal to 1, if it is only 1 page we require no paginated links to display







if ($lastPage != "1"){







    // This shows the user what page they are on, and the total number of pages







    $paginationDisplay .= '<strong class="abc">Page' . $pn . 'of' . $lastPage. '&nbsp;  &nbsp;  &nbsp; </strong>';







    // If we are not on page 1 we can place the Back button







    if ($pn > 1) {







        $previous = $pn - 1;







        $paginationDisplay .=  '&nbsp;  <a class="navigation previous disabled abc" style="cursor:pointer" onClick=\'return searchproduct("'.$_GET['name'].'","' . $previous . '");\'> Back</a> ';







    } 







	for($i=1;$i<=$lastPage;$i++){







		if($i == $pn){







		$paginationDisplay .=  '<strong class="abc">['.$i."]".'</strong>';	







		}else{







		 $paginationDisplay .=  '&nbsp;  <a style="cursor:pointer" onClick=\'return searchproduct("'.$_GET['name'].'","' . $i . '");\'>'.$i.'</a>';







		}







		}







    // Lay in the clickable numbers display here between the Back and Next links







    $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';







    // If we are not on the very last page we can place the Next button







    if ($pn != $lastPage) {







        $nextPage = $pn + 1;







        $paginationDisplay .=  '&nbsp;  <a class="navigation next" style="cursor:pointer" onClick=\'return searchproduct("'.$_GET['name'].'","' . $nextPage . '");\'> Next</a> ';







    } 







}







//echo $result_set1; 



if($nr!=0){



echo "<h1 class=\"fm-msg\">Total Search Result= ".$nr."</h1>";



}



$check= mysql_num_rows($result_set1);















if($check>0){







?>







                     <div class="">







                      <!--inside listing of beds-->







                          <div class="section group"> 







      <?php







        







	while($result_products=mysql_fetch_array($result_set1))







	{



$mybrandid= mysql_query("select * from product_cat where id='".$result_products['product_category']."'  and is_active='1' ORDER BY  `category` LIMIT 0 , 1" );
		$mybrandid_result=mysql_fetch_array($mybrandid);




		?>







            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4"> 







    







                <div class="panel panel-default mr-box">



                	<div class="mr-box-inner">
                  <div class="panel-heading mr-heading">



    <!-- <a href="<?php //echo $base_url;?>/Watch/<?php// echo $mybrandid_result['category'];?>/<?php //echo $result_products['product_name'];?>/<?php //echo $result_products['model'];?>/<?php //echo $result_products['id'];?>.html">-->
     
     
     <a href="<?php echo $base_url;?>/Watch/<?php $exp = explode(" ",$mybrandid_result['category']); $impurl = implode(".",$exp); echo $impurl;?>/<?php echo $result_products['product_name'];?>/<?php $exp1 = explode("/",$result_products['model']); $impurl1 = implode(".",$exp1); echo $impurl1;?>/<?php echo $result_products['id'];?>.html">
     
     
     

						<!-- <a href="<?php //echo $base_url;?>/Specification/<?php //echo $result_products['product_name'];?>/<?php //echo $result_products['id'];?>">-->

 <img class="lazy"  data-src="<?php echo $base_url;?>/admin/<?php echo $result_products['product_image'];?>" src="<?php echo $base_url;?>/admin/<?php echo $result_products['product_image'];?>" alt="<?php echo $result_products['product_name'];?>" /></a>

                         <!--<a href="<?php echo $base_url;?>/productSingle.php?product_category=<?php echo $result_products['id'];?>"><img src="<?php echo $base_url;?>/admin/<?php echo $result_products['product_image'];?>" alt="<?php echo $result_products['alt'];?>" /></a>-->

                     </div>


                      <div class="panel-body">


                            <h3 class="mr-box-name cap lt-spc"><?php echo $result_products['product_name'];?></h3>


                          <p class="model-no"><?php echo $result_products['model'];?></p>


                          <p class="price_1">INR &nbsp;<?php  if($result_products['product_category']==24){ } else { echo number_format($result_products['price']); } ?></p>



                         <!--<a href="#" class="get-in-touch-btn kwc-btn popup-btn">Get in touch</a>-->



                         <a class="get-in-touch-btn kwc-btn" onclick="showoverlay('<?php echo $result_products['model'];?>');">Get in touch</a>



                          <a onClick="whislist(<?php echo $result_products['id'];?>,'Watch');" class="wish-list-btn black-btn kwc-btn">Wishlist</a>







                      </div>







                    </div><!--/mr-box-inner-->







                







                </div>







                







              <!--/mr-box-->







            </div>      <?php }}  else{







				 echo  "<h1 class=\"fm-msg\">No watches available in your selected combination. Please modify your search </h1>";







				 }?>







			







   </div> 







   <?php  if ($nr>0) {?>







      <div class="container_pg" style="float:right;"><?php echo $paginationDisplay; ?></div>







      <?php }?>



	 



 <style>



 .container_pg a, .container_pg .abc {



	 background-clip: padding-box;



    background-color: #2e2416;



    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.04), rgba(255, 255, 255, 0));



    border-color: rgba(0, 0, 0, 0.9);



    border-radius: 3px;



    box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.04) inset, 0 1px rgba(255, 255, 255, 0.04) inset, 0 -1px rgba(0, 0, 0, 0.15) inset, 0 1px 1px rgba(0, 0, 0, 0.1);



    color: #af9554;



    display: inline-block;



    font-weight: 500;



    height: 30px;



    line-height: 27px;



    margin-left: 10px;



    min-width: 30px;



    text-align: center;





	clear: both;



    color: #af9554;



    display: inline-block;



    padding: 0 6px;



    text-align: center;



    text-decoration: none;



    text-shadow: 0 1px black;



    transition: all 0.1s ease-out 0s;



	 }



 </style>     