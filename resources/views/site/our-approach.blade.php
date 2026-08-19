@extends('site.layout')

@push('head')
<meta name="keywords" content="web development approach, software engineering philosophy, AI assisted development, 80/20 rule, human led development, custom software, RS Orange Tech, digital agency process">
<meta name="robots" content="index, follow">
<meta name="author" content="RS Orange Tech">

<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "AboutPage",
      "@@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "Our Approach - Human-Led, Machine-Assisted | RS Orange Tech",
      "description": "We believe great technology is built through human thinking, experience, and responsibility with modern machines and AI used as supporting tools.",
      "inLanguage": "en-US",
      "publisher": {
        "@@id": "{{ url('/') }}#organization"
      },
      "mainEntity": {
        "@@type": "Thing",
        "name": "The 80/20 Development Philosophy",
        "description": "Approximately 80% of our core development process is driven by human expertise (architecture, business logic, security), while 20% is machine-assisted (boilerplate, testing, optimization)."
      }
    },
    {
      "@@type": "Organization",
      "@@id": "{{ url('/') }}#organization",
      "name": "RS Orange Tech",
      "url": "{{ url('/') }}",
      "logo": {
        "@@type": "ImageObject",
        "url": "{{ asset('rslogo.png') }}"
      },
      "contactPoint": {
        "@@type": "ContactPoint",
        "telephone": "+91-73035-36474",
        "contactType": "customer service",
        "email": "info@rsorangetech.com"
      }
    }
  ]
}
</script>
@endpush

@section('content')

