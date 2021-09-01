<h1 class="page-title">
    <?php
    if ( is_category() ) :
        printf( __( 'Archives: %s', 'snf_subsidiary' ), '<span>' . single_cat_title( '', false ) . '</span>' );
    elseif ( is_tag() ) :
        printf( __( 'Archives: %s', 'snf_subsidiary' ), '<span>' . single_tag_title( '', false ) . '</span>' );
    elseif ( is_author() ) :
        printf( __( 'Author: %s', 'snf_subsidiary' ), '<span class="vcard">' . get_the_author() . '</span>' );
    elseif ( is_day() ) :
        printf( __( 'Day: %s', 'snf_subsidiary' ), '<span>' . get_the_date() . '</span>' );
    elseif ( is_month() ) :
        printf( __( 'Month: %s', 'snf_subsidiary' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'snf_subsidiary' ) ) . '</span>' );
    elseif ( is_year() ) :
        printf( __( 'Year: %s', 'snf_subsidiary' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'snf_subsidiary' ) ) . '</span>' );
    elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
        _e( 'Asides', 'snf_subsidiary' );
    elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
        _e( 'Galleries', 'snf_subsidiary');
    elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
        _e( 'Images', 'snf_subsidiary');
    elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
        _e( 'Videos', 'snf_subsidiary' );
    elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
        _e( 'Quotes', 'snf_subsidiary' );
    elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
        _e( 'Links', 'snf_subsidiary' );
    elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
        _e( 'Statuses', 'snf_subsidiary' );
    elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
        _e( 'Audios', 'snf_subsidiary' );
    elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
        _e( 'Chats', 'snf_subsidiary' );
    else :
        _e( 'Archives', 'snf_subsidiary' );
    endif;
    ?>
</h1>