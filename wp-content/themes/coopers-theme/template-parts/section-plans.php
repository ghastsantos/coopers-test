<section class="plans-section">
  <div class="container">
    <div class="plans-content">
      <div class="plans-grid">
        
        <?php if(get_field('basic_plan_active')): ?>
        <div class="plan-card basic-plan">
          <div class="plan-header">
            <div class="plan-price">
              <span class="currency">R$</span>
              <span class="amount"><?php the_field('basic_plan_price'); ?></span>
              <span class="period">/ mês</span>
            </div>
            <h3 class="plan-title"><?php the_field('basic_plan_title') ?: 'Basic Plan'; ?></h3>
            <p class="plan-subtitle"><?php the_field('basic_plan_subtitle') ?: 'unlimited tasks'; ?></p>
          </div>
          
          <div class="plan-features">
            <ul class="features-list">
              <?php 
              $i = 1;
              while(true):
                $feature_text = get_field("basic_feature_{$i}_text");
                if(!$feature_text) break;
                
                $feature_included = get_field("basic_feature_{$i}_included");
              ?>
                <li class="feature-item <?php echo $feature_included ? 'included' : 'not-included'; ?>">
                  <span class="feature-icon">
                    <?php if($feature_included): ?>
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="12" fill="#4AC959"/>
                        <path d="M10 15L7 12L8.41 10.59L10 12.17L15.59 6.58L17 8L10 15Z" fill="white"/>
                      </svg>
                    <?php else: ?>
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="12" fill="#FF4607"/>
                        <path d="M8 8L16 16M16 8L8 16" stroke="white" stroke-width="2" stroke-linecap="round"/>
                      </svg>
                    <?php endif; ?>
                  </span>
                  <span class="feature-text"><?php echo esc_html($feature_text); ?></span>
                </li>
              <?php 
                $i++;
              endwhile; 
              ?>
            </ul>
          </div>
          
          <div class="plan-footer">
            <?php 
            $basic_button_text = get_field('basic_plan_button_text') ?: 'get in touch';
            $basic_button_url = get_field('basic_plan_button_url');
            ?>
            <a href="<?php echo esc_url($basic_button_url ?: '#'); ?>" class="btn-plan btn-basic">
              <?php echo esc_html($basic_button_text); ?>
            </a>
          </div>
        </div>
        <?php endif; ?>
        
        <?php if(get_field('pro_plan_active')): ?>
        <div class="plan-card pro-plan">
          <div class="plan-header">
            <div class="plan-price">
              <span class="currency">R$</span>
              <span class="amount"><?php the_field('pro_plan_price'); ?></span>
              <span class="period">/ mês</span>
            </div>
            <h3 class="plan-title"><?php the_field('pro_plan_title') ?: 'Pro Plan'; ?></h3>
            <p class="plan-subtitle"><?php the_field('pro_plan_subtitle') ?: 'unlimited everything'; ?></p>
          </div>
          
          <div class="plan-features">
            <ul class="features-list">
              <?php 
              $i = 1;
              while(true):
                $feature_text = get_field("pro_feature_{$i}_text");
                if(!$feature_text) break;

                $feature_included = get_field("pro_feature_{$i}_included");
              ?>
                <li class="feature-item <?php echo $feature_included ? 'included' : 'not-included'; ?>">
                  <span class="feature-icon">
                    <?php if($feature_included): ?>
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="12" fill="#4AC959"/>
                        <path d="M10 15L7 12L8.41 10.59L10 12.17L15.59 6.58L17 8L10 15Z" fill="white"/>
                      </svg>
                    <?php else: ?>
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="12" fill="#FF4607"/>
                        <path d="M8 8L16 16M16 8L8 16" stroke="white" stroke-width="2" stroke-linecap="round"/>
                      </svg>
                    <?php endif; ?>
                  </span>
                  <span class="feature-text"><?php echo esc_html($feature_text); ?></span>
                </li>
              <?php 
                $i++;
              endwhile; 
              ?>
            </ul>
          </div>
          
          <div class="plan-footer">
            <?php 
            $pro_button_text = get_field('pro_plan_button_text') ?: 'get in touch';
            $pro_button_url = get_field('pro_plan_button_url');
            ?>
            <a href="<?php echo esc_url($pro_button_url ?: '#'); ?>" class="btn-plan btn-pro">
              <?php echo esc_html($pro_button_text); ?>
            </a>
          </div>
        </div>
        <?php endif; ?>
        
      </div>
    </div>

    <div class="plans-triangle-decoration"></div>

    <?php 
    $plans_bg_image = get_field('plans_background_image');
    if($plans_bg_image): ?>
      <div class="plans-bg-image">
        <img src="<?php echo esc_url($plans_bg_image['url']); ?>" alt="<?php echo esc_attr($plans_bg_image['alt']); ?>">
      </div>
    <?php endif; ?>
  </div>
</section>