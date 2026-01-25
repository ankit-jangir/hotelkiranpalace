// Admin Gallery JavaScript

// Toggle Gallery Form Type (Image/Video)
function toggleGalleryFormType(type) {
    const imageSection = document.getElementById('imageFormSection');
    const videoSection = document.getElementById('videoFormSection');
    
    if (type === 'image') {
        imageSection.style.display = 'block';
        videoSection.style.display = 'none';
        document.getElementById('mainVideo').required = false;
        document.getElementById('mainImage').required = true;
    } else if (type === 'video') {
        imageSection.style.display = 'none';
        videoSection.style.display = 'block';
        document.getElementById('mainImage').required = false;
        document.getElementById('mainVideo').required = true;
    } else {
        imageSection.style.display = 'none';
        videoSection.style.display = 'none';
    }
}

// Toggle Upload Type (Single/Multiple)
function toggleUploadType(type) {
    const singleSection = document.getElementById('singleImageSection');
    const multipleSection = document.getElementById('multipleImagesSection');
    
    if (type === 'single') {
        singleSection.style.display = 'block';
        multipleSection.style.display = 'none';
        // Clear multiple images container
        const container = document.getElementById('multipleImagesContainer');
        container.innerHTML = `
            <div class="admin-gallery-image-input-wrapper">
                <input type="file" class="admin-gallery-form-input" name="images[]" accept="image/*" onchange="previewMultipleImage(this, this.parentElement)">
                <button type="button" class="admin-gallery-remove-image-btn" onclick="removeImageInput(this)" style="display: none;">
                    <i class="fas fa-times"></i>
                </button>
                <div class="admin-gallery-image-preview-item"></div>
            </div>
        `;
    } else {
        singleSection.style.display = 'none';
        multipleSection.style.display = 'block';
        // Clear single image preview
        document.getElementById('singleImagePreview').innerHTML = '';
    }
}

// Add More Image Input
function addMoreImageInput() {
    const container = document.getElementById('multipleImagesContainer');
    const wrapper = document.createElement('div');
    wrapper.className = 'admin-gallery-image-input-wrapper';
    wrapper.innerHTML = `
        <input type="file" class="admin-gallery-form-input" name="images[]" accept="image/*" onchange="previewMultipleImage(this, this.parentElement)">
        <button type="button" class="admin-gallery-remove-image-btn" onclick="removeImageInput(this)" style="display: none;">
            <i class="fas fa-times"></i>
        </button>
        <div class="admin-gallery-image-preview-item"></div>
    `;
    container.appendChild(wrapper);
}

// Remove Image Input
function removeImageInput(button) {
    button.closest('.admin-gallery-image-input-wrapper').remove();
}

// Preview Single Image
function previewSingleImage(input) {
    const preview = document.getElementById('singleImagePreview');
    preview.innerHTML = '';
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100px';
            img.style.height = '100px';
            img.style.objectFit = 'cover';
            img.style.borderRadius = '8px';
            img.style.border = '2px solid #e0e0e0';
            preview.appendChild(img);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Preview Multiple Image
function previewMultipleImage(input, wrapper) {
    const previewItem = wrapper.querySelector('.admin-gallery-image-preview-item');
    const removeBtn = wrapper.querySelector('.admin-gallery-remove-image-btn');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewItem.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
            removeBtn.style.display = 'flex';
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        previewItem.innerHTML = '';
        removeBtn.style.display = 'none';
    }
}

