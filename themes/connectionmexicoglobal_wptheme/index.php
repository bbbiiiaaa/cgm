<?php get_header(); ?>

<?php
#cats:
#3 Electoral
#5 Energial
#6 Gubernamental
?>

<?php $cats = array(3, 5, 6); ?>
<?php $sliders = array();?>
<?php foreach ($cats as $cat) {
		//Get sliders
	$args = array(
		'posts_per_page'   => 1,
		'cat'         	   => $cat,
	  	'meta_key'         => 'cgm_progido_meta',
		'meta_value'       => '1',
		'post_type'        => 'post',
		'post_status'      => 'publish'
	);
	$slider = get_posts($args);
	$sliders[] = $slider[0];
}
?>
<pre>
<?php print_r($sliders);?>
</pre>

<!-- //Slider -->
<div class="slider-wrap">
	<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
	<!-- Carousel indicators -->
		<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
	<!-- Carousel items -->
		<div class="carousel-inner">
			<?php
				$i = 0;
			foreach ($sliders as $post): ?>
				<?php setup_postdata( $post ); ?>

				<div class="item <?php if($i==1){ echo"active"; } ?>">
					<?php $thumb_id = get_post_thumbnail_id($post->ID);?>
					<?php $thumb_src = wp_get_attachment_image_src($thumb_id , 'full' ); ?> 
					<img src="<?php echo $thumb_src[0];?>" >

					<div class="description">
						<div class="container">
							<div class="row">
								<div class="col-6">
									<h1><?php the_title(); ?></h1>
									<span class="details"><?php echo date('F Y', strtotime($post->post_date));?> | </span>
									<span class="details">categoria</span><br><!-- porfavor, que quede en CSS!-->
									<span class="details">
										<?php
										$terminos = get_the_terms( $post->ID, 'cgm_estado_tax' );
										if( is_array($terminos) ){
											foreach ($terminos as $termino) {
												if($termino->parent !== 0){
													echo $termino->name;
													break;
												}
											}
											foreach ($terminos as $termino) {
												if($termino->parent == 0){
													echo ', ';
													echo $termino->name;
													break;
												}
											}

										}
										?>
									</span>
									<br />
									<div class="editor">
										<?php echo $post->post_content; ?>
									</div>
									<a href="<?php the_permalink();?>"><span class="read">Leer Mas</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>

			<?php
			$i++;
			endforeach;
			?>
			<?php wp_reset_postdata();?>
		</div>
		<!-- Carousel nav -->
		<a class="carousel-control left" href="#myCarousel" data-slide="prev">
				<
				<!--<span class="glyphicon glyphicon-chevron-left"></span>-->
		</a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next">
				>
				<!--<span class="glyphicon glyphicon-chevron-right"></span>-->
		</a>
	</div>
</div>
<!-- // Slider -->


<?php $pages = query_posts('page_id=37'); ?>

<!--// wrap-general -->
<div class="wrap-general">
	<div class="container">
		<?php foreach ($pages as $page): ?>
		<h1 class="title-center">Quienes Somos?</h1>
		<div class="row">
			<div class="col-4 dash">
				<h1><?php echo $page->post_title; ?></h1>
				<?php echo $page->post_content; ?>
				<div class="row">
					<div class="col-4">

					</div>
					<div class="col-2">
						<img src="img/map_small.png" alt="Mapa small" class="">
					</div>
				</div>
			</div>
			<div class="col-2">
				<h1>Servicios</h1>
				<ul class="lateral-menu">
					<li><a href="#">social</a></li>
					<li><a href="#" class="active">social</a></li>
					<li><a href="#">social</a></li>
					<li><a href="#">social</a></li>
				</ul>
			</div>
		</div>
		<?php endforeach; ?>

		<!--
		<div class="row">
			<h1>Ultimos Articulos</h1>
			<div class="col-3">
				<div class="last-article">
					<img src="img/preview.png" class="preview" alt="">
					<h2>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</h2>
					<span class="details">{{date}} | {{autor}}</span>
					<br />
					<span class="details">{{location}}</span>
					<div class="overview">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
					</div>
					<a href="#"><span class="read">leer más</span></a>
				</div>
			</div>
			<div class="col-3">
				<div class="last-article">
					<img src="img/preview.png" class="preview" alt="">
					<h2>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</h2>
					<span class="details">{{date}} | {{autor}}</span>
					<br />
					<span class="details">{{location}}</span>
					<div class="overview">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
					</div>
					<a href="#"><span class="read">leer más</span></a>
				</div>
			</div>
		</div>-->
	</div>
</div>
<!--// wrap-general -->

<?php $pages = query_posts('page_id=1'); ?>

<div class="container">
  <div class="row">
    <h1>Ultimos Articulos</h1>
    <?php if(have_posts()):?>
      <?php while(have_posts()): the_post();?>

        <div class="col-3">
          <div class="last-article">
            <?php echo the_post_thumbnail( 'col3', 'class="preview"' ); ?>
            <h2><?php the_title();?></h2>
            <span class="details"><?php the_date(); ?> | <?php the_author(); ?></span>
						<br />
						<span class="details"><?php the_category(); ?></span>
            <div class="overview">
              <?php the_content();?>
            </div>
            <a href="#"><span class="read">leer más</span></a>
          </div>
        </div>

      <?php endwhile;?>
    <?php endif;?>
  </div>
</div>

<?php get_footer(); ?>
