<?php

/**
 * Slider Block Template.
 *
 * @param   array  $block     The block settings and attributes.
 * @param   string $content   The block inner HTML (empty).
 * @param   bool   $is_preview True during AJAX preview.
 * @param   int|string $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if (! empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if (! empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (! empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if ($is_preview) {
    $className .= ' is-admin';
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if (have_rows('slides')) : ?>
        <div class="slides">
            <?php while (have_rows('slides')) : the_row();
                // storing the slides result into individual variables
                $user_name  = get_sub_field('name');
                $user_biography = get_sub_field('biography');
                $user_ratings   = get_sub_field('ratings');
                $user_company   = get_sub_field('company');
                $user_image     = get_sub_field('image');
            ?>
                <div class="slide-wrapper">
                    <div class="slide">

                        <!-- image part of the card -->
                        <div class="image-wrapper">
                            <?php
                            if (is_array($user_image) && isset($user_image['id'])) {
                                echo wp_get_attachment_image($user_image['id'], 'full');
                            } else {
                                echo '<p>Profile image is not available.</p>';
                            }
                            ?>
                        </div>

                        <!-- end of image part -->

                        <!-- content part of the card -->

                        <div class="content">
                            <!-- bio of the users -->
                            <?php if ($user_biography): ?>
                                <p class="biography"><?php echo esc_html($user_biography); ?></p>
                            <?php endif; ?>
                            <!-- end of users bio  -->

                            <!-- footer of the card -->
                            <div class="footer">

                                <div class="name-bio">
                                    <?php if ($user_name): ?>
                                        <h3 class="name"><?php echo esc_html($user_name); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($user_company): ?>
                                        <p class="company">Company: <?php echo esc_html($user_company); ?></p>
                                    <?php endif; ?>
                                </div>

                                <?php if ($user_ratings): ?>
                                    <p class="ratings">Ratings: <?php echo esc_html($user_ratings); ?></p>
                                <?php endif; ?>
                            </div>
                            <!-- end of footer of the card content -->

                        </div>
                        <!-- end of content part of the card -->
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>Please add some slides.</p>
    <?php endif; ?>
</div>