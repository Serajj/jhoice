@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div class="d-flex flex-column col-sm-12 col-md-6">
    <!-- Name Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('name', trans("lang.e_service_name"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans("lang.e_service_name_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.e_service_name_help") }}
            </div>
        </div>
    </div>

    <!-- Categories Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row ">
        {!! Form::label('categories[]', trans("lang.e_service_categories"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('categories[]', $category, $categoriesSelected, ['class' => 'select2 form-control not-required' , 'data-empty'=>trans('lang.e_service_categories_placeholder'),'multiple'=>'multiple']) !!}
            <div class="form-text text-muted">{{ trans("lang.e_service_categories_help") }}</div>
        </div>
    </div>

    <!-- Price Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row ">
        {!! Form::label('price', trans("lang.e_service_price"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            <div class="input-group">
                {!! Form::number('price', null, ['class' => 'form-control','step'=>'any', 'min'=>'0', 'placeholder'=> trans("lang.e_service_price_placeholder")]) !!}
                <div class="input-group-append">
                    <div class="input-group-text text-bold px-3">{{setting('default_currency','$')}}</div>
                </div>
            </div>
            <div class="form-text text-muted">
                {{ trans("lang.e_service_price_help") }}
            </div>
        </div>
    </div>

    <!-- Discount Price Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row ">
        {!! Form::label('discount_price', trans("lang.e_service_discount_price"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            <div class="input-group">
                {!! Form::number('discount_price', null, ['class' => 'form-control','step'=>'any', 'min'=>'0', 'placeholder'=> trans("lang.e_service_discount_price_placeholder")]) !!}
                <div class="input-group-append">
                    <div class="input-group-text text-bold px-3">{{setting('default_currency','$')}}</div>
                </div>
            </div>
            <div class="form-text text-muted">
                {{ trans("lang.e_service_discount_price_help") }}
            </div>
        </div>
    </div>

    <!-- Price Unit Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row ">
        {!! Form::label('price_unit', trans("lang.e_service_price_unit"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('price_unit', ['hourly' => trans('lang.e_service_price_unit_hourly'), 'daily'=> trans('lang.e_service_price_unit_daily'), 'monthly'=> trans('lang.e_service_price_unit_monthly'), 'yearly'=> trans('lang.e_service_price_unit_yearly'), 'fixed'=> trans('lang.e_service_price_unit_fixed') ], null, ['class' => 'select2 form-control', 'onchange'=>'changeDuration(this.value)', 'id'=>'price-unit-selector'],) !!}
          <div class="form-text text-muted">{{ trans("lang.e_service_price_unit_help") }}</div>
        </div>
    </div>


    <!-- Quantity Unit Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row">
        {!! Form::label('quantity_unit', trans("lang.e_service_quantity_unit"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::text('quantity_unit', null,  ['class' => 'form-control','placeholder'=>  trans("lang.e_service_quantity_unit_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.e_service_quantity_unit_help") }}
            </div>
        </div>
    </div>
     <!-- Fixed Unit Field -->
     {{-- <div id="fixed_unit_container">
        <div class="form-group align-items-baseline d-flex flex-column flex-md-row ">
            {!! Form::label('fixed_select', "Selected Fixed price unit",['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
            <div class="col-md-9">
                {!! Form::select('fixed_select', ['hourly' => trans('lang.e_service_price_unit_hourly'), 'daily'=> trans('lang.e_service_price_unit_daily'), 'monthly'=> trans('lang.e_service_price_unit_monthly'), 'yearly'=> trans('lang.e_service_price_unit_yearly'), ], null, ['class' => 'select2 form-control', 'onchange'=>'changeFixedDuration(this.value)', 'id'=>'fixed-unit-selector'],) !!}
                <div class="form-text text-muted">{{ trans("lang.e_service_price_unit_help") }}</div>
            </div>
        </div>
      </div> --}}

    <!-- Duration Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row ">
        {!! Form::label('durationHourly', trans("lang.e_service_duration"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div id="duration-field" class="col-md-9">
            <div class="input-group timepicker duration" data-target-input="nearest">
                {!! Form::text('durationHourly', null,  ['class' => 'form-control datetimepicker-input','placeholder'=>  trans("lang.e_service_duration_placeholder"), 'data-target'=>'.timepicker.duration','data-toggle'=>'datetimepicker','autocomplete'=>'off']) !!}
                <div id="widgetParentId"></div>
                <div class="input-group-append" data-target=".timepicker.duration" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fas fa-business-time"></i></div>
                </div>
            </div>
            <div class="form-text text-muted">
                {{ trans("lang.e_service_duration_help") }}
            </div>
        </div>

        <div id="duration-fixed-field" class="col-md-9">
            <div class="input-group">
                {!! Form::text('durationHour', null, 
                 ['class' => 'form-control','placeholder'=>  trans("lang.hour"),'autocomplete'=>'off']) !!}
                 {!! Form::text('durationDay', null, 
                 ['class' => 'form-control','placeholder'=>  trans("lang.day"),'autocomplete'=>'off']) !!}
                {!! Form::text('durationMonth', null, 
                ['class' => 'form-control','placeholder'=>  trans("lang.month"),'autocomplete'=>'off']) !!}
               {!! Form::text('durationYear', null, 
               ['class' => 'form-control','placeholder'=>  trans("lang.year"),'autocomplete'=>'off']) !!}
              
                {{-- <div class="input-group-append">
                    <div id="custom-field-text1" class="input-group-text text-bold px-3"></div>
                </div> --}}
            </div>
            <div class="form-text text-muted">
                {{ trans("lang.e_service_duration_help") }}
            </div>
        </div>
        
        <div id="custom-field" class="col-md-9">
          <div class="input-group">
            {!! Form::number('duration', null,
             ['class' => 'form-control', 'placeholder'=>  trans("lang.e_service_duration_placeholder"),'autocomplete'=>'off']) !!}
            <div class="input-group-append">
                <div id="custom-field-text" class="input-group-text text-bold px-3">Days</div>
            </div>
          </div>
          <div class="form-text text-muted">
              {{ trans("lang.e_service_duration_help") }}
          </div>
        </div>
    </div>

    <!-- E Provider Id Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row ">
        {!! Form::label('e_provider_id', trans("lang.e_service_e_provider_id"),['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('e_provider_id', $eProvider, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.e_service_e_provider_id_help") }}</div>
        </div>
    </div>

    <!-- Price Unit Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row ">
        {!! Form::label('mode', "Mode",['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('mode', ["online"=>"Online", "offline"=>"Offline", "both"=>"Both"], null, ['class' => 'select2 form-control', 'id'=>'mode-selector'],) !!}
            <div class="form-text text-muted">Select online if your service is online based like online classes, online doctor consultation and Select offline if your service is offline based like class room training, tv repair, driving school...etc</div>
        </div>
    </div>

    <!-- Price Unit Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row ">
        {!! Form::label('location', "Location",['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('location', ["home"=>"Home", "office"=>"Office", "both"=>"Both"], null, ['class' => 'select2 form-control', 'id'=>'location-selector'],) !!}
            <div class="form-text text-muted">Select home if you able to visit customers location to provide service and Select office if customer needs to visit your location</div>
        </div>
    </div>
</div>
<div class="d-flex flex-column col-sm-12 col-md-6">

    <!-- Categories Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row ">
        {!! Form::label('terms[]', "Terms",['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::select('terms[]', ['Re-service accepted with in 5 days' => 'Re-service accepted with in 5 days', 'Fully refund if not satisfied' => 'Fully refund if not satisfied', 'No refund if not satisfied' => 'No refund if not satisfied', 'No free re-service' => 'No free re-service'], $terms, ['class' => 'select2 form-control not-required' , 'data-empty'=>"Select Terms",'multiple'=>'multiple']) !!}
            <div class="form-text text-muted">Insert Terms</div>
        </div>
    </div>

    <!-- Image Field -->
    <div class="form-group align-items-start d-flex flex-column flex-md-row">
        {!! Form::label('image', trans("lang.e_service_image"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            <div style="width: 100%" class="dropzone image" id="image" data-field="image">
            </div>
            <a href="#loadMediaModal" data-dropzone="image" data-toggle="modal" data-target="#mediaModal" class="btn btn-outline-{{setting('theme_color','primary')}} btn-sm float-right mt-1">{{ trans('lang.media_select')}}</a>
            <div class="form-text text-muted w-50">
                {{ trans("lang.e_service_image_help") }}
            </div>
        </div>
    </div>
    @prepend('scripts')
        <script type="text/javascript">
            var var16110647911349350349ble = [];
            @if(isset($eService) && $eService->hasMedia('image'))
            @forEach($eService->getMedia('image') as $media)
            var16110647911349350349ble.push({
                name: "{!! $media->name !!}",
                size: "{!! $media->size !!}",
                type: "{!! $media->mime_type !!}",
                uuid: "{!! $media->getCustomProperty('uuid'); !!}",
                thumb: "{!! $media->getUrl('thumb'); !!}",
                collection_name: "{!! $media->collection_name !!}"
            });
            @endforeach
            @endif
            var dz_var16110647911349350349ble = $(".dropzone.image").dropzone({
                url: "{!!url('uploads/store')!!}",
                addRemoveLinks: true,
                maxFiles: 5 - var16110647911349350349ble.length,
                init: function () {
                    @if(isset($eService) && $eService->hasMedia('image'))
                    var16110647911349350349ble.forEach(media => {
                        dzInit(this, media, media.thumb);
                    });
                    @endif
                },
                accept: function (file, done) {
                    dzAccept(file, done, this.element, "{!!config('medialibrary.icons_folder')!!}");
                },
                sending: function (file, xhr, formData) {
                    dzSendingMultiple(this, file, formData, '{!! csrf_token() !!}');
                },
                complete: function (file) {
                    dzCompleteMultiple(this, file);
                    dz_var16110647911349350349ble[0].mockFile = file;
                },
                removedfile: function (file) {
                    dzRemoveFileMultiple(
                        file, var16110647911349350349ble, '{!! url("eServices/remove-media") !!}',
                        'image', '{!! isset($eService) ? $eService->id : 0 !!}', '{!! url("uploads/clear") !!}', '{!! csrf_token() !!}'
                    );
                }
            });
            dz_var16110647911349350349ble[0].mockFile = var16110647911349350349ble;
            dropzoneFields['image'] = dz_var16110647911349350349ble;


            $('#fixed_unit_container').hide();

            changeDuration($('#price-unit-selector').val());

            function changeDuration(value){
              if(value === 'fixed'){
                $('#custom-field').hide();
                $('#duration-field').hide();
                $('#custom-field-text1').text('h/d/m/y');
                $('#duration-fixed-field').show();
              }else if(value === 'hourly'){
                $('#custom-field').hide();
                $('#duration-field').show();
                $('#fixed_unit_container').hide();
                $('#duration-fixed-field').hide();

              }else if(value === 'daily'){
                $('#duration-field').hide();
                $('#custom-field').show();
                $('#fixed_unit_container').hide();
                $('#custom-field-text').text('days');
                $('#duration-fixed-field').hide();

              }else if(value === 'monthly'){
                $('#duration-field').hide();
                $('#custom-field').show();
                $('#fixed_unit_container').hide();
                $('#custom-field-text').text('months');
                $('#duration-fixed-field').hide();

              }else if(value === 'yearly'){
                $('#duration-field').hide();
                $('#custom-field').show();
                $('#fixed_unit_container').hide();
                $('#custom-field-text').text('years');
                $('#duration-fixed-field').hide();

              }
            }

            function changeFixedDuration(value){
              if(value === 'fixed'){
                $('#custom-field').hide();
                $('#duration-field').show();
              }else if(value === 'hourly'){
                $('#custom-field').hide();
                $('#duration-field').show();
              }else if(value === 'daily'){
                $('#duration-field').hide();
                $('#custom-field').show();
                $('#custom-field-text').text('days');
              }else if(value === 'monthly'){
                $('#duration-field').hide();
                $('#custom-field').show();
                $('#custom-field-text').text('months');
              }else if(value === 'yearly'){
                $('#duration-field').hide();
                $('#custom-field').show();
                $('#custom-field-text').text('years');
              }
            }
        </script>
@endprepend
<!-- Description Field -->
    <div class="form-group align-items-baseline d-flex flex-column flex-md-row ">
        {!! Form::label('description', trans("lang.e_service_description"), ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::textarea('description', null, ['class' => 'form-control','placeholder'=>
             trans("lang.e_service_description_placeholder")  ]) !!}
            <div class="form-text text-muted">{{ trans("lang.e_service_description_help") }}</div>
        </div>
    </div>

    <div class="form-group align-items-baseline d-flex flex-column flex-md-row ">
        {!! Form::label('special_points', "Special Points", ['class' => 'col-md-3 control-label text-md-right mx-1']) !!}
        <div class="col-md-9">
            {!! Form::textarea('special_points', null, ['class' => 'form-control not-required','placeholder'=>
             "Enter any Special Points"  ]) !!}
            <div class="form-text text-muted">"Enter Special Points (if any)"</div>
        </div>
    </div>

</div>
@if($customFields)
    <div class="clearfix"></div>
    <div class="col-12 custom-field-container">
        <h5 class="col-12 pb-4">{!! trans('lang.custom_field_plural') !!}</h5>
        {!! $customFields !!}
    </div>
@endif
<!-- Submit Field -->
<div class="form-group col-12 d-flex flex-column flex-md-row justify-content-md-end justify-content-sm-center border-top pt-4">
    <div class="d-flex flex-row justify-content-between align-items-center">
        {!! Form::label('featured', trans("lang.e_service_featured"),['class' => 'control-label my-0 mx-3']) !!} {!! Form::hidden('featured', 0, ['id'=>"hidden_featured"]) !!}
        <span class="icheck-{{setting('theme_color')}}">
            {!! Form::checkbox('featured', 1, null) !!} <label for="featured"></label> </span>
    </div>
    <div class="d-flex flex-row justify-content-between align-items-center">
        {!! Form::label('available', trans("lang.e_service_available"),['class' => 'control-label my-0 mx-3']) !!} {!! Form::hidden('available', 0, ['id'=>"hidden_available"]) !!}
        <span class="icheck-{{setting('theme_color')}}">
            {!! Form::checkbox('available', 1, null) !!} <label for="available"></label> </span>
    </div>
    <button type="submit" id="e-services-submit-btn" class="btn bg-{{setting('theme_color')}} mx-md-3 my-lg-0 my-xl-0 my-md-0 my-2">
        <i class="fa fa-save"></i> {{trans('lang.save')}} {{trans('lang.e_service')}}</button>
    <a href="{!! route('eServices.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
