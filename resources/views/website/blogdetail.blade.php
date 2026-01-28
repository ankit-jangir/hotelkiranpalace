@extends("common.layout")

@section('title', 'Blog Detail - Hotel Kiran Palace')

@section('content')

@php
// Static related blogs / all blogs for Hotel Kiran Palace
$allBlogs = [
(object) [
'title' => 'Luxury Room Features & Amenities',
'desc' => 'Discover the exquisite luxury features and amenities available in our premium rooms at Hotel Kiran Palace.
From plush bedding to modern entertainment systems, every detail is designed for comfort.',
'category' => 'Rooms',
'tag' => 'Rooms',
'image' => asset('images/rooms-1.jpg'),
],
(object) [
'title' => 'Fine Dining at Hotel Kiran Palace',
'desc' => 'Experience a world-class culinary journey at our multi-cuisine restaurant. Enjoy signature dishes, seasonal
specialties, and an ambiance perfect for families and couples.',
'category' => 'Dining',
'tag' => 'Dining',
'image' => asset('images/kiran-1.jpg'),
],
(object) [
'title' => 'Spa & Wellness Programs',
'desc' => 'Relax and rejuvenate at our spa with customized wellness programs, massages, and holistic therapies that
enhance both body and mind.',
'category' => 'Wellness',
'tag' => 'Wellness',
'image' => asset('images/kiran-2.png'),
],
(object) [
'title' => 'Local Attractions & Travel Tips',
'desc' => 'Explore nearby tourist destinations, cultural spots, and hidden gems around Hotel Kiran Palace. Plan your
stay with our expert travel insights.',
'category' => 'Travel',
'tag' => 'Travel',
'image' => asset('images/hero_section_img1.png'),
],
(object) [
'title' => 'Business Facilities & Corporate Services',
'desc' => 'Host conferences, meetings, and corporate events with our fully-equipped facilities and professional
services, designed for business travelers.',
'category' => 'Business',
'tag' => 'Business',
'image' => asset('images/heroimg3.jpg'),
],
(object) [
'title' => 'Wedding & Event Hosting Services',
'desc' => 'Celebrate weddings, anniversaries, and special occasions with our dedicated event management team and elegant
venues.',
'category' => 'Events',
'tag' => 'Events',
'image' => asset('images/kiran-3.jpg'),
],
];
@endphp



<!-- MAIN BLOG CONTENT -->
<section class="blogdetail-content-section">
    <div class="container blogdetail-content-container">
        <div class="blogdetail-main-content">
            <div class="blogdetail-img-wrapper">
                <img id="blogImage" src="{{ asset('images/rooms-1.jpg') }}" alt="Blog Image" class="blogdetail-img">
            </div>
            <div class="blogdetail-text">
                <div class="blogdetail-category-badge" id="blogCategory">Rooms</div>
                <h2 id="blogTitle">Luxury Room Features & Amenities</h2>
                <p class="blogdetail-excerpt" id="blogDesc">
                    Discover the exquisite luxury features and amenities available in our premium rooms at Hotel Kiran
                    Palace. Every detail, from plush bedding to modern facilities, is designed to make your stay
                    memorable.
                </p>
                <p>
                    Our rooms combine comfort, elegance, and functionality to ensure a relaxing stay for all guests.
                </p>
                <p>
                    From business travelers to vacationing families, Hotel Kiran Palace offers accommodations that cater
                    to every need.
                </p>

                <div class="blogdetail-tags">
                    <h4>Tags</h4>
                    <div class="blogdetail-tags-list">
                        <a href="#" class="blogdetail-tag">Hotel</a>
                        <a href="#" class="blogdetail-tag">Rooms</a>
                        <a href="#" class="blogdetail-tag">Dining</a>
                        <a href="#" class="blogdetail-tag">Wellness</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- RELATED BLOGS -->
        <div class="blogdetail-related-blogs">
            <div class="blogdetail-related-header">
                <h3>Related Articles</h3>
                <p>Explore more insights from Hotel Kiran Palace</p>
            </div>
            <div id="relatedBlogsGrid" class="blogdetail-related-grid"></div>
        </div>

    </div>
</section>

<script>
// Save all blogs in localStorage for related blogs
localStorage.setItem("allBlogs", JSON.stringify(@json($allBlogs)));

// Load selected blog (from blog list click)
const selectedBlog = JSON.parse(localStorage.getItem("selectedBlog") || "null");
const allBlogs = JSON.parse(localStorage.getItem("allBlogs") || "[]");

// Function to render main blog detail
function renderBlogDetail(blog) {
    if (!blog) return;

    document.getElementById("blogImage").src = blog.image;
    document.getElementById("blogTitle").innerText = blog.title;
    document.getElementById("blogDesc").innerHTML = blog.desc.replace(/\n/g, "<br>");
    document.getElementById("blogCategory").innerText = blog.category || 'Blog';
    document.querySelectorAll(".blogdetail-tag").forEach(tag => tag.innerText = blog.tag || 'Blog');

    localStorage.setItem("selectedBlog", JSON.stringify(blog));

    renderRelatedBlogs(blog);
}

// Function to render related blogs
// Function to render related blogs
function renderRelatedBlogs(currentBlog) {
    const relatedGrid = document.getElementById("relatedBlogsGrid");
    relatedGrid.innerHTML = "";

    if (!allBlogs || allBlogs.length === 0) return;

    const currentCategory = currentBlog.category.toLowerCase();

    // Filter related blogs by same category (case-insensitive), exclude current
    let related = allBlogs.filter(b =>
        b.category.toLowerCase() === currentCategory && b.title !== currentBlog.title
    );

    // If less than 3, fill with other blogs
    if (related.length < 3) {
        const others = allBlogs.filter(b => b.title !== currentBlog.title && !related.some(r => r.title === b.title));
        related = [...related, ...others].slice(0, 3);
    }

    // Render related blogs
    related.forEach(blog => {
        const div = document.createElement("div");
        div.classList.add("blogdetail-related-card");
        div.innerHTML = `
            <div class="blogdetail-card-img-wrapper">
                <img src="${blog.image}" alt="${blog.title}" loading="lazy">
                <span class="blogdetail-card-category">${blog.category}</span>
            </div>
            <div class="blogdetail-related-info">
                <h4>${blog.title}</h4>
                <p>${blog.desc.substring(0, 80)}...</p>
                <a href="#" class="blogdetail-readmore">Read More →</a>
            </div>
        `;
        div.querySelector(".blogdetail-readmore").addEventListener("click", (e) => {
            e.preventDefault();
            renderBlogDetail(blog);
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        relatedGrid.appendChild(div);
    });
}


// Initial load
if (selectedBlog) {
    renderBlogDetail(selectedBlog);
} else {
    renderBlogDetail(allBlogs[0]);
}
</script>

@endsection