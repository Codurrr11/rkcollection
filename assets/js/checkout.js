/* ==========================================================================
   RK COLLECTION — CHECKOUT
   Payment selection highlight + form validation before order confirmation.
   ========================================================================== */

(function () {
    'use strict';

    var form = document.getElementById('checkoutForm');
    if (!form) {
        return;
    }

    var alertBox = document.getElementById('checkoutAlert');
    var placeBtn = document.querySelector('.checkout-place-btn');

    /* Payment option highlight ------------------------------------------- */
    var options = Array.prototype.slice.call(document.querySelectorAll('.checkout-pay__option'));

    options.forEach(function (opt) {
        opt.addEventListener('change', function () {
            options.forEach(function (o) {
                o.classList.toggle('is-selected', o.querySelector('.checkout-pay__radio').checked);
            });
        });
    });

    /* Validation ---------------------------------------------------------- */
    function say(message, isError) {
        if (!alertBox) {
            return;
        }
        alertBox.textContent = message;
        alertBox.classList.toggle('is-error', !!isError);
        alertBox.hidden = false;
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    function validate() {
        var missing = [];

        form.querySelectorAll('[required]').forEach(function (field) {
            var empty = !field.value.trim();
            field.classList.toggle('is-invalid', empty);
            if (empty) {
                missing.push(field);
            }
        });

        var email = document.getElementById('coEmail');
        if (email && email.value.trim() && !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email.value.trim())) {
            email.classList.add('is-invalid');
            missing.push(email);
        }

        var phone = document.getElementById('coPhone');
        if (phone && phone.value.trim() && phone.value.replace(/\D/g, '').length < 10) {
            phone.classList.add('is-invalid');
            missing.push(phone);
        }

        var pin = document.getElementById('coPin');
        if (pin && pin.value.trim() && !/^\d{6}$/.test(pin.value.trim())) {
            pin.classList.add('is-invalid');
            missing.push(pin);
        }

        return missing;
    }

    form.addEventListener('input', function (e) {
        if (e.target.classList.contains('is-invalid') && e.target.value.trim()) {
            e.target.classList.remove('is-invalid');
        }
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        var missing = validate();
        if (missing.length) {
            say('Please complete the highlighted fields before placing your order.', true);
            missing[0].focus();
            return;
        }

        if (placeBtn) {
            placeBtn.disabled = true;
            placeBtn.textContent = 'Placing order…';
        }

        window.setTimeout(function () {
            say('Thank you — your order is confirmed. A confirmation email is on its way, and your sarees ship within 24 working hours.', false);
            if (placeBtn) {
                placeBtn.textContent = 'Order Placed';
            }
        }, 900);
    });
}());
