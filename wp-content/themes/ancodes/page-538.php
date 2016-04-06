<?php
/**
 * Created by PhpStorm.
 * User: elex
 * Date: 27-Oct-15
 * Time: 5:46 PM
 * Страница Ajax
 */
$c_Email[1]='kvl.prr@mail.ru';
$c_Email[2]='mail@klgb.ru';
$c_Email[3]='elextraza@gmail.com';



function SendSpecEmail($c_Email)
{

    $msg='

<meta charset="utf-8">

<div style="width:660px; margin:0 auto; font-family: Tahoma,sans-serif; padding:20px; background:#fff;">


	<p style="clear:both; font-weight:bold; margin-top:20px;">
	Вопрос к специалисту '.$_GET['s_name'].'</p>

    <b>Контактное лицо:</b> '.$_GET['user_name'].'<br>

    <b>Электронная почта:</b> '.$_GET['user_email'].'</p><br>
    <b>Сообщение:</b><br> '.$_GET['user_msg'].'</p>


	<p><strong>не забудьте перезвонить в течение 5 минут,<br>«болит-голова.рф»</strong></p>

	<hr>

	<p>© 2012-2015 «болит-голова.рф»</p>

	<table style="width:100%;">
		<tr>
			<td style="text-align:left; width:33%;"><a style="color:#8dc63f;"   href="http://xn----8sbbfe2audweb7b.xn--p1ai/about/">О клинике</a></td>
			<td style="text-align:center; width:33%;"><a style="color:#8dc63f;" href="http://xn----8sbbfe2audweb7b.xn--p1ai/contacts/">Контакты</a></td>

		</tr>
	</table>


</div>
';


    $subject = "Вопрос специалисту: ".$_GET['s_name'];

    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Клиника-сайт <info@xn----8sbbfe2audweb7b.xn--p1ai>\r\n";
// $headers .= "Bcc: birthday-archive@example.com\r\n";

    foreach($c_Email as $email)
    {
        mail($email, $subject, $msg, $headers);
    }


    if(isset($_GET['s_email']))
    mail($_GET['s_email'], $subject, $msg, $headers);

    echo json_encode($_GET);
}


function SendReview($c_Email)
{

    $msg='

<meta charset="utf-8">

<div style="width:660px; margin:0 auto; font-family: Tahoma,sans-serif; padding:20px; background:#fff;">
    <b>Контактное лицо:</b> '.$_GET['r_name'].'<br>

    <b>Электронная почта:</b> '.$_GET['r_email'].'</p><br>
    <b>Отзыв:</b><br> '.$_GET['r_text'].'</p>


	<p><strong>не забудьте перезвонить в течение 5 минут,<br>«болит-голова.рф»</strong></p>

	<hr>

	<p>© 2012-2015 «болит-голова.рф»</p>

	<table style="width:100%;">
		<tr>
			<td style="text-align:left; width:33%;"><a style="color:#8dc63f;"   href="http://xn----8sbbfe2audweb7b.xn--p1ai/about/">О клинике</a></td>
			<td style="text-align:center; width:33%;"><a style="color:#8dc63f;" href="http://xn----8sbbfe2audweb7b.xn--p1ai/contacts/">Контакты</a></td>

		</tr>
	</table>


</div>
';




    $subject = "Отзыв с сайта";


    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Клиника-сайт <info@xn----8sbbfe2audweb7b.xn--p1ai>\r\n";
// $headers .= "Bcc: birthday-archive@example.com\r\n";

    foreach($c_Email as $email)
    {
        mail($email, $subject, $msg, $headers);
    }

    if(isset($_GET['s_email']))
        mail($_GET['s_email'], $subject, $msg, $headers);

    echo json_encode($_GET);
}



function SendQuestion($c_Email)
{

    $msg='

<meta charset="utf-8">

<div style="width:660px; margin:0 auto; font-family: Tahoma,sans-serif; padding:20px; background:#fff;">


	<p style="clear:both; font-weight:bold; margin-top:20px;">
	Запись на прием к специалисту '.$_GET['s_name'].'</p>

    <b>Контактное лицо:</b> '.$_GET['user_name'].'<br>

    <b>Телефон:</b> '.$_GET['user_phone'].'</p><br>
    <b>Сообщение:</b><br> '.$_GET['user_msg'].'</p>


	<p><strong>не забудьте перезвонить в течение 5 минут,<br>«болит-голова.рф»</strong></p>

	<hr>

	<p>© 2012-2015 «болит-голова.рф»</p>

	<table style="width:100%;">
		<tr>
			<td style="text-align:left; width:33%;"><a style="color:#8dc63f;"   href="http://xn----8sbbfe2audweb7b.xn--p1ai/about/">О клинике</a></td>
			<td style="text-align:center; width:33%;"><a style="color:#8dc63f;" href="http://xn----8sbbfe2audweb7b.xn--p1ai/contacts/">Контакты</a></td>

		</tr>
	</table>


</div>
';


    $subject = "Запись на прием: ".$_GET['s_name'];

    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Клиника-сайт <info@xn----8sbbfe2audweb7b.xn--p1ai>\r\n";
// $headers .= "Bcc: birthday-archive@example.com\r\n";

    foreach($c_Email as $email)
    {
        mail($email, $subject, $msg, $headers);
    }
    if(isset($_GET['s_email']))
        mail($_GET['s_email'], $subject, $msg, $headers);

    echo json_encode($_GET);
}

$ff = new Favorites();
$exc = new ExSearch();

if(isset($_GET['action']))
{
    if($_GET['action']=='SendSpecEmail')
    {
        SendSpecEmail($c_Email);
    }
    elseif($_GET['action']=='SendQuestion')
    {
        SendQuestion($c_Email);
    }

    elseif($_GET['action']=='SendReview')
    {
        SendReview($c_Email);
    }
    /*Favorites*/
    elseif($_GET['action']=='FavoritesAdd')
    {
        $ff->Add($_GET['f_id']);
    }
    elseif($_GET['action']=='FavoritesDelete')
    {
        $ff->Delete($_GET['f_id']);
    }
    elseif($_GET['action']=='FavoritesUpdateMenu')
    {
        $ff->UpdateMenu();
    }
    elseif($_GET['action']=='FavoritesClear')
    {
        $ff->Clear();
    }
    elseif($_GET['action']=='RentaGetCount')
    {
        $rr = new RentaSearch();
        $rr->GetCount();
        echo '<pre>';
        print_r($rr->RentaCount);
        echo '</pre>';
    }
    elseif($_GET['action']=='RentaSearch')
    {
        $rr = new RentaSearch();
        $rr->tplSearchResult();
    }
    elseif($_GET['action']=='RentaSearchCount')
    {
        $rr = new RentaSearch();
       $res['count'] = count($this->SearchResult);
    }
    /*Поиск экскурсий*/
     elseif($_GET['action']=='ExSearch')
        {
           $exc->search();
        }

}
