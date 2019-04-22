
<label class="label">{{ $field->title() }}</label>

<div class="summernote-{{ $field->name() }}"></div>
<textarea class="summernote-{{ $field->name() }}-content" name="{{ $field->name() }}" style="display: none;">{!! $field->oldOrDefault() !!}</textarea>


@foreach ($errors->get($field->name()) as $message)
    <div class="note note-error">{{ $message }}</div>
@endforeach


@push('styles')
    @if ($errors->has($field->name()))
        <style>
            div.note-editor{
                background: #fff0f0;
                border-color: #A90329 !important;
            }
        </style>
    @endif
@endpush


@pushonce('style_files', <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css">)
@pushonce('style_files', <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css">)


@pushonce('script_files', <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>)
@pushonce('script_files', <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>)
@pushonce('script_files', <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>)
@pushonce('script_files', <script src="/vendor/jarboe/js/plugin/summernote/summernote.min.js"></script>)


@push('scripts')
<script>
    $(document).ready(function() {
        var $field_{{ $field->name() }} = $('.summernote-{{ $field->name() }}-content');
        $('.summernote-{{ $field->name() }}').summernote({
            height: 200,
            codemirror: {
                theme: 'monokai'
            },
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['codeview', 'fullscreen']]
            ],
            callbacks: {
                onInit: function(e) {
                    $('.summernote-{{ $field->name() }}').summernote('code', $field_{{ $field->name() }}.val());
                },
                onBlur: function(e) {
                    $field_{{ $field->name() }}.val($('.summernote-{{ $field->name() }}').summernote('code'));
                }
            }
        });
    });
</script>
@endpush