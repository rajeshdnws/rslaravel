<form class="premium-quote-form" method="post" action="{{ route('quote.submit') }}" enctype="multipart/form-data">
    @csrf
    <div style="display: none;" aria-hidden="true">
        <input type="text" name="my_custom_country_verify" autocomplete="off" tabindex="-1">
    </div>
    
    @if (session('status'))
        <div class="form-success" style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2); color: #059669; padding: 16px 20px; border-radius: 12px; margin-bottom: 24px; font-weight: 500;">
            {{ session('status') }}
        </div>
    @endif
    
    <div class="form-row">
        <div class="form-group">
            <label for="name">Full Name <span class="required">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="John Doe">
        </div>
        <div class="form-group">
            <label for="email">Email Address <span class="required">*</span></label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="john@example.com">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+1 (555) 000-0000">
        </div>
        <div class="form-group">
            <label for="company">Company Name</label>
            <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder="Your Company Ltd.">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="service">Service / Project Type</label>
            <select id="service" name="service">
                <option value="" disabled selected>Select a service</option>
                <option value="Custom Web Development" {{ old('service') == 'Custom Web Development' ? 'selected' : '' }}>Custom Web Development</option>
                <option value="Mobile App Development" {{ old('service') == 'Mobile App Development' ? 'selected' : '' }}>Mobile App Development</option>
                <option value="E-Commerce Solution" {{ old('service') == 'E-Commerce Solution' ? 'selected' : '' }}>E-Commerce Solution</option>
                <option value="UI/UX Design" {{ old('service') == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                <option value="WordPress Development" {{ old('service') == 'WordPress Development' ? 'selected' : '' }}>WordPress Development</option>
                <option value="AI Integration" {{ old('service') == 'AI Integration' ? 'selected' : '' }}>AI Integration</option>
                <option value="Other" {{ old('service') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="budget">Estimated Budget</label>
            <select id="budget" name="budget">
                <option value="" disabled selected>Select a budget range</option>
                <option value="Under $5,000" {{ old('budget') == 'Under $5,000' ? 'selected' : '' }}>Under $5,000</option>
                <option value="$5,000 - $10,000" {{ old('budget') == '$5,000 - $10,000' ? 'selected' : '' }}>$5,000 - $10,000</option>
                <option value="$10,000 - $25,000" {{ old('budget') == '$10,000 - $25,000' ? 'selected' : '' }}>$10,000 - $25,000</option>
                <option value="$25,000 - $50,000" {{ old('budget') == '$25,000 - $50,000' ? 'selected' : '' }}>$25,000 - $50,000</option>
                <option value="$50,000+" {{ old('budget') == '$50,000+' ? 'selected' : '' }}>$50,000+</option>
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="timeline">Project Timeline</label>
            <select id="timeline" name="timeline">
                <option value="" disabled selected>When do you want to start?</option>
                <option value="Immediately" {{ old('timeline') == 'Immediately' ? 'selected' : '' }}>Immediately</option>
                <option value="Within 1 month" {{ old('timeline') == 'Within 1 month' ? 'selected' : '' }}>Within 1 month</option>
                <option value="1-3 months" {{ old('timeline') == '1-3 months' ? 'selected' : '' }}>1-3 months</option>
                <option value="3+ months" {{ old('timeline') == '3+ months' ? 'selected' : '' }}>3+ months</option>
                <option value="Just exploring" {{ old('timeline') == 'Just exploring' ? 'selected' : '' }}>Just exploring</option>
            </select>
        </div>
        <div class="form-group">
            <label>Preferred Contact Method</label>
            <div class="radio-group">
                <label class="radio-label">
                    <input type="radio" name="contact_method" value="email" {{ old('contact_method', 'email') == 'email' ? 'checked' : '' }}>
                    <span class="radio-custom"></span>
                    <span>Email</span>
                </label>
                <label class="radio-label">
                    <input type="radio" name="contact_method" value="phone" {{ old('contact_method') == 'phone' ? 'checked' : '' }}>
                    <span class="radio-custom"></span>
                    <span>Phone</span>
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="message">Project Requirements / Message <span class="required">*</span></label>
        <textarea id="message" name="message" rows="5" required placeholder="Tell us about your project goals, features you need, and any challenges you're facing.">{{ old('message') }}</textarea>
    </div>

    <div class="form-group file-upload-group">
        <label for="document" class="file-upload-label">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.2 15c.7-1.2 1-2.5.7-3.9-.6-2-2.4-3.5-4.4-3.5h-1.2c-.7-3-3.2-5.2-6.2-5.6-3-.3-5.9 1.3-7.3 4-1.2 2.5-1 6.5.5 8.8m8.7-1.6V21"/><path d="M16 16l-4-4-4 4"/></svg>
            <div class="upload-text">
                <span class="primary-text">Upload documents or references</span>
                <span class="secondary-text">PDF, DOCX, JPG, PNG (Max 10MB)</span>
            </div>
            <input type="file" id="document" name="document" class="file-input" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
        </label>
    </div>

    @if ($errors->any())
        <div class="form-errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-actions">
        <button type="submit" class="button primary submit-btn">
            Submit Quote Request
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </button>
    </div>
</form>
