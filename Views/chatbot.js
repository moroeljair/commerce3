  (function(d, t) {
      var v = d.createElement(t), s = d.getElementsByTagName(t)[0];
      v.onload = function() { 
        window.voiceflow.chat.load({
          verify: { projectID: '63d73e40c18c28000631c8f5' },
          url: 'https://general-runtime.voiceflow.com',
          versionID: 'production'
        });
      }
      v.src = "https://cdn.voiceflow.com/widget/bundle.mjs"; 
      v.type = "text/javascript"; 
      s.parentNode.insertBefore(v, s);
  })(document, 'script');

  const checkForElement = setInterval(function() {
    const myAsyncDiv = document.getElementsByClassName('c-bQoszf')[0];
    if (myAsyncDiv) {
      clearInterval(checkForElement);
      //console.log('El elemento ha sido cargado');
      myAsyncDiv.addEventListener('click', function() {
        //alert('Botón clicado');
        //desde la raiz
        //regitrar_click_enlace('ayuda');
        //desde la views
        regitrar_click_enlace2('ayuda');
      });
    }
  }, 100);
 