<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo ">
        <a href="#" class="app-brand-link">

            <img src="{{asset('Admin')}}/vuexy-html-admin-template/assets/img/teacher.webp" alt=""
                 width="75px" height="75px">

            <span class="app-brand-text demo menu-text fw-bold">مدرسي</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>


    <ul class="menu-inner py-1">
        <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'admins.index' ? 'active' : ''}}">
            <a href="{{route('admins.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div>المستخدمين</div>
            </a>
        </li>
        <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'grades.index' ? 'active' : ''}}">
            <a href="{{route('grades.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-messages"></i>
                <div>الصفوف الدراسية</div>
            </a>
        </li>
        <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'sessions.index' ? 'active' : ''}}">
            <a href="{{route('sessions.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-calendar"></i>
                <div>الحصص</div>
            </a>
        </li>
        <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'students.index' ? 'active' : ''}}">
            <a href="{{route('students.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div>الطلاب</div>
            </a>
        </li>
        <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'exams.index' ? 'active' : ''}}">
            <a href="{{route('exams.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div>الامتحانات</div>
            </a>
        </li>
        <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'attendances.index' ? 'active' : ''}}">
            <a href="{{route('attendances.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div>الحصص اليومية</div>
            </a>
        </li>
        <li class="menu-item {{\Illuminate\Support\Facades\Route::currentRouteName() == 'old-students.index' ? 'active' : ''}}">
            <a href="{{route('old-students.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div>الطلاب السابقون</div>
            </a>
        </li>
    </ul>


</aside>
