<?php
$to = "proekt@etppro.ru";//Почтовый ящик на который будет отправлено сообщение
$subject = "Тема сообщения";//Тема сообщения
$message = "Message, сообщение!";//Сообщение, письмо
$headers = "Content-type: text/plain; charset=utf-8 \r\n";
//Шапка сообщения, содержит определение типа письма, от кого, и кому отправить ответ на письмо

// Проверяем или метод запроса POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Поочередно проверяем или были переданные параметры формы, или они не пустые
    if (isset($_POST['name']) && $_POST['name'] != "") {
        //Если параметр есть, присваеваем ему переданое значение
        $name = trim(strip_tags($_POST['name']));
    }

    if (isset($_POST['phone']) && $_POST['phone'] != "") {
        $number = trim(strip_tags($_POST['phone']));
    }

    if (isset($_POST['mail']) && $_POST['mail'] != "") {
        $mail = trim(strip_tags($_POST['mail']));
    }

    if (isset($_POST['type'])) {
        $type = trim(strip_tags($_POST['type']));
    }

    if (isset($_POST['description'])) {
        $question = trim(strip_tags($_POST['description']));
    }

    // Формируем письмо
    $message = "Заявка на расчет: \n";
    $message .= "Имя: " . $name;
    $message .= "\n";
    $message .= "Телефон: " . $number;
    $message .= "\n";
    $message .= "Почта: " . $mail;
    $message .= "\n";
    $message .= "Тип работ: " . $type;
    $message .= "<\n>";
    $message .= "Подробнее: " . $question;
    // Окончание формирования тела письма

    // Посылаем письмо
    $send = mail($to, $subject, $message, $headers);

    if ($send) { //проверяем, отправилось ли сообщение
        header('Location: https://etp-pro.ru');
        echo "Сообщение отправлено успешно!
            		Перейти на сайт <a href='https://etp-pro.ru/'>ЭкспертТрансПроект</a>, если вас не перенаправило вручную.";
    } else {
        echo "Ошибка, сообщение не отправлено! Возможно, проблемы на сервере";
    }

} else {
    exit;
}
?>