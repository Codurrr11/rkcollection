<?php
$page_title = 'My Account & Profile | RK Collection Luxury Silks';
$page_css   = ['assets/css/pages.css'];
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/products-data.php';

// User Account Dataset
$user = [
    'first_name'       => 'Ananya',
    'last_name'        => 'Reddy',
    'email'            => 'ananya.reddy@example.com',
    'phone'            => '+91 98765 43210',
    'gender'           => 'Female',
    'dob'              => '1994-10-14',
    'dob_display'      => '14 October 1994',
    'member_since'     => 'August 2023',
    'membership'       => 'ROYAL HERITAGE MEMBER',
    'points'           => '1,250 PTS',
    'preferred_weave'  => 'Kanjivaram & Banarasi Pure Silk',
    'city'             => 'Hyderabad, Telangana',
    'avatar'           => 'assets/images/collections/kalanjali-silk-saree.jpg'
];

// Past Orders Dataset
$orders = [
    [
        'order_id'    => '#RK-89421',
        'tracking_id' => 'RK-TRK-984120',
        'date'        => '28 August 2026',
        'status'      => 'DELIVERED',
        'status_type' => 'delivered',
        'product'     => $shop_products[0], // Banarasi Kora Zari Silk Saree
        'color'       => 'Royal Maroon',
        'blouse'      => 'Unstitched Included',
        'price'       => '₹6,999',
        'qty'         => 1,
        'total'       => '₹7,349'
    ],
    [
        'order_id'    => '#RK-84102',
        'tracking_id' => 'RK-TRK-841029',
        'date'        => '14 July 2026',
        'status'      => 'DELIVERED',
        'status_type' => 'delivered',
        'product'     => $shop_products[9], // Kanjivaram Temple Korvai Saree
        'color'       => 'Kanchipuram Gold',
        'blouse'      => 'Custom Stitched (+₹1,200)',
        'price'       => '₹18,400',
        'qty'         => 1,
        'total'       => '₹19,320'
    ]
];

// Saved Addresses Dataset
$addresses = [
    [
        'id'        => 1,
        'is_default'=> true,
        'tag'       => 'PRIMARY RESIDENCE',
        'name'      => 'Ananya Reddy',
        'street'    => 'Plot No. 42, Road No. 12, Jubilee Hills',
        'city'      => 'Hyderabad',
        'state'     => 'Telangana',
        'pincode'   => '500033',
        'phone'     => '+91 98765 43210'
    ],
    [
        'id'        => 2,
        'is_default'=> false,
        'tag'       => 'WORK / STUDIO',
        'name'      => 'Ananya Reddy',
        'street'    => 'RK Heritage Arcade, Floor 3, Banjara Hills',
        'city'      => 'Hyderabad',
        'state'     => 'Telangana',
        'pincode'   => '500034',
        'phone'     => '+91 98765 43210'
    ]
];
?>

