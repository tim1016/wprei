<div class="event-summary">
    <a class="event-summary__date event-summary__date--beige u-center-text" href="<?php the_permalink();?>">
        <span class="event-summary__month"> <?php the_time('M')?>  </span>
        <span class="event-summary__day"><?php the_time('j')?> </span>  
    </a>
    <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
        <p><?php echo wp_trim_words( get_the_content(), 18)?> <a href="<?php the_permalink();?>" class="nu gray">Read more</a></p>
    </div>
</div>  