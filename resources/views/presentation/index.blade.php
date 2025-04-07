<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Damiki - Custom Furniture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Font: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda+SC:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&display=swap" rel="stylesheet">


    <!-- Custom CSS (Inline or separate file) -->
    <link rel="stylesheet" href="{{ asset('css/damiki.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>

     <!-- NAVBAR (transparent, optional) -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-absolute w-100" style="z-index: 10;">
        <div class="container">
            <a class="navbar-brand" href="#">Damiki</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#damikiNav" aria-controls="damikiNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="damikiNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="#reviews">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
              </ul>
            </div>
        </div>
    </nav>

    <!-- CAROUSEL -->
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <!-- Autoplay every 5 seconds -->
      <div class="carousel-inner" data-bs-interval="5000">
        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url('/images/table-1.jpg');
            height: 100vh;
            background-size: cover;
            background-position: center;">
          <div class="carousel-overlay"></div>
          <div class="carousel-caption text-start">
            <h1>Custom Furniture & Interiors</h1>
            <p>Elegance meets craftsmanship in every piece we create.</p>
            <a href="#gallery" class="btn btn-light btn-lg">Explore</a>
          </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item"  style="background-image: url('/images/table-2.jpg');
            height: 100vh;
            background-size: cover;
            background-position: center;">
          <div class="carousel-overlay"></div>
          <div class="carousel-caption text-start">
            <h1>Transform Your Space</h1>
            <p>Modern designs that reflect your style and comfort.</p>
            <a href="#contact" class="btn btn-light btn-lg">Get in Touch</a>
          </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item"  style="background-image: url('/images/table-3.jpg');
            height: 100vh;
            background-size: cover;
            background-position: center;">
          <div class="carousel-overlay"></div>
          <div class="carousel-caption text-start">
            <h1>Timeless Quality</h1>
            <p>Discover furniture built to last for generations.</p>
            <a href="#reviews" class="btn btn-light btn-lg">See Reviews</a>
          </div>
        </div>
      </div>
      <!-- Optional carousel controls (prev/next) -->
      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </button>
    </div>

    <!-- GALLERY SECTION -->
    <section id="gallery" class="fade-in">
        <div class="container">
            <h2 class="section-title">Our Collection</h2>
            <div class="row">
            @foreach($photos as $index => $photo)
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card gallery-card"
                        data-index="{{ $index }}"
                        data-title="{{ Str::limit($photo->title, 50, '...') }}"
                        data-desc="{{ Str::limit($photo->description, 80, '...') }}">
                        <img src="{{ asset($photo->image_path) }}" alt="{{ $photo->title }}" class="card-img-top gallery-img">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($photo->title, 50, '...') }}</h5>
                            <p class="card-text">Some short intro here...</p>
                        </div>
                    </div>
                </div>
            @endforeach

            </div>
        </div>
    </section>

    <div class="modal fade" id="galleryLightbox" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 80vw;">
            <div class="modal-content gallery-modal-content">
                <!-- MODAL HEADER (optional) -->
                <div class="modal-header" style="border: none; background-color: #2a2a2a;">
                    <!-- The "X" button -->
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 position-relative" style="height: 70vh;">
                    <!-- Arrows -->
                    <button class="btn gallery-arrow left-arrow position-absolute top-50 start-0 translate-middle-y" id="prevPhotoBtn">
                    <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="btn gallery-arrow right-arrow position-absolute top-50 end-0 translate-middle-y" id="nextPhotoBtn">
                    <i class="bi bi-chevron-right"></i>
                    </button>

                    <!-- The main image -->
                    <img id="lightboxImage" src="" alt="" class="img-fluid d-block mx-auto" style="max-height: 100%; object-fit: contain;">
                </div>
                <div class="modal-footer flex-column align-items-start text-light" style="background-color: #2a2a2a;">
                    <h5 id="lightboxTitle" class="mb-2"></h5>
                    <div id="lightboxDesc" class="mb-2"></div>
                </div>
            </div>
        </div>
    </div>



    <!-- REVIEWS SECTION -->
    <section id="reviews" class="fade-in">
        <div class="container">
            <h2 class="section-title">What Our Clients Say</h2>
            <div class="row">
                <!-- Example static reviews; in real app, loop DB reviews -->
                <div class="col-md-4 mb-4">
                    <div class="card review-card">
                        <div class="card-body">
                            <p class="review-quote">
                                “Absolutely stunning craftsmanship! The team at Damiki turned my ideas into reality.”
                            </p>
                            <p class="review-author">— John D.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card review-card">
                        <div class="card-body">
                            <p class="review-quote">
                                “Quality and style beyond compare. Couldn’t be happier with my new living room set.”
                            </p>
                            <p class="review-author">— Sarah W.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card review-card">
                        <div class="card-body">
                            <p class="review-quote">
                                “Superb service and excellent communication. My custom desk is perfect!”
                            </p>
                            <p class="review-author">— Michael T.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="fade-in" style="background-color: var(--section-bg);">
        <div class="container">
            <h2 class="section-title">Contact Us</h2>
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <h5>Phone</h5>
                    <p>+40 123 456 789</p>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <h5>Email</h5>
                    <p>info@damiki.ro</p>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <h5>Address</h5>
                    <p>123 Custom Furniture St, Bucharest, Romania</p>
                </div>
            </div>
            <!-- Google Maps (optional) -->
            <div class="mt-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18..."
                    width="100%"
                    height="300"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <p>&copy; {{ date('Y') }} Damiki Custom Furniture. All rights reserved.</p>
    </footer>

    <!-- GALLERY MODAL -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="" class="img-fluid">
                <div class="modal-description mt-3" id="modalDesc"></div>
            </div>
            <div class="modal-footer">
                <h5 id="modalTitle" class="me-auto"></h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS for Modal & Animations -->
    <script>
    // Fade-in on scroll
    document.addEventListener('scroll', function() {
      const fadeElems = document.querySelectorAll('.fade-in');
      fadeElems.forEach(elem => {
        const rect = elem.getBoundingClientRect();
        if (rect.top < window.innerHeight - 100) {
          elem.classList.add('show');
        }
      });
    });

    // Navbar background change on scroll
    window.addEventListener('scroll', () => {
      const nav = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        nav.classList.add('scrolled');
      } else {
        nav.classList.remove('scrolled');
      }
    });
    const galleryCards = document.querySelectorAll('.gallery-card');
    const photosData = [];

    galleryCards.forEach((card) => {
    const index = card.getAttribute('data-index');
    const title = card.getAttribute('data-title');
    const desc  = card.getAttribute('data-desc');
    const img   = card.querySelector('img'); // to get the image URL

    photosData[index] = {
        url: img.src,
        title: title,
        desc: desc
    };
    });


    // Get references to modal elements
    const galleryModal = document.getElementById('galleryLightbox');
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxTitle = document.getElementById('lightboxTitle');
    const lightboxDesc = document.getElementById('lightboxDesc');
    const prevBtn = document.getElementById('prevPhotoBtn');
    const nextBtn = document.getElementById('nextPhotoBtn');

    let currentIndex = 0;

    // Open modal when a card is clicked
    galleryCards.forEach((card) => {
        card.addEventListener('click', () => {
        currentIndex = parseInt(card.getAttribute('data-index'));
        showPhoto(currentIndex);
        const modal = new bootstrap.Modal(galleryModal);
        modal.show();
        });
    });

    // Show the photo in the modal
    function showPhoto(index) {
        const photo = photosData[index];
        lightboxImage.src = photo.url;
        lightboxTitle.textContent = photo.title;
        lightboxDesc.textContent = photo.desc;
    }


    // Next / Prev
    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % photosData.length; // wrap around
        showPhoto(currentIndex);
    });

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + photosData.length) % photosData.length; // wrap around
        showPhoto(currentIndex);
    });
    </script>


</body>
</html>
