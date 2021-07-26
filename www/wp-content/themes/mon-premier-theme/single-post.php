<?php get_header(); ?>
</div>
<?php if (have_posts()): ?>

    <?php while (have_posts()): the_post(); ?>

        <div class="imgDiv marginTopS col-md-8">
            <img src="<?php the_post_thumbnail_url(); ?>"
                 alt="Image de l'article" width="800px">
        </div>
        <div class="containerLight marginTopS col-md-8">
            <h1 class="singleArticle"><?php the_title() ?></h1>

            <div class="textPropos">
                <h6 class="card-subtitle mb-2 text-muted typeIllustration"> <?php the_terms(get_the_ID(), 'illustrationstyle'); ?> </h6>
                <?php the_content(); ?>
            </div>
        </div>

    <?php endwhile; endif; ?>

<div class="containerDark col-md-8 mb-5">

    <h2 class="sousTitre">Articles relatifs</h2>

    <div class="row">

        <?php
        $terms = array_map(function ($term) {
            return $term->term_id;
        }, get_the_terms(get_post(), 'illustrationstyle'));

        $query = new WP_Query([
            'post_not_in' => [get_the_ID()],
            'post_type' => 'post',
            'posts_per_page' => 3,
            'orderby' => 'rand',
            'tax_query' => [
                [
                    'taxonomy' => 'illustrationstyle',
                    'terms' => $terms,
                ]
            ]
        ]);
        while ($query->have_posts()): $query->the_post();
            ?>
            <div class="col-lg-4 col-md-6">
                <?php get_template_part('parts/card', 'post') ?>
            </div>

        <?php endwhile;
        wp_reset_postdata(); ?>
    </div>

    <?php get_footer(); ?>
