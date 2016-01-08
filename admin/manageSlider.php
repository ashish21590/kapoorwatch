<?php include("include/config.php");
include("include/function.php");
include("include/validation.php");
if(isset($_POST['submit'])){
	if(!$_GET['id']){
		$img_array = $_FILES['upload_image']['name'];
		if($img_array){
			$get_ext = end(explode('.',$img_array));
        	$filename = $_FILES['upload_image']['tmp_name'];
        	$new_file_name = time()."_".$_FILES['upload_image']['name'];
        	$destination = "upload/products/".$new_file_name;
			if(in_array($get_ext,array('jpg','JPG','jpeg','JPEG','png','PNG','gif','GIF'))){
				move_uploaded_file($filename,$destination); 
			}
		
						
		//echo "insert into slider(h1Tag,sliderimage,getTouch) values('".$_POST['news_heading']."','".$destination."','".$_POST['getTouch']."')";			
		 mysql_query("insert into slider(h1Tag,sliderimage,getTouch) values('".$_POST['news_heading']."','".$destination."','".$_POST['getTouch']."')");
	} }else{
		
		$img_array = $_FILES['upload_image']['name'];
		if($img_array){
			$get_ext = end(explode('.',$img_array));
        	$filename = $_FILES['upload_image']['tmp_name'];
        	$new_file_name = time()."_".$_FILES['upload_image']['name'];
        	$destination = "upload/products/".$new_file_name;
			if(in_array($get_ext,array('jpg','JPG','jpeg','JPEG','png','PNG','gif','GIF'))){
				move_uploaded_file($filename,$destination); 
			}
		}
						
					
		if($img_array){
			
	mysql_query("update slider set h1Tag = '".$_POST['news_heading']."', sliderimage = '".$destination."', getTouch = '".$_POST['getTouch']."' where id='".$_GET['id']."' ");		
			} else {
	
    mysql_query("update slider set h1Tag = '".$_POST['news_heading']."', getTouch = '".$_POST['getTouch']."' where id='".$_GET['id']."' ");
  }
	}
	
}
 ?>
<?php include("include/header.php");?>
      <div id="main-content"> <!-- Main Content Section with everything -->.
        <?php include("include/content_header.php"); ?>
        <div class="content-box full_width">
          <div class="content-box-header">
            <h3>Add Slider</h3>
            <div class="clear"></div>
          </div>
          <div class="content-box-content">
            <div class="tab-content default-tab" id="tab1">
            <?PHP
            $query = mysql_query("SELECT * FROM `slider` WHERE id = '".$_GET['id']."'");
			$rs = mysql_fetch_array($query);
			?>
              <form action="" name="myform" method="post" enctype="multipart/form-data" class="data_form">
                Slider Text 
                <p>
                  <input class="text-input small-input" type='text'  name="news_heading" value="<?php echo $rs['h1Tag']; ?>">
                </p>
              
                News href Link
                <p>
                  <input class="text-input small-input" type='text' name="getTouch" value="<?php echo $rs['getTouch']; ?>">
                </p>
                <p>
              <label>Upload Image</label>
              <input class="text-input small-input" type='file' name='upload_image' multiple value=""><i> Maximum 3 images allowed. size 691px; height: 246px applicable.</i>
            </p>
               
                <p>
                  <input class="button" type="submit" name="submit" value="Submit" />
                </p>
                </fieldset>
                <div class="clear"></div>
              </form>
            </div>
            <!-- End #tab1 --> 
            
          </div>
          <!-- End .content-box-content --> 
          
        </div>
        <!-- End .content-box -->
        <?php include("include/footer.php"); ?>
