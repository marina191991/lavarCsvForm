<!DOCTYPE html>
<html lang="en">
<head>

    <title></title>
    <style>
        table {
            width: 50%; /* Ширина таблицы */
            background: white; /* Цвет фона таблицы */
            color: white; /* Цвет текста */
            border-spacing: 1px; /* Расстояние между ячейками */
        }

        td, th {
            background: #84a9bd; /* Цвет фона ячеек */
            padding: 5px; /* Поля вокруг текста */
        }
    </style>
</head>
<body>

<form action="/">
    <table>
        <tbody>
        <tr>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Возраст</td>
            <td>Страна</td>
            <td>Город</td>
            <td>Телефон</td>
            <td>Статус</td>

        </tr>
        @foreach ($users as $user)
            <tr>
                <td>   {{ $user->getFirstName()}} </td>
                <td>   {{ $user->getLastName()}} </td>
                <td>   {{ $user->getAge()}} </td>
                <td>   {{ $user->getCountry()}} </td>
                <td>   {{ $user->getCity()}} </td>
                <td>   {{ $user->getPhone()}} </td>
                <td>   {{ $user->getSeniority()}} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    First name:<br>
    <input type="text" name="f_name" @if ($f_name) value = {{$f_name}} @endif><br>
    Last name:<br>
    <input type="text" name="l_name" @if ($l_name) value = {{$l_name}} @endif><br><br>
    Age min
    <input type="text" name="age_Min" @if ($age_Min) value = {{$age_Min}} @endif>
    Age max
    <input type="text" name="age_Max" @if ($age_Max) value = {{$age_Max}} @endif><br><br>

    Country

    <select name="country">
        <option @if (!$country) selected @endif value="0">выберите страну</option>
        <option @if ($country == "Russia") selected @endif value="Russia">Россия</option>
        <option @if ($country == "Sri Lanka") selected @endif value="Sri Lanka">Шри Ланка</option>
        <option @if ($country == "Turkey")selected @endif  value="Turkey">Турция</option>
    </select>
    <br><br>
    <input type="submit" name="submit"><br><br>
    <input type="reset" name="reset" value="сбросить"><br><br>

</form>
</body>
</html>
