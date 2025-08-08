<section class="contact-section">
  <div class="container">
    <div class="contact-wrapper">
      
      <!-- Left Side - Photo with Green Background -->
      <div class="contact-left">
        <div class="contact-image-wrapper">
          <!-- Green Rectangle Background -->
          <div class="green-background"></div>
          
          <!-- Profile Photo -->
          <?php 
          $contact_photo = get_field('contact_photo');
          if($contact_photo): ?>
            <div class="contact-photo">
              <img src="<?php echo esc_url($contact_photo['url']); ?>" alt="<?php echo esc_attr($contact_photo['alt']); ?>">
            </div>
          <?php else: ?>
            <div class="contact-photo">
              <div class="placeholder-photo"></div>
            </div>
          <?php endif; ?>
        </div>
      </div>
      
      <!-- Right Side - Contact Form -->
      <div class="contact-right">
        <div class="contact-form-container">
          
          <!-- Title with Icon -->
          <div class="contact-header">
            <div class="contact-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="2" y="4" width="20" height="16" rx="2" stroke="#4AC959" stroke-width="2"/>
                <path d="M2 6L12 13L22 6" stroke="#4AC959" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <h2 class="contact-title">
              <?php echo get_field('contact_title') ?: 'GET IN TOUCH'; ?>
            </h2>
          </div>
          
          <!-- Contact Form -->
          <form class="contact-form" id="contactForm" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="submit_contact_form">
            <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
            
            <!-- Name Field -->
            <div class="form-group">
              <label for="contact_name" class="form-label">
                <?php echo get_field('contact_name_label') ?: 'Your name'; ?>
              </label>
              <input 
                type="text" 
                id="contact_name" 
                name="contact_name" 
                class="form-input" 
                placeholder="<?php echo get_field('contact_name_placeholder') ?: 'type your name here...'; ?>"
                required
              >
            </div>
            
            <!-- Email and Phone Row -->
            <div class="form-row">
              <!-- Email Field -->
              <div class="form-group form-group-half">
                <label for="contact_email" class="form-label">
                  <?php echo get_field('contact_email_label') ?: 'Email*'; ?>
                </label>
                <input 
                  type="email" 
                  id="contact_email" 
                  name="contact_email" 
                  class="form-input" 
                  placeholder="<?php echo get_field('contact_email_placeholder') ?: 'example@example.com'; ?>"
                  required
                >
              </div>
              
              <!-- Phone Field -->
              <div class="form-group form-group-half">
                <label for="contact_phone" class="form-label">
                  <?php echo get_field('contact_phone_label') ?: 'Telephone*'; ?>
                </label>
                <input 
                  type="tel" 
                  id="contact_phone" 
                  name="contact_phone" 
                  class="form-input" 
                  placeholder="<?php echo get_field('contact_phone_placeholder') ?: '(  ) _____ ____'; ?>"
                  required
                >
              </div>
            </div>
            
            <!-- Message Field -->
            <div class="form-group">
              <label for="contact_message" class="form-label">
                <?php echo get_field('contact_message_label') ?: 'Message*'; ?>
              </label>
              <textarea 
                id="contact_message" 
                name="contact_message" 
                class="form-textarea" 
                rows="4"
                placeholder="<?php echo get_field('contact_message_placeholder') ?: 'Type what you want to say to us'; ?>"
                required
              ></textarea>
            </div>
            
            <!-- Submit Button -->
            <div class="form-submit">
              <button type="submit" class="contact-submit-btn">
                <?php echo get_field('contact_button_text') ?: 'SEND NOW'; ?>
              </button>
            </div>
            
            <!-- Form Messages -->
            <div class="form-messages" id="formMessages"></div>
            
          </form>
          
        </div>
      </div>
      
    </div>
  </div>
</section>

<?php
// Handle form submission
function handle_contact_form_submission() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        wp_die('Security check failed');
    }
    
    // Sanitize form data
    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $phone = sanitize_text_field($_POST['contact_phone']);
    $message = sanitize_textarea_field($_POST['contact_message']);
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        wp_redirect(add_query_arg('contact_error', 'required_fields', wp_get_referer()));
        exit;
    }
    
    // Validate email
    if (!is_email($email)) {
        wp_redirect(add_query_arg('contact_error', 'invalid_email', wp_get_referer()));
        exit;
    }
    
    // Prepare email
    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission - ' . get_bloginfo('name');
    $body = "New contact form submission:\n\n";
    $body .= "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Phone: " . $phone . "\n";
    $body .= "Message:\n" . $message . "\n\n";
    $body .= "Sent from: " . home_url();
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );
    
    // Send email
    $sent = wp_mail($to, $subject, $body, $headers);
    
    if ($sent) {
        wp_redirect(add_query_arg('contact_success', '1', wp_get_referer()));
    } else {
        wp_redirect(add_query_arg('contact_error', 'send_failed', wp_get_referer()));
    }
    exit;
}
add_action('admin_post_submit_contact_form', 'handle_contact_form_submission');
add_action('admin_post_nopriv_submit_contact_form', 'handle_contact_form_submission');
?>