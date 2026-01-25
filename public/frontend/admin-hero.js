// Admin Hero Section JavaScript
// Check if variables already exist to avoid redeclaration
if (typeof deleteHeroId === 'undefined') {
    var deleteHeroId = null;
}
if (typeof isEditMode === 'undefined') {
    var isEditMode = false;
}

// Ensure functions are available globally
(function() {
    'use strict';
    
    // This will run when the script loads
    console.log('Admin Hero JS loaded');
})();

// Helper function to show toast - uses global toast function from main.js
function showToast(type, message) {
    // Use the global toast function from main.js (same as login page)
    // Check both window.toast and toast (in case it's available globally)
    if (typeof window.toast === 'function') {
        try {
            window.toast(type, message);
            return;
        } catch (e) {
            console.error('Error calling window.toast:', e);
        }
    }
    
    if (typeof toast === 'function') {
        try {
            toast(type, message);
            return;
        } catch (e) {
            console.error('Error calling toast:', e);
        }
    }
    
    // Fallback: Try after a small delay in case toast is still loading
    setTimeout(() => {
        if (typeof window.toast === 'function') {
            window.toast(type, message);
        } else if (typeof toast === 'function') {
            toast(type, message);
        } else {
            // Final fallback - use Bootstrap toast if available
            console.log(`${type.toUpperCase()}: ${message}`);
            // Don't use alert, just log
        }
    }, 100);
}

// Toggle Action Menu
function toggleActionMenu(button) {
    const dropdown = button.nextElementSibling;
    const allDropdowns = document.querySelectorAll('.admin-hero-action-dropdown');
    
    allDropdowns.forEach(d => {
        if (d !== dropdown) {
            d.classList.remove('show');
        }
    });
    
    if (dropdown.classList.contains('show')) {
        dropdown.classList.remove('show');
    } else {
        const rect = button.getBoundingClientRect();
        dropdown.style.top = (rect.bottom + 5) + 'px';
        dropdown.style.left = (rect.right - 180) + 'px';
        dropdown.classList.add('show');
    }
}

// Close action menus when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('.admin-hero-action-menu')) {
        document.querySelectorAll('.admin-hero-action-dropdown').forEach(dropdown => {
            dropdown.classList.remove('show');
        });
    }
});

// Close All Modals
function closeAllModals() {
    document.querySelectorAll('.admin-hero-action-dropdown').forEach(dropdown => {
        dropdown.classList.remove('show');
    });
    
    const heroPanel = document.getElementById('heroPanel');
    const heroPanelOverlay = document.getElementById('heroPanelOverlay');
    if (heroPanel && heroPanel.classList.contains('show')) {
        heroPanel.classList.remove('show');
        heroPanelOverlay.classList.remove('show');
    }
    
    const viewModal = document.getElementById('viewHeroModal');
    if (viewModal && viewModal.classList.contains('show')) {
        viewModal.classList.remove('show');
    }
    
    const deleteModal = document.getElementById('deleteHeroModal');
    if (deleteModal && deleteModal.classList.contains('show')) {
        deleteModal.classList.remove('show');
    }
    
    document.body.style.overflow = '';
}

// Open Hero Modal
function openHeroModal() {
    try {
        closeAllModals();
        setTimeout(() => {
            isEditMode = false;
            const heroModalTitle = document.getElementById('heroModalTitle');
            const heroPanelOverlay = document.getElementById('heroPanelOverlay');
            const heroPanel = document.getElementById('heroPanel');
            
            if (!heroModalTitle || !heroPanelOverlay || !heroPanel) {
                console.error('Hero panel elements not found');
                showToast('error', 'Error: Hero panel elements not found. Please refresh the page.');
                return;
            }
            
            heroModalTitle.textContent = 'Add New Hero Section';
            resetHeroForm();
            heroPanelOverlay.classList.add('show');
            heroPanel.classList.add('show');
            document.body.style.overflow = 'hidden';
        }, 300);
    } catch(error) {
        console.error('Error opening hero modal:', error);
        showToast('error', 'Error opening form. Please refresh the page.');
    }
}

// Close Hero Panel
function closeHeroPanel() {
    document.getElementById('heroPanelOverlay').classList.remove('show');
    document.getElementById('heroPanel').classList.remove('show');
    document.body.style.overflow = '';
    resetHeroForm();
}

