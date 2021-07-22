
<?php get_header(); ?>

<?php //the_content(); ?>

<!------------------Boucle pour lister les articles------------------>
<?php if (have_posts()): ?>
    <div class="row">
        <?php while (have_posts()): the_post(); ?>
        <div class="col-sm-4">
            <?php get_template_part('parts/post') ?>
        </div>
        <?php endwhile ?>
    </div>
<?php else: ?>
    <h3>Pas d'articles</h3>
<?php endif; ?>
<!----------------fin_Boucle pour lister les articles---------------->

<?php get_footer(); ?>
