</main>

<footer class="bg-black border-top border-dark">
    <div class="container py-vh-4 text-secondary fw-lighter">
        <div class="row">
            <div class="col-12 col-lg-5 py-4 text-center text-lg-start">
                <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="/">
                    <img src="<?php echo get_template_directory_uri() . '/img/logo/logo.png' ?>" alt="Web Wrapper Logo" width="200" height="200" fill="currentColor" class="bi bi-stack" viewBox="0 0 16 16">


                </a>

            </div>
            <div class="col border-end border-dark">
                <span class="h6">Company</span>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="/#services" class="link-fancy link-fancy-light">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#portfolio" class="link-fancy link-fancy-light">Portfolio</a>
                    </li>

                    <li class="nav-item">
                        <a href="/about" class="link-fancy link-fancy-light">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="/pricing" class="link-fancy link-fancy-light">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#testimonials" class="link-fancy link-fancy-light">Testimonials</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="/blog" class="link-fancy link-fancy-light">Blog</a>
                    </li> -->
                </ul>
            </div>
            <div class="col border-end border-dark">
                <span class="h6">Services</span>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="link-fancy link-fancy-light">
                            Custom Website Design
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="link-fancy link-fancy-light">
                            Website Audit
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="link-fancy link-fancy-light">
                            Responsive Web Development
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="link-fancy link-fancy-light">
                            Content Management Systems (CMS)
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="link-fancy link-fancy-light">
                            Website Maintenance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="link-fancy link-fancy-light">
                            Hosting and Domain Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="link-fancy link-fancy-light">
                            Elegant Landing Pages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="link-fancy link-fancy-light">
                            Economical Redesigns
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="link-fancy link-fancy-light">
                            Analytics and Reporting
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </div>
    <div class="container text-center small py-vh-2 border-top border-dark">@2023
        <a href="https://web-wrapper.com" class="link-fancy link-fancy-light" target="_blank">Web-wrapper</a>. All
        Rights Reserved.
    </div>
</footer>








<!-- <script src="js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="js/aos.js"></script> -->

<?php wp_footer(); ?>
<script>
    AOS.init({
        duration: 800, // values from 0 to 3000, with step 50ms
    });
</script>
<script>
    let scrollpos = window.scrollY
    const header = document.querySelector(".navbar")
    const header_height = header.offsetHeight

    const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm")
    const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm")

    window.addEventListener('scroll', function() {
        scrollpos = window.scrollY;

        if (scrollpos >= header_height) {
            add_class_on_scroll()
        } else {
            remove_class_on_scroll()
        }

        console.log(scrollpos)
    })

    jQuery(document).ready(function($) {
        $('#contact_form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                    action: 'submit_contact_form',
                    formData: formData,
                },
                success: function(response) {
                    if (response === 'success') {
                        alert('Form submitted successfully. Thank you!');
                        // You can also redirect the user or display a success message here
                    } else {
                        alert('Form submission failed. Please try again later.');
                    }
                }
            });
        });
    });
</script>
</body>

</html>