<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>Listian</title>
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/summernote.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">


    <!-- <link rel="stylesheet" href="css/rtl.css"> -->

    @stack('styles')
</head>

<body>
    <!--==========================
        Navbar Start
    ===========================-->
    @include('frontend.layouts.navbar')

    <!--==========================
        Navbar END
    ===========================-->

    <!--==========================
        Contents Start
    ===========================-->
    @yield('contents')

    <!--==========================
        Content END
    ===========================-->



    <!--==========================
        FOOTER PART START
    ===========================-->
    @include('frontend.layouts.footer')
    <!--==========================
        FOOTER PART END
    ===========================-->

    <!--==========================
        LISTING MODEL START
    ===========================-->
    <section id="wsus__map_popup">
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close popup_close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="far fa-times"></i></button>
                    <div class="modal-body modal-listing-content">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        LISTING MODEL END
    ===========================-->

    <!--=============SCROLL BTN==============-->
    <div class="scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--=============SCROLL BTN==============-->


    <!--jquery library js-->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
    <!--slick js-->
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <!--venobox js-->
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <!--counter js-->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
    <!--nice select js-->
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <!--isotope js-->
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <!--summer_note js-->
    <script src="{{ asset('frontend/js/summernote.min.js') }}"></script>
    <!--select js-->
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <!--main/custom js-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
        $('body').on('click', '.delete-item', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            console.log(url);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: response.message,
                                    icon: "success"
                                });

                                window.location.reload();
                            } else if (response.status === 'error') {
                                Swal.fire({
                                    title: "Something wen\'t wrong!",
                                    text: response.message,
                                    icon: "error"
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    })
                }
            })
        })
    </script>

    <script>
        function showListingModal(id) {
            $.ajax({
                method: 'GET',
                url: '{{ route('listing-modal', ':id') }}'.replace(":id", id),
                data: {},
                beforeSend: function() {
                    $('.modal-listing-content').html(`<div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span></div>`);
                },
                success: function(response) {
                    $('.modal-listing-content').html(response);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            })
        }
    </script>
    @stack('scripts')
</body>

</html>