<main class="profile-page">

    <!-- BREADCRUMBS -->
    <div class="profile-crumbs-wrapper">
        <nav class="profile-crumbs" aria-label="Breadcrumb navigation">
            <a href="index">HOME</a>
            <span>/</span>
            <span class="active">MY ACCOUNT</span>
        </nav>
    </div>

    <div class="profile-container">
        <div class="profile-layout">

            <!-- 01. LEFT SIDEBAR (MYNTRA / FLIPKART STYLE) -->
            <aside class="profile-sidebar">
                
                <!-- User Header Card -->
                <div class="profile-user-card">
                    <div class="profile-avatar-box">
                        <img src="<?php echo htmlspecialchars($user['avatar']); ?>" alt="Ananya Reddy" class="profile-avatar-img">
                        <button type="button" class="profile-avatar-btn" id="heroChangeAvatarBtn" title="Change Avatar">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                                <circle cx="12" cy="13" r="4"></circle>
                            </svg>
                        </button>
                    </div>

                    <div class="profile-user-info">
                        <span class="profile-greeting">Hello,</span>
                        <h1 class="profile-hero-name"><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h1>
                        <span class="profile-membership-badge"><?php echo htmlspecialchars($user['membership']); ?></span>
                    </div>
                </div>

                <!-- Quick Stat Metrics -->
                <div class="profile-mini-stats">
                    <div class="mini-stat-item">
                        <span class="mini-stat-val">02</span>
                        <span class="mini-stat-lbl">Orders</span>
                    </div>
                    <div class="mini-stat-sep"></div>
                    <div class="mini-stat-item">
                        <span class="mini-stat-val">04</span>
                        <span class="mini-stat-lbl">Wishlist</span>
                    </div>
                    <div class="mini-stat-sep"></div>
                    <div class="mini-stat-item">
                        <span class="mini-stat-val">1,250</span>
                        <span class="mini-stat-lbl">Points</span>
                    </div>
                </div>

                <!-- Sidebar Navigation Menu -->
                <nav class="profile-nav-menu" aria-label="Account Navigation">
                    <div class="profile-tab-list">
                        <button type="button" class="profile-tab-btn active" data-tab="tab-details">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span>Profile Information</span>
                        </button>
                        <button type="button" class="profile-tab-btn" data-tab="tab-orders">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            <span>My Orders</span>
                            <mark class="profile-tab-count">02</mark>
                        </button>
                        <button type="button" class="profile-tab-btn" data-tab="tab-addresses">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <span>Saved Addresses</span>
                        </button>
                        <button type="button" class="profile-tab-btn" data-tab="tab-security">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                            <span>Security & Password</span>
                        </button>
                        <a href="wishlist" class="profile-nav-link">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                            <span>My Wishlist</span>
                        </a>
                    </div>
                </nav>

            </aside>

            <!-- 02. RIGHT MAIN CONTENT PANELS -->
            <div class="profile-main-content">
                <div class="profile-panels-host">

                    <!-- TAB 1: PROFILE DETAILS -->
                    <div class="profile-panel active" id="tab-details">
                        <div class="profile-card">
                            <div class="profile-card-header">
                                <div>
                                    <h2 class="profile-card-heading">Personal Information</h2>
                                    <p class="profile-card-subheading">Manage your contact details and account preferences.</p>
                                </div>
                                <button type="button" class="profile-action-btn" id="toggleEditProfileBtn">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    <span id="editBtnText">EDIT PROFILE</span>
                                </button>
                            </div>

                            <!-- VIEW MODE DISPLAY -->
                            <div class="profile-view-mode" id="profileViewMode">
                                <div class="profile-info-grid">
                                    <div class="profile-info-item">
                                        <span class="profile-info-lbl">First Name</span>
                                        <span class="profile-info-val"><?php echo htmlspecialchars($user['first_name']); ?></span>
                                    </div>
                                    <div class="profile-info-item">
                                        <span class="profile-info-lbl">Last Name</span>
                                        <span class="profile-info-val"><?php echo htmlspecialchars($user['last_name']); ?></span>
                                    </div>
                                    <div class="profile-info-item">
                                        <span class="profile-info-lbl">Email Address</span>
                                        <span class="profile-info-val"><?php echo htmlspecialchars($user['email']); ?></span>
                                    </div>
                                    <div class="profile-info-item">
                                        <span class="profile-info-lbl">Phone Number</span>
                                        <span class="profile-info-val"><?php echo htmlspecialchars($user['phone']); ?></span>
                                    </div>
                                    <div class="profile-info-item">
                                        <span class="profile-info-lbl">Gender</span>
                                        <span class="profile-info-val"><?php echo htmlspecialchars($user['gender']); ?></span>
                                    </div>
                                    <div class="profile-info-item">
                                        <span class="profile-info-lbl">Date of Birth</span>
                                        <span class="profile-info-val"><?php echo htmlspecialchars($user['dob_display']); ?></span>
                                    </div>
                                    <div class="profile-info-item">
                                        <span class="profile-info-lbl">Preferred Weaves</span>
                                        <span class="profile-info-val"><?php echo htmlspecialchars($user['preferred_weave']); ?></span>
                                    </div>
                                    <div class="profile-info-item">
                                        <span class="profile-info-lbl">Location</span>
                                        <span class="profile-info-val"><?php echo htmlspecialchars($user['city']); ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- EDIT MODE FORM -->
                            <form class="profile-edit-mode" id="profileEditMode" style="display: none;" onsubmit="event.preventDefault(); saveProfileChanges();">
                                <div class="profile-form-grid">
                                    <div class="profile-form-field">
                                        <label for="editFirstName" class="profile-form-label">First Name</label>
                                        <input type="text" id="editFirstName" class="profile-form-input" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                                    </div>
                                    <div class="profile-form-field">
                                        <label for="editLastName" class="profile-form-label">Last Name</label>
                                        <input type="text" id="editLastName" class="profile-form-input" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
                                    </div>
                                    <div class="profile-form-field">
                                        <label for="editEmail" class="profile-form-label">Email Address</label>
                                        <input type="email" id="editEmail" class="profile-form-input" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                    </div>
                                    <div class="profile-form-field">
                                        <label for="editPhone" class="profile-form-label">Phone Number</label>
                                        <input type="tel" id="editPhone" class="profile-form-input" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                                    </div>
                                    <div class="profile-form-field">
                                        <label for="editGender" class="profile-form-label">Gender</label>
                                        <select id="editGender" class="profile-form-select">
                                            <option value="Female" selected>Female</option>
                                            <option value="Male">Male</option>
                                            <option value="Other">Other / Prefer not to say</option>
                                        </select>
                                    </div>
                                    <div class="profile-form-field">
                                        <label for="editDob" class="profile-form-label">Date of Birth</label>
                                        <input type="date" id="editDob" class="profile-form-input" value="<?php echo htmlspecialchars($user['dob']); ?>">
                                    </div>
                                </div>

                                <div class="profile-form-actions">
                                    <button type="submit" class="profile-save-btn">SAVE CHANGES</button>
                                    <button type="button" class="profile-cancel-btn" id="cancelEditProfileBtn">CANCEL</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- TAB 2: MY ORDERS -->
                    <div class="profile-panel" id="tab-orders">
                        <div class="profile-card">
                            <div class="profile-card-header">
                                <div>
                                    <h2 class="profile-card-heading">My Orders</h2>
                                    <p class="profile-card-subheading">Track ongoing shipments and view order history.</p>
                                </div>
                            </div>

                            <div class="profile-orders-list">
                                <?php foreach ($orders as $ord): 
                                    $p = $ord['product'];
                                ?>
                                <div class="profile-order-card">
                                    <div class="profile-order-top">
                                        <div class="profile-order-meta">
                                            <span class="profile-order-id"><?php echo htmlspecialchars($ord['order_id']); ?></span>
                                            <span class="profile-order-dot">•</span>
                                            <span class="profile-order-date">Ordered on <?php echo htmlspecialchars($ord['date']); ?></span>
                                        </div>
                                        <span class="profile-order-status profile-order-status--delivered">
                                            ✓ <?php echo htmlspecialchars($ord['status']); ?>
                                        </span>
                                    </div>

                                    <div class="profile-order-body">
                                        <div class="profile-order-thumb">
                                            <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['title']); ?>">
                                        </div>
                                        <div class="profile-order-details">
                                            <a href="<?php echo htmlspecialchars($p['link']); ?>" class="profile-order-title"><?php echo htmlspecialchars($p['title']); ?></a>
                                            <div class="profile-order-specs">
                                                <span>Color: <strong><?php echo htmlspecialchars($ord['color']); ?></strong></span>
                                                <span>Blouse: <strong><?php echo htmlspecialchars($ord['blouse']); ?></strong></span>
                                                <span>Qty: <strong><?php echo $ord['qty']; ?></strong></span>
                                            </div>
                                            <div class="profile-order-price"><?php echo htmlspecialchars($ord['price']); ?></div>
                                        </div>
                                    </div>

                                    <div class="profile-order-bottom">
                                        <div class="profile-order-total">
                                            Total Amount: <strong><?php echo htmlspecialchars($ord['total']); ?></strong>
                                        </div>
                                        <div class="profile-order-btns">
                                            <button type="button" class="profile-order-btn" onclick="alert('Tracking ID: <?php echo $ord['tracking_id']; ?>. Delivered to Jubilee Hills.')">Track Order</button>
                                            <button type="button" class="profile-order-btn" onclick="alert('Downloading Official GST Tax Invoice...')">Invoice</button>
                                            <a href="cart" class="profile-order-btn profile-order-btn--primary">Reorder</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 3: SAVED ADDRESSES -->
                    <div class="profile-panel" id="tab-addresses">
                        <div class="profile-card">
                            <div class="profile-card-header">
                                <div>
                                    <h2 class="profile-card-heading">Saved Addresses</h2>
                                    <p class="profile-card-subheading">Manage your delivery locations for faster checkout.</p>
                                </div>
                                <button type="button" class="profile-action-btn" id="showAddAddressBtn">
                                    + ADD NEW ADDRESS
                                </button>
                            </div>

                            <div class="profile-address-grid">
                                <?php foreach ($addresses as $addr): ?>
                                <div class="profile-address-card <?php echo $addr['is_default'] ? 'is-default' : ''; ?>">
                                    <div class="profile-address-top">
                                        <?php if ($addr['is_default']): ?>
                                            <span class="profile-address-badge">DEFAULT</span>
                                        <?php else: ?>
                                            <span class="profile-address-badge profile-address-badge--alt"><?php echo htmlspecialchars($addr['tag']); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <h4 class="profile-address-name"><?php echo htmlspecialchars($addr['name']); ?></h4>
                                    <p class="profile-address-text">
                                        <?php echo htmlspecialchars($addr['street']); ?><br>
                                        <?php echo htmlspecialchars($addr['city']); ?>, <?php echo htmlspecialchars($addr['state']); ?> - <?php echo htmlspecialchars($addr['pincode']); ?><br>
                                        <span class="profile-address-phone">Mobile: <strong><?php echo htmlspecialchars($addr['phone']); ?></strong></span>
                                    </p>

                                    <div class="profile-address-actions">
                                        <button type="button" class="profile-address-action" onclick="alert('Edit address dialog opened.')">Edit</button>
                                        <?php if (!$addr['is_default']): ?>
                                            <button type="button" class="profile-address-action profile-address-action--delete" onclick="if(confirm('Delete address?')) this.closest('.profile-address-card').remove();">Remove</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 4: SECURITY & PASSWORD -->
                    <div class="profile-panel" id="tab-security">
                        <div class="profile-card">
                            <div class="profile-card-header">
                                <div>
                                    <h2 class="profile-card-heading">Security & Password</h2>
                                    <p class="profile-card-subheading">Update your password to keep your account secure.</p>
                                </div>
                            </div>

                            <form class="profile-security-form" id="securityForm" onsubmit="event.preventDefault(); showProfileToast('✓ Password updated successfully!'); this.reset();">
                                <div class="profile-form-field">
                                    <label for="currPass" class="profile-form-label">Current Password</label>
                                    <input type="password" id="currPass" class="profile-form-input" required placeholder="Enter current password">
                                </div>

                                <div class="profile-form-field">
                                    <label for="newPass" class="profile-form-label">New Password</label>
                                    <input type="password" id="newPass" class="profile-form-input" required placeholder="Minimum 8 characters">
                                </div>

                                <div class="profile-form-field">
                                    <label for="confirmPass" class="profile-form-label">Confirm New Password</label>
                                    <input type="password" id="confirmPass" class="profile-form-input" required placeholder="Re-enter new password">
                                </div>

                                <button type="submit" class="profile-save-btn" style="margin-top: 8px;">UPDATE PASSWORD</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</main>

<!-- TOAST NOTIFICATION -->
<div class="profile-toast-box" id="profileToastBox"></div>

<script src="assets/js/profile.js?v=<?php echo time(); ?>"></script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
