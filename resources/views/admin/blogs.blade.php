@extends('admin.layout')

@section('title', 'Blogs - Admin Dashboard')
@section('page-title', 'Blogs')

@push('styles')
<!-- Quill Rich Text Editor -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<!-- Admin Blog CSS -->
<link href="{{ asset('frontend/admin-blog.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="admin-blog-header-row">
                    <h5 class="admin-blog-title mb-0">Blogs</h5>
                    <form method="GET" action="{{ route('admin.blogs') }}" class="admin-blog-search-form">
                        <div class="admin-blog-search-wrapper">
                            <i class="fas fa-search admin-blog-search-icon"></i>
                            <input type="text" name="search" class="admin-blog-search-input" placeholder="Search blogs by name, slug, or description..." value="{{ $search }}">
                            @if($search)
                            <a href="{{ route('admin.blogs') }}" class="admin-blog-search-clear">
                                <i class="fas fa-times"></i>
                            </a>
                            @endif
                            <button type="submit" class="admin-blog-search-btn">
                                <i class="fas fa-search"></i>
                                <span>Search</span>
                            </button>
                        </div>
                    </form>
                    <div class="admin-add-blog-btn-wrapper">
                        <button type="button" class="admin-add-blog-btn" onclick="openBlogModal()">
                            <i class="fas fa-plus"></i>
                            <span>Add Blog</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="admin-blog-table-container">
                    <div class="admin-blog-table-wrapper">
                        <table class="admin-blog-table table">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Blog Image</th>
                                    <th>Blog Name</th>
                                    <th>Blog Slug</th>
                                    <th>Blog Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($blogs as $index => $blog)
                                <tr>
                                    <td>{{ $blogs->firstItem() + $index }}</td>
                                    <td>
                                        @if($blog->image)
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}" class="admin-blog-img">
                                        @else
                                            @php
                                                $defaultImages = ['hero_section_img1.png', 'hero_section_img2.jpg', 'hero_section_img3.jpg', 'heroimg1.jpg', 'heroimg1.png', 'heroimg3.jpg', 'hotelimg-4.png'];
                                                $randomImage = $defaultImages[array_rand($defaultImages)];
                                            @endphp
                                            <img src="{{ asset('images/' . $randomImage) }}" alt="{{ $blog->name }}" class="admin-blog-img">
                                        @endif
                                    </td>
                                    <td>
                                        <p class="admin-blog-table-name">{{ $blog->name }}</p>
                                    </td>
                                    <td>
                                        <p class="admin-blog-table-slug">{{ $blog->slug }}</p>
                                    </td>
                                    <td>
                                        <div class="admin-blog-date-main">{{ $blog->created_at->format('d M Y') }}</div>
                                        <div class="admin-blog-date-time">{{ $blog->created_at->format('h:i A') }}</div>
                                    </td>
                                    <td>
                                        <div class="admin-blog-action-menu">
                                            <button type="button" class="admin-blog-action-btn" onclick="toggleActionMenu(this)">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="admin-blog-action-dropdown">
                                                <button type="button" class="admin-blog-action-item view" onclick="viewBlog({{ $blog->id }})">
                                                    <i class="fas fa-eye"></i>
                                                    <span>View</span>
                                                </button>
                                                <button type="button" class="admin-blog-action-item edit" onclick="editBlog({{ $blog->id }})">
                                                    <i class="fas fa-edit"></i>
                                                    <span>Edit</span>
                                                </button>
                                                <button type="button" class="admin-blog-action-item delete" onclick="confirmDeleteBlog({{ $blog->id }}, '{{ $blog->name }}')">
                                                    <i class="fas fa-trash"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <p class="text-muted mb-0">No blogs found. Click "Add Blog" to create your first blog.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="admin-blog-pagination-wrapper">
                    <div class="admin-blog-pagination-left">
                        <label class="admin-blog-rows-label">Show rows per page</label>
                        <select class="form-select form-select-sm admin-blog-pagination-select" onchange="changePerPage(this.value)">
                            <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page', 10) == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page', 10) == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                    @if($blogs->hasPages())
                    <div class="admin-blog-pagination-right">
                        <span class="admin-blog-pagination-info">
                            {{ $blogs->firstItem() ?? 0 }}-{{ $blogs->lastItem() ?? 0 }} of {{ $blogs->total() }}
                        </span>
                        <div class="admin-blog-pagination-arrows">
                            {{ $blogs->appends(request()->query())->links('vendor.pagination.bootstrap-5-custom') }}
                        </div>
                    </div>
                    @else
                    <div class="admin-blog-pagination-right">
                        <span class="admin-blog-pagination-info">
                            1-{{ $blogs->count() }} of {{ $blogs->total() }}
                        </span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Blog Panel (Right Side) -->
