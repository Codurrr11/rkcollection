<?php
/**
 * RK COLLECTION — EDITORIAL CONTACT PAGE
 */

$page_title = 'Contact Us | RK Collection — Handwoven Heritage Silks';
$page_css   = ['assets/css/pages.css'];
$page_js    = ['assets/js/contact.js'];

include 'includes/header.php';
?>

<main class="site-main contact-page" id="contactPage">

    <section class="contact-main-section">
        
        <!-- Breadcrumbs -->
        <nav class="contact-breadcrumbs" aria-label="Breadcrumb">
            <a href="index.php">Home</a>
            <span aria-hidden="true">/</span>
            <span>Contact Us</span>
        </nav>

        <!-- Giant Bold Statement Title -->
        <span class="rk-script rk-script--lg">say hello</span>
        <h1 class="contact-statement-title">
            <span>Let's</span>
            <span>Contact Us</span>
        </h1>

        <!-- Editorial Grid: Form Left, Model Right -->
        <div class="contact-editorial-grid">
            
            <!-- Left Form Block -->
            <div class="contact-form-column">
                
                <div class="contact-form-alert" id="formAlert">
                    ✨ Thank you for reaching out. Our team will contact you within 24 hours.
                </div>

                <form id="contactForm" class="contact-editorial-form" method="post" action="#">
                    
                    <div class="contact-form-row">
                        <div class="contact-form-group">
                            <label for="contactName" class="contact-form-label">Name</label>
                            <input type="text" id="contactName" name="name" class="contact-form-input" placeholder="Input your name" required>
                        </div>
                        <div class="contact-form-group">
                            <label for="contactEmail" class="contact-form-label">Email</label>
                            <input type="email" id="contactEmail" name="email" class="contact-form-input" placeholder="Input your email" required>
                        </div>
                    </div>

                    <div class="contact-form-row">
                        <div class="contact-form-group">
                            <label for="contactPhone" class="contact-form-label">Phone</label>
                            <input type="tel" id="contactPhone" name="phone" class="contact-form-input" placeholder="Input phone number" required>
                        </div>
                        <div class="contact-form-group">
                            <label for="contactSubject" class="contact-form-label">Category / Inquiry</label>
                            <select id="contactSubject" name="subject" class="contact-form-select" required>
                                <option value="" disabled selected>Select a Category</option>
                                <option value="Banarasi Sarees">Banarasi Sarees</option>
                                <option value="Kanjivaram Sarees">Kanjivaram Sarees</option>
                                <option value="Mangalagiri Sarees">Mangalagiri Sarees</option>
                                <option value="Cotton Sarees">Cotton Sarees</option>
                                <option value="Silk Sarees">Silk Sarees</option>
                                <option value="Designer Sarees">Designer Sarees</option>
                                <option value="Bridal Sarees">Bridal Sarees</option>
                                <option value="Fancy Sarees">Fancy Sarees</option>
                                <option value="Bespoke Bridal Customization">Bespoke Bridal Trousseau</option>
                                <option value="Virtual Live Video Shopping">Virtual Live Video Shopping Session</option>
                            </select>
                        </div>
                    </div>

                    <div class="contact-form-group contact-form-group--full">
                        <label for="contactMessage" class="contact-form-label">Message</label>
                        <textarea id="contactMessage" name="message" class="contact-form-textarea" placeholder="Input your message here" required></textarea>
                    </div>

                    <button type="submit" class="contact-form-submit">
                        Send Message &rarr;
                    </button>
                </form>
            </div>

            <!-- Right Model Portrait Box -->
            <div class="contact-model-column">
                <div class="contact-model-box">
                    <img src="assets/images/banners/contact-model.jpg" 
                         alt="RK Collection Luxury Saree Model" 
                         class="contact-model-img"
                         loading="eager"
                         decoding="async">
                </div>
            </div>

        </div>

        <!-- Store Locations Block Below -->
        <div class="contact-stores-block" id="storeLocations">
            <div class="contact-stores-head">
                <h2 class="contact-stores-title">Our Store Locations</h2>
                <span class="contact-stores-eyebrow">FOUR BOUTIQUES ACROSS HYDERABAD</span>
            </div>

            <div class="contact-stores-grid">
                
                <!-- 1. KUKATPALLY ROAD NO. 2 -->
                <div class="store-item-col">
                    <div>
                        <div class="store-item-city">Hyderabad (Kukatpally)</div>
                        <h3 class="store-item-name">Kukatpally Rd No. 2</h3>
                        <p class="store-item-address">
                            Lig 67, Rd Number 2, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana - 500072
                        </p>
                        <div class="store-item-meta">
                            <div>Phone: <a href="tel:+918897059175">+91 88970 59175</a></div>
                        </div>
                    </div>
                    <a href="https://maps.google.com/?q=Lig+67+Rd+Number+2+Kukatpally+Hyderabad" target="_blank" rel="noopener" class="store-item-link">
                        Get Directions &rarr;
                    </a>
                </div>

                <!-- 2. DILSUKHNAGAR -->
                <div class="store-item-col">
                    <div>
                        <div class="store-item-city">Hyderabad (Dilsukhnagar)</div>
                        <h3 class="store-item-name">Dilsukhnagar</h3>
                        <p class="store-item-address">
                            7, 28, beside Konark Theatre, 2nd lane, Dilsukhnagar, Hyderabad, Telangana - 500060
                        </p>
                        <div class="store-item-meta">
                            <div>Phone: <a href="tel:+917331122443">+91 73311 22443</a></div>
                        </div>
                    </div>
                    <a href="https://maps.google.com/?q=Konark+Theatre+Dilsukhnagar+Hyderabad" target="_blank" rel="noopener" class="store-item-link">
                        Get Directions &rarr;
                    </a>
                </div>

                <!-- 3. KOTHAPET -->
                <div class="store-item-col">
                    <div>
                        <div class="store-item-city">Hyderabad (Kothapet)</div>
                        <h3 class="store-item-name">Kothapet Main Road</h3>
                        <p class="store-item-address">
                            11-8-117/2, Beside Victoria Memorial Metro Station, Kothapet Main Road, Hyderabad - 500035
                        </p>
                        <div class="store-item-meta">
                            <div>Phone: <a href="tel:+919100472325">+91 91004 72325</a></div>
                        </div>
                    </div>
                    <a href="https://maps.google.com/?q=Victoria+Memorial+Metro+Station+Kothapet+Hyderabad" target="_blank" rel="noopener" class="store-item-link">
                        Get Directions &rarr;
                    </a>
                </div>

                <!-- 4. KPHB PHASE 1 -->
                <div class="store-item-col">
                    <div>
                        <div class="store-item-city">Hyderabad (KPHB Phase 1)</div>
                        <h3 class="store-item-name">KPHB Phase 1</h3>
                        <p class="store-item-address">
                            MIG-224, NH65, K P H B Phase 1, Kukatpally, Hyderabad, Telangana - 500072
                        </p>
                        <div class="store-item-meta">
                            <div>Phone: <a href="tel:+919704179175">+91 97041 79175</a></div>
                        </div>
                    </div>
                    <a href="https://maps.google.com/?q=MIG+224+KPHB+Phase+1+Hyderabad" target="_blank" rel="noopener" class="store-item-link">
                        Get Directions &rarr;
                    </a>
                </div>

            </div>
        </div>

    </section>

</main>

<?php include 'includes/footer.php'; ?>
