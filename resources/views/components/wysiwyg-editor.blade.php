@props([
    'name' => 'content',
    'id' => null,
    'value' => '',
    'label' => null,
    'error' => null,
    'required' => false,
    'placeholder' => '',
    'height' => 500,
])

@php
    $id = $id ?? $name;
@endphp

<div class="wysiwyg-editor-container" x-data="{ 
    content: @js($value),
    init() {
        tinymce.init({
            selector: '#{{ $id }}',
            height: {{ $height }},
            menubar: true,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic underline strikethrough | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | link image | code fullscreen | help',
            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 16px; line-height: 1.6; }',
            branding: false,
            promotion: false,
            setup: (editor) => {
                editor.on('init', () => {
                    editor.setContent(this.content);
                });
                
                editor.on('change', () => {
                    this.content = editor.getContent();
                    this.$dispatch('editor-changed', { 
                        name: '{{ $name }}', 
                        value: editor.getContent() 
                    });
                });
            }
        });
    }
}">
    @if($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-foreground mb-1.5">
            {{ $label }}
            @if($required) <span class="text-destructive">*</span> @endif
        </label>
    @endif

    <textarea
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        style="visibility: hidden"
        {{ $required ? 'required' : '' }}
        x-model="content"
    >{{ $value }}</textarea>

    @if($error)
        <p class="mt-1 text-sm text-destructive">{{ $error }}</p>
    @endif
</div> 