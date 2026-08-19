@extends('admin.layout', ['heading' => $section['title'], 'title' => $section['title']])

@php
    function admin_value($record, string $key) {
        return data_get($record, $key) instanceof \Carbon\CarbonInterface
            ? data_get($record, $key)->format('Y-m-d H:i')
            : data_get($record, $key);
    }
@endphp

@section('content')
@if (session('status'))
    <div class="admin-notice">{{ session('status') }}</div>
@endif

<section class="panel">
    <div class="panel-head">
        <div>
            <h2>{{ $section['title'] }}</h2>
            <p>{{ $section['description'] }}</p>
        </div>
        <a class="admin-button" href="{{ route('admin.'.$slug.'.create') }}">{{ $section['primary'] }}</a>
    </div>

    <form class="toolbar" method="get" action="{{ route('admin.'.$slug) }}" style="display: flex; gap: 10px; flex-wrap: wrap;">
        <input name="q" type="search" value="{{ request('q') }}" placeholder="Search {{ strtolower($section['title']) }}" style="min-width: 200px;">
        
        @foreach($section['fields'] as $field)
            @if(isset($field['type']) && $field['type'] === 'select')
                <select name="{{ $field['name'] }}" onchange="this.form.submit()">
                    <option value="">All {{ $field['label'] }}s</option>
                    @foreach($field['options'] as $option)
                        <option value="{{ $option }}" {{ request($field['name']) == $option ? 'selected' : '' }}>{{ ucfirst(str_replace('-', ' ', $option)) }}</option>
                    @endforeach
                </select>
            @endif
        @endforeach

        <button type="submit" class="admin-button secondary">Search</button>
        @if(request()->anyFilled(['q', ...collect($section['fields'])->where('type', 'select')->pluck('name')->toArray()]))
            <a href="{{ route('admin.'.$slug) }}" class="admin-button" style="background: transparent; color: #64748b; border: 1px solid #e2e8f0;">Clear</a>
        @endif
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    @foreach ($section['columns'] as $column)
                        <th>{{ $column }}</th>
                    @endforeach
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($records as $record)
                    <tr>
                        @foreach ($section['columns'] as $key => $column)
                            <td>{{ admin_value($record, $key) ?: '-' }}</td>
                        @endforeach
                        <td class="actions-cell">
                            <a href="{{ route('admin.'.$slug.'.edit', $record->getKey()) }}">Edit</a>
                            <form method="post" action="{{ route('admin.'.$slug.'.destroy', $record->getKey()) }}" onsubmit="return confirm('Delete this record?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($section['columns']) + 1 }}">No records yet. Create one to start saving data in MySQL.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($records->hasPages())
        <nav class="pagination" aria-label="{{ $section['title'] }} pagination">
            @if ($records->onFirstPage())
                <span class="page-link disabled">Previous</span>
            @else
                <a class="page-link" href="{{ $records->previousPageUrl() }}">Previous</a>
            @endif

            <span class="page-status">
                Page {{ $records->currentPage() }} of {{ $records->lastPage() }}
            </span>

            @if ($records->hasMorePages())
                <a class="page-link" href="{{ $records->nextPageUrl() }}">Next</a>
            @else
                <span class="page-link disabled">Next</span>
            @endif
        </nav>
    @endif
</section>
@endsection
