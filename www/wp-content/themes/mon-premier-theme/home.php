<?php get_header(); ?>

</div>

<div class="containerLight marginTopM col-md-8 pb-3">

    <h1 class="titrePage">Galerie</h1>

    <!------------------Boucle pour lister les articles------------------>
    <?php if (have_posts()): ?>
        <div class="row">
            <?php while (have_posts()): the_post(); ?>
                <div class="col-lg-4 col-md-6">
                    <!--                --><?php //get_template_part('parts/card', 'post') ?>
                </div>
            <?php endwhile ?>
        </div>

        <?php montheme_pagination() ?>

    <?php else: ?>
        <h3>Pas d'articles</h3>
    <?php endif; ?>
    <!----------------fin_Boucle pour lister les articles---------------->

    <div>
        <?php echo do_shortcode('[metaslider id="47"]'); ?>
    </div>

</div>
<div class="colorBlend">

</div>

<?php get_footer(); ?>
