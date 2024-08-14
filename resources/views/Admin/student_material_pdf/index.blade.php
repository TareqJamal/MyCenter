@extends('Admin.layout.index')
@section('title')
    الملفات الدراسية
@endsection
@section('content')
    <div class="card p-0 mb-4">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
            <div class="app-academy-md-25 card-body py-0">
                <img src="{{asset('Admin/vuexy-html-admin-template/assets/img/illustrations/bulb-light.png')}}"
                     class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand"
                     data-app-light-img="illustrations/bulb-light.png" data-app-dark-img="illustrations/bulb-dark.png"
                     height="90"/>
            </div>
            <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                <h3 class="card-title mb-4 lh-sm px-md-5 lh-lg">
                    تأسيس , ممارسة , اتقان
                    <span class="text-primary fw-medium text-nowrap">في مكان واحد</span>.
                </h3>
                <p class="mb-3">
                    ألان مع منصة مدرسي متشلش هم المذاكرة لانه هدفنا انه نوفرلك كل سبل الراحة عن طريق الفيديوهات
                    الاونلاين
                </p>
                <div class="d-flex align-items-center justify-content-between app-academy-md-80">
                    <input type="search" placeholder="دور براحتك" class="form-control me-2"/>
                    <button type="submit" class="btn btn-primary btn-icon"><i class="ti ti-search"></i></button>
                </div>
            </div>
            <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                <img src="{{asset('Admin/vuexy-html-admin-template/assets/img/illustrations/pencil-rocket.png')}}"
                     alt="pencil rocket" height="188" class="scaleX-n1-rtl"/>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header d-flex flex-wrap justify-content-between gap-3">
            <div class="card-title mb-0 me-1">
                <h5 class="mb-1">الملفات الدراسية</h5>
            </div>
            <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
                <select id="select2_course_select" class="select2 form-select chapters" data-placeholder="All Courses">
                    <option value="" id="all">كل الفصول</option>
                    @foreach($chapters as $chapter)
                        <option value="{{$chapter->id}}" data-id="{{$chapter->id}}">{{$chapter->name}}</option>
                    @endforeach
                </select>

                {{--                <label class="switch">--}}
                {{--                    <input type="checkbox" class="switch-input">--}}
                {{--                    <span class="switch-toggle-slider">--}}
                {{--            <span class="switch-on"></span>--}}
                {{--            <span class="switch-off"></span>--}}
                {{--          </span>--}}
                {{--                    <span class="switch-label text-nowrap mb-0">Hide completed</span>--}}
                {{--                </label>--}}
            </div>
        </div>
        <div class="card-body">
            <div class="row gy-4 mb-4 content_filter">
                @foreach($pdfs as $pdf)
                    <div class="col-sm-6 col-lg-4">
                        <div class="card p-2 h-100 shadow-none border">
                            <div class="card-body p-3 pt-2">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-label-primary">{{$pdf->chapters->name}}</span>
                                </div>
                                <a href="" class="h5">{{$pdf->title}}</a>
                                <br>
                                <div class="d-flex flex-column flex-md-row gap-2 text-nowrap mt-3">
                                    <a class="app-academy-md-50 btn btn-label-secondary me-md-2 d-flex align-items-center"
                                       href="{{$pdf->file}}" download>
                                        <i class="ti ti-rotate-clockwise-2 align-middle scaleX-n1-rtl  me-2 mt-n1 ti-sm"></i><span>تحميل</span>
                                    </a>
                                    <a class="app-academy-md-50 btn btn-label-primary d-flex align-items-center"
                                       href="{{$pdf->file}}">
                                        <span class="me-2">مشاهدة</span><i
                                            class="ti ti-chevron-right scaleX-n1-rtl ti-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{--            <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">--}}
            {{--                <ul class="pagination">--}}
            {{--                    <li class="page-item prev">--}}
            {{--                        <a class="page-link" href="javascript:void(0);"><i class="ti ti-chevron-left ti-xs scaleX-n1-rtl"></i></a>--}}
            {{--                    </li>--}}
            {{--                    <li class="page-item active">--}}
            {{--                        <a class="page-link" href="javascript:void(0);">1</a>--}}
            {{--                    </li>--}}
            {{--                    <li class="page-item">--}}
            {{--                        <a class="page-link" href="javascript:void(0);">2</a>--}}
            {{--                    </li>--}}
            {{--                    <li class="page-item">--}}
            {{--                        <a class="page-link" href="javascript:void(0);">3</a>--}}
            {{--                    </li>--}}
            {{--                    <li class="page-item">--}}
            {{--                        <a class="page-link" href="javascript:void(0);">4</a>--}}
            {{--                    </li>--}}
            {{--                    <li class="page-item">--}}
            {{--                        <a class="page-link" href="javascript:void(0);">5</a>--}}
            {{--                    </li>--}}
            {{--                    <li class="page-item next">--}}
            {{--                        <a class="page-link" href="javascript:void(0);"><i class="ti ti-chevron-right ti-xs scaleX-n1-rtl"></i></a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </nav>--}}
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#select2_course_select').on('change', function () {
                var selectedOption = $(this).find('option:selected');
                var chapter_id = selectedOption.data('id');
                if (selectedOption.attr('id') === 'all') {
                    window.location.reload();
                } else {
                    var url = "{{route('students_material-pdfs.show','chapter_id')}}";
                    url = url.replace('chapter_id', chapter_id);
                    $.ajax({
                        url: url,
                        method: "Get",
                        success: function (response) {
                            $(".content_filter").html(response.html)
                        }
                    })
                }


            });
        })
    </script>
@endsection