<div id="blogPanelOverlay" class="admin-blog-panel-overlay" onclick="closeBlogPanel()"></div>
<div id="blogPanel" class="admin-blog-panel">
    <div class="admin-blog-panel-header">
        <h3 class="admin-blog-modal-title" id="blogModalTitle">Add New Blog</h3>
        <button type="button" class="admin-blog-panel-close" onclick="closeBlogPanel()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="admin-blog-panel-body">
            <form id="blogForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="blogId" name="blog_id">
                
                <div class="admin-blog-form-group">
                    <label class="admin-blog-form-label">
                        Blog Name <span class="required">*</span>
                    </label>
                    <input type="text" class="admin-blog-form-input" id="blogName" name="name" placeholder="Enter blog name" required onkeyup="generateBlogSlug(this.value)">
                    <div class="invalid-feedback"></div>
                </div>

                <div class="admin-blog-form-group">
                    <label class="admin-blog-form-label">
                        Blog Slug <span class="required">*</span>
                        <small class="text-muted" style="font-weight: normal; font-size: 0.85rem;">(URL-friendly identifier)</small>
                    </label>
                    <input type="text" class="admin-blog-form-input" id="blogSlug" name="slug" placeholder="e.g., my-blog-post" required>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="admin-blog-form-group">
                    <label class="admin-blog-form-label">
                        Blog Description <span class="required">*</span>
                    </label>
                    <div class="admin-blog-quill-container">
                        <div id="blogDescriptionEditor" class="admin-blog-quill-editor"></div>
                    </div>
                    <input type="hidden" id="blogDescription" name="description">
                    <div class="invalid-feedback"></div>
                </div>

                <div class="admin-blog-form-group">
                    <label class="admin-blog-form-label">Blog Points</label>
                    <div class="admin-blog-points-container" id="blogPointsContainer">
                        <!-- Points will be added here dynamically -->
                    </div>
                    <button type="button" class="admin-blog-add-point-btn" onclick="addBlogPoint()">
                        <i class="fas fa-plus"></i>
                        <span>Add Point</span>
                    </button>
                </div>

                <div class="admin-blog-form-group">
                    <label class="admin-blog-form-label" id="blogImageLabel">
                        Blog Image <span class="required">*</span>
                    </label>
                    <input type="file" class="admin-blog-form-input" id="blogImage" name="image" accept="image/*" onchange="previewBlogImage(this)">
                    <small class="text-muted" id="blogImageHelp">Max size: 2MB, Max dimensions: 1200x800px</small>
                    <img id="blogImagePreview" class="admin-blog-image-preview" alt="Preview">
                    <div class="invalid-feedback"></div>
                </div>
            </form>
    </div>
    <div class="admin-blog-panel-footer">
        <button type="button" class="admin-blog-panel-btn cancel" onclick="closeBlogPanel()"><span>Cancel</span></button>
        <button type="button" class="admin-blog-panel-btn save" onclick="saveBlog()"><span>Save</span></button>
    </div>
</div>

<!-- View Blog Modal -->
<div id="viewBlogModal" class="admin-blog-view-modal">
    <div class="admin-blog-view-content">
        <div class="admin-blog-modal-header">
            <h3 class="admin-blog-modal-title">Blog Details</h3>
            <button type="button" class="admin-blog-modal-close" onclick="closeViewBlogModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="admin-blog-view-body" id="viewBlogBody">
            <!-- Content will be loaded here -->
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteBlogModal" class="admin-blog-delete-modal">
    <div class="admin-blog-delete-content">
        <h3 class="admin-blog-delete-title">Confirm Delete</h3>
        <p class="admin-blog-delete-message" id="deleteBlogMessage">
            Are you sure you want to delete this blog? This action cannot be undone.
        </p>
        <div class="admin-blog-delete-actions">
            <button type="button" class="admin-blog-modal-btn cancel" onclick="closeDeleteBlogModal()">Cancel</button>
            <button type="button" class="admin-blog-modal-btn save" style="background: #dc3545;" onclick="deleteBlog()">Confirm Delete</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Quill Rich Text Editor -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<!-- Admin Blog JS -->
<script src="{{ asset('frontend/admin-blog.js') }}?v={{ time() }}"></script>
@endpush
