<?php
include "Bot.php";
$bot = new Bot;
$questions = [
    // ما هي التكنولوجيا
      "ما هي التكنولوجيا؟" => "التكنولوجيا هي مجموعة المفاهيم والمعرفة العلمية التي يستخدمها الإنسان لتحقيق هدف محدد ، والذي يمكن أن يكون حلاً لمشكلة معينة للفرد أو إشباع بعض احتياجاته.",
     "تقنية؟" => "إنه مفهوم واسع يغطي مجموعة واسعة من الجوانب والتخصصات في الإلكترونيات أو الفن أو الطب.",
     "التكنولوجيا الحالية؟" => "مجموعة المعرفة الخاصة بالتقنية.",
     //What do you sell
     "ما هي العناصر التي تبيعها؟" =>"We have computer items such as: Peripherals (keyboards, mouse, headphones, microphones and speakers), Monitors, Chairs",
     "هل تبيعون عناصر التكنولوجيا فقط؟" =>"نعم ، تحقق من كتالوج الشراء." ,
     "هل لديك مستلزمات كمبيوتر؟" =>"نعم ، لدينا ملحقات ، أجهزة (اللوحات الرئيسية ، ذاكرة رام ، التخزين ، بطاقة الفيديو ، بطاقات التوسع ، التبريد ، مزودات الطاقة) ، الشاشات ، الملحقات",
    
     //Recommend Processors
       "ما هو المعالج الذي تنصح به" => "في الكتالوج الخاص بنا ، لدينا معالجات Intel و AMD ، نوصيك باختيار Intel i7-10100F غير مؤمن. التكلفة 799.99 دولارًا",
       "ما هو أرخص معالج" => "إذا كنت بحاجة إلى AMD ، فإنني أوصي بـ AMD Athlon 3020GE بسعر 72 دولارًا. في حالة احتياجك إلى Intel ، أوصي بـ Intel Pentium Gold G6400 بسعر 109.99 دولارًا",
       "وهو المعالج الأمثل" => "معالج Intel Core i7-11700F بدون رسومات. التكلفة 699.99 دولارًا",


     //Recommend Monitor

     "ما الشاشة التي توصي بها" => "أوصي بـ Benq Bl2420Pt 24 ″ (23.8 ″) QHD 2560X1440 Ips D-Su / Dvi Monitor ، مثالية للعمل عن بعد. التكلفة 244.99 دولارًا",
     "وهو أفضل جهاز عرض" => "The Curved Monitor Asus TUF Gaming Vg24Vq 24″ 23.6″ 144Hz 1Ms, ideal for games that require greater detail and texturing of the scenes. The cost is $434.99",
     "وهي أرخص شاشة" => "شاشة Dell E2016H 19.5 Led Vga-Display Port - HD 1600X900P بتكلفة 134.99 دولارًا.",

     //Recommend chairs

     "أي كرسي توصي به" => "كرسي ألعاب Marvo Ch-106 أسود / أسود. التكلفة 179.99 دولارًا.",
     "ما هو أرخص كرسي" => "كرسي مكتب Zack-Cr 801T-Cr أبيض / أسود. التكلفة 99.99 دولارًا",
     "ما هو أفضل كرسي" => "كرسي Meetion Mt-Chr15 أسود / أسود مريح / قابل للتعديل. التكلفة 209.99 دولارًا.",

     //Recommend Peripherals

     "ما الأجهزة الطرفية لديك" => "لدينا لوحات المفاتيح والماوس وسماعات الرأس والميكروفونات ومكبرات الصوت",
     "ما هي لوحة المفاتيح التي توصي بها" => "مجموعة لوحة مفاتيح وماوس لاسلكية من لوجيتك MK235 (920-007901). التكلفة 29.99 دولارًا",
     "وهي أرخص لوحة مفاتيح" => "Gamer Keyboard Xfire Xtratech Backlit Membrane / Usb / Gray Xtr-Gk907-Gr. التكلفة 19.99 دولارًا",
     "وهي أفضل لوحة مفاتيح" => "لوحة مفاتيح ميكانيكية XPG Summoner RGB - Cherry Mx Blue - Es (Summoner5B-Bkces). التكلفة 69.99 دولارًا",
     "وهو أرخص فأر" => "لوحة ماوس Meetion Mt-PD015 أسود 25 × 19 مم. التكلفة 1.99 دولار",
     "ما هو أفضل فأر" => "لوجيتك G502 Hero Edition Mouse Kda League Of Legends White (910-006096). التكلفة 57.99 دولارًا",
     "ما الماوس الذي تنصح به" => "ماوس الألعاب XPG التمهيدي RGB 12000Dpi 7 أزرار - أسود (Primer-BkcWW). التكلفة 53.99 دولارًا",
     "ما هي سماعات الرأس التي توصي بها" => "Anker Soundbuds Sport Wireless Bluetooth Headphones - لا يوجد ضمان. التكلفة 33.99 دولارًا",
     "وهي أرخص سماعة" => "سماعة رأس C- ميكروفون Genius HS-M270 برتقالي. التكلفة 27.99 دولارًا",
     "وهي أفضل سماعة" => "سماعة رأس ريدراجون H220 ثيميس - 3.5 ملم - أسود. التكلفة 35.99 دولارًا",
     "ما الميكروفون الذي تنصح به" => "Trust Exxo Gxt 256 ميكروفون مع قاعدة - RGB - USB (23510). التكلفة 101.99 دولار",
     "ما هو أرخص ميكروفون" => "ترست Gxt 215 زابي ميكروفون يو اس بي مضيء (23800). التكلفة 17.99 دولارًا",
     "ما هو أفضل ميكروفون" => "ميكروفون Marvo Mic-03 مع حامل ثلاثي القوائم وفلتر. التكلفة 41.99 دولارًا",
     "ما المتحدث الذي تنصح به" => "سماعة هافيت RGB للوسائط المتعددة Hv-Sk708-Bk. التكلفة 29.99 دولارًا",
     "وهو أرخص مكبر صوت" => "مكبر صوت Trust Ziva RGB - USB - 22 واط أسود (23644). التكلفة 9.99 دولار",
     "ما هو أفضل متحدث" => "لوجيتك Z213 2.1 مكبر صوت - 14 واط (980-000941). التكلفة 35.99 دولارًا",

     //yam
     "ما اسمك؟" =>"أنا VShopBot وأنا هنا لخدمتك",
     "ما اسمك؟" =>"أنا VShopBot وأنا هنا لخدمتك",
     "هل تمتلك اسم؟" =>"أنا VShopBot وأنا هنا لخدمتك",


     //greeting
     "أهلا" => "مرحبًاّ! كيف حالك!",
     "تحيه" => "كيف هي احوالك",
     "أهلا" =>"من الجميل أن أراك",
 
     //farewell
     "مع السلامة" => "يعتني",
     "حتى المرة القادمة" =>"اراك قريبا",
     "أرك لاحقًا" => "سوف اكون في انتظارك",
     "وداعا" =>"وداعا ♥",
     "أرك لاحقًا" =>"أراك سيدتي ♥",
     //
     "ما اسمك؟" =>" اسمي VShopBot",
   


    "اسمك هو؟" => "اسمي هو " . $bot->getName(),
    "ماذا تكون؟" => "أنا " . $bot->getGender()
    
];

if (isset($_GET['msg'])) {
   
    $msg = strtolower($_GET['msg']);
    $bot->hears($msg, function (Bot $botty) {
        global $msg;
        global $questions;
        if ($msg == 'hi' || $msg == "hello") {
            $botty->reply('مرحبا');
        } elseif ($botty->ask($msg, $questions) == "") {
            $botty->reply("أنا آسف ، الأسئلة يجب أن تكون متعلقة بمتجرنا الافتراضي.");
        } else {
            $botty->reply($botty->ask($msg,$questions));
        }
    });
}