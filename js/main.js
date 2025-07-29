

(function($) {
    'use strict';


    $(document).ready(function() {


        $('.menu-toggle').on('click', function() {
            const nav = $('.nav-menu');
            const button = $(this);

            nav.toggleClass('active');
            button.attr('aria-expanded', nav.hasClass('active'));
        });


        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation').length) {
                $('.nav-menu').removeClass('active');
                $('.menu-toggle').attr('aria-expanded', 'false');
            }
        });


        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();

            const target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800);
            }
        });


        let currentSlide = 0;
        const slides = $('.hero-slide');
        const dots = $('.dot');

        function showSlide(index) {
            slides.removeClass('active');
            dots.removeClass('active');

            slides.eq(index).addClass('active');
            dots.eq(index).addClass('active');
        }


        setInterval(function() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }, 5000);


        dots.on('click', function() {
            currentSlide = $(this).index();
            showSlide(currentSlide);
        });


        $('#newsletter-form').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const submitBtn = form.find('button[type="submit"]');
            const originalText = submitBtn.text();


            submitBtn.text('Enviando...').prop('disabled', true);

            const formData = {
                action: 'profatto_newsletter',
                nonce: profatto_ajax.nonce,
                nome: form.find('input[name="nome"]').val(),
                email: form.find('input[name="email"]').val()
            };

            $.ajax({
                url: profatto_ajax.ajax_url,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        form.html('<div class="success-message">' + response.data + '</div>');
                    } else {
                        alert('Erro ao enviar. Tente novamente.');
                    }
                },
                error: function() {
                    alert('Erro de conexão. Tente novamente.');
                },
                complete: function() {
                    submitBtn.text(originalText).prop('disabled', false);
                }
            });
        });


        function animateOnScroll() {
            $('.fade-in-up').each(function() {
                const element = $(this);
                const elementTop = element.offset().top;
                const elementBottom = elementTop + element.outerHeight();
                const viewportTop = $(window).scrollTop();
                const viewportBottom = viewportTop + $(window).height();

                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    element.addClass('fade-in-up');
                }
            });
        }


        animateOnScroll();


        $(window).on('scroll', animateOnScroll);


        $(window).on('scroll', function() {
            const scrollTop = $(window).scrollTop();
            const header = $('.site-header');

            if (scrollTop > 100) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }
        });


        function animateCounters() {
            $('.stat-number').each(function() {
                const $this = $(this);
                const countTo = $this.text().replace(/[^\d]/g, '');

                $({ countNum: 0 }).animate({
                    countNum: countTo
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $this.text('+ ' + Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text('+ ' + countTo);
                    }
                });
            });
        }


        const statsSection = $('.stats-grid');
        if (statsSection.length) {
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        animateCounters();
                        observer.unobserve(entry.target);
                    }
                });
            });

            observer.observe(statsSection[0]);
        }


        $('.project-item').on('mouseenter', function() {
            $(this).find('.project-image img').css('transform', 'scale(1.05)');
        }).on('mouseleave', function() {
            $(this).find('.project-image img').css('transform', 'scale(1)');
        });

        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(function(img) {
                imageObserver.observe(img);
            });
        }

        const backToTop = $('<button class="back-to-top" aria-label="Voltar ao topo"><i class="fas fa-chevron-up"></i></button>');
        $('body').append(backToTop);

        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 300) {
                backToTop.addClass('visible');
            } else {
                backToTop.removeClass('visible');
            }
        });

        backToTop.on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
        });

        $('input[required]').on('blur', function() {
            const input = $(this);
            const value = input.val().trim();

            if (!value) {
                input.addClass('error');
            } else {
                input.removeClass('error');
            }
        });

        $('.search-form').on('submit', function(e) {
            const searchInput = $(this).find('input[name="s"]');
            if (!searchInput.val().trim()) {
                e.preventDefault();
                searchInput.focus();
            }
        });

        $('.menu-toggle').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        $('.skip-link').on('click', function(e) {
            const target = $($(this).attr('href'));
            if (target.length) {
                e.preventDefault();
                target.focus();
            }
        });

    });

    $(window).on('load', function() {
        $('body').removeClass('loading');
        console.log('ProFatto theme loaded successfully!');
    });

})(jQuery);