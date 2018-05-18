<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading">{{ trans('app.contact_us') }}</h2>
            <h3 class="section-subheading" style="color: #fed136;">{{ trans('messages.we_will_get_back_to_you_soon') }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['route' => 'contact_us', 'id' => 'contactForm', 'name' => 'sentMessage', 'data-toggle' => 'validator', 'novalidate']) !!}
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div id="success"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.full_name'), 'data-validation-required-message' => trans('validation.required', ['attribute' => 'name']), 'required']) !!}
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.phone')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.subject'), 'data-validation-required-message' => trans('validation.required', ['attribute' => 'subject']), 'required']) !!}
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.message'), 'rows' => '3', 'data-validation-required-message' => trans('validation.required', ['attribute' => 'message']), 'required']) !!}
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                        <div id="success"></div>
                        <button type="submit" class="btn btn-xl">{{ trans('app.send_message') }}</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>