// Preview Main Image
function previewMainImage(input) {
    const preview = document.getElementById('mainImagePreview');
    preview.innerHTML = '';
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100%';
            img.style.maxWidth = '300px';
            img.style.height = '200px';
            img.style.objectFit = 'cover';
            img.style.borderRadius = '8px';
            img.style.border = '2px solid #e0e0e0';
            img.style.marginTop = '1rem';
            preview.appendChild(img);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Preview Main Video
function previewMainVideo(input) {
    const preview = document.getElementById('mainVideoPreview');
    preview.innerHTML = '';
    
    if (input.files && input.files[0]) {
        const url = URL.createObjectURL(input.files[0]);
        const video = document.createElement('video');
        video.src = url;
        video.controls = true;
        video.style.width = '100%';
        video.style.maxWidth = '500px';
        video.style.borderRadius = '8px';
        video.style.border = '2px solid #e0e0e0';
        video.style.marginTop = '1rem';
        preview.appendChild(video);
    }
}

// Delete Gallery Variables
let deleteGalleryId = null;

// Close All Modals
function closeAllModals() {
    // Close all action dropdowns
    document.querySelectorAll('.admin-gallery-action-dropdown').forEach(dropdown => {
        dropdown.classList.remove('show');
    });
    
    // Close Gallery Panel
    const galleryPanel = document.getElementById('galleryPanel');
    const galleryPanelOverlay = document.getElementById('galleryPanelOverlay');
    if (galleryPanel && galleryPanel.classList.contains('show')) {
        galleryPanel.classList.remove('show');
        galleryPanelOverlay.classList.remove('show');
    }
    
    // Close View Modal
    const viewModal = document.getElementById('viewGalleryModal');
    const viewModalOverlay = document.getElementById('viewGalleryModalOverlay');
    if (viewModal && viewModal.classList.contains('show')) {
        viewModal.classList.remove('show');
        if (viewModalOverlay) viewModalOverlay.classList.remove('show');
    }
    
    // Close Delete Modal
    const deleteModal = document.getElementById('deleteGalleryModal');
    if (deleteModal && deleteModal.classList.contains('show')) {
        deleteModal.classList.remove('show');
    }
    
    // Reset body overflow
    document.body.style.overflow = '';
}

// Open Gallery Panel
function openGalleryPanel() {
    closeAllModals();
    
    setTimeout(() => {
        document.getElementById('galleryForm').reset();
        document.getElementById('galleryId').value = '';
        document.getElementById('galleryPanelTitle').textContent = 'Add Media';
        document.getElementById('mainImagePreview').innerHTML = '';
        document.getElementById('mainVideoPreview').innerHTML = '';
        document.getElementById('singleImagePreview').innerHTML = '';
        document.getElementById('multipleImagesContainer').innerHTML = `
            <div class="admin-gallery-image-input-wrapper">
                <input type="file" class="admin-gallery-form-input" name="images[]" accept="image/*" onchange="previewMultipleImage(this, this.parentElement)">
                <button type="button" class="admin-gallery-remove-image-btn" onclick="removeImageInput(this)" style="display: none;">
                    <i class="fas fa-times"></i>
                </button>
                <div class="admin-gallery-image-preview-item"></div>
            </div>
        `;
        
        // Reset form sections
        document.getElementById('galleryType').value = '';
        document.getElementById('imageFormSection').style.display = 'none';
        document.getElementById('videoFormSection').style.display = 'none';
        document.getElementById('singleImageSection').style.display = 'block';
        document.getElementById('multipleImagesSection').style.display = 'none';
        document.querySelector('input[name="upload_type"][value="single"]').checked = true;
        
        document.getElementById('galleryPanelOverlay').classList.add('show');
        document.getElementById('galleryPanel').classList.add('show');
        document.body.style.overflow = 'hidden';
    }, 300);
}

// Close Gallery Panel
function closeGalleryPanel() {
    document.getElementById('galleryPanelOverlay').classList.remove('show');
    document.getElementById('galleryPanel').classList.remove('show');
    document.body.style.overflow = '';
}

// Toggle Gallery Action Menu
function toggleGalleryActionMenu(button) {
    const dropdown = button.nextElementSibling;
    const allDropdowns = document.querySelectorAll('.admin-gallery-action-dropdown');
    
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

// View Gallery
function viewGallery(id) {
    closeAllModals();
    
    setTimeout(() => {
        fetch(`/admin/gallery/${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const gallery = data.gallery;
                    const content = document.getElementById('viewGalleryContent');
                    
                    let mediaHtml = '';
                    let thumbnailsHtml = '';
                    const allImages = [];
                    
                    // Check if it's a video
                    if (gallery.type === 'video') {
                        // Video display
                        const videoUrl = gallery.main_image ? (gallery.main_image.startsWith('http') ? gallery.main_image : `/${gallery.main_image}`) : '';
                        if (videoUrl) {
                            mediaHtml = `
                                <video class="admin-gallery-view-main-image" id="viewMainVideo" controls style="object-fit: contain; background: #f8f9fa;">
                                    <source src="${videoUrl}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            `;
                        } else {
                            mediaHtml = `<div style="padding: 2rem; text-align: center; color: #999;">No video available</div>`;
                        }
                    } else {
                        // Image display
                        // Add main image
                        if (gallery.main_image) {
                            const mainImageUrl = gallery.main_image.startsWith('http') ? gallery.main_image : (gallery.main_image.startsWith('storage/') ? `/storage/${gallery.main_image.replace('storage/', '')}` : `/${gallery.main_image}`);
                            allImages.push({
                                url: mainImageUrl,
                                isMain: true
                            });
                        }
                        
                        // Add sub images
                        if (gallery.sub_images && Array.isArray(gallery.sub_images)) {
                            gallery.sub_images.forEach(img => {
                                const imgUrl = img.startsWith('http') ? img : (img.startsWith('storage/') ? `/storage/${img.replace('storage/', '')}` : `/${img}`);
                                allImages.push({
                                    url: imgUrl,
                                    isMain: false
                                });
                            });
                        }
                        
                        // Generate main image and thumbnails
                        if (allImages.length > 0) {
                            const mainImage = allImages[0];
                            mediaHtml = `<img src="${mainImage.url}" alt="${gallery.name}" class="admin-gallery-view-main-image" id="viewMainImage">`;
                            
                            allImages.forEach((img, index) => {
                                const activeClass = index === 0 ? 'active' : '';
                                thumbnailsHtml += `
                                    <img src="${img.url}" alt="Thumbnail ${index + 1}" 
                                         class="admin-gallery-view-thumbnail ${activeClass}" 
                                         onclick="changeMainImage('${img.url}', ${index})">
                                `;
                            });
                        } else if (gallery.file_path) {
                            const fileUrl = gallery.file_path.startsWith('http') ? gallery.file_path : `/${gallery.file_path}`;
                            mediaHtml = `<img src="${fileUrl}" alt="${gallery.name}" class="admin-gallery-view-main-image">`;
                        } else {
                            mediaHtml = `<div style="padding: 2rem; text-align: center; color: #999;">No image available</div>`;
                        }
                    }
                    
                    // Image/Video first, then data (as per user request)
                    content.innerHTML = `
                        <div class="admin-gallery-view-field">
                            <div class="admin-gallery-view-label">${gallery.type === 'video' ? 'Video' : (allImages.length > 1 ? 'Images' : 'Image')}</div>
                            <div class="admin-gallery-view-value">
                                ${mediaHtml}
                                ${thumbnailsHtml ? `<div class="admin-gallery-view-thumbnails">${thumbnailsHtml}</div>` : ''}
                            </div>
                        </div>
                        <div class="admin-gallery-view-field">
                            <div class="admin-gallery-view-label">Post Name</div>
                            <div class="admin-gallery-view-value">${gallery.name || 'N/A'}</div>
                        </div>
                        ${gallery.heading ? `
                        <div class="admin-gallery-view-field">
                            <div class="admin-gallery-view-label">Heading</div>
                            <div class="admin-gallery-view-value">${gallery.heading}</div>
                        </div>
                        ` : ''}
                        ${gallery.description ? `
                        <div class="admin-gallery-view-field">
                            <div class="admin-gallery-view-label">Description</div>
                            <div class="admin-gallery-view-value">${gallery.description}</div>
                        </div>
                        ` : ''}
                    `;
                    
                    document.getElementById('viewGalleryModalOverlay').classList.add('show');
                    document.getElementById('viewGalleryModal').classList.add('show');
                    document.body.style.overflow = 'hidden';
                } else {
                    toast('error', data.message || 'Failed to load gallery');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toast('error', 'An error occurred while loading gallery');
            });
    }, 300);
}