// Reset Hero Form
function resetHeroForm() {
    document.getElementById('heroForm').reset();
    document.getElementById('heroId').value = '';
    document.getElementById('hero_type').value = 'image';
    document.querySelectorAll('.admin-hero-image-preview').forEach(img => {
        img.style.display = 'none';
        img.src = '';
    });
    document.querySelectorAll('.admin-hero-remove-image-btn').forEach(btn => {
        btn.style.display = 'none';
    });
    document.getElementById('preview_video').style.display = 'none';
    document.getElementById('preview_video').src = '';
    document.getElementById('remove_video_btn').style.display = 'none';
    selectHeroType('image');
}

// Select Hero Type
function selectHeroType(type) {
    if (type === 'image') {
        document.getElementById('imageSection').style.display = 'block';
        document.getElementById('videoSection').style.display = 'none';
    } else {
        document.getElementById('imageSection').style.display = 'none';
        document.getElementById('videoSection').style.display = 'block';
    }
}

// Preview Image
function previewImage(index, input) {
    const preview = document.getElementById(`preview_image_${index}`);
    const removeBtn = document.getElementById(`remove_btn_${index}`);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            if (removeBtn) removeBtn.style.display = 'flex';
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
        if (removeBtn) removeBtn.style.display = 'none';
    }
}

// Remove Image
function removeImage(index) {
    const imageInput = document.getElementById(`image_${index}`);
    const preview = document.getElementById(`preview_image_${index}`);
    const removeBtn = document.getElementById(`remove_btn_${index}`);
    const existingImage = document.getElementById(`existing_image_${index}`);
    
    if (imageInput) imageInput.value = '';
    if (existingImage) existingImage.value = '';
    if (preview) {
        preview.src = '';
        preview.style.display = 'none';
    }
    if (removeBtn) removeBtn.style.display = 'none';
}

// Preview Video
function previewVideo(input) {
    const preview = document.getElementById('preview_video');
    const removeBtn = document.getElementById('remove_video_btn');
    if (input.files && input.files[0]) {
        const url = URL.createObjectURL(input.files[0]);
        preview.src = url;
        preview.style.display = 'block';
        if (removeBtn) removeBtn.style.display = 'flex';
    } else {
        preview.style.display = 'none';
        if (removeBtn) removeBtn.style.display = 'none';
    }
}

// Remove Video
function removeVideo() {
    const videoInput = document.getElementById('video');
    const preview = document.getElementById('preview_video');
    const removeBtn = document.getElementById('remove_video_btn');
    const existingVideo = document.getElementById('existing_video');
    
    if (videoInput) videoInput.value = '';
    if (existingVideo) existingVideo.value = '';
    if (preview) {
        preview.src = '';
        preview.style.display = 'none';
    }
    if (removeBtn) removeBtn.style.display = 'none';
}

// Save Hero Section
function saveHeroSection() {
    const form = document.getElementById('heroForm');
    const formData = new FormData(form);
    
    const heroId = document.getElementById('heroId').value;
    const type = document.getElementById('hero_type').value;
    
    // Basic validation
    if (type === 'image') {
        let hasImage = false;
        for (let i = 1; i <= 3; i++) {
            const imageInput = document.getElementById(`image_${i}`);
            if (imageInput && imageInput.files && imageInput.files[0]) {
                hasImage = true;
                break;
            }
            if (heroId && document.getElementById(`existing_image_${i}`).value) {
                hasImage = true;
                break;
            }
        }
        if (!heroId && !hasImage) {
            showToast('error', 'Please upload at least one image');
            return;
        }
    } else {
        const videoInput = document.getElementById('video');
        if (!heroId && (!videoInput.files || !videoInput.files[0]) && !document.getElementById('existing_video').value) {
            showToast('error', 'Please upload a video');
            return;
        }
    }
    
    const url = heroId ? `/admin/hero-section/${heroId}` : '/admin/hero-section';
    const method = heroId ? 'PUT' : 'POST';
    
    if (heroId) {
        formData.append('_method', 'PUT');
    }
    
    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast('success', data.message);
            closeHeroPanel();
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            showToast('error', data.message || 'An error occurred');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('error', 'An error occurred while saving the hero section');
    });
}

