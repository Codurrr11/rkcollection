/**
 * RK COLLECTION — CONTACT & ATELIERS INTERACTION SCRIPT
 */

document.addEventListener('DOMContentLoaded', function () {
    const contactForm = document.getElementById('contactForm');
    const formAlert = document.getElementById('formAlert');
    const storeSelect = document.getElementById('contactStore');

    // Handle "Book Appointment" or store inquiry buttons from cards
    const bookButtons = document.querySelectorAll('[data-book-store]');
    bookButtons.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const storeVal = this.getAttribute('data-book-store');
            if (storeSelect && storeVal) {
                storeSelect.value = storeVal;
            }
            const formSection = document.getElementById('contactFormSection');
            if (formSection) {
                formSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Handle Form Submit
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const submitBtn = contactForm.querySelector('.contact-form__submit');
            const originalText = submitBtn ? submitBtn.innerHTML : 'Submit Inquiry';

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Sending Inquiry...';
            }

            // Simulate smooth luxury submission
            setTimeout(function () {
                if (formAlert) {
                    formAlert.style.display = 'block';
                    formAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }

                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }

                contactForm.reset();
            }, 800);
        });
    }
});
