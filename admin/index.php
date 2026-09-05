<?php
/**
 * RK ADMIN — DASHBOARD
 *
 * Rebuilt dashboard matching reference aesthetics:
 * - Unified rich dark slate palette with zero heavy shadows & small 10px rounded borders.
 * - Perfectly aligned 3-column layout ending at exact same bottom level.
 * - Green, gold & cyan vibrant data visualization accents.
 */

$admin_page     = 'dashboard';
$admin_title    = 'Dashboard';
$admin_subtitle = 'Thursday, 5 September 2026';

/* --- Left Column: Profile Card Data --------------------------------------- */
$admin_profile = [
    'name'         => 'Radhika Sharma',
    'role'         => 'Store Manager',
    'avatar'       => 'RS',
    'owner_name'   => 'Vikram RK',
    'owner_role'   => 'Owner',
    'owner_avatar' => 'VR',
    'team'         => 'RK Collections Team',
    'focus'        => ['Banarasi', 'Bridal', 'Merchandising', 'Sourcing'],
    'expert'       => ['Banarasi', 'Bridal']
];

/* --- Left Column: Time Spend Card Data ------------------------------------ */
$admin_time_spend = [
    'range'         => 'This week',
    'date_label'    => 'June 17 – 23',
    'orders_pct'    => 60,
    'catalogue_pct' => 40
];

/* --- Left Column: Feedbacks Data ------------------------------------------ */
$admin_feedbacks = [
    [
        'name'     => 'Alex Thornfield',
        'role'     => 'Frontend Developer',
        'initials' => 'AT',
        'date'     => 'Jun 12',
        'avatar_bg'=> '#e0f2fe',
        'avatar_fg'=> '#0284c7',
        'link'     => '#'
    ],
    [
        'name'     => 'Sophia Marlowe',
        'role'     => 'Team Lead',
        'initials' => 'SM',
        'date'     => 'Jun 12',
        'avatar_bg'=> '#f3e8ff',
        'avatar_fg'=> '#7e22ce',
        'link'     => '#'
    ],
    [
        'name'     => 'Ethan Ravenscroft',
        'role'     => 'Business Analyst',
        'initials' => 'ER',
        'date'     => 'Jun 12',
        'avatar_bg'=> '#dcfce7',
        'avatar_fg'=> '#15803d',
        'link'     => '#'
    ],
    [
        'name'     => 'Liam Brookshire',
        'role'     => 'UX Designer',
        'initials' => 'LB',
        'date'     => 'Jun 12',
        'avatar_bg'=> '#fef3c7',
        'avatar_fg'=> '#b45309',
        'link'     => '#'
    ]
];

/* --- Center Column: Order Pipeline Data ----------------------------------- */
$admin_pipeline = [
    'current'     => 'Order Placed',
    'target'      => 'Delivered',
    'active_step' => 3, // 1: Placed, 2: Confirmed, 3: Packed, 4: Shipped, 5: Delivered
    'steps'       => ['Placed', 'Confirmed', 'Packed', 'Shipped', 'Delivered']
];

/* --- Center Column: Radar Chart Data -------------------------------------- */
$admin_radar_data = [
    'revenue' => [
        'labels'     => ['Banarasi', 'Kanjivaram', 'Cotton', 'Designer', 'Bridal', 'Fancy'],
        'this_month' => [88, 94, 72, 80, 96, 68],
        'last_month' => [72, 82, 62, 68, 84, 58]
    ],
    'orders' => [
        'labels'     => ['Banarasi', 'Kanjivaram', 'Cotton', 'Designer', 'Bridal', 'Fancy'],
        'this_month' => [65, 78, 88, 70, 82, 90],
        'last_month' => [55, 68, 75, 60, 72, 80]
    ],
    'overall' => [
        'labels'     => ['Banarasi', 'Kanjivaram', 'Cotton', 'Designer', 'Bridal', 'Fancy'],
        'this_month' => [82, 90, 78, 76, 92, 75],
        'last_month' => [68, 76, 66, 65, 80, 64]
    ]
];

