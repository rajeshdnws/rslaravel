<x-mail::message>
# Hello {{ $lead->name }},

Thank you for reaching out to us! This is an automated email to confirm that we have received your {{ $lead->type === 'quote' ? 'quote request' : ($lead->type === 'agency' ? 'partnership inquiry' : 'message') }}.

Our team will review your inquiry and get back to you as soon as possible. Below is a copy of what you submitted:

<x-mail::panel>
**Name:** {{ $lead->name }}<br>
**Email:** [{{ $lead->email }}](mailto:{{ $lead->email }})<br>
@if($lead->phone)**Phone:** {{ $lead->phone }}<br>@endif
@if($lead->company)**Company:** {{ $lead->company }}<br>@endif
@if($lead->subject_or_service)**{{ $lead->type === 'quote' ? 'Service Required' : ($lead->type === 'agency' ? 'Services Required' : 'Subject') }}:** {{ $lead->subject_or_service }}<br>@endif
@if($lead->budget)**{{ $lead->type === 'agency' ? 'Estimated Project Type' : 'Budget' }}:** {{ $lead->budget }}<br>@endif
@if($lead->timeline)**{{ $lead->type === 'agency' ? 'Preferred Engagement' : 'Timeline' }}:** {{ $lead->timeline }}<br>@endif
@if($lead->contact_method)**Preferred Contact:** {{ ucfirst($lead->contact_method) }}<br>@endif
</x-mail::panel>

**Your Message:**
<div style="background-color: #f8fafc; padding: 15px; border-left: 4px solid #ea580c; border-radius: 4px; margin-top: 10px; color: #334155; font-style: italic;">
{{ $lead->message }}
</div>

If you have any further questions or details to add, feel free to reply directly to this email.

Best regards,<br>
**{{ config('app.name') }} Team**
</x-mail::message>
