<?php get_header(); ?>

<?php if (have_posts()): ?>

    <?php while (have_posts()): the_post(); ?>

<!--        <h1> --><?php //the_title() ?><!-- </h1>-->

        <div class="imgDiv marginTopL">
            <?php the_post_thumbnail('full', ['class' => 'img-responsive responsive--full imgAccueil']); ?>
        </div>
<!--        <a href="--><?//= get_post_type_archive_link('post')  ?><!--"> Voir les dernières actualités</a>-->

    <?php endwhile; endif; ?>


</div>
<div class="containerLight marginTopM col-md-8">
    <h1 class="titrePage">À propos</h1>
    <div class="textPropos">
        <?php the_content(); ?>
    </div>
</div>

<div class="containerDark col-md-8 mt-3 mb-5">

    <div class="row">

        <?php
        $query = new WP_Query([
            'post_not_in' => [get_the_ID()],
            'post_type' => 'post',
            'posts_per_page' => 3,
            'orderby' => 'rand',
            'tax_query' => [
                [
                    'taxonomy' => 'illustrationstyle',
                    'field' => 'slug',
                    'terms' => 'noirblanc',
                ]
            ]
        ]);
        while($query->have_posts()): $query->the_post();
            ?>
            <div class="col-lg-4 col-md-6">
                <?php get_template_part('parts/card', 'post') ?>
            </div>

        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>


<?php get_footer(); ?>