// View Hero Section
function viewHeroSection(id) {
    closeAllModals();
    setTimeout(() => {
        fetch(`/admin/hero-section/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const hero = data.data;
                const viewBody = document.getElementById('viewHeroBody');
                
                let content = '';
                
                // Main content section
                if (hero.type === 'image' && hero.images && hero.images.length > 0) {
                    content += '<div class="admin-hero-view-main-content">';
                    content += '<h4 class="admin-hero-view-section-title">Images</h4>';
                    content += '<div class="admin-hero-view-images-grid">';
                    hero.images.forEach((img, index) => {
                        content += `
                            <div class="admin-hero-view-image-card">
                                <div class="admin-hero-view-image-wrapper">
                                    <img src="/${img.image}" alt="Image ${index + 1}" class="admin-hero-view-image">
                                </div>
                                <div class="admin-hero-view-image-content">
                                    <h6 class="admin-hero-view-image-title">${img.title || 'No Title'}</h6>
                                    <p class="admin-hero-view-image-desc">${img.description || 'No Description'}</p>
                                </div>
                            </div>
                        `;
                    });
                    content += '</div></div>';
                } else if (hero.type === 'video' && hero.video) {
                    content += '<div class="admin-hero-view-main-content">';
                    content += '<h4 class="admin-hero-view-section-title">Video</h4>';
                    content += `
                        <div class="admin-hero-view-video-card">
                            <div class="admin-hero-view-video-wrapper">
                                <video class="admin-hero-view-video" controls>
                                    <source src="/${hero.video}" type="video/mp4">
                                </video>
                            </div>
                            <div class="admin-hero-view-video-content">
                                <h6 class="admin-hero-view-video-title">${hero.video_title || 'No Title'}</h6>
                                <p class="admin-hero-view-video-desc">${hero.video_description || 'No Description'}</p>
                                ${hero.video_extra ? `<p class="admin-hero-view-video-extra"><strong>Extra:</strong> ${hero.video_extra}</p>` : ''}
                            </div>
                        </div>
                    `;
                    content += '</div>';
                }
                
                // Information section with clear labels
                content += '<div class="admin-hero-view-info-section">';
                content += '<h4 class="admin-hero-view-section-title">Details</h4>';
                content += '<div class="admin-hero-view-info-grid">';
                
                content += `
                    <div class="admin-hero-view-info-item">
                        <div class="admin-hero-view-info-label">Type</div>
                        <div class="admin-hero-view-info-value">
                            <span class="badge ${hero.type === 'image' ? 'bg-primary' : 'bg-success'}">${hero.type.toUpperCase()}</span>
                        </div>
                    </div>
                    <div class="admin-hero-view-info-item">
                        <div class="admin-hero-view-info-label">Status</div>
                        <div class="admin-hero-view-info-value">
                            <span class="badge ${hero.is_active ? 'bg-success' : 'bg-danger'}">${hero.is_active ? 'Active' : 'Inactive'}</span>
                        </div>
                    </div>
                `;
                
                if (hero.title) {
                    content += `
                        <div class="admin-hero-view-info-item">
                            <div class="admin-hero-view-info-label">Title</div>
                            <div class="admin-hero-view-info-value">${hero.title}</div>
                        </div>
                    `;
                }
                
                if (hero.description) {
                    content += `
                        <div class="admin-hero-view-info-item">
                            <div class="admin-hero-view-info-label">Description</div>
                            <div class="admin-hero-view-info-value">${hero.description}</div>
                        </div>
                    `;
                }
                
                content += `
                    <div class="admin-hero-view-info-item">
                        <div class="admin-hero-view-info-label">Created</div>
                        <div class="admin-hero-view-info-value">${new Date(hero.created_at).toLocaleDateString()}</div>
                    </div>
                `;
                
                content += '</div></div>';
                
                viewBody.innerHTML = content;
                document.getElementById('viewHeroModal').classList.add('show');
                document.body.style.overflow = 'hidden';
            } else {
                showToast('error', data.message || 'Failed to load hero section');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('error', 'An error occurred while loading the hero section');
        });
    }, 300);
}

// Close View Hero Modal
function closeViewHeroModal() {
    document.getElementById('viewHeroModal').classList.remove('show');
    document.body.style.overflow = '';
}

// Initialize type selector on page load
document.addEventListener('DOMContentLoaded', function() {
    const typeSelect = document.getElementById('hero_type');
    if (typeSelect) {
        typeSelect.addEventListener('change', function() {
            selectHeroType(this.value);
        });
    }
});

// Edit Hero Section
function editHeroSection(id) {
    closeAllModals();
    setTimeout(() => {
        fetch(`/admin/hero-section/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const hero = data.data;
                isEditMode = true;
                document.getElementById('heroModalTitle').textContent = 'Edit Hero Section';
                document.getElementById('heroId').value = hero.id;
                document.getElementById('hero_title').value = hero.title || '';
                document.getElementById('hero_description').value = hero.description || '';
                document.getElementById('hero_order').value = hero.order || 0;
                document.getElementById('hero_is_active').checked = hero.is_active;
                
                // Set type
                document.getElementById('hero_type').value = hero.type;
                selectHeroType(hero.type);
                
                if (hero.type === 'image' && hero.images) {
                    hero.images.forEach((img, index) => {
                        const i = index + 1;
                        if (img.image) {
                            document.getElementById(`existing_image_${i}`).value = img.image;
                            const preview = document.getElementById(`preview_image_${i}`);
                            const removeBtn = document.getElementById(`remove_btn_${i}`);
                            if (preview) {
                                preview.src = `/${img.image}`;
                                preview.style.display = 'block';
                            }
                            // Show only one remove button - the one in header
                            if (removeBtn) {
                                removeBtn.style.display = 'flex';
                            }
                            // Hide any duplicate remove buttons that might exist
                            const allRemoveBtns = document.querySelectorAll(`[id*="remove_btn_${i}"]`);
                            allRemoveBtns.forEach((btn, btnIndex) => {
                                if (btnIndex > 0) {
                                    btn.style.display = 'none';
                                }
                            });
                        }
                        if (img.title) {
                            const titleInput = document.getElementById(`image_title_${i}`);
                            if (titleInput) titleInput.value = img.title;
                        }
                        if (img.description) {
                            const descInput = document.getElementById(`image_description_${i}`);
                            if (descInput) descInput.value = img.description;
                        }
                    });
                } else if (hero.type === 'video') {
                    if (hero.video) {
                        document.getElementById('existing_video').value = hero.video;
                        const preview = document.getElementById('preview_video');
                        const removeBtn = document.getElementById('remove_video_btn');
                        if (preview) {
                            preview.src = `/${hero.video}`;
                            preview.style.display = 'block';
                        }
                        // Show only one remove button
                        if (removeBtn) {
                            removeBtn.style.display = 'flex';
                        }
                        // Hide any duplicate remove buttons
                        const allVideoRemoveBtns = document.querySelectorAll('[id*="remove_video"]');
                        allVideoRemoveBtns.forEach((btn, btnIndex) => {
                            if (btnIndex > 0) {
                                btn.style.display = 'none';
                            }
                        });
                    }
                    if (hero.video_title) {
                        const videoTitleInput = document.getElementById('video_title');
                        if (videoTitleInput) videoTitleInput.value = hero.video_title;
                    }
                    if (hero.video_description) {
                        const videoDescInput = document.getElementById('video_description');
                        if (videoDescInput) videoDescInput.value = hero.video_description;
                    }
                    if (hero.video_extra) {
                        const videoExtraInput = document.getElementById('video_extra');
                        if (videoExtraInput) videoExtraInput.value = hero.video_extra;
                    }
                }
                
                document.getElementById('heroPanelOverlay').classList.add('show');
                document.getElementById('heroPanel').classList.add('show');
                document.body.style.overflow = 'hidden';
            } else {
                showToast('error', data.message || 'Failed to load hero section');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('error', 'An error occurred while loading the hero section');
        });
    }, 300);
}

