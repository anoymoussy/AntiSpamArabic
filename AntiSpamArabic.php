<?php

$API_KEY = ""; //// Your Token
$bot_id = 12345678; //// Your Bot ID
$e = "@djgbot"; //// Your Bot USERNAME

define('BOT_TOKEN', $API_KEY);

function bot($method, $datas = []){
$url = "https://api.telegram.org/bot".BOT_TOKEN."/".$method;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$res = curl_exec($ch);
curl_close($ch);
return json_decode($res, true);
}
function getupdates($up_id){
$get = bot('getupdates', [
'offset' => $up_id
]);
return end($get['result']);

}
function run($up){
$message = $up['message'];
$from_id = $up['message']['from']['id'];
$text = $up['message']['text'];
$chat_id = $up['message']['chat']['id'];
$new = $up['message']['new_chat_member'];
$left = $up['message']['left_chat_member'];
$contact = $up['message']['contact'];
$audio = $up['message']['audio'];
$location = $up['message']['location'];
$memb = $up['message']['message_id'];
$game = $up['message']['game'];
$name = $up['message']['from']['first_name'];
$gp_name = $up['message']['chat']['title'];
$user = $up['message']['from']['username'];
$for = $up['message']['from']['id'];
$sticker = $up['message']['sticker'];
$video = $up['message']['video'];
$photo = $up['message']['photo'];
$voice = $up['message']['voice'];
$doc = $up['message']['document'];
$fwd = $up['message']['forward_from'];
$re = $up['message']['reply_to_message'];
$re_id = $up['message']['reply_to_message']['from']['id'];
$re_user = $up['message']['reply_to_message']['from']['username'];
$re_msgid = $up['message']['reply_to_message']['message_id'];
$type = $up['message']['chat']['type'];
$number = str_word_count($text);
$numper = strlen($text);
$set = file_get_contents("data/$chat_id.txt");
$ex = explode("\n", $set);
$photo1 = $ex[0];
$sticker1 = $ex[1];
$contact1 = $ex[2];
$doc1 = $ex[3];
$fwd1 = $ex[4];
$voice1 = $ex[5];
$link1 = $ex[6];
$audio1 = $ex[7];
$video1 = $ex[8];
$tag1 = $ex[9];
$mark1 = $ex[10];
$bots1 = $ex[11];
$commands = array('/add', '/lock photo', '/lock voice', '/lock audio', '/lock video', '/lock link', '/lock user', '/lock sticker', '/lock contact', '/lock doc', '/promote', '/ban', '/kick', '/pin', '/setname', "قفل الصور", "قفل البصمات", "قفل الصوت", "قفل الفيديو", "قفل الروابط", "قفل الجهات", "قفل الملفات", "حظر", "طرد", "رفع ادمن", "ضع اسم", "تثبيت", "/link", "الرابط");
$s = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$bot_id);
$ss = json_decode($s, true);
$bot = $ss['result']['status'];
if(in_array($text, $commands) and $bot != "administrator"){
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "• Sorry Bot has not been promoted in the group ☄️🔥",
 'reply_to_message_id' => $mid
]);
}
$get = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$from_id);
$info = json_decode($get, true);
$you = $info['result']['status'];
$gp_get = file_get_contents("data/groups.txt");
$groups = explode("\n", $gp_get);
if($text == "/start"){
mkdir('data');
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "
مرحبا بك في بوت الحمايه الاسرع في التلكرام ☄️✨

البوت يعمل بسرعه عاليه وكفاءه ممتازه جدا 🔥⚡️

المطور يتحدى جميع بوتات الحمايه اذا كان هناك في سرعته 💥💫

Developer ⚡️ :- @EVIL_EVS",
 'reply_to_message_id' => $mid,
 'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "اضفني للمجموعتك 🔥", 'url' => "t.me/djgbot?startgroup=new"]],
 [['text' => "قناتنا🔥", 'url' => "xnxx.com"]]
]
])
]);
}
if ($new and $new->id == $bot_id) {
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => " \n• الان ارسل :- /add ☄️",
 'reply_to_message_id' => $mid
]);
}

