<div class="card border">
    <div class="card-body">
        <form action="{{ route('admin.paypal-setting.update') }}" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Status</label>
                        <select name="paypal_status" class="form-control">
                            <option @selected(config('payment.paypal_status') === 'active') value="active">Active</option>
                            <option @selected(config('payment.paypal_status') === 'inactive') value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Mode</label>
                        <select name="paypal_mode" class="form-control">
                            <option @selected(config('payment.paypal_mode') === 'sandbox') value="sandbox">Sandbox</option>
                            <option @selected(config('payment.paypal_mode') === 'live') value="live">Live</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Country</label>
                        <select name="paypal_country" class="form-control select2">
                            <option value="">Select</option>
                            @foreach (config('countires') as $key => $country)
                                <option @selected(config('payment.paypal_country') === $key) value="{{ $key }}">{{ $country }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Currency</label>
                        <select name="paypal_currency" class="form-control select2">
                            <option value="">Select</option>
                            @foreach (config('currencies.currency_list') as $key => $currency)
                                <option @selected(config('payment.paypal_currency') === $currency) value="{{ $currency }}">{{ $key }}
                                    ({{ $currency }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Currency Rate (Per
                            {{ config('settings.site_default_currency') }})</label>
                        <input type="text" class="form-control" name="paypal_currency_rate"
                            value="{{ config('payment.paypal_currency_rate') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Cliend Id</label>
                        <input type="text" class="form-control" name="paypal_client_id"
                            value="{{ config('payment.paypal_client_id') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Secret Key</label>
                        <input type="text" class="form-control" name="paypal_secret_key"
                            value="{{ config('payment.paypal_secret_key') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal App Key</label>
                        <input type="text" class="form-control" name="paypal_app_key"
                            value="{{ config('payment.paypal_app_key') }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
