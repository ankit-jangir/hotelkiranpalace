@extends('common.layout')
@section('title', 'Blog - Hotel Kiran Palace')
@section('content')

<!-- BLOG SECTION -->
<section class="blog-section">
    <div class="container-fluid blog-layout px-4 px-md-5">
        <!-- LEFT SIDE -->
        <div class="blog-left">
            <!-- MAIN BLOG CARDS -->
            <div id="blogGrid" class="blog-grid"></div>

            <!-- PAGINATION -->
            <div id="pagination" class="pagination"></div>

            <!-- RELATED BLOGS -->
            <div class="related-blogs mt-5 p-4 rounded shadow-sm bg-light">
                <h4 class="related-title mb-4">Related Blogs</h4>
                <div id="relatedGrid" class="blog-grid"></div>
            </div>
        </div>

        <!-- RIGHT FILTER -->
        <aside class="blog-right">
            <h4>Filter by Category</h4>
            <ul class="filter-list">
                <li class="active" data-filter="all">All</li>
                <li data-filter="rooms">Rooms</li>
                <li data-filter="dining">Dining</li>
                <li data-filter="wellness">Wellness</li>
                <li data-filter="events">Events</li>
                <li data-filter="offers">Offers</li>
            </ul>
        </aside>
    </div>
</section>

<!-- ================= JS MAPPING ================= -->
<script>
const blogs = [{
        title: "Luxurious Rooms at Hotel Kiran Palace",
        category: "rooms",
        tag: "Rooms",
        image: "{{ asset('images/rooms-1.jpg') }}",
        desc: "Experience comfort and elegance in our well-appointed rooms and suites. Each room features modern amenities, plush bedding, and serene décor to ensure a relaxing stay for leisure and business travelers alike.",
        slug: "luxurious-rooms"
    },
    {
        title: "Fine Dining Experience",
        category: "dining",
        tag: "Dining",
        image: "{{ asset('images/kiran-1.jpg') }}",
        desc: "Indulge in a culinary journey at our multi-cuisine restaurant. From traditional Indian flavors to continental delicacies, enjoy meals prepared with the freshest ingredients by our expert chefs in a sophisticated ambiance.",
        slug: "fine-dining-experience"
    },
    {
        title: "Spa & Wellness Retreat",
        category: "wellness",
        tag: "Wellness",
        image: "{{ asset('images/kiran-2.png') }}",
        desc: "Rejuvenate your body and mind with our spa and wellness services. Choose from massages, facials, and holistic treatments that refresh and revitalize, offering a peaceful escape from everyday stress.",
        slug: "spa-wellness-retreat"
    },
    {
        title: "Host Your Events with Elegance",
        category: "events",
        tag: "Events",
        image: "{{ asset('images/kiran-3.jpg') }}",
        desc: "Celebrate weddings, parties, and corporate events in our luxurious banquet halls and event spaces. Our dedicated team ensures flawless execution, from decoration to catering, making your events memorable.",
        slug: "host-events-elegance"
    },
    {
        title: "Exclusive Offers & Packages",
        category: "offers",
        tag: "Offers",
        image: "{{ asset('images/kiran-4.jpg') }}",
        desc: "Enjoy special offers and packages tailored for families, couples, and solo travelers. Benefit from discounts on stays, dining, and wellness experiences, curated to provide exceptional value and comfort.",
        slug: "exclusive-offers-packages"
    },
    {
        title: "Rooftop Lounge & Bar",
        category: "dining",
        tag: "Dining",
        image: "{{ asset('images/hotelimg-4.png') }}",
        desc: "Relax and unwind at our rooftop lounge with panoramic views. Sip on signature cocktails, enjoy light bites, and experience vibrant evenings with music and a lively ambiance.",
        slug: "rooftop-lounge-bar"
    },
    {
        title: "Fitness & Recreation Facilities",
        category: "wellness",
        tag: "Wellness",
        image: "{{ asset('images/heroimg3.jpg') }}",
        desc: "Stay active during your stay with our state-of-the-art fitness center and recreational facilities. From fully equipped gyms to outdoor activities, we cater to all wellness needs.",
        slug: "fitness-recreation"
    },
    {
        title: "Travel & Sightseeing Tips",
        category: "travel",
        tag: "Travel",
        image: "{{ asset('images/hero_section_img1.png') }}",
        desc: "Discover local attractions, cultural landmarks, and hidden gems around the city. Our concierge team provides personalized travel guidance to make your stay both enjoyable and memorable.",
        slug: "travel-sightseeing-tips"
    }
];

