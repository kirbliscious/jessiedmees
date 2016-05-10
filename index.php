<?php 
  include("header.php");
  include("works.php");
  include("sidebar.php");
  shuffle($works);
?>




  <div id="Layout">
    <div id="Freewall" class="free-wall">

      <?php $workarraysize = count($works);
            for ($row = 0; $row < $workarraysize; $row++){ 
      ?>
        <div data-toggle="modal" data-target="#<?php echo $works[$row]['work']?>" class="brick <?php echo $works[$row]['category'] . ' ' . $works[$row]['size']?>">
          <div class="img-container">
            <img src="http://localhost/jessiedmees-dev/img/<?php echo $works[$row]['work']?>.png"/>
          </div>
        </div>
      <?php  } ?> <!-- $works -->

    </div> <!-- #Freewall -->

    <?php $workarraysize = count($works);
            for ($row = 0; $row < $workarraysize; $row++){ 
      ?>
    <!-- Modal -->
        <!-- Modal w/text -->
        <?php if (array_key_exists('sidebarswitch', $works[$row])){ ?>

          <div class="modal fade in modal-wsidebar <?php echo $works[$row]['category']?>" id="<?php echo $works[$row]['work']?>">
            <div class="modal-content">
              <aside class="sidebar">
                <div class="sidebar-container">
                  <h1><?php echo $works[$row]['title']?></h1>
                  <ul>
                    <li><?php echo $works[$row]['year']?></li>
                    <li><?php echo $works[$row]['purpose']?></li>
                    <li><?php echo $works[$row]['materials']?></li>
                    <li><?php echo $works[$row]['dimensions']?></li>
                    <li><?php echo $works[$row]['process']?></li>
                  </ul>
                  <p><?php echo $works[$row]['text']?></p>
                </div>
              </aside>
              <div class="modal-body">
         
        <?php } else { ?>

          <!-- Modal w/o text -->
          <div class="modal fade <?php echo $works[$row]['category']?>" id="<?php echo $works[$row]['work']?>">
            <div class="modal-content">
              <div class="modal-body">

        <?php } ?>

              <!-- Images -->
              <?php if (array_key_exists('images', $works[$row])){ 
                $arraysize = count($works[$row]['images']);
                for($i=0; $i<$arraysize; $i++){ ?> 

                  <img src="http://localhost/jessiedmees-dev/img/<?php echo $works[$row]['images'][$i]?>">

                <?php }
              }?>
             
            </div> <!-- .modal-body -->

            <!-- Buttons -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>x</span></button>
            <button type="button" class="next"><span>></span></button>
            <button type="button" class="previous"><span><</span></button>

            <!-- Thumbnails -->
            <?php if (array_key_exists('images', $works[$row])){ ?>
              <ul class="thumbnails">
                
                <?php $arraysize = count($works[$row]['images']);
                for($i=0; $i<$arraysize; $i++){ ?> 
                 <!--  <li></li> -->
                <?php } ?>
              </ul>
            <?php } ?>

          </div> <!-- .modal-content -->
        </div> <!-- .modal -->
      <?php } ?>
  </div> <!-- .layout -->

<?php include("footer.php"); ?>