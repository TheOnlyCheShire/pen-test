<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация пользователя</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="password"], input[type="email"]{
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<div class="form-container">
    <h1>Обновление данных пользователя</h1>
    <form id="updateForm" method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        <input type="text" name="first_name" placeholder="First Name" value="{{ $user->first_name }}" required>
        <input type="text" name="second_name" placeholder="Second Name" value="{{ $user->second_name }}" required>
        <input type="text" name="third_name" placeholder="Third Name" value="{{ $user->third_name }}" required>
        <input type="text" name="username" placeholder="Username" value="{{ $user->username }}" required>
        <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" required>
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Сохранить данные</button>
    </form>
</div>

</body>
</html>