/* 🔹 RELATED BLOGS DATA */
const relatedBlogs = [{
        title: "Private Dining Rooms",
        tag: "Dining",
        image: "{{ asset('images/hero_section_img2.jpg') }}",
        desc: "Host intimate dinners or business meetings in our private dining spaces, designed for comfort and exclusivity."
    },
    {
        title: "Luxury Suite Amenities",
        tag: "Rooms",
        image: "{{ asset('images/rooms-2.jpg') }}",
        desc: "Explore the features of our luxury suites including Jacuzzi, balcony views, and personalized services."
    },
    {
        title: "Wedding Planning Services",
        tag: "Events",
        image: "{{ asset('images/hero_section_img3.jpg') }}",
        desc: "Our team ensures your wedding is flawless, from decor to catering, making your special day unforgettable."
    }
];

let currentPage = 1;
const perPage = 6;
let currentFilter = "all";

/* ================= MAIN BLOGS ================= */
function renderBlogs() {
    const grid = document.getElementById("blogGrid");
    grid.innerHTML = "";

    let filteredBlogs = currentFilter === "all" ?
        blogs :
        blogs.filter(blog => blog.category === currentFilter);

    const start = (currentPage - 1) * perPage;
    const paginatedBlogs = filteredBlogs.slice(start, start + perPage);

    if (paginatedBlogs.length === 0) {
        grid.innerHTML = "<p>No blogs found.</p>";
    }

    paginatedBlogs.forEach((blog) => {
        const card = document.createElement('div');
        card.className = 'blog-card';
        card.innerHTML = `
            <div class="blog-image">
                <img src="${blog.image}" alt="${blog.title}">
                <span class="blog-tag">${blog.tag}</span>
            </div>
            <div class="blog-content">
                <h3>${blog.title}</h3>
                <p>${blog.desc.substring(0, 240)}${blog.desc.length > 240 ? '...' : ''}</p>
            </div>
        `;

        const readMore = document.createElement('a');
        readMore.href = '#';
        readMore.className = 'blog-btn';
        readMore.textContent = 'Read More →';
        readMore.addEventListener('click', (e) => {
            e.preventDefault();
            openBlogDetail(blog);
        });

        card.querySelector('.blog-content').appendChild(readMore);
        grid.appendChild(card);
    });

    renderPagination(filteredBlogs.length);
}

/* ================= PAGINATION ================= */
function renderPagination(total) {
    const pagination = document.getElementById("pagination");
    pagination.innerHTML = "";

    const pages = Math.ceil(total / perPage);
    for (let i = 1; i <= pages; i++) {
        const btn = document.createElement("button");
        btn.textContent = i;
        if (i === currentPage) btn.classList.add("active");

        btn.addEventListener("click", () => {
            currentPage = i;
            renderBlogs();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        pagination.appendChild(btn);
    }
}

/* ================= RELATED BLOGS ================= */
function renderRelatedBlogs() {
    const relatedGrid = document.getElementById("relatedGrid");
    relatedGrid.innerHTML = "";

    relatedBlogs.forEach((blog) => {
        const card = document.createElement('div');
        card.className = 'blog-card small-blog';
        card.innerHTML = `
            <div class="blog-image">
                <img src="${blog.image}" alt="${blog.title}">
                <span class="blog-tag">${blog.tag}</span>
            </div>
            <div class="blog-content">
                <h5>${blog.title}</h5>
                <p>${blog.desc.substring(0, 120)}${blog.desc.length > 120 ? '...' : ''}</p>
            </div>
        `;

        const readMore = document.createElement('a');
        readMore.href = '#';
        readMore.className = 'blog-btn';
        readMore.textContent = 'Read More →';
        readMore.addEventListener('click', (e) => {
            e.preventDefault();
            openBlogDetail(blog);
        });

        card.querySelector('.blog-content').appendChild(readMore);
        relatedGrid.appendChild(card);
    });
}

/* ================= FILTER LOGIC ================= */
document.querySelectorAll(".filter-list li").forEach(item => {
    item.addEventListener("click", () => {
        document.querySelectorAll(".filter-list li").forEach(li => li.classList.remove("active"));
        item.classList.add("active");

        currentFilter = item.dataset.filter;
        currentPage = 1;
        renderBlogs();
    });
});

function openBlogDetail(blog) {
    localStorage.setItem("selectedBlog", JSON.stringify(blog));
    window.location.href = "{{ url('/blog') }}/" + (blog.slug || blog.title.toLowerCase().replace(/\s+/g, '-'));
}

/* ================= INITIAL RENDER ================= */
renderBlogs();
renderRelatedBlogs();
</script>

@endsection