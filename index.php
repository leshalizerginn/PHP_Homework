<?php
require_once('index.html');
// Если есть ошибки, возвращаем обратно на форму с сообщениями об ошибках
    if (!empty($errors)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        $_SESSION['errors'] = $errors;
        exit();
    } else {
        // Сбор данных формы
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'number' => $_POST['number'],
            'select' => $_POST['select'],
            'radio' => $_POST['radio'],
            'checkbox' => isset($_POST['checkbox']) ? 'yes' : 'no',
            'password' => $_POST['password'],
        ];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    // Валидация полей
    if (empty($_POST['name'])) {
        $errors[] = "Поле 'Текст' обязательно для заполнения.";
    }
    if (empty($_POST['password'])) {
        $errors[] = "Поле 'Пароль' обязательно для заполнения.";
    }
    if (empty($_POST['email'])) {
        $errors[] = "Введите корректный email.";
    }
    if (empty($_POST['number'])) {
        $errors[] = "Поле 'Число' обязательно для заполнения.";
    }
    if (empty($_POST['select'])) {
        $errors[] = "Выберите опцию из селекта.";
    }
    if (empty($_POST['radio'])) {
        $errors[] = "Выберите вариант 'Радио'.";
    }
    if (empty($_POST['checkbox'])) {
        $errors[] = "Необходимо согласие с условиями.";
    }
        // Логирование данных в файл
        $logData = [
            'date' => date('Y-m-d H:i:s'),
            'formData' => $data,
        ];
        file_put_contents('log.json', json_encode($logData) . PHP_EOL, FILE_APPEND);
        echo "Данные успешно обработаны.";
    }
}