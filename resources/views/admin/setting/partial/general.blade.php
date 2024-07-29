<div class="card border">
    <div class="card-body">
        <form action="{{ route('admin.general-setting.update') }}" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Site Name</label>
                        <input type="text" class="form-control" name="site_name"
                            value="{{ config('settings.site_name') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Site Email</label>
                        <input type="text" class="form-control" name="site_email"
                            value="{{ config('settings.site_email') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Site Phone</label>
                        <input type="text" class="form-control" name="site_phone"
                            value="{{ config('settings.site_phone') }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Site Default Currency</label>
                        <select name="site_default_currency" class="form-control select2">
                            @foreach (config('currencies.currency_list') as $key => $currency)
                                <option @selected(config('settings.site_default_currency') === $currency) value="{{ $currency }}">{{ $key }}
                                    ({{ $currency }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Site Currency Icon</label>
                        <input type="text" class="form-control" name="site_currency_icon"
                            value="{{ config('settings.site_currency_icon') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Site Currency Position</label>
                        <select name="site_currency_position" class="form-control">
                            <option @selected(config('settings.site_currency_position') === 'left') value="left">Left</option>
                            <option @selected(config('settings.site_currency_position') === 'right') value="right">Right</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
