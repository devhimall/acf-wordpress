<?php

/**
 * Slider Block Template.
 *
 * @param   array  $block               The block settings and attributes.
 * @param   string $content             The block inner HTML (empty).
 * @param   bool   $is_preview          True during AJAX preview.
 * @param   int|string $post_id         The post ID this block is saved to.
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
$testimonials = get_field('testimonials');
// echo "<pre>";
// print_r($testimonials);
// print_r($testimonials['title']);
// echo "</pre>";

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="slide-container">
        <swiper-container class="mySwiper slides" pagination="true" navigation="true" loop="true" pagination-clickable="true" space-between="30"
            slides-per-view="1">
            <?php foreach ($testimonials['slides'] as $member => $mem) {
                $user_name = $mem["name"];
                $user_biography = $mem["biography"];
                $user_ratings = $mem["ratings"];
                $user_company = $mem["company"];
                $user_image = $mem["image"];
                $max_size = 5;
            ?>
                <swiper-slide class="slides__wrapper">
                    <h1 class="slides__title"><?php echo $testimonials['title'] ?></h1>
                    <div class="slides-container__backgroundImg">
                        <img src="<?php echo wp_get_attachment_image_url($user_image['id'], 'full'); ?>" alt="Profile picture of <?php echo esc_attr($user_name); ?>">
                    </div>
                    <div class="slides__slide">

                        <!-- image part of the card -->
                        <div class="slides__image-wrapper">
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


                        <div class="slides__content">
                            <!-- bio of the users -->
                            <?php if ($user_biography): ?>
                                <p class="biography"><?php echo esc_html($user_biography); ?></p>
                            <?php endif; ?>
                            <!-- end of users bio  -->


                            <!-- footer of the card -->
                            <div class="slides__footer">


                                <div class="slides__name-bio">
                                    <?php if ($user_name): ?>
                                        <h3 class="name"><?php echo esc_html($user_name); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($user_company): ?>
                                        <p class="company"><?php echo esc_html($user_company); ?></p>
                                    <?php endif; ?>
                                </div>

                                <?php if ($user_ratings): ?>
                                    <p class="slides__ratings">

                                        <?php for ($i = 1; $i <= $max_size; $i++): ?>
                                            <?php if ((int)$user_ratings > $i): ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orangered" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                </svg>
                                            <?php else: ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-star" viewBox="0 0 16 16">
                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                                                </svg>
                                            <?php endif ?>
                                        <?php endfor; ?>
                                    </p>
                                <?php endif; ?>

                            </div>
                            <!-- end of footer of the card content -->


                        </div>
                        <!-- end of content part of the card -->
                    </div>
                </swiper-slide>

                <!-- ksdjf -->
            <?php } ?>


        </swiper-container>

    </div>



</div>