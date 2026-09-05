<?php
/**
 * RK ADMIN — CLOSING SHELL AND SCRIPTS
 * Chart.js is the only charting library in the admin; admin.js reads each
 * canvas's data-* attributes so no chart config lives inline.
 */
?>
        </main>

        <footer class="admin-footer">
            <p class="admin-footer__text">RK Collection Admin &middot; UI preview</p>
            <p class="admin-footer__meta">Last synced just now</p>
        </footer>

    </div><!-- /.admin-main -->
</div><!-- /.admin-layout -->

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script src="assets/js/admin.js?v=<?php echo time(); ?>"></script>
</body>
</html>