// Confirm Delete Hero
function confirmDeleteHero(id, name) {
    closeAllModals();
    setTimeout(() => {
        deleteHeroId = id;
        document.getElementById('deleteHeroMessage').textContent = `Are you sure you want to delete "${name}"? This action cannot be undone.`;
        document.getElementById('deleteHeroModal').classList.add('show');
        document.body.style.overflow = 'hidden';
    }, 300);
}

// Close Delete Hero Modal
function closeDeleteHeroModal() {
    document.getElementById('deleteHeroModal').classList.remove('show');
    document.body.style.overflow = '';
    deleteHeroId = null;
}

// Delete Hero
function deleteHero() {
    if (!deleteHeroId) return;
    
    fetch(`/admin/hero-section/${deleteHeroId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            setTimeout(() => {
                if (typeof window.toast === 'function') {
                    window.toast('success', data.message);
                } else if (typeof toast === 'function') {
                    toast('success', data.message);
                }
            }, 100);
            closeDeleteHeroModal();
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            if (typeof window.toast === 'function') {
                window.toast('error', data.message || 'Failed to delete hero section');
            } else if (typeof toast === 'function') {
                toast('error', data.message || 'Failed to delete hero section');
            } else {
                showToast('error', data.message || 'Failed to delete hero section');
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('error', 'An error occurred while deleting the hero section');
    });
}

// Toggle Hero Active
function toggleHeroActive(id, event) {
    if (event) {
        event.preventDefault();
        event.stopPropagation();
    }
    
    const label = event ? event.currentTarget : null;
    const checkbox = label ? label.querySelector('input[type="checkbox"]') : null;
    
    if (!checkbox) {
        console.error('Checkbox not found');
        return false;
    }
    
    const originalState = checkbox.checked;
    const newState = !originalState;
    
    // Optimistically update UI
    checkbox.checked = newState;
    checkbox.disabled = true;
    
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        checkbox.disabled = false;
        checkbox.checked = originalState;
        showToast('error', 'CSRF token not found. Please refresh the page.');
        return false;
    }
    
    fetch(`/admin/hero-section/${id}/toggle-active`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        credentials: 'same-origin'
    })
    .then(response => {
        // Check if response is ok
        if (!response.ok) {
            return response.text().then(text => {
                throw new Error(`HTTP error! status: ${response.status}, body: ${text}`);
            });
        }
        // Try to parse as JSON
        return response.json().catch(() => {
            throw new Error('Invalid JSON response from server');
        });
    })
    .then(data => {
        checkbox.disabled = false;
        if (data && data.success) {
            // Ensure checkbox matches server state
            checkbox.checked = data.is_active;
            
            // If this was activated, deactivate ALL other checkboxes in the table
            if (data.is_active) {
                document.querySelectorAll('.admin-hero-toggle-switch input[type="checkbox"]').forEach(cb => {
                    if (cb !== checkbox) {
                        cb.checked = false;
                    }
                });
            }
            
            // Show toast notification
            showToast('success', data.message || 'Status updated successfully!');
        } else {
            // Revert checkbox on error
            checkbox.checked = originalState;
            showToast('error', (data && data.message) ? data.message : 'Failed to update status');
        }
    })
    .catch(error => {
        console.error('Toggle Error:', error);
        checkbox.disabled = false;
        checkbox.checked = originalState;
        showToast('error', 'An error occurred while updating status. Please try again.');
    });
    
    return false;
}

// Change Per Page
function changeHeroPerPage(perPage) {
    const url = new URL(window.location.href);
    url.searchParams.set('per_page', perPage);
    window.location.href = url.toString();
}

// Close panels on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeHeroPanel();
        closeViewHeroModal();
        closeDeleteHeroModal();
    }
});

// Make all functions globally available (explicitly attach to window)
// Functions are hoisted, so they're available immediately
(function() {
    'use strict';
    // Assign all functions to window object for global access
    window.toggleHeroActive = toggleHeroActive;
    window.openHeroModal = openHeroModal;
    window.closeHeroPanel = closeHeroPanel;
    window.editHeroSection = editHeroSection;
    window.viewHeroSection = viewHeroSection;
    window.confirmDeleteHero = confirmDeleteHero;
    window.closeDeleteHeroModal = closeDeleteHeroModal;
    window.deleteHero = deleteHero;
    window.closeViewHeroModal = closeViewHeroModal;
    window.saveHeroSection = saveHeroSection;
    window.toggleActionMenu = toggleActionMenu;
    window.changeHeroPerPage = changeHeroPerPage;
    window.selectHeroType = selectHeroType;
    window.previewImage = previewImage;
    window.removeImage = removeImage;
    window.previewVideo = previewVideo;
    window.removeVideo = removeVideo;
    window.resetHeroForm = resetHeroForm;
})();
