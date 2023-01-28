<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBot with PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
       
            <div class="chatbox">
                    <div class="header">
                        <h4> <img src='img/perfil.jpg' class='imgRedonda'/> VShopBot </h4>
                                    
                    </div>
                    
                        <div class="body" id="chatbody">
                        <p class="alicia">Hello! I'm VShopBot, I'm here to answer questions related to the virtual store. I hope I can help you.</p>
                            <div class="scroller"></div>
                        </div>

                    <form class="chat" method="post" autocomplete="off">
                    
                                <div>
                                    <input type="text" name="chat" id="chat" placeholder="Ask him something" style=" font-family: cursive; font-size: 20px;">
                                </div>
                                <div>
                                    <input type="submit" value="OK" id="btn">
                                </div>
                    </form>

            <input type=button class="creador" value="creators" onClick="mi_alerta()">
        </div>
    </div>
    
    <script src="app.js"></script>
    
            <SCRIPT LANGUAGE="JavaScript">
        function mi_alerta () {
        alert ("Authors"+
               "\n"+
               "\nIdrovo Jhon & Josue Morales & Jair Morocho % Juan Salgado");
        }
        </SCRIPT>
        
</body>

</html>