/* --- Center Column: Recommended Actions Data ----------------------------- */
$admin_actions = [
    'restock' => [
        [
            'icon'     => 'bi-box-seam',
            'title'    => 'Kanjivaram Zari Silk',
            'subtitle' => 'SKU: BRI-PUR-0017 • 1 item remaining in stock',
            'status'   => 'Urgent',
            'tone'     => 'urgent'
        ],
        [
            'icon'     => 'bi-box-seam',
            'title'    => 'Banarasi Kora Zari Silk',
            'subtitle' => 'SKU: BAN-PUR-0001 • 3 items remaining',
            'status'   => 'In Progress',
            'tone'     => 'progress'
        ],
        [
            'icon'     => 'bi-box-seam',
            'title'    => 'Tissue Silk Zari Brocade',
            'subtitle' => 'SKU: SIL-PUR-0002 • 4 items remaining',
            'status'   => 'Urgent',
            'tone'     => 'urgent'
        ]
    ],
    'reviews' => [
        [
            'icon'     => 'bi-star',
            'title'    => 'Review by Ananya Reddi',
            'subtitle' => 'Kanjivaram Bridal Zari Silk Saree (5 Stars)',
            'status'   => 'Pending',
            'tone'     => 'progress'
        ],
        [
            'icon'     => 'bi-star',
            'title'    => 'Review by Meera Iyer',
            'subtitle' => 'Soft Silk Temple Border Saree (4 Stars)',
            'status'   => 'Pending',
            'tone'     => 'progress'
        ]
    ],
    'traffic' => [
        [
            'icon'     => 'bi-graph-down',
            'title'    => 'Organza Printed Saree',
            'subtitle' => 'SKU: ORG-PRT-0009 • Views down -34% this week',
            'status'   => 'Needs Promo',
            'tone'     => 'urgent'
        ],
        [
            'icon'     => 'bi-graph-down',
            'title'    => 'Tussar Handloom Saree',
            'subtitle' => 'SKU: TUS-HND-0012 • Views down -22% this week',
            'status'   => 'Needs Promo',
            'tone'     => 'progress'
        ],
        [
            'icon'     => 'bi-graph-down',
            'title'    => 'Chanderi Zari Border',
            'subtitle' => 'SKU: CHA-ZAR-0005 • Views down -18% this week',
            'status'   => 'Needs Promo',
            'tone'     => 'progress'
        ]
    ]
];

/* --- Right Column: Tasks / Goals Data ------------------------------------- */
$admin_tasks = [
    'tasks' => [
        'today' => [
            [
                'title'   => 'Verify Bridal Weave Stock',
                'status'  => 'To-do',
                'tone'    => 'todo',
                'desc'    => 'Audit 15 new Banarasi sarees received from Varanasi artisan unit.',
                'tags'    => ['Bridal Collection', 'Restock']
            ]
        ],
        'yesterday' => [
            [
                'title'   => 'Conduct Usability Testing Session',
                'status'  => 'Progress',
                'tone'    => 'progress',
                'desc'    => 'Conduct usability testing session for web checkout flow.',
                'tags'    => ['Senior UX Designer', 'Prototyping']
            ],
            [
                'title'   => 'Accessibility Review',
                'status'  => 'Done',
                'tone'    => 'done',
                'desc'    => 'Improve accessibility of web application search modal.',
                'tags'    => ['Senior UX Designer', 'Prototyping']
            ]
        ]
    ],
    'goals' => [
        'today' => [
            [
                'title'   => 'Q3 Sales Milestone',
                'status'  => 'Progress',
                'tone'    => 'progress',
                'desc'    => 'Reach ₹12.5L in total sales for Q3 period.',
                'tags'    => ['Sales Target', 'Revenue']
            ]
        ],
        'yesterday' => [
            [
                'title'   => 'Artisan Onboarding',
                'status'  => 'Done',
                'tone'    => 'done',
                'desc'    => 'Onboard 3 new master weavers from Kanchipuram region.',
                'tags'    => ['Supply Chain', 'Artisans']
            ]
        ]
    ]
];

/* --- Right Column: Latest Activity Data ----------------------------------- */
$admin_activities = [
    [
        'icon'  => 'bi-arrow-left-right',
        'text'  => 'You changed task <strong>Design a user journey map</strong> for a complex workflow status in progress to <strong>Lead review</strong>',
        'time'  => 'Jun 12, 2026, 18:53'
    ],
    [
        'icon'  => 'bi-pencil',
        'text'  => '<strong>Brooklyn Simmons</strong> renamed task <strong>Redesign user interface</strong> to <strong>Redesign a popular app\'s user interface</strong>',
        'time'  => 'Jun 12, 2026, 18:02'
    ],
    [
        'icon'  => 'bi-plus-circle',
        'text'  => '<strong>Brooklyn Simmons</strong> added task <strong>Redesign user interface</strong> for goal <strong>Senior UX designer</strong>',
        'time'  => 'Jun 12, 2026, 16:45'
    ]
];

require __DIR__ . '/includes/header.php';
?>

