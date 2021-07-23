<?php get_header(); ?>



<?php if (have_posts()): ?>

    <?php while (have_posts()): the_post(); ?>

<!--        <h1> --><?php //the_title() ?><!-- </h1>-->
        <?php the_content(); ?>

        <div class="imgAccueil mt-5">
            <?php the_post_thumbnail('full', ['class' => 'img-responsive responsive--full']); ?>
        </div>
<!--        <a href="--><?//= get_post_type_archive_link('post')  ?><!--"> Voir les dernières actualités</a>-->

    <?php endwhile; endif; ?>
</div>
<div class="containerLight col-md-8">
    <h1>Hello</h1>
</div>

<?php get_footer(); ?>
