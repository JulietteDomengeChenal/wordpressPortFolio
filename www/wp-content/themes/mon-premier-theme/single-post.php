<?php get_header(); ?>

<!------------------Boucle pour lister les articles------------------>
<?php if (have_posts()): ?>

    <?php while (have_posts()): the_post(); ?>
        <img src="<?php the_post_thumbnail_url(); ?>"
             alt="Image de l'article" width="800px">
        <?php if(get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true) === '1'): ?>
        <div class="alert alert-info">Cette article est sponsorisé </div>
        <?php endif; ?>

        <h1> <?php the_title() ?> </h1>
        <?php the_content(); ?>
    <?php endwhile; endif; ?>
<!----------------fin_Boucle pour lister les articles---------------->

<?php get_footer(); ?>