if ($type == "supergroup" and in_array($chat_id, $groups)){

if($you != "creator" && $you != "administrator" && $from_id != $sudo){
bot('deleteMessage', [
'chat_id' => $chat_id,
 'message_id' => $message['message_id']
]);
}

if($voice and $voice1 == "l"){
bot('deleteMessage', [
'chat_id' => $chat_id,
 'message_id' => $message['message_id']
]);
}
if($audio && $audio1 == "l"){
bot('deleteMessage', [
'chat_id' => $chat_id,
 'message_id' => $message['message_id']
]);
}
if($video && $video1 == "l"){
bot('deleteMessage', [
'chat_id' => $chat_id,
 'message_id' => $message['message_id']
]);
}
if($link1 == "l" and preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/', $text) ){
bot('deleteMessage', [
'chat_id' => $chat_id,
 'message_id' => $message['message_id']
]);
}
if($tag1 == "l" and preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)#(.*)|#(.*)|(.*)#/', $text)){
bot('deleteMessage', [
'chat_id' => $chat_id,
 'message_id' => $message['message_id']
]);
}
if($doc and $doc1 == "l"){
bot('deleteMessage', [
'chat_id' => $chat_id,
 'message_id' => $message['message_id']
]);
}
if($sticker and $sticker1 == "l"){
bot('deleteMessage', [
'chat_id' => $chat_id,
 'message_id' => $message['message_id']
]);
}
if($up['message']['forward_from'] && $fwd1 == "l"){
bot('deleteMessage', [
'chat_id' => $chat_id,
 'message_id' => $message['message_id']
]);
}
if($message['entities']){
bot('deleteMessage', [
'chat_id' => $chat_id,
 'message_id' => $message['message_id']
]);
}
}

if($new and $bots1 == "l" and $new['id'] != $bot_id){
$is_bot = $new['is_bot'];
if ($is_bot) {
bot('kickChatMember', [
'chat_id' => $chat_id,
 'user_id' => $new['id']
]);
}
}
}

