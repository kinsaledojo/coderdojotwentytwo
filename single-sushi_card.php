<?php
/*

*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php
	$block_content = do_blocks( '<!-- wp:group {"tagName":"main","backgroundColor":"green-95-white","layout":{"type":"constrained"}} -->
<main class="wp-block-group">  <!-- wp:group {"tagName":"section","align":"full","backgroundColor":"green-40-white","layout":{"type":"default"}} -->
  <section class="wp-block-group alignfull has-green-40-white-background-color has-background" id="hero">
    <!-- wp:query-title {"type":"archive","textAlign":"center","showPrefix":false} /-->
  </section>
  <!-- /wp:group -->
  <!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:post-title /-->

<!-- wp:post-terms {"term":"post_tag"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:post-featured-image /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:page-list /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"75%"} -->
<div class="wp-block-column" style="flex-basis:75%"><!-- wp:post-content /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></main>
<!-- /wp:group -->'
	);
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wp-site-blocks">
    <header class="wp-block-template-part site-header">
		<?php block_header_area(); ?>
    </header>
    <?php $sushi_deck = get_post( get_post_parent());
	get_template_part( 'parts/post-hero', null,
		array(
			'post_thumbnail' => get_the_post_thumbnail_url($sushi_deck->ID),
			'post_title' => $sushi_deck->post_title,
			'post_excerpt' => $sushi_deck->post_excerpt
		));?>
    <main class="is-layout-constrained has-green-95-white-background-color has-background wp-block-group" id="wp--skip-link--target">
        <section class="is-layout-flex wp-container-13 wp-block-columns alignwide">
            <aside class="is-layout-flow wp-block-column" style="flex-basis:25%">
                <ul class="wp-block-page-list has-white-background-color has-background" style="margin-top:0; padding:20px;">
                    <li class="wp-block-pages-list__item">
                        <a class="wp-block-pages-list__item__link" href="<?php echo get_the_permalink($sushi_deck->ID) ?>">Introduction</a>
                    </li>
					<?php $sushi_cards = get_posts( array(
						'title_li'    => '',
						'post_parent'    => $sushi_deck->ID,
						'post_type'   => 'sushi_card',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page' => -1
					) );
					foreach($sushi_cards as $sushi_card) : ?>
                        <li class="wp-block-pages-list__item">
                            <a class="wp-block-pages-list__item__link" href="<?php echo get_the_permalink($sushi_card->ID) ?>"><?php echo $sushi_card->post_title ?></a>
                        </li>
					<?php endforeach; ?>
                </ul>
            </aside>
            <article class="is-layout-flow has-global-padding wp-block-column has-white-background-color has-background" style="flex-basis:75%; padding:20px;">
	            <?php the_title('<h2>', '</h2>') ?>
				<?php the_content() ?>
            </article>
        </section>
    </main>
    <footer class="wp-block-template-part site-footer">
		<?php block_footer_area(); ?>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>