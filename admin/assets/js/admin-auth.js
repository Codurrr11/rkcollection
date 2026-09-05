/**
 * RK ADMIN — ARCHITECTURAL EDITORIAL AUTH SCRIPT
 * Password visibility toggles, live meter, demo filler, and optimistic loading.
 */

(function () {
    'use strict';

    // 1. Password Visibility Toggle
    document.querySelectorAll('[data-toggle-password]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var targetId = btn.getAttribute('data-toggle-password');
            var input    = document.getElementById(targetId);
            var icon     = btn.querySelector('i');

            if (!input) return;

            if (input.type === 'password') {
                input.type = 'text';
                if (icon) {
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                }
                btn.setAttribute('aria-label', 'Hide password');
            } else {
                input.type = 'password';
                if (icon) {
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
                btn.setAttribute('aria-label', 'Show password');
            }
        });
    });

    // 2. Real-time Password Strength Meter (Register Page)
    var regPassword = document.getElementById('regPassword');
    var meterBars   = document.querySelectorAll('.auth-strength-meter__bar');
    var meterText   = document.getElementById('regPasswordText');

    if (regPassword && meterBars.length > 0) {
        regPassword.addEventListener('input', function () {
            var val = regPassword.value;
            var score = 0;

            if (val.length >= 6) score++;
            if (val.length >= 8) score++;
            if (/[0-9]/.test(val) && /[a-zA-Z]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            var colors = ['#e2e8f0', '#ef4444', '#f59e0b', '#3b82f6', '#10b981'];
            var labels = ['Minimum 6 characters', 'Weak password', 'Fair password', 'Good password', 'Strong password!'];

            meterBars.forEach(function (bar, idx) {
                if (val.length === 0) {
                    bar.style.backgroundColor = '#e2e8f0';
                } else if (idx < score) {
                    bar.style.backgroundColor = colors[score];
                } else {
                    bar.style.backgroundColor = '#e2e8f0';
                }
            });

            if (meterText) {
                meterText.textContent = val.length === 0 ? 'Minimum 6 characters' : labels[score];
                meterText.style.color = val.length === 0 ? '#64748b' : colors[score];
            }
        });
    }

    // 3. Demo Credentials Auto-Fill
    var demoBtn = document.getElementById('authDemoFill');
    if (demoBtn) {
        demoBtn.addEventListener('click', function () {
            var emailInput = document.getElementById('loginEmail');
            var pwdInput   = document.getElementById('loginPassword');
            if (emailInput && pwdInput) {
                emailInput.value = 'admin@rkcollection.com';
                pwdInput.value   = 'admin123';
                emailInput.focus();
            }
        });
    }

    // 4. Lost Password Helper
    var lostPwdLink = document.getElementById('lostPasswordLink');
    if (lostPwdLink) {
        lostPwdLink.addEventListener('click', function (e) {
            e.preventDefault();
            alert('For security compliance, administrative credential recovery must be initiated via the Superadmin or master console.');
        });
    }

    // 5. Optimistic Loading on Form Submit
    var forms = document.querySelectorAll('.auth-editorial-form');
    forms.forEach(function (form) {
        form.addEventListener('submit', function () {
            var submitBtn = form.querySelector('.auth-btn-pill');
            if (submitBtn) {
                submitBtn.classList.add('is-loading');
                submitBtn.disabled = true;
            }
        });
    });

})();
