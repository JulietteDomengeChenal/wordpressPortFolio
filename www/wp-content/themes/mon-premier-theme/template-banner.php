<?php
/**
 * Template Name: Page avec bannière
 * Template Post Type: page, article
 */
?>

<?php get_header(); ?>

<!------------------Boucle pour lister les articles------------------>
<?php if (have_posts()): ?>

    <?php while (have_posts()): the_post(); ?>
        <img src="<?php the_post_thumbnail_url(); ?>"
             alt="Image de l'article" width="800px">
        <h1> <?php the_title() ?> </h1>
        <?php the_content(); ?>
    <?php endwhile; endif; ?>
<!----------------fin_Boucle pour lister les articles---------------->

<?php get_footer(); ?>
