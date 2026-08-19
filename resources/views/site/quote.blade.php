@extends('site.layout')

@push('head')
<meta name="keywords" content="request a quote, web development quote, app development estimate, project inquiry, hire laravel developer, custom software pricing, RS Orange Tech contact">
<meta name="robots" content="index, follow">
<meta name="author" content="RS Orange Tech">

<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "ContactPage",
      "@@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "{{ $title ?? 'Request a Quote | RS Orange Tech' }}",
      "description": "{{ $description ?? 'Tell us about your project, goals, budget, and requirements. Our team will review your request and provide a tailored digital solution.' }}",
      "inLanguage": "en-US",
      "publisher": {
        "@@id": "{{ url('/') }}#organization"
      },
      "mainEntity": {
        "@@type": "ContactPoint",
        "contactType": "sales",
        "telephone": "+91-73035-36474",
        "email": "info@rsorangetech.com",
        "availableLanguage": ["English", "Hindi"]
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
      }
    }
  ]
}
</script>
@endpush

@section('content')
<main class="quote-page">
    <div class="quote-header text-center">
        <div class="container max-w-800 mx-auto">
            <h1>Let’s Build Something Great Together</h1>
            <p class="quote-subtitle">Tell us about your project, goals, budget, and requirements. Our team will review your request and get back to you with the right solution.</p>
        </div>
    </div>
    <div class="quote-body">
        <div class="container quote-container">
            <div class="quote-form-wrapper">
                @include('site.partials.lead-form')
            </div>
            <aside class="quote-sidebar">
                <div class="sidebar-panel">
                    <h3>What happens next?</h3>
                    <ol class="next-steps">
                        <li>
                            <div class="step-icon">1</div>
                            <div class="step-text">We receive your requirements.</div>
                        </li>
                        <li>
                            <div class="step-icon">2</div>
                            <div class="step-text">Our team reviews your project.</div>
                        </li>
                        <li>
                            <div class="step-icon">3</div>
                            <div class="step-text">We discuss the scope and requirements.</div>
                        </li>
                        <li>
                            <div class="step-icon">4</div>
                            <div class="step-text">We prepare a suitable proposal or quotation.</div>
                        </li>
                        <li>
                            <div class="step-icon">5</div>
                            <div class="step-text">We contact you to move forward.</div>
                        </li>
                    </ol>
                    <div class="sidebar-footer">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--orange)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        <span>Your information is strictly secure and confidential.</span>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</main>
@endsection