if($bot == "administrator"){
if($you == "creator" or $you == "administrator") {
$re_user = $update->message->reply_to_message->from->username;
if($re && $text == "/del" ){
bot('deleteMessage', [
'chat_id' => $chat_id,
 'message_id' => $re_msgid
]);
}
if($re and $re_id != $bot and $re_id != $sudo and $text == "/ban" or $text == "حظر" or $text == "/kick" or $text == "طرد"){
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "• العضو 🔥 : - @$re_user
• تم حظره من المجموعه ☄️💫 !",
 'reply_to_message_id' => $mid
]);
bot('kickChatMember', [
'chat_id' => $chat_id,
 'user_id' => $re_id
]);
}
if($re and $re_id != $bot and $re_id != $sudo and $text == "/unban" or $text == "الغاء حظر"){
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "• العضو 🔥 : - @$re_user 
• تم الغاء حظره من المجموعه ☄️💫 !",
 'reply_to_message_id' => $mid
]);
bot('unbanChatMember', [
'chat_id' => $chat_id,
 'user_id' => $re_id
]);
}
if($text == "/promote" or $text == "رفع ادمن"){
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "• العضو 🔥 : - @$re_user
• تم رفعه ادمن ☄️💫 !",
 'reply_to_message_id' => $mid
]);
bot('promoteChatMember', [
'chat_id' => $chat_id,
 'user_id' => $re_id
]);
}
$ename = str_replace("/setname ", "$ename", $text);
$aname = str_replace("ضع اسم ", "$aname", $text);
if($text == "/setname $ename"){
bot('setChatTitle', [
'chat_id' => $chat_id,
 'title' => $ename
]);
}
if($text == "ضع اسم $aname"){
bot('setChatTitle', [
'chat_id' => $chat_id,
 'title' => $aname
]);
}
if($re and $text == "/pin" or $text == "تثبيت"){
bot('pinChatMessage', [
'chat_id' => $chat_id,
 'message_id' => $re_msgid
]);
}
if($text == "/lock photo" or $text == "قفل الصور"){
file_put_contents("data/$chat_id.txt", "l\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  الصور 🔥 
•  تم قفلها في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}

if($text == "/open photo" or $text == "فتح الصور"){
file_put_contents("data/$chat_id.txt", "o\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  الصور 🔥 
•  تم فتحها في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}

if($text == "/lock sticker" or $text == "قفل الملصقات"){
file_put_contents("data/$chat_id.txt", "$photo1\nl\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  الملصقات 🔥 
•  تم قفلها في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/open sticker" or $text == "فتح الملصقات"){
file_put_contents("data/$chat_id.txt", "$photo1\no\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  المصلقات 🔥 
•  تم فتحها في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/lock contact" or $text == "قفل الجهات"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\nl\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  الجهات 🔥 
•  تم قفلها في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/open contact" or $text == "فتح الجهات"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\no\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  الجهات 🔥 
•  تم فتحها في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/lock doc" or $text == "قفل الملفات"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\nl\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  الملفات 🔥 
• تم قفلها في المجموعه 💥💫,
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/open doc" or $text == "فتح الملفات"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\no\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  الملفات 🔥 
•  تم فتحها في المجموعه💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/lock fwd" or $text == "قفل التوجيه"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\nl\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  التوجيه 🔥 
•  تم قفلها في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/open fwd" or $text == "فتح التوجيه"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\no\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  التوجيه 🔥 
•  تم فتحها في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/lock voice" or $text == "قفل البصمات"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\nl\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  البصمات 🔥 
  •  تم قفلها في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/open voice" or $text == "فتح البصمات"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\no\n$link1\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  البصمات 🔥 
•  تم فتحها في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/lock link" or $text == "قفل الروابط"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\nl\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  الروابط 🔥 
  •  تم قفلها في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/open link" or $text == "فتح الروابط"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\no\n$audio1\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  الروابط 🔥 
•  تم فتحها في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/lock audio" or $text == "قفل الصوت"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\nl\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  الصوت 🔥 
  •  تم قفله في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/open audio" or $text == "فتح الصوت"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\no\n$video1\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  الصوت 🔥 
  •  تم فتحه في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/lock video" or $text == "قفل الفيديو"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\nl\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "• الفيديو 🔥 
  •  تم قفله في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/open video" or $text == "فتح الفيديو"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\no\n$tag1\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "• الفيدبو🔥 
  •  تم فتحه في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/lock user" or $text == "قفل المعرف"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\nl\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "• المعرف @ 🔥 
  •  تم قفله في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/open user" or $text == "فتح المعرف"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\no\n$mark1\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "• المعرف @ 🔥 
  •  تم فتحه في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/lock mark" or $text == "قفل الماركدون"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\nl\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "• الماركدون 🔥 
  •  تم قفله  في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/open mark" or $text == "فتح الماركدون"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\no\n$bots1");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "• الماركدون 🔥 
  •  تم فتحها  في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/lock bots" or $text == "قفل البوتات"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\nl");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "• البوتات🔥 
  •  تم قفلها  في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/open bots" or $text == "فتح البوتات"){
file_put_contents("data/$chat_id.txt", "$photo1\n$sticker1\n$contact1\n$doc1\n$fwd1\n$voice1\n$link1\n$audio1\n$video1\n$tag1\n$mark1\no");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "• البوتات 🔥 
  •  تم فتحها  في المجموعه 💥💫
•  By :- @$user",
 'reply_to_message_id' => $mid
]);
}
if($text == "/help" or $text == "/help$e"){
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "
/lock للقفل
/open للفتح
======================
| link | الروابط
| user | المعرف
| mark | الماركدون
| bots | البوتات
======================
| photo | الصور
| sticker | الملصقات
| video | الفيديو
======================
| fwd | التوجيه
| audio | الاغاني
| voice | الصوت
| contact | جهات الاتصال
| doc | الملفات
======================
• /del [reply] - لحذف رساله بالرد ♻️
• /promote [reply] - لرفع ادمن بالرد ⏫
• /setname [name] - لوضع اسم 🔆
• /pin [reply] - لتثبيت رساله بالرد 💠
• /ban [reply] - لحظر عضو بالرد ⛔️
• /kick [reply] - طرد عضو بالرد 🌀,
======================
تابعنا :- @R_8_8",
 'reply_to_message_id' => $mid
]);
}
if($text == "/start" or $text == "/start$e"){
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "/lock للقفل
/open للفتح
======================
| link | الروابط
| user | المعرف
| mark | الماركدون
======================
| photo | الصور
| sticker | الملصقات
| video | الفيديو
======================
| fwd | التوجيه
| audio | الاغاني
| voice | الصوت
| contact | جهات الاتصال
| doc | الملفات
======================
• /del [reply] - لحذف رساله بالرد ♻️
• /promote [reply] - لرفع ادمن بالرد ⏫
• /setname [name] - لوضع اسم 🔆
• /pin [reply] - لتثبيت رساله بالرد 💠
• /ban [reply] - لحظر عضو بالرد ⛔️
• /kick [reply] - طرد عضو بالرد 🌀

",
]);
}
if($text == "/setting" or $text == "/setting$e"){

bot('sendMessage', ['chat_id' => $chat_id, 'text' => "o = مفتوح 💥
l = مقفول 🔥
💥==================💥
• |🔥| • الصور  - $photo1
💥==================💥
• |🔥| •  الملصقات - $sticker1
💥==================💥
• |🔥| • الفيديو - $video1
💥==================💥
• |🔥| • الروابط -  $link1
💥==================💥
• |🔥| • الجهات - $contact1
💥==================💥
• |🔥| • الملفات - $doc1
💥==================💥
• |🔥| • التوجيه - $fwd1
💥==================💥
• |🔥| • البصمات - $voice1
💥==================💥
• |🔥| • الصوت - $audio1
💥==================💥
• |🔥| • المعرف - $tag1
💥==================💥
• |🔥| • الماركدون - $mark1

"
]);
}
}
if($bot == "administrator"){
if ($you == "administrator" or $you == "creator") {
if($text == "/add" or $text == "/add$e"){
if(!in_array($chat_id, $groups)){
file_put_contents("data/$chat_id.txt", "o\no\no\no\nl\no\nl\no\no\nl\no");
file_put_contents("data/groups.txt", "$chat_id\n", FILE_APPEND);
$t = $message->chat->title;
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  Group 🔥 :- $t
• has been successfully added to the bot 💥💫
  By ☄️ :- @$user \n Send :- /help 

",
 'reply_to_message_id' => $mid
]);
}
if (in_array($chat_id, $groups)) {
$t = $message->chat->title;
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "•  Group 🔥 :- $t
• is aleardy added to the bot 💥💫
  By ☄️ :- @$user \n Send :- /help
",
 'reply_to_message_id' => $mid
]);
}
}
}
}
if($text == "/groups"){
$c = count($groups);
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "$c"
]);
}
if($text == "/bc" and $for == $sudo){
file_put_contents("mode.txt", "bc");
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "دز الكليشه"
]);
}
$mode = file_get_contents("mode.txt");
if($text != "/bc" and $mode == "bc" and $for == $sudo){
for ($i = 0;
$i < count($groups);
$i++) {
bot('sendMessage', [
'chat_id' => $groups[$i],
 'text' => "# $text"
]);
}
unlink("mode.txt");
}
$id = $message->from->id;
$user = $message->from->username;
$name = $message->from->first_name;
if($text == "موقعي" and $you == "creator"){
bot('sendmessage', [
'chat_id' => $chat_id,
 'text' => "💡┇ انــت مــنــشــئ الــمــجــمــوعــﻫ 💯 
 💭 | مــعــرفــك :- @$user
🌐 | ايــديــك :- $id
🔗 | اســمــك :- $name


تابعنا :- @R_8_8

"
]);
}
if($text == "موقعي" and $you == "administrator"){
bot('sendmessage', [
'chat_id' => $chat_id,
 'text' => "💡┇ انــت ادمــن الــمــجــمــوعــﻫ 💯 
💭 | مــعــرفــك :- @$user
🌐 | ايــديــك :- $id
🔗 | اســمــك :- $name



"
]);
}
if($text == "موقعي" and $you == "member"){
bot('sendmessage', [
'chat_id' => $chat_id,
 'text' => "💡┇ انــت عــضــو فــي الــمــجــمــوعــﻫ 💯 
💭 | مــعــرفــك :- @$user
🌐 | ايــديــك :- $id
🔗 | اســمــك :- $name


"
]);
}

