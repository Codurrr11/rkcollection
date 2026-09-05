/**
 * RK COLLECTION — LUXURY PROFILE CONTROLLER
 * Handles horizontal tab switching, in-line profile editing, and toast alerts.
 */

function showProfileToast(msg) {
    const toast = document.getElementById('profileToastBox');
    if (!toast) return;
    toast.textContent = msg;
    toast.classList.add('show');
    setTimeout(() => {
        toast.classList.remove('show');
    }, 3000);
}

document.addEventListener('DOMContentLoaded', function () {
    const tabBtns = document.querySelectorAll('.profile-tab-btn');
    const panels = document.querySelectorAll('.profile-panel');
    const toggleEditProfileBtn = document.getElementById('toggleEditProfileBtn');
    const cancelEditProfileBtn = document.getElementById('cancelEditProfileBtn');
    const profileViewMode = document.getElementById('profileViewMode');
    const profileEditMode = document.getElementById('profileEditMode');
    const editBtnText = document.getElementById('editBtnText');
    const heroChangeAvatarBtn = document.getElementById('heroChangeAvatarBtn');

    // Horizontal Tab Switching
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const target = this.getAttribute('data-tab');

            tabBtns.forEach(b => b.classList.remove('active'));
            panels.forEach(p => p.classList.remove('active'));

            this.classList.add('active');
            const targetPanel = document.getElementById(target);
            if (targetPanel) {
                targetPanel.classList.add('active');
            }
        });
    });

    // Toggle In-line Edit Profile Mode
    if (toggleEditProfileBtn && profileViewMode && profileEditMode) {
        toggleEditProfileBtn.addEventListener('click', function () {
            if (profileEditMode.style.display === 'none') {
                profileViewMode.style.display = 'none';
                profileEditMode.style.display = 'block';
                if (editBtnText) editBtnText.textContent = 'CANCEL';
            } else {
                profileViewMode.style.display = 'block';
                profileEditMode.style.display = 'none';
                if (editBtnText) editBtnText.textContent = 'EDIT PROFILE';
            }
        });
    }

    if (cancelEditProfileBtn && profileViewMode && profileEditMode) {
        cancelEditProfileBtn.addEventListener('click', function () {
            profileViewMode.style.display = 'block';
            profileEditMode.style.display = 'none';
            if (editBtnText) editBtnText.textContent = 'EDIT PROFILE';
        });
    }

    // Avatar Upload Button
    if (heroChangeAvatarBtn) {
        heroChangeAvatarBtn.addEventListener('click', function () {
            showProfileToast('📷 Avatar edit clicked. Select image file to update avatar.');
        });
    }
});

// Save Profile Changes
function saveProfileChanges() {
    const firstName = document.getElementById('editFirstName').value.trim();
    const lastName = document.getElementById('editLastName').value.trim();
    const email = document.getElementById('editEmail').value.trim();
    const phone = document.getElementById('editPhone').value.trim();

    if (firstName && lastName) {
        const heroName = document.querySelector('.profile-hero-name');
        if (heroName) heroName.textContent = firstName + ' ' + lastName;
    }

    const profileViewMode = document.getElementById('profileViewMode');
    const profileEditMode = document.getElementById('profileEditMode');
    const editBtnText = document.getElementById('editBtnText');

    if (profileViewMode && profileEditMode) {
        profileViewMode.style.display = 'block';
        profileEditMode.style.display = 'none';
        if (editBtnText) editBtnText.textContent = 'EDIT PROFILE';
    }

    showProfileToast('✓ Profile information updated successfully!');
}
