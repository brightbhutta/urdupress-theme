<?php
global $xpanel;
?>
<div class="breaking_head hidden-xs">
    <span id="newsArrows" class="arrows animated infinite flash"></span> <?php echo $xpanel['ticker-label'] ?>
</div>
<div class="breaking_body hidden-xs" id="breakingNews">
    <ul>
        <?php
        // The Query
            $ticker_query = new WP_Query( 'cat='.$xpanel['news-ticker-cat'].'&showposts='.$xpanel['news-ticker-limit'].'' );

            // The Loop
            if ( $ticker_query->have_posts() ) {
                while ( $ticker_query->have_posts() ) {
                    $ticker_query->the_post();
                    echo '<li><a href="'. get_the_permalink() .'">' . get_the_title() . '</a></li>';
                }
            } else {
                // no posts found
            }
            /* Restore original Post Data */
            wp_reset_postdata();
        ?>
    </ul>
</div>