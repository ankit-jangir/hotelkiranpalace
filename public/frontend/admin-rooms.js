// Admin Rooms JavaScript
// Variables - use var for function scope, not let/const
var roomDescriptionQuill;
var roomEditMessageQuill;
var deleteRoomId = null;
var isEditMode = false;

// Initialize Quill Editors
document.addEventListener('DOMContentLoaded', function() {
    // Wait a bit for Quill library to load
    setTimeout(function() {
        // Initialize Description Editor
        const descEditor = document.getElementById('roomDescriptionEditor');
        if (descEditor && typeof Quill !== 'undefined') {
            try {
                roomDescriptionQuill = new Quill('#roomDescriptionEditor', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                            [{ 'font': [] }],
                            [{ 'size': [] }],
                            ['bold', 'italic', 'underline', 'strike'],
                            [{ 'color': [] }, { 'background': [] }],
                            [{ 'script': 'sub'}, { 'script': 'super' }],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            [{ 'indent': '-1'}, { 'indent': '+1' }],
                            [{ 'direction': 'rtl' }],
                            [{ 'align': [] }],
                            ['link', 'image', 'video'],
                            ['clean']
                        ]
                    }
                });
            } catch(e) {
                console.warn('Description Quill editor initialization failed:', e);
            }
        }

        // Initialize Edit Message Editor
        const editMsgEditor = document.getElementById('roomEditMessageEditor');
        if (editMsgEditor && typeof Quill !== 'undefined') {
            try {
                roomEditMessageQuill = new Quill('#roomEditMessageEditor', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                            [{ 'font': [] }],
                            [{ 'size': [] }],
                            ['bold', 'italic', 'underline', 'strike'],
                            [{ 'color': [] }, { 'background': [] }],
                            [{ 'script': 'sub'}, { 'script': 'super' }],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            [{ 'indent': '-1'}, { 'indent': '+1' }],
                            [{ 'direction': 'rtl' }],
                            [{ 'align': [] }],
                            ['link', 'image', 'video'],
                            ['clean']
                        ]
                    }
                });
            } catch(e) {
                console.warn('Edit Message Quill editor initialization failed:', e);
            }
        }
    }, 100);
});

// Helper function to show toast
function showToast(type, message) {
    if (typeof window.toast === 'function') {
        window.toast(type, message);
    } else if (typeof toast === 'function') {
        toast(type, message);
    } else {
        setTimeout(() => {
            if (typeof window.toast === 'function') {
                window.toast(type, message);
            } else if (typeof toast === 'function') {
                toast(type, message);
            }
        }, 100);
    }
}

// Toggle Action Menu - Make it globally available immediately
function toggleRoomActionMenu(button) {
    if (!button) {
        console.error('toggleRoomActionMenu: button parameter is required');
        return;
    }
    
    const dropdown = button.nextElementSibling;
    if (!dropdown || !dropdown.classList.contains('admin-rooms-action-dropdown')) {
        console.error('Dropdown not found for button:', button);
        return;
    }
    
    const allDropdowns = document.querySelectorAll('.admin-rooms-action-dropdown');
    
    allDropdowns.forEach(d => {
        if (d !== dropdown) {
            d.classList.remove('show');
        }
    });
    
    if (dropdown.classList.contains('show')) {
        dropdown.classList.remove('show');
    } else {
        const rect = button.getBoundingClientRect();
        dropdown.style.position = 'fixed';
        dropdown.style.top = (rect.bottom + 5) + 'px';
        dropdown.style.left = (rect.right - 180) + 'px';
        dropdown.style.zIndex = '9999';
        dropdown.classList.add('show');
    }
}

// Immediately assign to window for global access (CRITICAL)
try {
    if (typeof window !== 'undefined') {
        window.toggleRoomActionMenu = toggleRoomActionMenu;
    }
} catch(e) {
    console.error('Error assigning toggleRoomActionMenu:', e);
}

// Close action menus when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('.admin-rooms-action-menu')) {
        document.querySelectorAll('.admin-rooms-action-dropdown').forEach(dropdown => {
            dropdown.classList.remove('show');
        });
    }
});

// Close All Modals
function closeAllRoomModals() {
    document.querySelectorAll('.admin-rooms-action-dropdown').forEach(dropdown => {
        dropdown.classList.remove('show');
    });
    
    const roomPanel = document.getElementById('roomPanel');
    const roomPanelOverlay = document.getElementById('roomPanelOverlay');
    if (roomPanel && roomPanel.classList.contains('show')) {
        roomPanel.classList.remove('show');
        roomPanelOverlay.classList.remove('show');
    }
    
    const viewRoomPanelOverlay = document.getElementById('viewRoomPanelOverlay');
    const viewRoomPanel = document.getElementById('viewRoomPanel');
    if (viewRoomPanelOverlay && viewRoomPanelOverlay.classList.contains('show')) {
        viewRoomPanelOverlay.classList.remove('show');
        viewRoomPanelOverlay.style.display = 'none';
    }
    if (viewRoomPanel && viewRoomPanel.classList.contains('show')) {
        viewRoomPanel.classList.remove('show');
        viewRoomPanel.style.display = 'none';
    }
    
    const deleteModal = document.getElementById('deleteRoomModal');
    if (deleteModal && deleteModal.classList.contains('show')) {
        deleteModal.classList.remove('show');
    }
    
    document.body.style.overflow = '';
}

