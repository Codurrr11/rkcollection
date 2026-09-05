<?php
/**
 * RK ADMIN — DUAL-TIER BULKY & FULLY-FEATURED SIDEBAR
 * 
 * Exact reproduction of the reference dual-sidebar in pure white light mode:
 * 1. Slim Left Icon Rail (58px):
 *    - Brand emblem squircle tile at top with 8-spoke asterisk
 *    - Upper icons: Home, Folder, Bell, Chat
 *    - Vertical spacer
 *    - Lower icons: Support Headset, Settings Cog, Theme Moon
 * 2. Main Expanded Menu Panel (236px):
 *    - Profile card: Avatar, "GR8R HRM" / "RK Admin", "Admin", Collapse button |←
 *    - Primary tabs: Dashboard, Employees, Clients (active rounded bubble), Projects
 *    - Section 1: Workforce (Calendrer, Attendance, Interviews, Job & Applications)
 *    - Section 2: Communication (Chat Hub, Payroll & Finance, Reports & Analytics, Integrations)
 *    - Section 3: Projects (Shift Planner, Training Portal, Performance Hub, Expense Claims with colorful ↗ badges & ★ favorite stars)
 *    - Section 4: Administration (Documents, Settings, Help & Center)
 */

$admin_page = isset($admin_page) ? $admin_page : 'dashboard';
?>
<aside class="admin-sidebar" id="adminSidebar" aria-label="Admin navigation">

    <!-- ==============================================================
         1. SLIM LEFT ICON RAIL
         ============================================================== -->
    <div class="admin-sidebar__rail">
        <!-- Top Brand Emblem Tile (Indigo Squircle with 8-spoke asterisk) -->
        <a class="admin-sidebar__rail-brand" href="index.php" title="RK Admin / GR8R HRM">
            <div class="admin-sidebar__rail-logo-tile">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round">
                    <line x1="12" y1="2.5" x2="12" y2="21.5"/>
                    <line x1="2.5" y1="12" x2="21.5" y2="12"/>
                    <line x1="5.28" y1="5.28" x2="18.72" y2="18.72"/>
                    <line x1="18.72" y1="5.28" x2="5.28" y2="18.72"/>
                </svg>
            </div>
        </a>

        <!-- Expand Button in Rail (visible when collapsed) -->
        <button type="button" class="admin-sidebar__rail-btn admin-sidebar__rail-expand" id="adminRailExpandBtn" title="Open sidebar panel" aria-label="Open sidebar panel">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="4" y1="4" x2="4" y2="20"/>
                <polyline points="14 8 18 12 14 16"/>
                <line x1="18" y1="12" x2="8" y2="12"/>
            </svg>
        </button>

        <!-- Upper Quick Navigation Icons -->
        <div class="admin-sidebar__rail-group">
            <a class="admin-sidebar__rail-btn<?php echo $admin_page === 'dashboard' ? ' is-active' : ''; ?>" href="index.php" title="Dashboard">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 10.5 12 3l8 7.5v9a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z"/>
                </svg>
            </a>
            <a class="admin-sidebar__rail-btn" href="#" title="Projects / Folders">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 7v13a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-6.5L10.8 4.6A2 2 0 0 0 9.4 4H5a2 2 0 0 0-2 2z"/>
                </svg>
            </a>
            <a class="admin-sidebar__rail-btn" href="#" title="Notifications">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/>
                    <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>
                </svg>
            </a>
            <a class="admin-sidebar__rail-btn" href="#" title="Chat Hub">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                </svg>
            </a>
        </div>

        <!-- Vertical Spacer -->
        <div class="admin-sidebar__rail-spacer"></div>

        <!-- Lower System Group -->
        <div class="admin-sidebar__rail-group">
            <a class="admin-sidebar__rail-btn" href="#" title="Support & Help">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/>
                </svg>
            </a>
            <a class="admin-sidebar__rail-btn" href="#" title="Settings">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                </svg>
            </a>
            <button type="button" class="admin-sidebar__rail-btn" id="adminThemeToggle" title="Toggle Theme">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- ==============================================================
         2. MAIN EXPANDED NAVIGATION PANEL
         ============================================================== -->
    <div class="admin-sidebar__panel" id="adminSidebarPanel">

        <!-- Header: Profile & Collapse Button |← -->
        <div class="admin-sidebar__panel-header">
            <div class="admin-sidebar__panel-user">
                <img class="admin-sidebar__panel-avatar"
                     src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80"
                     alt="GR8R HRM Admin"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';">
                <span class="admin-sidebar__panel-avatar-fallback" style="display:none;">RK</span>
                <div class="admin-sidebar__panel-user-info">
                    <span class="admin-sidebar__panel-name">GR8R HRM</span>
                    <span class="admin-sidebar__panel-role">Admin</span>
                </div>
            </div>
            <button type="button" class="admin-sidebar__panel-toggle" id="adminPanelCollapseBtn" title="Collapse sidebar panel" aria-label="Collapse panel">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="20" y1="4" x2="20" y2="20"/>
                    <polyline points="10 8 6 12 10 16"/>
                    <line x1="6" y1="12" x2="16" y2="12"/>
                </svg>
            </button>
        </div>

        <!-- Scrollable Navigation Container -->
        <div class="admin-sidebar__panel-body">

            <!-- Primary Nav Links -->
            <ul class="admin-sidebar__nav-list">
                <li>
                    <a class="admin-sidebar__item<?php echo $admin_page === 'dashboard' ? ' is-active' : ''; ?>" href="index.php">
                        <span class="admin-sidebar__item-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 10.5 12 3l8 7.5v9a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z"/>
                            </svg>
                        </span>
                        <span class="admin-sidebar__item-label">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="admin-sidebar__item<?php echo $admin_page === 'employees' ? ' is-active' : ''; ?>" href="#">
                        <span class="admin-sidebar__item-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="3.5"/>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a3.5 3.5 0 0 1 0 6.74"/>
                            </svg>
                        </span>
                        <span class="admin-sidebar__item-label">Employees</span>
                    </a>
                </li>
                <li>
                    <a class="admin-sidebar__item<?php echo $admin_page === 'clients' ? ' is-active' : ''; ?>" href="#">
                        <span class="admin-sidebar__item-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                        </span>
                        <span class="admin-sidebar__item-label">Clients</span>
                    </a>
                </li>
                <li>
                    <a class="admin-sidebar__item<?php echo $admin_page === 'projects' ? ' is-active' : ''; ?>" href="#">
                        <span class="admin-sidebar__item-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 7v13a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-6.5L10.8 4.6A2 2 0 0 0 9.4 4H5a2 2 0 0 0-2 2z"/>
                            </svg>
                        </span>
                        <span class="admin-sidebar__item-label">Projects</span>
                    </a>
                </li>
            </ul>

            <!-- SECTION 1: WORKFORCE -->
            <div class="admin-sidebar__section">
                <button type="button" class="admin-sidebar__section-header" data-toggle-section="workforce">
                    <span class="admin-sidebar__section-title">Workforce</span>
                    <span class="admin-sidebar__section-chevron">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="18 15 12 9 6 15"/>
                        </svg>
                    </span>
                </button>
                <ul class="admin-sidebar__section-list">
                    <li>
                        <a class="admin-sidebar__item" href="#">
                            <span class="admin-sidebar__item-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="18" height="18" x="3" y="4" rx="2.5"/>
                                    <line x1="16" x2="16" y1="2" y2="6"/>
                                    <line x1="8" x2="8" y1="2" y2="6"/>
                                    <line x1="3" x2="21" y1="10" y2="10"/>
                                    <path d="m9 16 2 2 4-4"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Calendrer</span>
                        </a>
                    </li>
                    <li>
                        <a class="admin-sidebar__item" href="#">
                            <span class="admin-sidebar__item-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                                    <rect width="8" height="4" x="8" y="2" rx="1"/>
                                    <line x1="9" x2="15" y1="11" y2="11"/>
                                    <line x1="9" x2="15" y1="15" y2="15"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Attendance</span>
                        </a>
                    </li>
                    <li>
                        <a class="admin-sidebar__item" href="#">
                            <span class="admin-sidebar__item-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="18" height="18" x="3" y="3" rx="4"/>
                                    <circle cx="12" cy="10" r="3"/>
                                    <path d="M7 18a5 5 0 0 1 10 0"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Interviews</span>
                        </a>
                    </li>
                    <li>
                        <a class="admin-sidebar__item" href="#">
                            <span class="admin-sidebar__item-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="14" x="2" y="7" rx="2.5"/>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Job & Applications</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- SECTION 2: COMMUNICATION -->
            <div class="admin-sidebar__section">
                <button type="button" class="admin-sidebar__section-header" data-toggle-section="communication">
                    <span class="admin-sidebar__section-title">Communication</span>
                    <span class="admin-sidebar__section-chevron">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="18 15 12 9 6 15"/>
                        </svg>
                    </span>
                </button>
                <ul class="admin-sidebar__section-list">
                    <li>
                        <a class="admin-sidebar__item" href="#">
                            <span class="admin-sidebar__item-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Chat Hub</span>
                        </a>
                    </li>
                    <li>
                        <a class="admin-sidebar__item" href="#">
                            <span class="admin-sidebar__item-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="9"/>
                                    <line x1="12" y1="7" x2="12" y2="17"/>
                                    <path d="M15 9.5a2.5 2.5 0 0 0-5 0c0 3 5 2 5 5a2.5 2.5 0 0 1-5 0"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Payroll & Finance</span>
                        </a>
                    </li>
                    <li>
                        <a class="admin-sidebar__item" href="#">
                            <span class="admin-sidebar__item-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="18" height="16" x="3" y="4" rx="3"/>
                                    <path d="M7 14v-4"/>
                                    <path d="M12 14v-6"/>
                                    <path d="M17 14v-2"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Reports & Analytics</span>
                        </a>
                    </li>
                    <li>
                        <a class="admin-sidebar__item" href="#">
                            <span class="admin-sidebar__item-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="4" y1="21" x2="20" y2="21"/>
                                    <line x1="4" y1="3" x2="20" y2="3"/>
                                    <line x1="4" y1="12" x2="20" y2="12"/>
                                    <circle cx="8" cy="3" r="2" fill="currentColor"/>
                                    <circle cx="16" cy="12" r="2" fill="currentColor"/>
                                    <circle cx="10" cy="21" r="2" fill="currentColor"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Integrations</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- SECTION 3: PROJECTS (WITH COLORFUL TILES & STAR ICONS) -->
            <div class="admin-sidebar__section">
                <button type="button" class="admin-sidebar__section-header" data-toggle-section="projects">
                    <span class="admin-sidebar__section-title">Projects</span>
                    <span class="admin-sidebar__section-chevron">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="18 15 12 9 6 15"/>
                        </svg>
                    </span>
                </button>
                <ul class="admin-sidebar__section-list">
                    <li>
                        <a class="admin-sidebar__item admin-sidebar__item--project" href="#">
                            <span class="admin-sidebar__tile-badge admin-sidebar__tile-badge--orange">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="7" y1="17" x2="17" y2="7"/>
                                    <polyline points="7 7 17 7 17 17"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Shift Planner</span>
                            <button type="button" class="admin-sidebar__star-btn" title="Add to favorites" aria-label="Favorite Shift Planner">★</button>
                        </a>
                    </li>
                    <li>
                        <a class="admin-sidebar__item admin-sidebar__item--project" href="#">
                            <span class="admin-sidebar__tile-badge admin-sidebar__tile-badge--purple">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="7" y1="17" x2="17" y2="7"/>
                                    <polyline points="7 7 17 7 17 17"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Training Portal</span>
                            <button type="button" class="admin-sidebar__star-btn" title="Add to favorites" aria-label="Favorite Training Portal">★</button>
                        </a>
                    </li>
                    <li>
                        <a class="admin-sidebar__item admin-sidebar__item--project" href="#">
                            <span class="admin-sidebar__tile-badge admin-sidebar__tile-badge--green">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="7" y1="17" x2="17" y2="7"/>
                                    <polyline points="7 7 17 7 17 17"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Performance Hub</span>
                            <button type="button" class="admin-sidebar__star-btn" title="Add to favorites" aria-label="Favorite Performance Hub">★</button>
                        </a>
                    </li>
                    <li>
                        <a class="admin-sidebar__item admin-sidebar__item--project" href="#">
                            <span class="admin-sidebar__tile-badge admin-sidebar__tile-badge--cyan">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="7" y1="17" x2="17" y2="7"/>
                                    <polyline points="7 7 17 7 17 17"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Expense Claims</span>
                            <button type="button" class="admin-sidebar__star-btn" title="Add to favorites" aria-label="Favorite Expense Claims">★</button>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- SECTION 4: ADMINISTRATION -->
            <div class="admin-sidebar__section">
                <button type="button" class="admin-sidebar__section-header" data-toggle-section="administration">
                    <span class="admin-sidebar__section-title">Administration</span>
                    <span class="admin-sidebar__section-chevron">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="18 15 12 9 6 15"/>
                        </svg>
                    </span>
                </button>
                <ul class="admin-sidebar__section-list">
                    <li>
                        <a class="admin-sidebar__item" href="#">
                            <span class="admin-sidebar__item-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Documents</span>
                        </a>
                    </li>
                    <li>
                        <a class="admin-sidebar__item" href="#">
                            <span class="admin-sidebar__item-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="3"/>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a class="admin-sidebar__item" href="#">
                            <span class="admin-sidebar__item-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                                    <circle cx="12" cy="17" r="0.75" fill="currentColor"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label">Help & Center</span>
                        </a>
                    </li>
                    <li>
                        <a class="admin-sidebar__item" href="logout.php" title="Sign out of admin session">
                            <span class="admin-sidebar__item-icon" style="color: #ef4444;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                    <polyline points="16 17 21 12 16 7"/>
                                    <line x1="21" y1="12" x2="9" y2="12"/>
                                </svg>
                            </span>
                            <span class="admin-sidebar__item-label" style="color: #ef4444;">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

    </div>

</aside>
