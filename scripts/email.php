<?php
  $to = "89818121788@mail.ru";//Почтовый ящик на который будет отправлено сообщение
  $subject = "Тема сообщения";//Тема сообщения
  $message = "Message, сообщение!";//Сообщение, письмо
  $headers = "Content-type: text/plain; charset=utf-8 \r\n";
  //Шапка сообщения, содержит определение типа письма, от кого, и кому отправить ответ на письмо

// Проверяем или метод запроса POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
		// Поочередно проверяем или были переданные параметры формы, или они не пустые
		if(isset($_POST['name'])){
			//Если параметр есть, присваеваем ему переданое значение
			$name =trim(strip_tags($_POST['name']));
		}

		if(isset($_POST['phone']))
		{
			$number=trim(strip_tags($_POST['phone']));
		}

		if (isset( $_POST['type'])) {
        	$type=trim(strip_tags($_POST['type']));
        }

		if (isset( $_POST['description'])) {
			$question=trim(strip_tags($_POST['description']));
		}

			// Формируем письмо
			$message = "Заявка на расчет";
				$message  .= "Телефон: ".$number;
				$message  .= "\n";
				$message  .= "Имя: ".$name;
				$message  .= "\n";
				$message  .= "Тип работ: ".$type;
                $message  .= "<\n>";
				$message  .= "Подробнее: ".$question;
				$message  .= "<\n>";
			// Окончание формирования тела письма

			// Посылаем письмо
			$send = mail ($to, $subject, $message, $headers);

			if ($send) //проверяем, отправилось ли сообщение
            		echo "Сообщение отправлено успешно! Перейти на <a href='https://etp-pro.ru</a>, если вас не перенаправило вручную.";
            	else
            		echo "Ошибка, сообщение не отправлено! Возможно, проблемы на сервере";
}

else
    {
	exit;
    }
?>