@extends('admin.layout', ['heading' => ($record->exists ? 'Edit ' : 'Create ').$section['title'], 'title' => $section['title']])

@section('content')
<section class="panel">
    <div class="panel-head">
        <div>
            <h2>{{ $record->exists ? 'Edit Record' : 'Create Record' }}</h2>
            <p>{{ $section['description'] }}</p>
        </div>
        <a class="admin-button secondary" href="{{ route('admin.'.$slug) }}">Back</a>
    </div>

    <form class="admin-form" method="post" action="{{ $record->exists ? route('admin.'.$slug.'.update', $record->getKey()) : route('admin.'.$slug.'.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($record->exists)
            @method('PUT')
        @endif

        @foreach ($section['fields'] as $field)
            @php
                $name = $field['name'];
                $type = $field['type'] ?? 'text';
                $value = old($name, $record->{$name});

                if ($type === 'datetime-local' && $value) {
                    $value = $record->{$name}?->format('Y-m-d\TH:i');
                }
            @endphp

            <label class="{{ in_array($type, ['textarea'], true) ? 'full' : '' }}">
                {{ $field['label'] }}
                @if ($type === 'textarea' && in_array($name, ['content', 'description']))
                    <div class="content-editor" data-editor>
                        <div class="editor-toolbar" aria-label="Content editor toolbar">
                            <button type="button" data-command="formatBlock" data-value="H2">H2</button>
                            <button type="button" data-command="formatBlock" data-value="H3">H3</button>
                            <button type="button" data-command="bold">B</button>
                            <button type="button" data-command="italic">I</button>
                            <button type="button" data-command="underline">U</button>
                            <button type="button" data-command="insertUnorderedList">List</button>
                            <button type="button" data-command="insertOrderedList">1. List</button>
                            <button type="button" data-command="formatBlock" data-value="BLOCKQUOTE">Quote</button>
                            <button type="button" data-command="justifyLeft">Left</button>
                            <button type="button" data-command="justifyCenter">Center</button>
                            <button type="button" data-command="justifyRight">Right</button>
                            <button type="button" data-action="link">Link</button>
                            <button type="button" data-action="image">Image</button>
                            <button type="button" data-command="undo">Undo</button>
                            <button type="button" data-command="redo">Redo</button>
                            <button type="button" data-action="source">HTML</button>
                        </div>
                        <div class="editor-surface" contenteditable="true">{!! $value !!}</div>
                        <textarea class="editor-source" name="{{ $name }}" rows="10">{{ $value }}</textarea>
                    </div>
                @elseif ($type === 'textarea')
                    <textarea name="{{ $name }}" rows="5">{{ $value }}</textarea>
                @elseif ($type === 'select')
                    <select name="{{ $name }}">
                        @foreach ($field['options'] as $option)
                            <option value="{{ $option }}" @selected((string) $value === (string) $option)>{{ ucfirst(str_replace('-', ' ', $option)) }}</option>
                        @endforeach
                    </select>
                @elseif ($type === 'file' || $type === 'image')
                    <input name="{{ $name }}" type="file" {!! $type === 'image' ? 'accept="image/*"' : '' !!}>
                    @if (! empty($value))
                        <small style="display: block; margin-top: 5px;">
                            Current file: 
                            <a href="{{ url('storage/' . $value) }}" target="_blank" style="color: #ea580c; text-decoration: underline;">
                                View / Download Attachment
                            </a>
                        </small>
                    @endif
                @elseif ($type === 'category')
                    <select name="{{ $name }}">
                        <option value="">No category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected((string) $value === (string) $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                @else
                    <input name="{{ $name }}" type="{{ $type }}" value="{{ $type === 'password' ? '' : $value }}" @required($field['required'] ?? false)>
                @endif
                @error($name)
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </label>
        @endforeach

        <div class="form-actions">
            <button type="submit" class="admin-button">{{ $record->exists ? 'Update' : 'Save' }}</button>
            <a class="admin-button secondary" href="{{ route('admin.'.$slug) }}">Cancel</a>
        </div>
    </form>
</section>

<script>
    document.querySelectorAll('[data-editor]').forEach((editor) => {
        const toolbar = editor.querySelector('.editor-toolbar');
        const surface = editor.querySelector('.editor-surface');
        const source = editor.querySelector('.editor-source');

        const syncFromSurface = () => {
            source.value = surface.innerHTML.trim();
        };

        const syncFromSource = () => {
            surface.innerHTML = source.value;
        };

        toolbar.addEventListener('click', (event) => {
            const button = event.target.closest('button');

            if (! button) {
                return;
            }

            event.preventDefault();
            surface.focus();

            if (button.dataset.action === 'link') {
                const url = window.prompt('Enter link URL');
                if (url) {
                    document.execCommand('createLink', false, url);
                }
            } else if (button.dataset.action === 'image') {
                const url = window.prompt('Enter image URL');
                if (url) {
                    document.execCommand('insertImage', false, url);
                }
            } else if (button.dataset.action === 'source') {
                source.classList.toggle('is-open');
                if (source.classList.contains('is-open')) {
                    syncFromSurface();
                    source.focus();
                } else {
                    syncFromSource();
                    surface.focus();
                }
            } else {
                document.execCommand(button.dataset.command, false, button.dataset.value || null);
            }

            syncFromSurface();
        });

        surface.addEventListener('input', syncFromSurface);
        source.addEventListener('input', syncFromSource);
        editor.closest('form').addEventListener('submit', syncFromSurface);
    });
</script>
@endsection
