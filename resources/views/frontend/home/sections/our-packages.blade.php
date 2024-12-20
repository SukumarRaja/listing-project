<section id="wsus__package">
    <div class="wsus__package_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>Our pricing </h2>
                        <p>Lorem ipsum dolor sit amet, qui assum oblique praesent te. Quo ei erant essent scaevola
                            estut clita dolorem ei est mazim fuisset scribentur.</p>
                    </div>
                </div>
            </div>
            <div class="procing_area">
                <div class="row">
                    @foreach ($packages as $package)
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="member_price">
                                <h4>{{ $package->name }}</h4>
                                <h5>{{ currencyPosition($package->price) }}
                                    @if ($package->number_of_days === -1)
                                        <span>/ Lifetime</span>
                                    @else
                                        <span>/ {{ $package->number_of_days }} Days</span>
                                    @endif

                                </h5>
                                @if ($package->number_of_listings === -1)
                                    <p>Unlimited Listings</p>
                                @else
                                    <p>{{ $package->number_of_listings }} Listings</p>
                                @endif

                                @if ($package->number_of_amenities === -1)
                                    <p>Unlimited Amenities</p>
                                @else
                                    <p>{{ $package->number_of_amenities }} Amenities</p>
                                @endif

                                @if ($package->number_of_photos === -1)
                                    <p>Unlimited Photos</p>
                                @else
                                    <p>{{ $package->number_of_photos }} Photos</p>
                                @endif

                                @if ($package->number_of_videos === -1)
                                    <p>Unlimited Videos</p>
                                @else
                                    <p>{{ $package->number_of_videos }} Videos</p>
                                @endif

                                @if ($package->number_of_featured_listings === -1)
                                    <p>Unlimited Feature Listings</p>
                                @else
                                    <p>{{ $package->number_of_featured_listings }} Feature Listings</p>
                                @endif

                                <a href="{{ route('checkout.index', $package->id) }}">Order now</a>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>
