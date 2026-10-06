import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

// Initialize GSAP scroll animations
function initScrollAnimations() {
    // Kill previous triggers to prevent duplicate listeners on Livewire navigations
    ScrollTrigger.getAll().forEach(trigger => trigger.kill());

    // Single reveal items
    const revealElements = document.querySelectorAll('.gsap-reveal');
    revealElements.forEach((el) => {
        gsap.fromTo(
            el,
            { opacity: 0, y: 35 },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 85%',
                    toggleActions: 'play none none none',
                },
            }
        );
    });

    // Stagger containers (e.g., product grids, categories, news)
    const staggerContainers = document.querySelectorAll('.gsap-stagger-container');
    staggerContainers.forEach((container) => {
        const items = container.querySelectorAll('.gsap-stagger-item');
        if (items.length > 0) {
            gsap.fromTo(
                items,
                { opacity: 0, y: 40, scale: 0.96 },
                {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.6,
                    stagger: 0.08,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: container,
                        start: 'top 82%',
                        toggleActions: 'play none none none',
                    },
                }
            );
        }
    });
}

// Hero Carousel controller using GSAP (Flicker-free Grid Stack)
window.initHeroCarousel = function (containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;

    // Clear any previous interval if re-initializing
    if (window._heroCarouselTimer) {
        clearInterval(window._heroCarouselTimer);
        window._heroCarouselTimer = null;
    }

    const slides = container.querySelectorAll('.hero-slide');
    const dots = container.querySelectorAll('.hero-dot');
    if (slides.length === 0) return;

    let currentIndex = 0;
    let isAnimating = false;

    // Initial state: first slide visible, others hidden via autoAlpha
    slides.forEach((s, idx) => {
        if (idx === 0) {
            gsap.set(s, { autoAlpha: 1, zIndex: 10, scale: 1 });
            s.classList.add('active', 'pointer-events-auto');
            s.classList.remove('pointer-events-none', 'invisible');
        } else {
            gsap.set(s, { autoAlpha: 0, zIndex: 1, scale: 1 });
            s.classList.remove('active', 'pointer-events-auto');
            s.classList.add('pointer-events-none', 'invisible');
        }
    });

    function goToSlide(index) {
        if (isAnimating || index === currentIndex) return;
        isAnimating = true;

        const currentSlide = slides[currentIndex];
        const nextSlide = slides[index];

        // Prepare z-indices so incoming slide stays cleanly layered
        gsap.set(currentSlide, { zIndex: 10 });
        gsap.set(nextSlide, { zIndex: 20 });

        nextSlide.classList.remove('pointer-events-none', 'invisible');
        nextSlide.classList.add('pointer-events-auto');

        const tl = gsap.timeline({
            onComplete: () => {
                currentSlide.classList.remove('active', 'pointer-events-auto');
                currentSlide.classList.add('pointer-events-none', 'invisible');
                nextSlide.classList.add('active');
                gsap.set(currentSlide, { zIndex: 1 });
                gsap.set(nextSlide, { zIndex: 10 });
                currentIndex = index;
                isAnimating = false;
                updateDots();
            },
        });

        // Smooth crossfade without modifying DOM dimensions or display
        tl.to(
            currentSlide,
            {
                autoAlpha: 0,
                duration: 0.6,
                ease: 'power2.inOut',
            },
            0
        );

        tl.fromTo(
            nextSlide,
            { autoAlpha: 0 },
            {
                autoAlpha: 1,
                duration: 0.6,
                ease: 'power2.inOut',
            },
            0
        );

        // Gentle stagger for incoming texts
        const texts = nextSlide.querySelectorAll('.slide-animate');
        if (texts.length > 0) {
            tl.fromTo(
                texts,
                { opacity: 0, y: 14 },
                { opacity: 1, y: 0, duration: 0.45, stagger: 0.08, ease: 'power2.out' },
                0.15
            );
        }
    }

    function updateDots() {
        dots.forEach((dot, idx) => {
            if (idx === currentIndex) {
                dot.classList.add('bg-primary', 'w-8');
                dot.classList.remove('bg-slate-300', 'w-3');
            } else {
                dot.classList.remove('bg-primary', 'w-8');
                dot.classList.add('bg-slate-300', 'w-3');
            }
        });
    }

    function startAutoPlay() {
        stopAutoPlay();
        window._heroCarouselTimer = setInterval(() => {
            const next = (currentIndex + 1) % slides.length;
            goToSlide(next);
        }, 5500);
    }

    function stopAutoPlay() {
        if (window._heroCarouselTimer) {
            clearInterval(window._heroCarouselTimer);
            window._heroCarouselTimer = null;
        }
    }

    // Attach click events to dots
    dots.forEach((dot, idx) => {
        dot.onclick = () => {
            goToSlide(idx);
            startAutoPlay();
        };
    });

    const prevBtn = container.querySelector('.hero-prev');
    const nextBtn = container.querySelector('.hero-next');

    if (prevBtn) {
        prevBtn.onclick = () => {
            const prev = (currentIndex - 1 + slides.length) % slides.length;
            goToSlide(prev);
            startAutoPlay();
        };
    }

    if (nextBtn) {
        nextBtn.onclick = () => {
            const next = (currentIndex + 1) % slides.length;
            goToSlide(next);
            startAutoPlay();
        };
    }

    container.onmouseenter = stopAutoPlay;
    container.onmouseleave = startAutoPlay;

    updateDots();
    startAutoPlay();
};

// 3D Card Flip function using GSAP
window.flipCard = function (buttonElement) {
    const card = buttonElement.closest('.flip-card');
    if (!card) return;

    const inner = card.querySelector('.flip-card-inner');
    if (!inner) return;

    const isFlipped = card.dataset.flipped === 'true';

    gsap.to(inner, {
        rotateY: isFlipped ? 0 : 180,
        duration: 0.7,
        ease: 'power2.inOut',
        onComplete: () => {
            card.dataset.flipped = isFlipped ? 'false' : 'true';
        },
    });
};

document.addEventListener('DOMContentLoaded', () => {
    initScrollAnimations();
});

// Livewire hooks to re-bind GSAP when DOM mutates
if (window.Livewire) {
    window.Livewire.hook('morph.updated', () => {
        setTimeout(() => {
            ScrollTrigger.refresh();
        }, 50);
    });
}
document.addEventListener('livewire:navigated', () => {
    initScrollAnimations();
});
