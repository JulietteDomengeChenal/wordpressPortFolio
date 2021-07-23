<?php get_header(); ?>

    <div class="imgDiv">
        <?php the_post_thumbnail('full', ['class' => 'img-responsive responsive--full imgAccueil']); ?>
    </div>
</div>


<div class="containerLight col-md-8">
<!--    <h1> --><?//= get_queried_object()->name ?><!-- </h1>-->
    <h1 class="titrePage">Styles d'illustration</h1>
    <div class="textPropos">

        <?php
//        $args = array(
//            'public'   => true,
//            '_builtin' => false
//        );
//        $output = 'names'; // or objects
//        $operator = 'and'; // 'and' or 'or'
//        $taxonomies = get_taxonomies( $args, $output, $operator );
//        if ( $taxonomies ) {
//            echo '<ul>';
//            foreach ( $taxonomies  as $taxonomy ) {
//                echo '<li>' . $taxonomy . '</li>';
//            }
//            echo '</ul>';
//        }
        ?>

        <?php the_content(); ?>
    </div>
</div>
<?php get_footer(); ?>
