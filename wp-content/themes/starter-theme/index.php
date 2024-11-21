<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="container">

			<?php

			$args = array(
				'post_type' => 'team', // Specify the custom post type
				'posts_per_page' => 4, // Number of posts to display (-1 means all)
			);
			$team_query = new WP_Query($args);
			// Start the loop to display "team" posts
			if ($team_query->have_posts()):
				while ($team_query->have_posts()):
					$team_query->the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="post-meta">
							<span>Posted on <?php the_date(); ?></span>
							<span>by <?php the_author(); ?></span>
						</div>
						<div class="post-content">
							<?php the_excerpt(); // Display excerpt ?>
						</div>
					</article>
					<?php
				endwhile;
				// Reset post data to the default query
				wp_reset_postdata();
			else:
				echo '<p>No team posts found.</p>';
			endif;

			?>

		</div><!-- .container -->

	</main>
</div><!-- #primary -->