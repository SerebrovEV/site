<?php
$to = "89818121788@mail.ru";//Почтовый ящик на который будет отправленно сообщение
  $subject = "Тема сообщения";//Тема сообщения
  $message = "Message, сообщение!";//Сообщение, письмо
  $headers = "Content-type: text/plain; charset=utf-8 \r\n";
  //Шапка сообщения, содержит определение типа письма, от кого, и кому отправить ответ на письмо
// Проверяем или метод запроса POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
		// Поочередно проверяем или были переданные параметры формы, или они не пустые
		if(isset($_POST["user-name"]){
			//Если параметр есть, присваеваем ему переданое значение
			$name 		=trim(strip_tags($_POST["user-name"]));
		}
		if(isset($_POST["user-phone"]))
		{
			$number 	= trim(strip_tags($_POST["user-phone"]));
		}
		if (isset( $_POST["user-work"])) {
        			$type 	= trim(strip_tags($type));
        		}
		if (isset( $_POST["user-info"])) {
			$question 	= trim(strip_tags($question));
		}
			// Формируем письмо
			$message  = "<html>";
				$message  .= "<body>";
				$message  .= "Телефон: ".$number;
				$message  .= "<br />";
				$message  .= "Имя: ".$name;
				$message  .= "<br />";
				$message  .= "Тип работ: ".$type;
                $message  .= "<br />";
				$message  .= "Вопрос: ".$question;
				$message  .= "</body>";
			$message  .= "</html>";
			// Окончание формирования тела письма
			// Посылаем письмо
			mail ($to, $subject, $message, $headers);
}
else
{
	exit;
} 
?>