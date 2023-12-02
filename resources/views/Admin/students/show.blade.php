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
        <th scope="row" style="font-weight: bold;color: green">الحصة</th>
        <th scope="row"  style="font-weight: bold;color: green">تبدء في</th>
        <th scope="row"  style="font-weight: bold;color: green">تنتهي في</th>
        <th scope="row"  style="font-weight: bold;color: green"> الايام</th>
    </tr>

    @foreach($obj->sessions as $session)
        <tr>
            <td>{{ $session->name }}</td>
            <td>{{ $session->start_from }}</td>
            <td>{{ $session->start_to }}</td>
            @foreach($session->days as $day)
                <td>{{ $day->day }}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
