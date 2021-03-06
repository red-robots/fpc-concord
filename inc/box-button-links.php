<?php 
  /*
    Section for the Extra Page buttons

  */
    if( have_rows('buttons') ) : ?>
      <section class="donation-links sections">
      <!-- <h2>Donation Links</h2> -->
      <div class="linkouts">
        <?php while( have_rows('buttons') ) : the_row();

        $title = get_sub_field('title');
        $img = get_sub_field('image');
        $qdesc = get_sub_field('quick_description');
        $link = get_sub_field('link');
        $btnText = get_sub_field('button_text_optional');
        if( $btnText != '') {
          $btnUse = $btnText;
        } else {
          $btnUse = 'CLICK HERE';
        }
        
       ?>

        <div class="linkbox">
          <h3><?php echo $title; ?></h3>
            <?php if( $img ) { ?>
              <div class="img">
                <img src="<?php echo $img['url']; ?>" src="<?php echo $img['alt']; ?>">
              </div>
            <?php } ?>
            <?php if( $qdesc ) { ?>
              <div class="desc"><?php echo $qdesc; ?></div>
            <?php } ?>
          <div class="btn">
            <a href="<?php echo $link; ?>">
              <?php echo $btnUse; ?>  <i class="fas fa-chevron-circle-right"></i>
            </a>
          </div>
        </div>

  <?php endwhile; ?>
  </div>
  </section>
<?php endif; ?>