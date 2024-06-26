<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список пользователей</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        h1 {
            color: #333;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .button-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        .button.edit {
            background-color: #FF69B4;
        }
        .button.delete {
            background-color: #F44336;
        }
        .button.add {
            background-color: #2196F3;
        }
    </style>
</head>
<body>
    <h1>Список пользователей</h1>

    <!-- Таблица пользователей -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Third Name</th>
                <th class="actions">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr data-id="{{ $user->id }}">
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->second_name }}</td>
                <td>{{ $user->third_name }}</td>
                <td class="actions">
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                    </form>
                    <form action="{{ route('update.form', $user->id) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Изменить</button>
                    </form>

                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="button-container">
        <form action="{{ route('register') }}" method="GET">
            <button id="add-button" class="button add">Добавить пользователя</button>
        </form>
    </div>

</body>
</html>
