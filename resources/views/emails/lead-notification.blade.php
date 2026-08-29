<x-mail::message>
# {{ $lead->type === 'quote' ? 'New Quote Request' : ($lead->type === 'agency' ? 'New Agency Partnership Inquiry' : 'New Contact Message') }}

You have received a new {{ $lead->type }} submission from your website.

<x-mail::panel>
**Name:** {{ $lead->name }}<br>
**Email:** [{{ $lead->email }}](mailto:{{ $lead->email }})<br>
@if($lead->phone)**Phone:** {{ $lead->phone }}<br>@endif
@if($lead->company)**Company:** {{ $lead->company }}<br>@endif
@if($lead->subject_or_service)**{{ $lead->type === 'quote' ? 'Service Required' : ($lead->type === 'agency' ? 'Services Required' : 'Subject') }}:** {{ $lead->subject_or_service }}<br>@endif
@if($lead->budget)**{{ $lead->type === 'agency' ? 'Estimated Project Type' : 'Budget' }}:** {{ $lead->budget }}<br>@endif
@if($lead->timeline)**{{ $lead->type === 'agency' ? 'Preferred Engagement' : 'Timeline' }}:** {{ $lead->timeline }}<br>@endif
@if($lead->contact_method)**Preferred Contact:** {{ ucfirst($lead->contact_method) }}<br>@endif
@if($lead->reference_page)**Reference Page:** [{{ $lead->reference_page }}]({{ $lead->reference_page }})<br>@endif
</x-mail::panel>

**Message:**
<div style="background-color: #f8fafc; padding: 15px; border-left: 4px solid #ea580c; border-radius: 4px; margin-top: 10px; color: #334155; font-style: italic;">
{{ $lead->message }}
</div>


@if($lead->document_path)
<x-mail::button :url="url('storage/' . $lead->document_path)">
Download Attached File
</x-mail::button>
@endif

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
