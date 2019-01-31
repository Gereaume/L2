//<![CDATA[
      var pag=["asterix","animfanta","bohemianrapso","grinch","robindesbois"];
      var tim=1000;  // temps de pause en millisecondes entre les appels à Nxt
      var wIm=215; // largeur en pixels des images
      var hIm=290; // hauteur en pixels des images
      var dIm=0;   // espace en pixels entre les images défilantes
      var wZn=215; // largeur de la zone des images défilantes
      var pas=215;   // décalage des images à chaque appel à la fonction Nxt
      
      var tmr,nIm=pag.length; // timer et nombre d'images
      var wTt=nIm*(wIm+dIm);  // largeur totale des images
      var xNx=wIm;            // est décrémenté de 'pas' à chaque appel à Nxt

      function Nxt() {
         var i,x=xNx;
         for (i=0; i<nIm; i++){
            if (x-wIm<=wZn) document.getElementById('im'+i).style.left=(x-wIm)+'px';
            if ((x+=wIm+dIm) >= wTt) x -= wTt;
         }
         if ((xNx-=pas) < 0) xNx += wTt;
      }
      
      function Clk(i) {
         window.open(pag[i]+'.html','_self');
      }

      function Ini() { // dans body, ajustez également la position absolue du div:id='imd'
         var i,s='',e=document.getElementById('imd');
         for (i=0; i < nIm; i++) s += "<img id='im"+i+"' onclick='Clk("+i+")' title='"+pag[i]+"' style='position:absolute; left:9999px; top:0px; cursor: pointer;' src='/info/etu/l2info/s161440/public_html/Projet/IMG/"+pag[i]+".jpg'/>";
         e.style.width=wZn+'px'; e.style.height=hIm+'px'; e.innerHTML=s;    
      }
   //]]>


