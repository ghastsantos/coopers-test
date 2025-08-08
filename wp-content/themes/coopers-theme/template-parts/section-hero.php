<section class="hero">
  <div class="container">
    <div class="hero-content">
      <h1><?php the_field('hero_title'); ?></h1>
      <?php if(get_field('hero_subtitle')): ?>
        <p class="hero-subtitle"><?php the_field('hero_subtitle'); ?></p>
      <?php endif; ?>
      <?php if(get_field('hero_description')): ?>
        <p class="hero-description"><?php the_field('hero_description'); ?></p>
      <?php endif; ?>
      <?php 
      $hero_button_text = get_field('hero_button_text');
      $hero_button_url = get_field('hero_button_url');
      if($hero_button_text && $hero_button_url): ?>
        <a href="<?php echo esc_url($hero_button_url); ?>" class="btn-hero">
          <?php echo esc_html($hero_button_text); ?>
        </a>
      <?php endif; ?>
    </div>
    <div class="hero-image">
      <?php 
      $hero_image = get_field('hero_image');
      if($hero_image): ?>
        <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">
      <?php endif; ?>
    </div>
  </div>
</section>