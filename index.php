<?php 
  include("header.php");
  include ("works.php");
  shuffle($works);
?>
  <aside class="sidebar">
    <header>
      <div id="Logo"><img src="http://localhost/jessiedmees-dev/img/logo_silver.png"></div>
      <h1>Jessie D. Mees</h1>
    </header>
    <div id="Scroll_Right">
      <span>Scroll Right</span>
      <img src="http://localhost/jessiedmees-dev/img/_hand.png">
    </div>
    <div class="menu-btn" id="menu-btn">
        <div></div>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <ul class="filter-items">
      <li class="filter-label active">All</li>
      <li class="filter-label" data-filter=".wearables">Wearables</li>
      <li class="filter-label" data-filter=".paintings">Paintings</li>
      <li class="filter-label" data-filter=".senior">Senior</li>
      <li class="filter-label" data-filter=".undergrad">Undergrad</li>
    </ul>
  </aside>


  <div id="Layout">
    <div id="Freewall" class="free-wall">

      <?php $workarraysize = count($works);
            for ($row = 0; $row < $workarraysize; $row++){ 
      ?>
        <div data-toggle="modal" data-target="#<?php echo $works[$row]['work']?>" class="brick focuspoint <?php echo $works[$row]['category'] . ' ' . $works[$row]['size']?>" style="background:url(http://localhost/jessiedmees-dev/img/<?php echo $works[$row]['work']?>.png) no-repeat center fixed;  -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
          <div class="overlay"><div class="overlay-top"></div><div class="overlay-bottom"></div><div class="overlay-left"></div><div class="overlay-right"></div></div>
        </div>

        <div class="modal fade in" id="<?php echo $works[$row]['work']?>">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>x</span></button>
          <div class="modal-content">
          <aside class="modal-sidebar sidebar">
              <h1><?php echo $works[$row]['title']?></h1>
              <ul>
                <li><?php echo $works[$row]['year']?></li>
                <li><?php echo $works[$row]['purpose']?></li>
                <li><?php echo $works[$row]['materials']?></li>
                <li><?php echo $works[$row]['dimensions']?></li>
                <li><?php echo $works[$row]['process']?></li>
              </ul>
              <p><?php echo $works[$row]['text']?></p>
            </aside>
            <div class="modal-body">
              <img src="http://localhost/jessiedmees-dev/img/<?php echo $works[$row]['work']?>.png">
              <?php $arraysize = count($works[$row]['images']);
                for($i=0; $i<$arraysize; $i++){?>
                <img src="http://localhost/jessiedmees-dev/img/<?php echo $works[$row]['images'][$i]?>">
              <?php }?>
            </div>
          </div>
        </div>
      <?php  } ?>

    </div>
  </div> <!-- .layout -->

  


<?php include("footer.php"); ?>