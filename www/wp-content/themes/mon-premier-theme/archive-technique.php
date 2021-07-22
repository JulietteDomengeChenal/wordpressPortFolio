<?php get_header(); ?>

<h1>Voir toutes les techniques</h1>

<!------------------Boucle pour lister les articles------------------>
<?php if (have_posts()): ?>
    <div class="row">
        <?php while (have_posts()): the_post(); ?>
            <div class="col-sm-4">
                <?php get_template_part('parts/card', 'post') ?>
            </div>
        <?php endwhile ?>
    </div>

    <?php montheme_pagination() ?>

<?php else: ?>
    <h3>Pas d'articles</h3>
<?php endif; ?>
<!----------------fin_Boucle pour lister les articles---------------->

<?php get_footer(); ?>