// Open Room Modal - Make it globally available immediately
function openRoomModal() {
    try {
        closeAllRoomModals();
        
        isEditMode = false;
        const roomModalTitle = document.getElementById('roomModalTitle');
        const roomPanelOverlay = document.getElementById('roomPanelOverlay');
        const roomPanel = document.getElementById('roomPanel');
        
        if (!roomModalTitle || !roomPanelOverlay || !roomPanel) {
            console.error('Room panel elements not found:', {
                roomModalTitle: !!roomModalTitle,
                roomPanelOverlay: !!roomPanelOverlay,
                roomPanel: !!roomPanel
            });
            showToast('error', 'Error: Room panel elements not found. Please refresh the page.');
            return;
        }
        
        roomModalTitle.textContent = 'Add New Room';
        resetRoomForm();
        
        // Show overlay and panel
        roomPanelOverlay.style.display = 'block';
        roomPanel.style.display = 'flex';
        
        // Force reflow
        roomPanelOverlay.offsetHeight;
        roomPanel.offsetHeight;
        
        // Add show class for animation
        setTimeout(() => {
            roomPanelOverlay.classList.add('show');
            roomPanel.classList.add('show');
        }, 10);
        
        document.body.style.overflow = 'hidden';
    } catch(error) {
        console.error('Error opening room modal:', error);
        showToast('error', 'Error opening form. Please refresh the page.');
    }
}

// Immediately assign to window for global access (CRITICAL - must be right after function definition)
try {
    if (typeof window !== 'undefined') {
        window.openRoomModal = openRoomModal;
    }
} catch(e) {
    console.error('Error assigning openRoomModal:', e);
}

// Close Room Panel
function closeRoomPanel() {
    const roomPanelOverlay = document.getElementById('roomPanelOverlay');
    const roomPanel = document.getElementById('roomPanel');
    
    if (roomPanelOverlay) {
        roomPanelOverlay.classList.remove('show');
        setTimeout(() => {
            roomPanelOverlay.style.display = 'none';
        }, 300);
    }
    
    if (roomPanel) {
        roomPanel.classList.remove('show');
        setTimeout(() => {
            roomPanel.style.display = 'none';
        }, 400);
    }
    
    document.body.style.overflow = '';
    resetRoomForm();
}

// Generate Slug from Title
function generateRoomSlug(title) {
    if (!title) return;
    const slugInput = document.getElementById('room_slug');
    if (!slugInput) return;
    
    // Only auto-generate if slug is empty or matches the previous title's slug
    const currentSlug = slugInput.value.trim();
    if (currentSlug && !slugInput.dataset.autoGenerated) {
        return; // User has manually edited slug, don't override
    }
    
    // Generate slug from title
    let slug = title
        .toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g, '') // Remove special characters
        .replace(/[\s_-]+/g, '-') // Replace spaces, underscores, and multiple hyphens with single hyphen
        .replace(/^-+|-+$/g, ''); // Remove leading/trailing hyphens
    
    slugInput.value = slug;
    slugInput.dataset.autoGenerated = 'true';
}

// Immediately assign to window for global access
try {
    if (typeof window !== 'undefined') {
        window.generateRoomSlug = generateRoomSlug;
    }
} catch(e) {
    console.error('Error assigning generateRoomSlug:', e);
}

// Reset Room Form
function resetRoomForm() {
    const form = document.getElementById('roomForm');
    if (form) form.reset();
    const roomId = document.getElementById('roomId');
    if (roomId) roomId.value = '';
    
    // Reset slug
    const slugInput = document.getElementById('room_slug');
    if (slugInput) {
        slugInput.value = '';
        slugInput.dataset.autoGenerated = '';
    }
    
    // Reset main image preview
    const mainPreview = document.getElementById('preview_main_image');
    if (mainPreview) {
        mainPreview.style.display = 'none';
        mainPreview.src = '';
    }
    const removeMainBtn = document.getElementById('remove_main_image_btn');
    if (removeMainBtn) removeMainBtn.style.display = 'none';
    const existingMainImage = document.getElementById('existing_main_image');
    if (existingMainImage) existingMainImage.value = '';
    
    // Reset sub images preview
    const subImagesPreview = document.getElementById('sub_images_preview');
    if (subImagesPreview) subImagesPreview.innerHTML = '';
    const existingSubImages = document.getElementById('existing_sub_images');
    if (existingSubImages) existingSubImages.value = '';
    
    // Reset Quill editors
    if (roomDescriptionQuill) roomDescriptionQuill.root.innerHTML = '';
    if (roomEditMessageQuill) roomEditMessageQuill.root.innerHTML = '';
    
    // Reset facilities
    const facilitiesContainer = document.getElementById('roomFacilitiesContainer');
    if (facilitiesContainer) {
        facilitiesContainer.innerHTML = `
            <div class="admin-rooms-facility-item">
                <input type="text" name="facilities[]" class="admin-rooms-form-input" placeholder="Enter facility">
                <button type="button" class="admin-rooms-remove-facility-btn" onclick="removeRoomFacility(this)" style="display: none;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
    }
}

// Preview Main Room Image
function previewMainRoomImage(input) {
    const preview = document.getElementById('preview_main_image');
    const removeBtn = document.getElementById('remove_main_image_btn');
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

// Remove Main Room Image
function removeMainRoomImage() {
    const imageInput = document.getElementById('main_image');
    const preview = document.getElementById('preview_main_image');
    const removeBtn = document.getElementById('remove_main_image_btn');
    const existingImage = document.getElementById('existing_main_image');
    
    if (imageInput) imageInput.value = '';
    if (existingImage) existingImage.value = '';
    if (preview) {
        preview.src = '';
        preview.style.display = 'none';
    }
    if (removeBtn) removeBtn.style.display = 'none';
}

// Preview Sub Room Images
function previewSubRoomImages(input) {
    const previewContainer = document.getElementById('sub_images_preview');
    if (!previewContainer) return;
    
    previewContainer.innerHTML = '';
    
    if (input.files && input.files.length > 0) {
        Array.from(input.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'admin-rooms-sub-image-item';
                div.innerHTML = `
                    <img src="${e.target.result}" alt="Sub Image ${index + 1}">
                    <button type="button" class="admin-rooms-remove-sub-image-btn" onclick="removeSubRoomImage(this)">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                previewContainer.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    }
}

