<?php global $albion_opt;
/**
 * Albion Social Link
 * @package Albion
*/

    if((isset($albion_opt['facebook-url']) && $albion_opt['facebook-url'] !='')
    OR(isset($albion_opt['twitter-url']) && $albion_opt['twitter-url'] !='')
    OR(isset($albion_opt['instagram-url']) && $albion_opt['instagram-url'] !='')
    OR(isset($albion_opt['youtube-url']) && $albion_opt['youtube-url'] !='')
    OR(isset($albion_opt['linkedin-url']) && $albion_opt['linkedin-url'] !='')
    OR(isset($albion_opt['pinterest-url']) && $albion_opt['pinterest-url'] !='')
    OR(isset($albion_opt['google-plus-url']) && $albion_opt['google-plus-url'] !='')
    ) { ?>
        <ul class="social">
            <?php 
                if(isset($albion_opt['facebook-url']) && $albion_opt['facebook-url'] !='') { ?>
                <li><a href="<?php echo esc_url($albion_opt['facebook-url']); ?>" target="_blank"><i class="flaticon-facebook-letter-logo"></i> </a>
                </li>
            <?php } ?>

            <?php 
                if(isset($albion_opt['twitter-url']) && $albion_opt['twitter-url'] !='') { ?>
                <li><a href="<?php echo esc_url($albion_opt['twitter-url']); ?>" target="_blank"><i class="flaticon-twitter"></i> </a>
                </li>
            <?php } ?>
        
            <?php 
                if(isset($albion_opt['instagram-url']) && $albion_opt['instagram-url'] !='') { ?>
                <li><a href="<?php echo esc_url($albion_opt['instagram-url']); ?>" target="_blank"><i class="flaticon-instagram-logo"></i> </a>
                </li>
            <?php } ?>
            
            <?php 
                if(isset($albion_opt['youtube-url']) && $albion_opt['youtube-url'] !='') { ?>
                <li><a href="<?php echo esc_url($albion_opt['youtube-url']); ?>" target="_blank"><i class="flaticon-youtube-play-button"></i> </a>
                </li>
            <?php } ?>
            
            <?php 
                if(isset($albion_opt['linkedin-url']) && $albion_opt['linkedin-url'] !='') { ?>
                <li><a href="<?php echo esc_url($albion_opt['linkedin-url']); ?>" target="_blank"><i class="fa fa-linkedin"></i> </a>
                </li>
            <?php } ?>
            
            <?php 
                if(isset($albion_opt['pinterest-url']) && $albion_opt['pinterest-url'] !='') { ?>
                <li><a href="<?php echo esc_url($albion_opt['pinterest-url']); ?>" target="_blank"><i class="fa fa-pinterest"></i> </a>
                </li>
            <?php } ?>
            
            <?php 
                if(isset($albion_opt['google-plus-url']) && $albion_opt['google-plus-url'] !='') { ?>
                <li><a href="<?php echo esc_url($albion_opt['google-plus-url']); ?>" target="_blank"><i class="fa fa-google-plus"></i> </a>
                </li>
            <?php } ?>
        </ul>	
<?php } ?>
