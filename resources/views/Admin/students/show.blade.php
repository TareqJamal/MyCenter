<table class="table">
    <tbody>
    <tr>
        <th scope="row" style="font-weight: bold;color: red">الاسم</th>
        <td>{{ $obj->name }}</td>
    </tr>
    <tr>
        <th scope="row" style="font-weight: bold;color: red">رقم تليفون الطالب</th>
        <td>{{ $obj->phone }}</td>
    </tr>
    <tr>
        <th scope="row" style="font-weight: bold;color: red">رقم تليفون ولي الامر</th>
        <td>{{ $obj->parent_phone }}</td>
    </tr>
    <tr>
        <th scope="row" style="font-weight: bold;color: red">العنوان</th>
        <td>{{ $obj->address }}</td>
    </tr>

    <tr>
        <th scope="row" style="font-weight: bold;color: red">الصف الدراسي</th>
        <td>{{ $obj->grades->name }}</td>
    </tr>
    </tbody>
</table>
<table class="table">
    <tbody>
    <tr>
        <th scope="row" style="font-weight: bold;color: red">اجمالي عدد مرات الغياب</th>
        <td>{{ count($obj->getCountAttendance) }}</td>
    </tr>
    <tr>
        <th scope="row" style="font-weight: bold;color: red"> عدد مرات الغياب في الشهر الحالي</th>
        <td>{{ count($obj->getCountAttendanceMonthly) }}</td>
    </tr>
    <tr>
        <th scope="row" style="font-weight: bold;color: red">دفع فلوس الشهر الحالي :</th>
        @if(!is_null(@$obj->moneyStatus->is_paid))
            @if(@$obj->moneyStatus->is_paid == 1)
                <td><p style="font-weight: bold;color: green">تم الدفع</p></td>
            @elseif(@$obj->moneyStatus->is_paid == 0)
                <td><p style="font-weight: bold;color: red">لم يدفع</p></td>
            @endif
        @else
            <td><p style="font-weight: bold;color: red">لم يتم تسجيله حتى الآن</p></td>
        @endif
    </tr>
    </tbody>
</table>
<table class="table">
    <tbody>
    <tr>
        <th scope="row" style="font-weight: bold;color: green">الحصة</th>
        <th scope="row" style="font-weight: bold;color: green">تبدء في</th>
        <th scope="row" style="font-weight: bold;color: green">تنتهي في</th>
        <th scope="row" style="font-weight: bold;color: green"> الايام</th>
    </tr>
    @foreach($obj->sessions as $session)
        <tr>
            <td>{{ $session->name }}</td>
            <td>{{ $session->start_from }}</td>
            <td>{{ $session->start_to }}</td>
            @foreach($session->days as $day)
                @if( $day->day == 'Saturday')
                    <td>السبت</td>
                @elseif($day->day == 'Sunday')
                    <td>الاحد</td>
                @elseif($day->day == 'Monday')
                    <td>الاثنين</td>
                @elseif($day->day == 'Tuesday')
                    <td>الثلاثاء</td>
                @elseif($day->day == 'Wednesday')
                    <td>الاربعاء</td>
                @elseif($day->day == 'Thursday')
                    <td>الخميس</td>
                @elseif($day->day == 'Friday')
                    <td>الجمعة</td>
                @endif

            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>