$rnd = rand(1, 999999999999999999);
if($text == "معلوماتي" or $text == "ايدي" or $text == "/id" or $text == "id"){
$re = bot("getUserProfilePhotos", ["user_id" => $id, "limit" => 1, "offset" => 0]);
$res = $re->result->photos[0][2]->file_id;
$pa = bot("getFile", ["file_id" => $res]);
$path = $pa->result->file_path;
file_put_contents("$rnd.jpg", file_get_contents("https://api.telegram.org/file/bot".$API_KEY."/".$path));
$uphoto = "http://evilapi.000webhostapp.com/$rnd.jpg"; // رابط استضافتك
bot("sendPhoto", [
'chat_id' => $chat_id,
 "photo" => $uphoto,
 'caption' => "
🌐 | ايــدي الــمــجــمــوعــﻫ :- $chat_id
💭 | مــعــرفــك :- @$user
🌐 | ايــديــك :- $id
🔗 | اســمــك :- $name 

"
]);
unlink("$rnd.jpg");
}
if($re and $text == "جلب صوره"){
$g = bot("getUserProfilePhotos", ["user_id" => $re_id, "limit" => 1, "offset" => 0]);
$r = $g->result->photos[0][2]->file_id;
$pa = bot("getFile", ["file_id" => $r]);
$path = $pa->result->file_path;
file_put_contents("$rnd.jpg", file_get_contents("https://api.telegram.org/file/bot".$API_KEY."/".$path));
$uphoto = "http://evilapi.000webhostapp.com/$rnd.jpg"; // رابط استضافتك
bot("sendPhoto", [
'chat_id' => $chat_id,
 "photo" => $uphoto,
]);
unlink("$rnd.jpg");
}
if($text == "/link" or $text == "الرابط"){
$export = json_decode(file_get_contents("api.telegram.org/bot".$API_KEY."/exportChatInviteLink?chat_id=$chat_id"));
$l = $export->result;
bot('sendMessage', [
'chat_id' => $chat_id,
 'text' => "~> $l"
]);
}
}
while(true){
$last_up = $last_up;
$get_up = getupdates($last_up+1);
$last_up = $get_up['update_id'];
run($get_up);
sleep(0.1);
}
