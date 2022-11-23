@extends('layouts.back-end.app-seller')

@push('css_or_js')
    <link href="{{ asset('public/assets/back-end/css/tags-input.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/select2/css/select2.min.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a
                        href="{{ route('seller.dashboard.index') }}">{{ \App\CPU\translate('Dashboard') }}</a></li>
                <li class="breadcrumb-item" aria-current="page"><a
                            href="{{ route('seller.service.list') }}">{{ \App\CPU\translate('Service') }}</a></li>
                <li class="breadcrumb-item">{{ \App\CPU\translate('Add_new') }}</li>
            </ol>
        </nav>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">

                <form class="product-form" action="{{ route('seller.service.add-new') }}" method="post"
                      enctype="multipart/form-data"
                      style="text-align: {{ Session::get('direction') === 'rtl' ? 'right' : 'left' }};"
                      id="product_form"
                      onsubmit="check()">>
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            @php($language = \App\Model\BusinessSetting::where('type', 'pnc_language')->first())
                            @php($language = $language->value ?? null)
                            @php($default_lang = 'en')

                            @php($default_lang = json_decode($language)[0])
                            <ul class="nav nav-tabs mb-4">
                                @foreach (json_decode($language) as $lang)
                                    <li class="nav-item">
                                        <a class="nav-link lang_link {{ $lang == $default_lang ? 'active' : '' }}"
                                           href="#"
                                           id="{{ $lang }}-link">{{ \App\CPU\Helpers::get_language_name($lang) . '(' . strtoupper($lang) . ')' }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-body">
                            @foreach (json_decode($language) as $lang)
                                <div class="{{ $lang != $default_lang ? 'd-none' : '' }} lang_form"
                                     id="{{ $lang }}-form">
                                    <div class="form-group">
                                        <label class="input-label"
                                               for="{{ $lang }}_name">{{ \App\CPU\translate('name') }}
                                            ({{ strtoupper($lang) }})
                                        </label>
                                        <input type="text" {{ $lang == $default_lang ? 'required' : '' }} name="name[]"
                                               id="{{ $lang }}_name" class="form-control" placeholder="New Service"
                                               required>
                                    </div>
                                    <input type="hidden" name="lang[]" value="{{ $lang }}">
                                    <div class="form-group pt-4">
                                        <label class="input-label"
                                               for="{{ $lang }}_description">{{ \App\CPU\translate('description') }}
                                            ({{ strtoupper($lang) }})</label>
                                        <textarea name="description[]" class="editor textarea" cols="30" rows="10" required>{{ old('details') }}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>                    </div>

                    <div class="card mt-2 rest-part">
                        <div class="card-header">
                            <h4>{{ \App\CPU\translate('General_info') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name">{{ \App\CPU\translate('Category') }}</label>
                                        <select class="js-example-basic-multiple form-control" name="category_id"
                                                onchange="getRequest('{{ url('/') }}/seller/product/get-categories?parent_id='+this.value,'sub-category-select','select')"
                                                required>
                                            <option value="{{ old('category_id') }}" selected disabled>
                                                ---{{ \App\CPU\translate('Select') }}---</option>
                                            @foreach ($cat as $c)
                                                <option value="{{ $c['id'] }}"
                                                    {{ old('name') == $c['id'] ? 'selected' : '' }}>
                                                    {{ $c['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
{{--                                    <div class="col-md-4">--}}
{{--                                        <label for="name">{{ \App\CPU\translate('Sub_category') }}</label>--}}
{{--                                        <select class="js-example-basic-multiple form-control" name="sub_category_id"--}}
{{--                                                id="sub-category-select"--}}
{{--                                                onchange="getRequest('{{ url('/') }}/seller/product/get-categories?parent_id='+this.value,'sub-sub-category-select','select')">--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <label for="name">{{ \App\CPU\translate('Sub_sub_category') }}</label>--}}
{{--                                        <select class="js-example-basic-multiple form-control" name="sub_sub_category_id"--}}
{{--                                                id="sub-sub-category-select">--}}

{{--                                        </select>--}}
{{--                                    </div>--}}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="code">{{ \App\CPU\translate('service_code_sku') }}
                                            <span class="text-danger">*</span>
                                            <a class="style-one-pro" style="cursor: pointer;"
                                               onclick="document.getElementById('generate_number').value = getRndInteger()">{{ \App\CPU\translate('generate') }}
                                                {{ \App\CPU\translate('code') }}</a></label>
                                        <input type="number" minlength="5" id="generate_number" name="code"
                                               class="form-control" value="{{ old('code') }}"
                                               placeholder="{{ \App\CPU\translate('code') }}" required>
                                    </div>
{{--                                    <div class="col-md-4">--}}
{{--                                        <label for="name">{{ \App\CPU\translate('Brand') }}</label>--}}
{{--                                        <select--}}
{{--                                            class="js-example-basic-multiple js-states js-example-responsive form-control"--}}
{{--                                            name="brand_id" required>--}}
{{--                                            <option value="{{ null }}" selected disabled>--}}
{{--                                                ---{{ \App\CPU\translate('Select') }}---</option>--}}
{{--                                            @foreach ($br as $b)--}}
{{--                                                <option value="{{ $b['id'] }}">{{ $b['name'] }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4">--}}
{{--                                        <label for="name">{{ \App\CPU\translate('Unit') }}</label>--}}
{{--                                        <select class="js-example-basic-multiple form-control" name="unit">--}}
{{--                                            @foreach (\App\CPU\Helpers::units() as $x)--}}
{{--                                                <option value="{{ $x }}"--}}
{{--                                                    {{ old('unit') == $x ? 'selected' : '' }}>--}}
{{--                                                    {{ $x }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2 rest-part">
                        <div class="card-header">
                            <h4>{{ \App\CPU\translate('Variations') }}</h4>
                        </div>
                        <div class="card-body">

{{--                            <div class="form-group">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <label for="colors">--}}
{{--                                            {{ \App\CPU\translate('Colors') }} :--}}
{{--                                        </label>--}}
{{--                                        <label class="switch">--}}
{{--                                            <input type="checkbox" class="status" name="colors_active"--}}
{{--                                                   value="{{ old('colors_active') }}">--}}
{{--                                            <span class="slider round"></span>--}}
{{--                                        </label>--}}
{{--                                        <select--}}
{{--                                            class="js-example-basic-multiple js-states js-example-responsive form-control color-var-select"--}}
{{--                                            name="colors[]" multiple="multiple" id="colors-selector" disabled>--}}
{{--                                            @foreach (\App\Model\Color::orderBy('name', 'asc')->get() as $key => $color)--}}
{{--                                                <option value="{{ $color->code }}">--}}
{{--                                                    {{ $color['name'] }}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-6">--}}
{{--                                        <label for="attributes" style="padding-bottom: 3px">--}}
{{--                                            {{ \App\CPU\translate('Attributes') }} :--}}
{{--                                        </label>--}}
{{--                                        <select--}}
{{--                                            class="js-example-basic-multiple js-states js-example-responsive form-control"--}}
{{--                                            name="choice_attributes[]" id="choice_attributes" multiple="multiple">--}}
{{--                                            @foreach (\App\Model\Attribute::orderBy('name', 'asc')->get() as $key => $a)--}}
{{--                                                <option value="{{ $a['id'] }}">--}}
{{--                                                    {{ $a['name'] }}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-12 mt-2 mb-2">--}}
{{--                                        <div class="customer_choice_options" id="customer_choice_options">--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>

{{--                    <div class="card mt-2 rest-part">--}}
{{--                        <div class="card-header">--}}
{{--                            <h4>{{ \App\CPU\translate('Product_price_&_stock') }}</h4>--}}
{{--                        </div>--}}
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">{{ \App\CPU\translate('Service price') }}</label>
                                        <input type="number" min="0" value="0" step="0.01"
                                               placeholder="{{ \App\CPU\translate('Service price') }}" name="unit_price"
                                               value="{{ old('unit_price') }}" class="form-control" required>
                                    </div>
{{--                                    <div class="col-md-4">--}}
{{--                                        <label class="control-label">{{ \App\CPU\translate('discount_type') }}</label>--}}
{{--                                        <select class="form-control js-select2-custom" name="discount_type">--}}
{{--                                            <option value="flat">{{ \App\CPU\translate('Flat') }}</option>--}}
{{--                                            <option value="percent">{{ \App\CPU\translate('Percent') }}</option>--}}
{{--                                        </select></div>--}}
                                    <div class="col-md-4">
                                        <label class="control-label">{{ \App\CPU\translate('Phone') }}</label>
                                        <input type="number"
                                               placeholder="{{ \App\CPU\translate('Phone') }}" name="unit_price"
                                               value="{{ old('phone') }}" class="form-control" required></div>

                                        {{--                                    <div class="col-md-6">--}}
{{--                                        <label class="control-label">{{ \App\CPU\translate('Purchase_price') }}</label>--}}
{{--                                        <input type="number" min="0" value="0" step="0.01"--}}
{{--                                               placeholder="{{ \App\CPU\translate('Purchase_price') }}"--}}
{{--                                               name="purchase_price" value="{{ old('purchase_price') }}"--}}
{{--                                               class="form-control" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="row pt-4">--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <label class="control-label">{{ \App\CPU\translate('Tax') }}</label>--}}
{{--                                        <label class="badge badge-info">{{ \App\CPU\translate('Percent') }} ( % )</label>--}}
{{--                                        <input type="number" min="0" value="0" step="0.01"--}}
{{--                                               placeholder="{{ \App\CPU\translate('Tax') }}" name="tax"--}}
{{--                                               value="{{ old('tax') }}" class="form-control">--}}
{{--                                        <input name="tax_type" value="percent" style="display: none">--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4">--}}
{{--                                        <label class="control-label">{{ \App\CPU\translate('discount_type') }}</label>--}}
{{--                                        <select class="form-control js-select2-custom" name="discount_type">--}}
{{--                                            <option value="flat">{{ \App\CPU\translate('Flat') }}</option>--}}
{{--                                            <option value="percent">{{ \App\CPU\translate('Percent') }}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4">--}}
{{--                                        <label class="control-label">{{ \App\CPU\translate('Discount') }}</label>--}}
{{--                                        <input type="number" min="0" value="0" step="0.01"--}}
{{--                                               placeholder="{{ \App\CPU\translate('Discount') }}" name="discount"--}}
{{--                                               value="{{ old('discount') }}" class="form-control" required>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <div class="sku_combination" id="sku_combination">--}}

                                </div>
{{--                                <div class="row pt-4">--}}
{{--                                    <div class="col-md-3" id="quantity">--}}
{{--                                        <label class="control-label">{{ \App\CPU\translate('total') }}--}}
{{--                                            {{ \App\CPU\translate('Quantity') }}</label>--}}
{{--                                        <input type="number" min="0" value="0" step="1"--}}
{{--                                               placeholder="{{ \App\CPU\translate('Quantity') }}" name="current_stock"--}}
{{--                                               value="{{ old('current_stock') }}" class="form-control" required>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3" id="minimum_order_qty">--}}
{{--                                        <label class="control-label">{{ \App\CPU\translate('minimum_order_quantity') }}</label>--}}
{{--                                        <input type="number" min="1" value="1" step="1"--}}
{{--                                               placeholder="{{ \App\CPU\translate('minimum_order_quantity') }}" name="minimum_order_qty"--}}
{{--                                               class="form-control" required>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3" id="shipping_cost">--}}
{{--                                        <label class="control-label">{{ \App\CPU\translate('shipping_cost') }} </label>--}}
{{--                                        <input type="number" min="0" value="0" step="1"--}}
{{--                                               placeholder="{{ \App\CPU\translate('shipping_cost') }}" name="shipping_cost"--}}
{{--                                               class="form-control" required>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3" id="shipping_cost_multy">--}}
{{--                                        <div>--}}
{{--                                            <label--}}
{{--                                                class="control-label">{{ \App\CPU\translate('shipping_cost_multiply_with_quantity') }}--}}
{{--                                            </label>--}}

{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <label class="switch">--}}
{{--                                                <input type="checkbox" name="multiplyQTY" id="">--}}
{{--                                                <span class="slider round"></span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                        </div>
                    </div>

                    <div class="card mt-2 mb-2 rest-part">
                        <div class="card-header">
                            <h4>{{ \App\CPU\translate('seo_section') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label class="control-label">{{ \App\CPU\translate('Meta_title') }}</label>
                                    <input type="text" name="meta_title" placeholder="" class="form-control">
                                </div>

                                <div class="col-md-8 mb-4">
                                    <label class="control-label">{{ \App\CPU\translate('Meta_description') }}</label>
                                    <textarea rows="10" type="text" name="meta_description" class="form-control"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-0">
                                        <label>{{ \App\CPU\translate('Meta_image') }}</label>
                                    </div>
                                    <div class="border border-dashed">
                                        <div class="row" id="meta_img"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2 rest-part">
                        <div class="card-body">
                            <div class="row">
{{--                                <div class="col-md-12 mb-4">--}}
{{--                                    <label class="control-label">{{ \App\CPU\translate('Youtube video link') }}</label>--}}
{{--                                    <small class="badge badge-soft-danger"> (--}}
{{--                                        {{ \App\CPU\translate('optional, please provide embed link not direct link') }}.--}}
{{--                                        )</small>--}}
{{--                                    <input type="text" name="video_link"--}}
{{--                                           placeholder="EX : https://www.youtube.com/embed/5R06LRdUCSE" class="form-control"--}}
{{--                                           required>--}}
{{--                                </div>--}}

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>{{ \App\CPU\translate('Upload_service_images') }}</label><small
                                            style="color: red">* ( {{ \App\CPU\translate('ratio 1:1') }} )</small>
                                    </div>
                                    <div class="p-2 border border-dashed" style="max-width:430px;">
                                        <div class="row" id="coba"></div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">{{ \App\CPU\translate('Upload_thumbnail') }}</label><small
                                            style="color: red">* ( {{ \App\CPU\translate('ratio 1:1') }} )</small>
                                    </div>
                                    <div style="max-width:200px;">
                                        <div class="row" id="thumbnail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-footer">
                        <div class="row">
                            <div class="col-md-12" style="padding-top: 20px">
                                <button type="submit"
                                        class="btn btn-primary float-right">{{ \App\CPU\translate('Submit') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('public/assets/back-end/js/tags-input.min.js') }}"></script>
    <script src="{{ asset('public/assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('public/assets/back-end/js/spartan-multi-image-picker.js') }}"></script>
    <script>
        $(function() {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'images[]',
                maxCount: 10,
                rowHeight: 'auto',
                groupClassName: 'col-6',
                maxFileSize: '',
                placeholderImage: {
                    image: '{{ asset('public/assets/back-end/img/400x400/img2.jpg') }}',
                    width: '100%',
                },
                dropFileLabel: "Drop Here",
                onAddRow: function(index, file) {

                },
                onRenderedPreview: function(index) {

                },
                onRemoveRow: function(index) {

                },
                onExtensionErr: function(index, file) {
                    toastr.error(
                        '{{ \App\CPU\translate('Please only input png or jpg type file') }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                },
                onSizeErr: function(index, file) {
                    toastr.error('{{ \App\CPU\translate('File size too big') }}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });

            $("#thumbnail").spartanMultiImagePicker({
                fieldName: 'image',
                maxCount: 1,
                rowHeight: 'auto',
                groupClassName: 'col-12',
                maxFileSize: '',
                placeholderImage: {
                    image: '{{ asset('public/assets/back-end/img/400x400/img2.jpg') }}',
                    width: '100%',
                },
                dropFileLabel: "Drop Here",
                onAddRow: function(index, file) {

                },
                onRenderedPreview: function(index) {

                },
                onRemoveRow: function(index) {

                },
                onExtensionErr: function(index, file) {
                    toastr.error(
                        '{{ \App\CPU\translate('Please only input png or jpg type file') }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                },
                onSizeErr: function(index, file) {
                    toastr.error('{{ \App\CPU\translate('File size too big') }}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });

            $("#meta_img").spartanMultiImagePicker({
                fieldName: 'meta_image',
                maxCount: 1,
                rowHeight: '280px',
                groupClassName: 'col-12',
                maxFileSize: '',
                placeholderImage: {
                    image: '{{ asset('public/assets/back-end/img/400x400/img2.jpg') }}',
                    width: '90%',
                },
                dropFileLabel: "Drop Here",
                onAddRow: function(index, file) {

                },
                onRenderedPreview: function(index) {

                },
                onRemoveRow: function(index) {

                },
                onExtensionErr: function(index, file) {
                    toastr.error(
                        '{{ \App\CPU\translate('Please only input png or jpg type file') }}', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                },
                onSizeErr: function(index, file) {
                    toastr.error('{{ \App\CPU\translate('File size too big') }}', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });

        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>
    <script>
        function check() {
            Swal.fire({
                title: '{{ \App\CPU\translate('Are you sure') }}?',
                text: '',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: 'default',
                confirmButtonColor: '#377dff',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then((result) => {
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                var formData = new FormData(document.getElementById('product_form'));
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post({
                    url: '{{ route('seller.service.add-new') }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.errors) {
                            for (var i = 0; i < data.errors.length; i++) {
                                toastr.error(data.errors[i].message, {
                                    CloseButton: true,
                                    ProgressBar: true
                                });
                            }
                        } else {
                            toastr.success(
                                '{{ \App\CPU\translate('Service updated successfully!') }}', {
                                    CloseButton: true,
                                    ProgressBar: true
                                });
                            $('#product_form').submit();
                        }
                    }
                });
            })
        };
    </script>

    <script>
        $(".lang_link").click(function(e) {
            e.preventDefault();
            $(".lang_link").removeClass('active');
            $(".lang_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            let lang = form_id.split("-")[0];
            console.log(lang);
            $("#" + lang + "-form").removeClass('d-none');
            if (lang == '{{ $default_lang }}') {
                $(".rest-part").removeClass('d-none');
            } else {
                $(".rest-part").addClass('d-none');
            }
        })
    </script>

    {{-- ck editor --}}
    <script src="{{ asset('/') }}vendor/ckeditor/ckeditor/ckeditor.js"></script>
    <script src="{{ asset('/') }}vendor/ckeditor/ckeditor/adapters/jquery.js"></script>
    <script>
        $('.textarea').ckeditor({
            contentsLangDirection: '{{ Session::get('direction') }}',
        });
    </script>
    {{-- ck editor --}}
@endpush
