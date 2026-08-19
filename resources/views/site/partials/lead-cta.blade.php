<section class="lead-cta-section">
    <div class="lead-cta-container">
        <div class="lead-cta-header">
            <h2>Ready to start your project?</h2>
            <p>Tell us about your goals, timeline, and requirements. Our team will review your request and get back to you with the right solution.</p>
        </div>
        <div class="lead-cta-form-wrapper">
            @include('site.partials.lead-form')
        </div>
    </div>
</section>

<style>
    .lead-cta-section {
        background: #f1f5f9;
        padding: 100px 20px;
    }
    .lead-cta-container {
        max-width: 800px;
        margin: 0 auto;
    }
    .lead-cta-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .lead-cta-header h2 {
        font-size: 36px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 16px;
    }
    .lead-cta-header p {
        font-size: 18px;
        color: #64748b;
        line-height: 1.6;
    }
    .lead-cta-form-wrapper {
        background: #ffffff;
        border-radius: 24px;
        padding: 50px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.04);
        border: 1px solid rgba(15,23,42,0.05);
    }
    @media (max-width: 768px) {
        .lead-cta-form-wrapper {
            padding: 30px 20px;
        }
        .lead-cta-header h2 {
            font-size: 28px;
        }
    }
</style>