<main class="approach-page">
    <!-- Hero Section -->
    <header class="approach-hero">
        <div class="approach-hero-content">
            <span class="eyebrow">Our Approach</span>
            <h1>Human-Led.<br>Machine-Assisted.<br><span class="highlight-orange">Built With Purpose.</span></h1>
            <p class="hero-subtitle">We combine human engineering discipline with intelligent tools to create software that is scalable, maintainable, secure, and designed for the long term.</p>
        </div>
        <div class="approach-hero-bg">
            <div class="bg-shape shape-1"></div>
            <div class="bg-shape shape-2"></div>
        </div>
    </header>

    <!-- Development Philosophy -->
    <section class="approach-philosophy">
        <div class="container">
            <div class="philosophy-grid">
                <div class="philosophy-text">
                    <h2>Our Development Philosophy</h2>
                    <p class="lead-text">We believe great technology is built through <strong>human thinking, experience, and responsibility</strong> — with modern machines and AI used as supporting tools, not as a replacement for engineering judgment.</p>
                    <p>Our development workflow is <strong>human-led and machine-assisted</strong>.</p>
                    <p>The architecture, product decisions, business logic, security strategy, database design, user experience, SEO strategy, and final implementation are driven by our development team. Intelligent tools are used where they can improve speed, productivity, research, testing, and repetitive development work.</p>
                </div>
                <div class="philosophy-visual">
                    <div class="visual-card">
                        <div class="visual-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line></svg>
                        </div>
                        <h3>Engineering First</h3>
                        <p>Real-world problem solving requires context that only humans can provide.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- The 80/20 Approach -->
    <section class="approach-8020">
        <div class="container">
            <div class="section-header text-center">
                <h2>Our 80/20 Approach</h2>
                <p class="section-subtitle">We intentionally keep our development process human-centric.</p>
            </div>
            
            <div class="split-8020">
                <!-- 80% Box -->
                <div class="box-80">
                    <div class="box-header">
                        <span class="percentage">80%</span>
                        <h3>Human Expertise</h3>
                    </div>
                    <p class="box-desc">Approximately 80% of the core development process is driven by human expertise, including:</p>
                    <ul class="check-list">
                        <li>Product and technical architecture</li>
                        <li>Business logic and application design</li>
                        <li>Database structure and relationships</li>
                        <li>Security decisions</li>
                        <li>SEO architecture</li>
                        <li>User experience and interface decisions</li>
                        <li>Performance optimization</li>
                        <li>Code review and quality control</li>
                        <li>Testing and debugging</li>
                        <li>Final technical decisions</li>
                    </ul>
                </div>

                <!-- 20% Box -->
                <div class="box-20">
                    <div class="box-header">
                        <span class="percentage orange">20%</span>
                        <h3>Intelligent Assistance</h3>
                    </div>
                    <p class="box-desc">The remaining 20% is machine-assisted, where intelligent tools can help with repetitive or time-consuming activities such as:</p>
                    <ul class="check-list">
                        <li>Boilerplate code generation</li>
                        <li>Repetitive development tasks</li>
                        <li>Technical research</li>
                        <li>Documentation</li>
                        <li>Debugging suggestions</li>
                        <li>Testing assistance</li>
                        <li>Code optimization suggestions</li>
                        <li>Repetitive UI implementation</li>
                        <li>Development productivity</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- AI is our assistant -->
    <section class="approach-assistant">
        <div class="container">
            <div class="assistant-content">
                <h2>AI Is Our Assistant — Not Our Architect</h2>
                <p class="lead-text">We don't simply generate code and put it into production.</p>
                <p>Machine-generated suggestions are reviewed, tested, modified, and integrated by our developers before becoming part of the final product.</p>
                <div class="responsibility-box">
                    <p>Our engineers remain responsible for:</p>
                    <div class="responsibility-flow">
                        <span>What is built</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        <span>How it is built</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        <span>Why it is built</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        <span>How it performs</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        <span>How it is secured</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why This Matters -->
    <section class="approach-matters">
        <div class="container text-center">
            <h2>Why This Matters</h2>
            <p class="lead-text max-w-800 mx-auto">A machine can generate code quickly, but building reliable software requires much more than generating code. It requires understanding the business, anticipating real-world problems, making architectural decisions, protecting user data, optimizing performance, and creating an experience that people can trust.</p>
            <p class="mt-4">That's why we combine:</p>
            
            <div class="equation-box">
                <div class="eq-item">Human<br>Experience</div>
                <div class="eq-plus">+</div>
                <div class="eq-item">Engineering<br>Discipline</div>
                <div class="eq-plus">+</div>
                <div class="eq-item">Intelligent<br>Tools</div>
            </div>
        </div>
    </section>

    <!-- Workflow -->
    <section class="approach-workflow">
        <div class="container">
            <div class="section-header text-center">
                <h2>Our Workflow</h2>
                <p class="section-subtitle">A disciplined approach to building reliable digital products.</p>
            </div>
            
            <div class="workflow-grid">
                <div class="workflow-step">
                    <div class="step-num">01</div>
                    <h3 class="step-title">Understand</h3>
                    <p class="step-desc">We first understand the business requirement, users, goals, and technical environment.</p>
                </div>
                
                <div class="workflow-step">
                    <div class="step-num">02</div>
                    <h3 class="step-title">Design</h3>
                    <p class="step-desc">Our developers define the architecture, database structure, user flow, SEO strategy, and technical approach.</p>
                </div>
                
                <div class="workflow-step">
                    <div class="step-num">03</div>
                    <h3 class="step-title">Build</h3>
                    <p class="step-desc">The core implementation is developed using established engineering practices, with intelligent tools assisting where appropriate.</p>
                </div>
                
                <div class="workflow-step">
                    <div class="step-num">04</div>
                    <h3 class="step-title">Review</h3>
                    <p class="step-desc">Machine-assisted output is reviewed and adapted by human developers. We don't treat generated code as production-ready by default.</p>
                </div>
                
                <div class="workflow-step">
                    <div class="step-num">05</div>
                    <h3 class="step-title">Test</h3>
                    <p class="step-desc">Features are tested for functionality, performance, security, compatibility, and real-world usage.</p>
                </div>
                
                <div class="workflow-step">
                    <div class="step-num">06</div>
                    <h3 class="step-title">Refine</h3>
                    <p class="step-desc">We optimize the implementation, remove unnecessary complexity, and make sure the final system fits the overall architecture.</p>
                </div>
                
                <div class="workflow-step">
                    <div class="step-num">07</div>
                    <h3 class="step-title">Deliver</h3>
                    <p class="step-desc">Only after human review, testing, and validation does the feature become part of the production system.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Conclusion -->
    <section class="approach-conclusion">
        <div class="container text-center">
            <h2 class="quote-text">"Machines help us move faster.<br>Humans decide where we're going."</h2>
            <p class="quote-sub">This approach allows us to combine the productivity of modern technology with the experience, creativity, accountability, and engineering judgment of human developers.</p>
            <div class="mt-5">
                <a href="{{ route('quote') }}" class="button primary">Start Your Project</a>
            </div>
        </div>
    </section>
</main>

@endsection