<div class="admin-dashboard-grid">

    <!-- ==========================================================
         LEFT COLUMN (25%)
         ========================================================== -->
    <div class="admin-dashboard-col admin-dashboard-col--left">

        <!-- 1. Profile Card -->
        <article class="admin-card admin-profile-card">
            <div class="admin-profile-card__head">
                <span class="admin-profile-card__avatar"><?php echo htmlspecialchars($admin_profile['avatar']); ?></span>
                <div class="admin-profile-card__info">
                    <h2 class="admin-profile-card__name"><?php echo htmlspecialchars($admin_profile['name']); ?></h2>
                    <p class="admin-profile-card__role"><?php echo htmlspecialchars($admin_profile['role']); ?></p>
                </div>
            </div>

            <div class="admin-profile-card__divider"></div>

            <div class="admin-profile-card__meta">
                <div class="admin-profile-card__row">
                    <span class="admin-profile-card__label">Reporting to</span>
                    <div class="admin-profile-card__person">
                        <span class="admin-profile-card__mini-avatar"><?php echo htmlspecialchars($admin_profile['owner_avatar']); ?></span>
                        <span class="admin-profile-card__person-name"><?php echo htmlspecialchars($admin_profile['owner_name']); ?></span>
                    </div>
                </div>

                <div class="admin-profile-card__row">
                    <span class="admin-profile-card__label">Team</span>
                    <span class="admin-profile-card__val"><?php echo htmlspecialchars($admin_profile['team']); ?></span>
                </div>
            </div>

            <div class="admin-profile-card__divider"></div>

            <div class="admin-profile-card__section">
                <span class="admin-profile-card__label">Focus Areas</span>
                <div class="admin-profile-card__pills">
                    <?php foreach ($admin_profile['focus'] as $pill): ?>
                        <span class="admin-pill admin-pill--dark-tag"><?php echo htmlspecialchars($pill); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="admin-profile-card__section admin-profile-card__section--sm">
                <span class="admin-profile-card__label">Expert in</span>
                <div class="admin-profile-card__pills">
                    <?php foreach ($admin_profile['expert'] as $pill): ?>
                        <span class="admin-pill admin-pill--dark-tag admin-pill--dark-tag-active"><?php echo htmlspecialchars($pill); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </article>

        <!-- 2. Time Spend Card -->
        <article class="admin-card admin-time-card">
            <header class="admin-widget__head">
                <h2 class="admin-widget__title">Time spend</h2>
                <div class="admin-select-wrapper">
                    <select class="admin-select-sm" id="adminTimeRangeSelect" aria-label="Select time period">
                        <option value="this_week" selected>This week</option>
                        <option value="last_week">Last week</option>
                        <option value="this_month">This month</option>
                    </select>
                </div>
            </header>

            <p class="admin-time-card__sub"><?php echo htmlspecialchars($admin_time_spend['date_label']); ?></p>

            <div class="admin-time-card__bar">
                <span class="admin-time-card__seg admin-time-card__seg--green" style="width: <?php echo (int)$admin_time_spend['orders_pct']; ?>%;"></span>
                <span class="admin-time-card__seg admin-time-card__seg--cyan" style="width: <?php echo (int)$admin_time_spend['catalogue_pct']; ?>%;"></span>
            </div>

            <div class="admin-time-card__legend">
                <span class="admin-time-card__legend-item">
                    <span class="admin-time-card__dot admin-time-card__dot--green"></span>
                    Orders (<?php echo (int)$admin_time_spend['orders_pct']; ?>%)
                </span>
                <span class="admin-time-card__legend-item">
                    <span class="admin-time-card__dot admin-time-card__dot--cyan"></span>
                    Catalogue (<?php echo (int)$admin_time_spend['catalogue_pct']; ?>%)
                </span>
            </div>
        </article>

        <!-- 3. Feedback Card -->
        <article class="admin-card admin-feedback-card">
            <header class="admin-widget__head">
                <h2 class="admin-widget__title">Feedbacks</h2>
            </header>

            <ul class="admin-feedback-list">
                <?php foreach ($admin_feedbacks as $fb): ?>
                    <li class="admin-feedback-item">
                        <div class="admin-feedback-item__user">
                            <span class="admin-feedback-item__avatar" style="background-color: <?php echo $fb['avatar_bg']; ?>; color: <?php echo $fb['avatar_fg']; ?>;">
                                <?php echo htmlspecialchars($fb['initials']); ?>
                            </span>
                            <div class="admin-feedback-item__details">
                                <span class="admin-feedback-item__name"><?php echo htmlspecialchars($fb['name']); ?></span>
                                <span class="admin-feedback-item__role"><?php echo htmlspecialchars($fb['role']); ?></span>
                                <a href="<?php echo htmlspecialchars($fb['link']); ?>" class="admin-feedback-item__link">Leave feedback &rarr;</a>
                            </div>
                        </div>
                        <span class="admin-feedback-item__date"><i class="bi bi-clock" aria-hidden="true"></i> <?php echo htmlspecialchars($fb['date']); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </article>

    </div>

    <!-- ==========================================================
         CENTER COLUMN (45%)
         ========================================================== -->
    <div class="admin-dashboard-col admin-dashboard-col--center">

        <!-- 1. Order Pipeline Card -->
        <article class="admin-card admin-pipeline-card">
            <header class="admin-widget__head">
                <h2 class="admin-widget__title">Order Pipeline</h2>
                <a href="#" class="admin-btn admin-btn--outline-dark">Details</a>
            </header>

            <div class="admin-pipeline-card__labels">
                <span class="admin-pipeline-card__stage">
                    <span class="admin-pipeline-card__stage-lbl">Current</span>
                    <span class="admin-pipeline-card__stage-val"><?php echo htmlspecialchars($admin_pipeline['current']); ?></span>
                </span>
                <span class="admin-pipeline-card__stage admin-pipeline-card__stage--right">
                    <span class="admin-pipeline-card__stage-lbl">Target</span>
                    <span class="admin-pipeline-card__stage-val"><?php echo htmlspecialchars($admin_pipeline['target']); ?></span>
                </span>
            </div>

            <div class="admin-pipeline-track">
                <?php foreach ($admin_pipeline['steps'] as $idx => $step): ?>
                    <?php
                        $stepNum = $idx + 1;
                        $isFilled = $stepNum <= $admin_pipeline['active_step'];
                    ?>
                    <div class="admin-pipeline-track__segment <?php echo $isFilled ? 'is-filled' : ''; ?>" title="<?php echo htmlspecialchars($step); ?>"></div>
                <?php endforeach; ?>
            </div>
        </article>

        <!-- 2. Sales Performance Card (Radar Chart) -->
        <article class="admin-card admin-sales-card">
            <header class="admin-widget__head">
                <h2 class="admin-widget__title">Sales Performance</h2>
                <div class="admin-tabs" role="tablist" aria-label="Sales metric view">
                    <button type="button" class="admin-tabs__btn is-active" role="tab" data-radar-tab="revenue" aria-selected="true">Revenue</button>
                    <button type="button" class="admin-tabs__btn" role="tab" data-radar-tab="orders" aria-selected="false">Orders</button>
                    <button type="button" class="admin-tabs__btn" role="tab" data-radar-tab="overall" aria-selected="false">Overall</button>
                </div>
                <a href="#" class="admin-btn admin-btn--outline-dark">Details</a>
            </header>

            <div class="admin-radar-container">
                <canvas id="adminRadarChart"
                        data-radar='<?php echo htmlspecialchars(json_encode($admin_radar_data), ENT_QUOTES); ?>'
                        aria-label="Sales performance radar chart" role="img"></canvas>
            </div>

            <div class="admin-radar-legend">
                <span class="admin-radar-legend__item">
                    <span class="admin-radar-legend__dot admin-radar-legend__dot--green"></span> Current position
                </span>
                <span class="admin-radar-legend__item">
                    <span class="admin-radar-legend__dot admin-radar-legend__dot--darkgreen"></span> To be
                </span>
            </div>
        </article>

        <!-- 3. Recommended Actions Card -->
        <article class="admin-card admin-actions-card">
            <header class="admin-widget__head admin-widget__head--stacked">
                <h2 class="admin-widget__title">Recommended Actions</h2>
                <div class="admin-tabs" role="tablist" aria-label="Action tabs">
                    <button type="button" class="admin-tabs__btn is-active" role="tab" data-action-tab="restock" aria-selected="true">
                        Restock <span class="admin-tabs__badge">4</span>
                    </button>
                    <button type="button" class="admin-tabs__btn" role="tab" data-action-tab="reviews" aria-selected="false">
                        Pending Reviews <span class="admin-tabs__badge">2</span>
                    </button>
                    <button type="button" class="admin-tabs__btn" role="tab" data-action-tab="traffic" aria-selected="false">
                        Low Traffic <span class="admin-tabs__badge">3</span>
                    </button>
                </div>
            </header>

            <div class="admin-actions-content">
                <?php foreach ($admin_actions as $tabKey => $items): ?>
                    <div class="admin-actions-pane <?php echo $tabKey === 'restock' ? 'is-active' : ''; ?>" id="adminActionPane-<?php echo $tabKey; ?>">
                        <div class="admin-action-grid">
                            <?php foreach ($items as $item): ?>
                                <div class="admin-action-item">
                                    <div class="admin-action-item__icon">
                                        <i class="bi <?php echo htmlspecialchars($item['icon']); ?>" aria-hidden="true"></i>
                                    </div>
                                    <div class="admin-action-item__body">
                                        <div class="admin-action-item__top">
                                            <h3 class="admin-action-item__title"><?php echo htmlspecialchars($item['title']); ?></h3>
                                            <span class="admin-pill admin-pill--<?php echo htmlspecialchars($item['tone']); ?>"><?php echo htmlspecialchars($item['status']); ?></span>
                                        </div>
                                        <p class="admin-action-item__sub"><?php echo htmlspecialchars($item['subtitle']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>

    </div>

    <!-- ==========================================================
         RIGHT COLUMN (30%)
         ========================================================== -->
    <div class="admin-dashboard-col admin-dashboard-col--right">

        <!-- 1. Tasks / Goals Card -->
        <article class="admin-card admin-tasks-card">
            <header class="admin-widget__head">
                <div class="admin-tabs admin-tabs--header" role="tablist" aria-label="Tasks or Goals view">
                    <button type="button" class="admin-tabs__btn is-active" role="tab" data-task-tab="tasks" aria-selected="true">Tasks</button>
                    <button type="button" class="admin-tabs__btn" role="tab" data-task-tab="goals" aria-selected="false">Goals</button>
                </div>
            </header>

            <div class="admin-tasks-container">
                <?php foreach ($admin_tasks as $viewKey => $groups): ?>
                    <div class="admin-tasks-pane <?php echo $viewKey === 'tasks' ? 'is-active' : ''; ?>" id="adminTasksPane-<?php echo $viewKey; ?>">
                        <?php foreach ($groups as $groupLabel => $taskList): ?>
                            <div class="admin-tasks-group">
                                <h3 class="admin-tasks-group__title"><?php echo ucfirst($groupLabel); ?></h3>
                                <div class="admin-tasks-list">
                                    <?php foreach ($taskList as $task): ?>
                                        <div class="admin-task-card">
                                            <div class="admin-task-card__head">
                                                <h4 class="admin-task-card__title"><?php echo htmlspecialchars($task['title']); ?></h4>
                                                <span class="admin-pill admin-pill--<?php echo htmlspecialchars($task['tone']); ?>">
                                                    <?php echo htmlspecialchars($task['status']); ?>
                                                    <span class="admin-pill__dot"></span>
                                                </span>
                                            </div>
                                            <p class="admin-task-card__desc"><?php echo htmlspecialchars($task['desc']); ?></p>
                                            <div class="admin-task-card__tags">
                                                <?php foreach ($task['tags'] as $tag): ?>
                                                    <span class="admin-pill admin-pill--dark-tag"><?php echo htmlspecialchars($tag); ?></span>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <footer class="admin-card-pagination">
                <span class="admin-card-pagination__info" id="adminTasksPageInfo">1 of 3</span>
                <div class="admin-card-pagination__nav">
                    <button type="button" class="admin-card-pagination__btn" id="adminTasksPrev" aria-label="Previous tasks page">
                        <i class="bi bi-chevron-left" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="admin-card-pagination__btn" id="adminTasksNext" aria-label="Next tasks page">
                        <i class="bi bi-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
            </footer>
        </article>

        <!-- 2. Latest Activity Card -->
        <article class="admin-card admin-activity-card">
            <header class="admin-widget__head">
                <h2 class="admin-widget__title">Latest activities</h2>
            </header>

            <ul class="admin-activity-list" id="adminActivityList">
                <?php foreach ($admin_activities as $act): ?>
                    <li class="admin-activity-item">
                        <div class="admin-activity-item__icon">
                            <i class="bi <?php echo htmlspecialchars($act['icon']); ?>" aria-hidden="true"></i>
                        </div>
                        <div class="admin-activity-item__body">
                            <p class="admin-activity-item__text"><?php echo $act['text']; ?></p>
                            <span class="admin-activity-item__time"><?php echo htmlspecialchars($act['time']); ?></span>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <footer class="admin-card-pagination">
                <span class="admin-card-pagination__info" id="adminActivityPageInfo">1 of 3</span>
                <div class="admin-card-pagination__nav">
                    <button type="button" class="admin-card-pagination__btn" id="adminActivityPrev" aria-label="Previous activity page">
                        <i class="bi bi-chevron-left" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="admin-card-pagination__btn" id="adminActivityNext" aria-label="Next activity page">
                        <i class="bi bi-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
            </footer>
        </article>

    </div>

</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
