<?php include("include/config.php");
include("include/function.php");
include("include/validation.php");
	
 ?>
<?php include("include/header.php");?>
      <div id="main-content"> <!-- Main Content Section with everything -->
        <?php include("include/content_header.php"); ?>
        <div class="content-box">
          <div class="content-box-header">
            <h3>Manage News</h3>
            <div class="clear"></div>
          </div>
          <div class="content-box-content">
            <div class="tab-content default-tab" id="tab1">
              <table>
                <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>Caption</th>
                    <th>Link</th>
                    <th>Images</th>
                    <th>Status</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                            $psql = "SELECT * FROM `slider` order by id desc";
							$query = mysql_query($psql);
							$sr = 1;
							while($rs = mysql_fetch_array($query)){
							?>
                  <tr>
                    <td><?php echo $sr; ?></td>
                    <td><?php echo $rs['h1Tag']; ?></td>
                          <td><?php echo $rs['getTouch']; ?></td>
                          
                              
                    <td><img src="<?php echo $rs['sliderImage']; ?>" height="80px" width="80px" style="border:none" alt="" /> </td>
                    <td><a href="active.php?page=slider&id=<?php echo $rs['id']; ?>&active=<?php echo $rs['is_active']; ?>">
                <?php if($rs['is_active'] == 1){?>
                <img src="resources/images/icons/active.png" style="border:none; width:18px; height:18px;" />
                <?php }else{?>
                <img src="resources/images/icons/deactivate.png" style="border:none; width:18px; height:18px;" />
                <?php } ;?>
                </a></td>
                    <td><!-- Icons --> 
                      <a href="manageSlider.php?id=<?php echo $rs['id']; ?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a> <a href="delete.php?page=slider&id=<?php echo $rs['id']; ?>" title="Delete" onclick ="return confirm('Are You Sure?');" ><img src="resources/images/icons/cross.png" alt="Delete" /></a></td>
                  </tr>
                  <?php $sr++;}?>
                </tbody>
              </table>
            </div>
            <!-- End #tab1 --> 
            
          </div>
          <!-- End .content-box-content --> 
          
        </div>
        <!-- End .content-box -->
        <?php include("include/footer.php"); ?>
