<section class="hero">
  <div class="hero-bg"></div>
  
  <div class="container">
    <div class="hero-content">
      <h1><?php 
        $hero_title = get_field('hero_title');
        echo $hero_title ? $hero_title : 'Organize';
      ?></h1>
      <?php 
      $hero_subtitle = get_field('hero_subtitle');
      ?>
      <h2 class="hero-subtitle"><?php echo $hero_subtitle ? $hero_subtitle : 'your daily jobs'; ?></h2>
      <?php 
      $hero_description = get_field('hero_description');
      ?>
      <p class="hero-description"><?php echo $hero_description ? $hero_description : 'the only way to get things done.'; ?></p>
      
      <?php 
      $hero_button_text = get_field('hero_button_text');
      $hero_button_url = get_field('hero_button_url');
      $button_text = $hero_button_text ? $hero_button_text : 'Meet the To-do-list';
      $button_url = $hero_button_url ? $hero_button_url : '#todolist';
      ?>
      <a href="<?php echo esc_url($button_url); ?>" class="btn-hero">
        <?php echo esc_html($button_text); ?>
      </a>
    </div>
    <div class="hero-image">
      <?php 
      $hero_image = get_field('hero_image');
      if($hero_image): ?>
        <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">
      <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-placeholder.jpg" alt="Hero Image">
      <?php endif; ?>
    </div>
  </div>
</section>