// Remove Sub Room Image
function removeSubRoomImage(button) {
    if (button && button.closest) {
        const item = button.closest('.admin-rooms-sub-image-item');
        const img = item.querySelector('img');
        
        // If it's an existing image (not data URL), remove from existing_sub_images
        if (img && img.src && !img.src.startsWith('data:')) {
            const path = img.src.replace(window.location.origin, '').replace(/^\//, '');
            const existingSubImagesInput = document.getElementById('existing_sub_images');
            if (existingSubImagesInput && existingSubImagesInput.value) {
                try {
                    const existing = JSON.parse(existingSubImagesInput.value);
                    const filtered = existing.filter(imgPath => imgPath !== path);
                    existingSubImagesInput.value = JSON.stringify(filtered);
                } catch(e) {
                    console.error('Error updating existing sub images:', e);
                }
            }
        }
        
        item.remove();
    }
}

// Add Room Facility
function addRoomFacility() {
    const container = document.getElementById('roomFacilitiesContainer');
    if (!container) return;
    
    const facilityItem = document.createElement('div');
    facilityItem.className = 'admin-rooms-facility-item';
    facilityItem.innerHTML = `
        <input type="text" name="facilities[]" class="admin-rooms-form-input" placeholder="Enter facility">
        <button type="button" class="admin-rooms-remove-facility-btn" onclick="removeRoomFacility(this)">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(facilityItem);
    
    // Show remove buttons if more than one facility
    updateFacilityRemoveButtons();
}

// Remove Room Facility
function removeRoomFacility(button) {
    const facilityItem = button.closest('.admin-rooms-facility-item');
    if (facilityItem) {
        facilityItem.remove();
        updateFacilityRemoveButtons();
    }
}

// Update Facility Remove Buttons Visibility
function updateFacilityRemoveButtons() {
    const facilities = document.querySelectorAll('.admin-rooms-facility-item');
    facilities.forEach((item, index) => {
        const removeBtn = item.querySelector('.admin-rooms-remove-facility-btn');
        if (removeBtn) {
            removeBtn.style.display = facilities.length > 1 ? 'flex' : 'none';
        }
    });
}

// Save Room
function saveRoom() {
    const form = document.getElementById('roomForm');
    if (!form) return;
    
    const formData = new FormData(form);
    const roomId = document.getElementById('roomId').value;
    
    // Validation
    const title = document.getElementById('room_title').value.trim();
    if (!title) {
        showToast('error', 'Please enter room title');
        return;
    }
    
    // Get description from Quill
    if (roomDescriptionQuill) {
        const description = roomDescriptionQuill.root.innerHTML.trim();
        if (!description || description === '<p><br></p>') {
            showToast('error', 'Please enter room description');
            return;
        }
        formData.append('description', description);
    } else {
        showToast('error', 'Description editor not loaded. Please refresh the page.');
        return;
    }
    
    // Get edit message from Quill
    if (roomEditMessageQuill) {
        const editMessage = roomEditMessageQuill.root.innerHTML.trim();
        formData.append('edit_message', editMessage);
    }
    
    // Get facilities
    const facilities = [];
    document.querySelectorAll('input[name="facilities[]"]').forEach(input => {
        const value = input.value.trim();
        if (value) {
            facilities.push(value);
        }
    });
    formData.append('facilities', JSON.stringify(facilities));
    
    // Check main image (only for new rooms)
    if (!roomId) {
        const mainImageInput = document.getElementById('main_image');
        const existingMainImage = document.getElementById('existing_main_image');
        if ((!mainImageInput.files || !mainImageInput.files[0]) && !existingMainImage.value) {
            showToast('error', 'Please upload a main image');
            return;
        }
    }
    
    // Get sub images from preview (for existing ones) and merge with new files
    const existingSubImages = [];
    document.querySelectorAll('.admin-rooms-sub-image-item img').forEach(img => {
        const src = img.src;
        // If it's a data URL (new upload), skip it (will be in files)
        // If it's a regular URL (existing), extract the path
        if (src && !src.startsWith('data:')) {
            // Extract path from URL (remove domain if present)
            const path = src.replace(window.location.origin, '').replace(/^\//, '');
            if (path) existingSubImages.push(path);
        }
    });
    
    // Store existing sub images
    const existingSubImagesInput = document.getElementById('existing_sub_images');
    if (existingSubImagesInput) {
        existingSubImagesInput.value = JSON.stringify(existingSubImages);
    }
    
    const url = roomId ? `/admin/rooms/${roomId}` : '/admin/rooms';
    if (roomId) {
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
            closeRoomPanel();
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            showToast('error', data.message || 'An error occurred');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('error', 'An error occurred while saving the room');
    });
}

// View Room
function viewRoom(id) {
    closeAllRoomModals();
    setTimeout(() => {
        fetch(`/admin/rooms/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const room = data.data;
                const viewBody = document.getElementById('viewRoomBody');
                
                // Debug: Log room data to console
                console.log('Room data:', room);
                console.log('Main image:', room.main_image);
                console.log('Sub images:', room.sub_images);
                
                // Update panel header title
                const viewPanelHeader = document.querySelector('#viewRoomPanel .admin-rooms-modal-title');
                if (viewPanelHeader) {
                    viewPanelHeader.textContent = room.title || 'Room Details';
                }
                
                // Prepare all images (main + sub) - Fix image paths
                const allImages = [];
                
                // Helper function to normalize image path
                const normalizeImagePath = (imgPath) => {
                    if (!imgPath) return null;
                    
                    // If already a full URL, return as is
                    if (imgPath.startsWith('http://') || imgPath.startsWith('https://')) {
                        return imgPath;
                    }
                    
                    // Remove leading slash if present (we'll add it back)
                    let path = imgPath.replace(/^\/+/, '');
                    
                    // If path already starts with img/rooms/, just add leading slash
                    if (path.startsWith('img/rooms/')) {
                        return '/' + path;
                    }
                    
                    // If path starts with img/, add leading slash
                    if (path.startsWith('img/')) {
                        return '/' + path;
                    }
                    
                    // If path starts with storage/, add leading slash
                    if (path.startsWith('storage/')) {
                        return '/' + path;
                    }
                    
                    // Default: assume it's a filename and add img/rooms/ prefix
                    return '/img/rooms/' + path;
                };
                
                // Process main image
                if (room.main_image) {
                    const normalizedPath = normalizeImagePath(room.main_image);
                    if (normalizedPath) {
                        allImages.push(normalizedPath);
                        console.log('Main image path normalized:', room.main_image, '->', normalizedPath);
                    }
                }
                
                // Process sub images
                if (room.sub_images && Array.isArray(room.sub_images) && room.sub_images.length > 0) {
                    room.sub_images.forEach((img, idx) => {
                        const normalizedPath = normalizeImagePath(img);
                        if (normalizedPath) {
                            allImages.push(normalizedPath);
                            console.log(`Sub image ${idx + 1} normalized:`, img, '->', normalizedPath);
                        }
                    });
                }
                
                console.log('All normalized image paths:', allImages);
                
                let content = '';
                
                // Image Gallery Section with Main Image and Thumbnails
                if (allImages.length > 0) {
                    const mainImagePath = allImages[0];
                    // Escape quotes in image paths for onclick handlers
                    const escapedMainPath = mainImagePath.replace(/'/g, "\\'");
                    content += `
                        <div class="admin-rooms-view-gallery-section" style="margin-bottom: 2rem;">
                            <!-- Main Image Display -->
                            <div class="admin-rooms-view-main-image-container" style="margin-bottom: 1rem; border-radius: 12px; overflow: hidden; border: 2px solid #e0e0e0; background: #f9fafb;">
                                <img id="viewRoomMainImage" src="${mainImagePath}" alt="${room.title}" style="width: 100%; max-height: 450px; object-fit: cover; display: block; cursor: pointer;" onerror="this.onerror=null; this.src='/img/placeholder.jpg'; this.style.background='#f0f0f0';" onclick="this.requestFullscreen ? this.requestFullscreen() : null;">
                            </div>
                            
                            <!-- Thumbnail Grid -->
                            ${allImages.length > 1 ? `
                            <div class="admin-rooms-view-thumbnails-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); gap: 0.75rem;">
                                ${allImages.map((imgPath, index) => {
                                    const escapedPath = imgPath.replace(/'/g, "\\'");
                                    return `
                                    <div class="admin-rooms-view-thumbnail-item" style="border-radius: 8px; overflow: hidden; border: 2px solid ${index === 0 ? 'rgb(255, 161, 0)' : '#e0e0e0'}; cursor: pointer; transition: all 0.3s ease; background: #f9fafb;" 
                                         onclick="changeViewRoomMainImage('${escapedPath}', this)" 
                                         onmouseover="this.style.borderColor='rgb(255, 161, 0)'; this.style.transform='scale(1.05)'" 
                                         onmouseout="this.style.borderColor='${index === 0 ? 'rgb(255, 161, 0)' : '#e0e0e0'}'; this.style.transform='scale(1)'">
                                        <img src="${imgPath}" alt="Thumbnail ${index + 1}" style="width: 100%; height: 80px; object-fit: cover; display: block;" onerror="this.onerror=null; this.src='/img/placeholder.jpg'; this.style.background='#f0f0f0';">
                                    </div>
                                `;
                                }).join('')}
                            </div>
                            ` : ''}
                        </div>
                    `;
                } else {
                    // No images available
                    content += `
                        <div class="admin-rooms-view-gallery-section" style="margin-bottom: 2rem; text-align: center; padding: 2rem; background: #f9fafb; border-radius: 12px; border: 2px dashed #e0e0e0;">
                            <i class="fas fa-image" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem;"></i>
                            <p style="color: #999; margin: 0;">No images available for this room</p>
                        </div>
                    `;
                }
                
                // Information Section with Beautiful Layout
                content += '<div class="admin-rooms-view-info-section" style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e5e7eb;">';
                content += '<h4 class="admin-rooms-view-section-title" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem; color: #111827; padding-bottom: 0.75rem; border-bottom: 2px solid rgb(255, 161, 0);">Room Details</h4>';
                content += '<div class="admin-rooms-view-info-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.25rem; margin-bottom: 1.5rem;">';
                
                // Facility Icons Mapping
                const facilityIcons = {
                    'Wi-Fi': 'fa-wifi',
                    'TV': 'fa-tv',
                    'AC': 'fa-snowflake',
                    'Mini Bar': 'fa-wine-bottle',
                    'Room Service': 'fa-concierge-bell',
                    'Balcony': 'fa-door-open',
                    'Work Desk': 'fa-laptop',
                    'Jacuzzi': 'fa-hot-tub',
                    'Butler Service': 'fa-user-tie',
                    'Private Balcony': 'fa-door-open',
                    'Dining Area': 'fa-utensils',
                    'Extra Bed': 'fa-bed',
                    'Kids Amenities': 'fa-child',
                    'Printer Access': 'fa-print',
                    'Garden View': 'fa-tree',
                    'Pool View': 'fa-swimming-pool',
                    'City View': 'fa-city',
                    'Ocean View': 'fa-water',
                    'Mountain View': 'fa-mountain',
                    'Kitchenette': 'fa-kitchen-set',
                    'Living Area': 'fa-couch',
                    'Pet Bed': 'fa-paw',
                    'Pet Amenities': 'fa-paw',
                    'Sitting Area': 'fa-chair',
                    'Corner Views': 'fa-window-maximize',
                    'Extra Windows': 'fa-window-maximize',
                    'Two Beds': 'fa-bed',
                    'Three Beds': 'fa-bed',
                    'Four Beds': 'fa-bed',
                    'Connected Rooms': 'fa-door-closed',
                    'Adjoining Rooms': 'fa-door-closed',
                    'Spa Amenities': 'fa-spa',
                    'Aromatherapy': 'fa-spa',
                    'Fitness Equipment': 'fa-dumbbell',
                    'Yoga Mat': 'fa-yoga',
                    'Gaming Console': 'fa-gamepad',
                    'Gaming Setup': 'fa-gamepad',
                    'Musical Instruments': 'fa-music',
                    'Sound System': 'fa-volume-up',
                    'Artistic Decor': 'fa-palette',
                    'Creative Space': 'fa-paint-brush',
                    'Reading Nook': 'fa-book',
                    'Library Access': 'fa-book-open',
                    'Meditation Space': 'fa-om',
                    'Peaceful Decor': 'fa-peace',
                    'Adventure Theme': 'fa-mountain',
                    'Activity Info': 'fa-info-circle'
                };
                
                content += `
                    <div class="admin-rooms-view-info-item" style="display: flex; flex-direction: column; gap: 0.5rem; padding: 1rem; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                        <div class="admin-rooms-view-info-label" style="font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Title</div>
                        <div class="admin-rooms-view-info-value" style="font-size: 1rem; font-weight: 600; color: #111827;">${room.title || 'N/A'}</div>
                    </div>
                    <div class="admin-rooms-view-info-item" style="display: flex; flex-direction: column; gap: 0.5rem; padding: 1rem; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                        <div class="admin-rooms-view-info-label" style="font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Slug</div>
                        <div class="admin-rooms-view-info-value" style="font-size: 0.9rem; color: #6b7280; font-family: monospace; word-break: break-all;">
                            <i class="fas fa-link" style="color: rgb(255, 161, 0); margin-right: 0.5rem;"></i>${room.slug || 'N/A'}
                        </div>
                    </div>
                    <div class="admin-rooms-view-info-item" style="display: flex; flex-direction: column; gap: 0.5rem; padding: 1rem; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                        <div class="admin-rooms-view-info-label" style="font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Type</div>
                        <div class="admin-rooms-view-info-value" style="font-size: 1rem; font-weight: 600; color: #111827;">
                            <span class="badge bg-info" style="padding: 0.375rem 0.75rem; border-radius: 6px;">${room.type || 'N/A'}</span>
                        </div>
                    </div>
                    <div class="admin-rooms-view-info-item" style="display: flex; flex-direction: column; gap: 0.5rem; padding: 1rem; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                        <div class="admin-rooms-view-info-label" style="font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Price</div>
                        <div class="admin-rooms-view-info-value" style="font-size: 1.25rem; font-weight: 700; color: #111827;">₹${parseFloat(room.price || 0).toFixed(2)}</div>
                    </div>
                    <div class="admin-rooms-view-info-item" style="display: flex; flex-direction: column; gap: 0.5rem; padding: 1rem; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                        <div class="admin-rooms-view-info-label" style="font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Discount Price</div>
                        <div class="admin-rooms-view-info-value" style="font-size: 1.25rem; font-weight: 700; color: #dc3545;">
                            ${room.discount_price ? '₹' + parseFloat(room.discount_price).toFixed(2) : '<span style="color: #9ca3af;">N/A</span>'}
                        </div>
                    </div>
                    <div class="admin-rooms-view-info-item" style="display: flex; flex-direction: column; gap: 0.5rem; padding: 1rem; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                        <div class="admin-rooms-view-info-label" style="font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Available Rooms</div>
                        <div class="admin-rooms-view-info-value" style="font-size: 1.1rem; font-weight: 600; color: #111827; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-door-open" style="color: rgb(255, 161, 0);"></i>
                            <span>${room.available_rooms || 0}</span>
                        </div>
                    </div>
                    <div class="admin-rooms-view-info-item" style="display: flex; flex-direction: column; gap: 0.5rem; padding: 1rem; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                        <div class="admin-rooms-view-info-label" style="font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Status</div>
                        <div class="admin-rooms-view-info-value">
                            <span class="badge ${room.is_active ? 'bg-success' : 'bg-danger'}" style="padding: 0.375rem 0.75rem; border-radius: 6px;">
                                ${room.is_active ? '<i class="fas fa-check-circle"></i> Active' : '<i class="fas fa-times-circle"></i> Inactive'}
                            </span>
                        </div>
                    </div>
                `;
                
                if (room.description) {
                    content += `
                        <div class="admin-rooms-view-info-item" style="grid-column: 1 / -1; padding: 1.5rem; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                            <div class="admin-rooms-view-info-label" style="font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.75rem;">Description</div>
                            <div class="admin-rooms-view-info-value" style="line-height: 1.8; color: #374151; font-size: 0.95rem;">${room.description}</div>
                        </div>
                    `;
                }
                
                if (room.facilities && room.facilities.length > 0) {
                    content += `
                        <div class="admin-rooms-view-info-item" style="grid-column: 1 / -1; padding: 1.5rem; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                            <div class="admin-rooms-view-info-label" style="font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-list-check" style="color: rgb(255, 161, 0);"></i>
                                <span>Facilities</span>
                            </div>
                            <div class="admin-rooms-view-info-value">
                                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 0.75rem;">
                                    ${room.facilities.map(f => {
                                        const iconClass = facilityIcons[f] || 'fa-check-circle';
                                        return `
                                            <div style="display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem; background: #ffffff; border-radius: 6px; border: 1px solid #e5e7eb; transition: all 0.3s ease;" 
                                                 onmouseover="this.style.borderColor='rgb(255, 161, 0)'; this.style.boxShadow='0 2px 8px rgba(255, 161, 0, 0.2)'" 
                                                 onmouseout="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
                                                <i class="fas ${iconClass}" style="color: rgb(255, 161, 0); font-size: 1rem; width: 20px; text-align: center;"></i>
                                                <span style="color: #374151; font-size: 0.9rem; font-weight: 500;">${f}</span>
                                            </div>
                                        `;
                                    }).join('')}
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                if (room.edit_message) {
                    content += `
                        <div class="admin-rooms-view-info-item" style="grid-column: 1 / -1; padding: 1.5rem; background: linear-gradient(135deg, rgba(255, 161, 0, 0.1) 0%, rgba(255, 161, 0, 0.05) 100%); border-radius: 8px; border: 2px solid rgb(255, 161, 0);">
                            <div class="admin-rooms-view-info-label" style="font-size: 0.75rem; font-weight: 600; color: rgb(255, 161, 0); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fas fa-gift" style="color: rgb(255, 161, 0);"></i>
                                <span>Special Offer</span>
                            </div>
                            <div class="admin-rooms-view-info-value" style="line-height: 1.8; color: #374151; font-size: 0.95rem;">${room.edit_message}</div>
                        </div>
                    `;
                }
                
                content += `
                    <div class="admin-rooms-view-info-item" style="grid-column: 1 / -1; padding: 1rem; background: #f9fafb; border-radius: 8px; border-top: 2px solid #e5e7eb; margin-top: 1rem;">
                        <div style="display: flex; justify-content: space-between; align-items: center; color: #6b7280; font-size: 0.875rem;">
                            <span><i class="far fa-calendar-alt" style="margin-right: 0.5rem;"></i>Created: ${new Date(room.created_at).toLocaleDateString()}</span>
                            <span><i class="far fa-clock" style="margin-right: 0.5rem;"></i>${new Date(room.created_at).toLocaleTimeString()}</span>
                        </div>
                    </div>
                `;
                
                content += '</div></div>';
                
                viewBody.innerHTML = content;
                
                // Show panel (right side like edit form)
                const viewRoomPanelOverlay = document.getElementById('viewRoomPanelOverlay');
                const viewRoomPanel = document.getElementById('viewRoomPanel');
                
                if (viewRoomPanelOverlay && viewRoomPanel) {
                    viewRoomPanelOverlay.style.display = 'block';
                    viewRoomPanel.style.display = 'flex';
                    
                    // Force reflow
                    viewRoomPanelOverlay.offsetHeight;
                    viewRoomPanel.offsetHeight;
                    
                    // Add show class for animation
                    setTimeout(() => {
                        viewRoomPanelOverlay.classList.add('show');
                        viewRoomPanel.classList.add('show');
                    }, 10);
                    
                    document.body.style.overflow = 'hidden';
                } else {
                    console.error('View room panel elements not found');
                    showToast('error', 'View panel elements not found');
                }
            } else {
                showToast('error', data.message || 'Failed to load room');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('error', 'An error occurred while loading the room');
        });
    }, 300);
}

// Change Main Image on Thumbnail Click
function changeViewRoomMainImage(imagePath, thumbnailElement) {
    const mainImage = document.getElementById('viewRoomMainImage');
    if (mainImage) {
        mainImage.src = imagePath;
        // Update active thumbnail border
        document.querySelectorAll('.admin-rooms-view-thumbnail-item').forEach(item => {
            item.style.borderColor = '#e0e0e0';
        });
        if (thumbnailElement) {
            thumbnailElement.style.borderColor = 'rgb(255, 161, 0)';
        }
    }
}

// Close View Room Modal (Now Panel)
function closeViewRoomModal() {
    const viewRoomPanelOverlay = document.getElementById('viewRoomPanelOverlay');
    const viewRoomPanel = document.getElementById('viewRoomPanel');
    
    if (viewRoomPanelOverlay) {
        viewRoomPanelOverlay.classList.remove('show');
        setTimeout(() => {
            viewRoomPanelOverlay.style.display = 'none';
        }, 300);
    }
    
    if (viewRoomPanel) {
        viewRoomPanel.classList.remove('show');
        setTimeout(() => {
            viewRoomPanel.style.display = 'none';
        }, 400);
    }
    
    document.body.style.overflow = '';
}

// Edit Room
function editRoom(id) {
    closeAllRoomModals();
    setTimeout(() => {
        fetch(`/admin/rooms/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const room = data.data;
                isEditMode = true;
                document.getElementById('roomModalTitle').textContent = 'Edit Room';
                document.getElementById('roomId').value = room.id;
                document.getElementById('room_title').value = room.title || '';
                document.getElementById('room_slug').value = room.slug || '';
                document.getElementById('room_slug').dataset.autoGenerated = ''; // Allow manual editing
                document.getElementById('room_price').value = room.price || '';
                document.getElementById('room_discount_price').value = room.discount_price || '';
                document.getElementById('room_type').value = room.type || '';
                document.getElementById('room_available_rooms').value = room.available_rooms || 0;
                
                // Set description in Quill
                if (roomDescriptionQuill && room.description) {
                    roomDescriptionQuill.root.innerHTML = room.description;
                }
                
                // Set edit message in Quill
                if (roomEditMessageQuill && room.edit_message) {
                    roomEditMessageQuill.root.innerHTML = room.edit_message;
                }
                
                // Load main image - Use public/img/rooms folder
                if (room.main_image) {
                    document.getElementById('existing_main_image').value = room.main_image;
                    const preview = document.getElementById('preview_main_image');
                    const removeBtn = document.getElementById('remove_main_image_btn');
                    
                    let mainImagePath = room.main_image;
                    if (mainImagePath.startsWith('img/')) {
                        mainImagePath = '/' + mainImagePath;
                    } else if (mainImagePath.startsWith('storage/')) {
                        mainImagePath = '/' + mainImagePath;
                    } else if (!mainImagePath.startsWith('/')) {
                        mainImagePath = '/img/rooms/' + mainImagePath;
                    } else {
                        mainImagePath = '/' + mainImagePath.replace(/^\//, '');
                    }
                    
                    preview.src = mainImagePath;
                    preview.style.display = 'block';
                    if (removeBtn) removeBtn.style.display = 'flex';
                }
                
                // Load sub images - Use public/img/rooms folder
                if (room.sub_images && room.sub_images.length > 0) {
                    const subImagesPreview = document.getElementById('sub_images_preview');
                    const existingSubImages = document.getElementById('existing_sub_images');
                    existingSubImages.value = JSON.stringify(room.sub_images);
                    
                    subImagesPreview.innerHTML = '';
                    room.sub_images.forEach((img, index) => {
                        let subImagePath = img;
                        if (subImagePath.startsWith('img/')) {
                            subImagePath = '/' + subImagePath;
                        } else if (subImagePath.startsWith('storage/')) {
                            subImagePath = '/' + subImagePath;
                        } else if (!subImagePath.startsWith('/')) {
                            subImagePath = '/img/rooms/' + subImagePath;
                        } else {
                            subImagePath = '/' + subImagePath.replace(/^\//, '');
                        }
                        
                        const div = document.createElement('div');
                        div.className = 'admin-rooms-sub-image-item';
                        div.innerHTML = `
                            <img src="${subImagePath}" alt="Sub Image ${index + 1}">
                            <button type="button" class="admin-rooms-remove-sub-image-btn" onclick="removeSubRoomImage(this)">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
                        subImagesPreview.appendChild(div);
                    });
                }
                
                // Load facilities
                const facilitiesContainer = document.getElementById('roomFacilitiesContainer');
                facilitiesContainer.innerHTML = '';
                if (room.facilities && room.facilities.length > 0) {
                    room.facilities.forEach(facility => {
                        const facilityItem = document.createElement('div');
                        facilityItem.className = 'admin-rooms-facility-item';
                        facilityItem.innerHTML = `
                            <input type="text" name="facilities[]" class="admin-rooms-form-input" value="${facility}" placeholder="Enter facility">
                            <button type="button" class="admin-rooms-remove-facility-btn" onclick="removeRoomFacility(this)">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
                        facilitiesContainer.appendChild(facilityItem);
                    });
                } else {
                    const facilityItem = document.createElement('div');
                    facilityItem.className = 'admin-rooms-facility-item';
                    facilityItem.innerHTML = `
                        <input type="text" name="facilities[]" class="admin-rooms-form-input" placeholder="Enter facility">
                        <button type="button" class="admin-rooms-remove-facility-btn" onclick="removeRoomFacility(this)" style="display: none;">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    facilitiesContainer.appendChild(facilityItem);
                }
                updateFacilityRemoveButtons();
                
                document.getElementById('roomPanelOverlay').classList.add('show');
                document.getElementById('roomPanel').classList.add('show');
                document.body.style.overflow = 'hidden';
            } else {
                showToast('error', data.message || 'Failed to load room');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('error', 'An error occurred while loading the room');
        });
    }, 300);
}

// Confirm Delete Room
function confirmDeleteRoom(id, name) {
    closeAllRoomModals();
    setTimeout(() => {
        deleteRoomId = id;
        document.getElementById('deleteRoomMessage').textContent = `Are you sure you want to delete "${name}"? This action cannot be undone.`;
        document.getElementById('deleteRoomModal').classList.add('show');
        document.body.style.overflow = 'hidden';
    }, 300);
}

// Close Delete Room Modal
function closeDeleteRoomModal() {
    document.getElementById('deleteRoomModal').classList.remove('show');
    document.body.style.overflow = '';
    deleteRoomId = null;
}

// Delete Room
function deleteRoom() {
    if (!deleteRoomId) return;
    
    fetch(`/admin/rooms/${deleteRoomId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast('success', data.message);
            closeDeleteRoomModal();
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            showToast('error', data.message || 'Failed to delete room');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('error', 'An error occurred while deleting the room');
    });
}

// Toggle Room Active
function toggleRoomActive(id, event) {
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
    
    checkbox.checked = newState;
    checkbox.disabled = true;
    
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        checkbox.disabled = false;
        checkbox.checked = originalState;
        showToast('error', 'CSRF token not found. Please refresh the page.');
        return false;
    }
    
    fetch(`/admin/rooms/${id}/toggle-active`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        credentials: 'same-origin'
    })
    .then(response => {
        if (!response.ok) {
            return response.text().then(text => {
                throw new Error(`HTTP error! status: ${response.status}, body: ${text}`);
            });
        }
        return response.json().catch(() => {
            throw new Error('Invalid JSON response from server');
        });
    })
    .then(data => {
        checkbox.disabled = false;
        if (data && data.success) {
            checkbox.checked = data.is_active;
            showToast('success', data.message || 'Status updated successfully!');
        } else {
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
function changeRoomPerPage(perPage) {
    const url = new URL(window.location.href);
    url.searchParams.set('per_page', perPage);
    window.location.href = url.toString();
}

// Close panels on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeRoomPanel();
        closeViewRoomModal();
        closeDeleteRoomModal();
    }
});

// Make all functions globally available immediately (redundant but ensures availability)
// Assign directly to window
if (typeof window !== 'undefined') {
    window.toggleRoomActive = toggleRoomActive;
    window.openRoomModal = openRoomModal;
    window.closeRoomPanel = closeRoomPanel;
    window.editRoom = editRoom;
    window.viewRoom = viewRoom;
    window.confirmDeleteRoom = confirmDeleteRoom;
    window.closeDeleteRoomModal = closeDeleteRoomModal;
    window.deleteRoom = deleteRoom;
    window.closeViewRoomModal = closeViewRoomModal;
    window.saveRoom = saveRoom;
    window.toggleRoomActionMenu = toggleRoomActionMenu;
    window.changeRoomPerPage = changeRoomPerPage;
    window.previewMainRoomImage = previewMainRoomImage;
    window.removeMainRoomImage = removeMainRoomImage;
    window.previewSubRoomImages = previewSubRoomImages;
    window.removeSubRoomImage = removeSubRoomImage;
    window.addRoomFacility = addRoomFacility;
    window.removeRoomFacility = removeRoomFacility;
    window.resetRoomForm = resetRoomForm;
    window.changeViewRoomMainImage = changeViewRoomMainImage;
    window.generateRoomSlug = generateRoomSlug;
    
    // Debug: Log that functions are assigned
    console.log('Room functions assigned to window:', {
        toggleRoomActionMenu: typeof window.toggleRoomActionMenu,
        openRoomModal: typeof window.openRoomModal,
        editRoom: typeof window.editRoom,
        viewRoom: typeof window.viewRoom
    });
}
