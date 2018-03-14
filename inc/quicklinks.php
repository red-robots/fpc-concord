<?php 


// Quick Links
$title1 = get_field('title', 'option');
$link1 = get_field('link_1', 'option');
$title2 = get_field('title_2', 'option');
$link2 = get_field('link_2', 'option');
$title3 = get_field('title_3', 'option');
$link3 = get_field('link_3', 'option');
$title4 = get_field('title_4', 'option');
$link4 = get_field('link_4', 'option');

 ?>


<section class="quicklinks">
  <h2>Quick Links</h2>
  <div class="icon-wrap">
    <div class="link">
      <a href="<?php echo $link1 ?>">
        <div class="icon"><i class="fas fa-calendar-alt fa-3x"></i></div>
        <h3><?php echo $title1 ?></h3>
      </a>
    </div>
    <div class="link">
      <a href="<?php echo $link2 ?>">
        <div class="icon"><i class="fas fa-user-plus fa-3x"></i></div>
        <h3><?php echo $title2 ?></h3>
      </a>
    </div>
    <div class="link">
      <a href="<?php echo $link3 ?>">
        <div class="icon"><i class="fal fa-newspaper fa-3x"></i></div>
        <h3><?php echo $title3 ?></h3>
      </a>
    </div>
    <div class="link">
      <a href="<?php echo $link4 ?>">
        <div class="icon"><i class="fas fa-phone fa-3x"></i></div>
        <h3><?php echo $title4 ?></h3>
      </a>
    </div>
  </div>
</section>