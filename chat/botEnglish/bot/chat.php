<?php
include "Bot.php";
$bot = new Bot;
$questions = [
    //what is technology
     "what is technology?" => "Technology is the set of notions and scientific knowledge that the human being uses to achieve a precise objective, which can be the solution of a specific problem of the individual or the satisfaction of some of her needs.",
     "technology?" => "It is a broad concept that covers a wide variety of aspects and disciplines within electronics, art or medicine.",
     "Current technology?" => "Group of knowledge specific to a technique.",
     //What do you sell
     "what items do you sell?" =>"We have computer items such as: Peripherals (keyboards, mouse, headphones, microphones and speakers), Monitors, Chairs",
     "Do you only sell technology items?" =>"Yes, check the purchase catalog." ,
     "Do you have computer supplies?" =>"Yes, we have Peripherals, Hardware (Mainboards, Ram Memory, Storage, Video Card, Expansion Cards, Cooling, Power Supplies), Monitors, Accessories",
    
     //Recommend Processors
       "what processor do you recommend" => "In our catalog, we have Intel and AMD processors, we recommend you choose the intel i7-10100F unlocked. The cost is $799.99",
       "what is the cheapest processor" => "If you require an AMD, I recommend AMD Athlon 3020GE which is at $72. In the case that you require Intel, I recommend Intel Pentium Gold G6400 which is at $109.99",
       "which is the most optimal processor" => "The Intel Core i7-11700F processor without Graphics. The cost is $699.99",


     //Recommend Monitor

     "What monitor do you recommend" => "I recommend the Benq Bl2420Pt 24″ (23.8″) QHD 2560X1440 Ips D-Su/Dvi Monitor, ideal for teleworking. The cost is $244.99",
     "which is the most optimal monitor" => "The Curved Monitor Asus TUF Gaming Vg24Vq 24″ 23.6″ 144Hz 1Ms, ideal for games that require greater detail and texturing of the scenes. The cost is $434.99",
     "which is the cheapest monitor" => "Monitor Dell E2016H 19.5″ Led Vga-Display Port – Hd 1600X900P at a cost of $134.99.",

     //Recommend chairs

     "What chair do you recommend" => "Marvo Ch-106 Black/Black Gaming Chair. The cost is $179.99.",
     "What is the cheapest chair" => "Office Chair Zack-Cr 801T-Cr White/Black. The cost is $99.99s",
     "which is the best chair" => "Meetion Chair Mt-Chr15 Black/Black Ergonomic/Adjustable. The cost is $209.99.",

     //Recommend Peripherals

     "what peripherals do you have" => "We have keyboards, mouse, headphones, microphones, speakers",
     "what keyboard do you recommend" => "Logitech Mk235 Wireless Keyboard And Mouse Combo (920-007901). The cost is $29.99",
     "which is the cheapest keyboard" => "Gamer Keyboard Xfire Xtratech Backlit Membrane/Usb/Grey Xtr-Gk907-Gr. The cost is $19.99",
     "which is the best keyboard" => "XPG Summoner RGB Mechanical Keyboard – Cherry Mx Blue – Es (Summoner5B-Bkces). The cost is #69.99",
     "which is the cheapest mouse" => "Mouse Pad Meetion Mt-Pd015 Black 25X19mm. The cost is $1.99",
     "what is the best mouse" => "Logitech G502 Hero Edition Mouse Kda League Of Legends White (910-006096). The cost is $57.99",
     "What mouse do you recommend" => "XPG Gaming Primer RGB 12000Dpi 7 Buttons Mouse – Black (Primer-BkcWW). The cost is $53.99",
     "what headphones do you recommend" => "Anker Soundbuds Sport Wireless Bluetooth Headphones – No Warranty. The cost is $33.99",
     "which is the cheapest headset" => "Headset C-Microphone Genius HS-M270 Orange. The cost is $27.99",
     "which is the best headset" => "Headset Redragon H220 Themis – 3.5mm – Black. The cost is $35.99",
     "What microphone do you recommend" => "Trust Exxo Gxt 256 Microphone With Base – RGB – Usb (23510). The cost is $101.99",
     "what is the cheapest microphone" => "Trust Gxt 215 Zabi Led-Illuminated Usb Microphone (23800). The cost is $17.99",
     "what is the best microphone" => "Marvo Mic-03 Microphone With Tripod And Filter. The cost is $41.99",
     "What speaker do you recommend" => "Havit RGB Multimedia Speaker Hv-Sk708-Bk. The cost is $29.99",
     "which is the cheapest speaker" => "Trust Ziva RGB Speaker – Usb – 22W Black (23644). The cost is $9.99",
     "what is the best speaker" => "Logitech Z213 2.1 Speakers – 14 Watts (980-000941). The cost is $35.99",

     //yam
     "What is your name?" =>"I am VShopBot and I am here to serve you",
     "what's your name?" =>"I am VShopBot and I am here to serve you",
     "do you have a name?" =>"I am VShopBot and I am here to serve you",


     //greeting
     "hello" => "Hello how are you!",
     "a greeting" => "how are you doing",
     "hello" =>"nice to see you",
 
     //farewell
     "goodbye" => "take care",
     "until next time" =>"see you soon",
     "see you" => "I'll be waiting for you",
     "bye" =>"Good bye ♥",
     "see you" =>"see you lady ♥",
     //
     "what is your name?" =>" my name is VShopBot",
   


    "Your name is?" => "My name is " . $bot->getName(),
    "What are you?" => "I'm a " . $bot->getGender()
    
];

if (isset($_GET['msg'])) {
   
    $msg = strtolower($_GET['msg']);
    $bot->hears($msg, function (Bot $botty) {
        global $msg;
        global $questions;
        if ($msg == 'hi' || $msg == "hello") {
            $botty->reply('Hello');
        } elseif ($botty->ask($msg, $questions) == "") {
            $botty->reply("I'm sorry, the questions must be related to our virtual store.");
        } else {
            $botty->reply($botty->ask($msg,$questions));
        }
    });
}