// Change Main Image (E-commerce style)
function changeMainImage(url, index) {
    const mainImage = document.getElementById('viewMainImage');
    if (mainImage) {
        mainImage.src = url;
    }
    
    // Update active thumbnail
    document.querySelectorAll('.admin-gallery-view-thumbnail').forEach((thumb, i) => {
        if (i === index) {
            thumb.classList.add('active');
        } else {
            thumb.classList.remove('active');
        }
    });
}

// Close View Gallery Modal
function closeViewGalleryModal() {
    document.getElementById('viewGalleryModal').classList.remove('show');
    const overlay = document.getElementById('viewGalleryModalOverlay');
    if (overlay) overlay.classList.remove('show');
    document.body.style.overflow = '';
}

// Confirm Delete Gallery (Open Modal)
function confirmDeleteGallery(id, name) {
    closeAllModals();
    
    setTimeout(() => {
        deleteGalleryId = id;
        const messageEl = document.getElementById('deleteGalleryMessage');
        if (messageEl) {
            messageEl.textContent = `Are you sure you want to delete "${name}"? This action cannot be undone.`;
        }
        
        const deleteModal = document.getElementById('deleteGalleryModal');
        if (deleteModal) {
            deleteModal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    }, 300);
}

// Close Delete Gallery Modal
function closeDeleteGalleryModal() {
    const deleteModal = document.getElementById('deleteGalleryModal');
    if (deleteModal) {
        deleteModal.classList.remove('show');
        document.body.style.overflow = '';
    }
    deleteGalleryId = null;
}

// Delete Gallery (Actual Delete)
function deleteGallery() {
    if (!deleteGalleryId) return;
    
    fetch(`/admin/gallery/${deleteGalleryId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            toast('success', data.message || 'Gallery deleted successfully!');
            closeDeleteGalleryModal();
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            toast('error', data.message || 'Failed to delete gallery');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        toast('error', 'An error occurred while deleting gallery');
    });
}

// Save Gallery
function saveGallery() {
    const form = document.getElementById('galleryForm');
    const formData = new FormData(form);
    
    const type = document.getElementById('galleryType').value;
    if (!type) {
        toast('error', 'Please select a type (Image or Video)');
        return;
    }
    
    // Validate required fields
    const name = document.getElementById('galleryName').value;
    if (!name) {
        toast('error', 'Please enter post name');
        return;
    }
    
    if (type === 'image') {
        const mainImage = document.getElementById('mainImage').files[0];
        if (!mainImage) {
            toast('error', 'Please upload main image');
            return;
        }
        formData.append('main_image', mainImage);
        
        // Add images based on upload type
        const uploadType = document.querySelector('input[name="upload_type"]:checked').value;
        if (uploadType === 'single') {
            const singleImage = document.querySelector('#singleImageSection input[type="file"]').files[0];
            if (singleImage) {
                formData.append('images[]', singleImage);
            }
        } else {
            const multipleInputs = document.querySelectorAll('#multipleImagesSection input[type="file"]');
            multipleInputs.forEach(input => {
                if (input.files && input.files[0]) {
                    formData.append('images[]', input.files[0]);
                }
            });
        }
    } else if (type === 'video') {
        const mainVideo = document.getElementById('mainVideo').files[0];
        if (!mainVideo) {
            toast('error', 'Please upload main video');
            return;
        }
        formData.append('main_video', mainVideo);
    }
    
    formData.append('type', type);
    
    const galleryId = document.getElementById('galleryId').value;
    const url = galleryId ? `/admin/gallery/${galleryId}` : '/admin/gallery/store';
    const method = galleryId ? 'PUT' : 'POST';
    
    fetch(url, {
        method: method,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            toast('success', data.message || 'Gallery saved successfully!');
            closeGalleryPanel();
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            if (data.errors) {
                let errorMsg = 'Validation errors:\n';
                Object.keys(data.errors).forEach(key => {
                    errorMsg += data.errors[key][0] + '\n';
                });
                toast('error', errorMsg);
            } else {
                toast('error', data.message || 'An error occurred');
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        toast('error', 'An error occurred while saving gallery');
    });
}

// Change Per Page
function changeGalleryPerPage(perPage) {
    const url = new URL(window.location.href);
    url.searchParams.set('per_page', perPage);
    window.location.href = url.toString();
}

// Close panels on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeAllModals();
        closeDeleteGalleryModal();
    }
});

// Close action menus when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('.admin-gallery-action-menu')) {
        document.querySelectorAll('.admin-gallery-action-dropdown').forEach(dropdown => {
            dropdown.classList.remove('show');
        });
    }
    
    // Close view modal when clicking overlay
    if (e.target.id === 'viewGalleryModalOverlay') {
        closeViewGalleryModal();
    }
});
