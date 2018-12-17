$(document).ready(function()
{
  $( "#in_ref" ).keypress(function() {
    if(this.value.length==8)
    {
      console.log("etiqueta.php?reference="+document.getElementById('in_ref').value+"&print=0&price="+document.getElementsByName('price').item(0).checked);
      var price = 1;
      if(document.getElementsByName('price').item(0).checked) price = 0;

      $.get( "etiqueta.php?reference="+document.getElementById('in_ref').value+"&print=0&price="+price, { }).done(function( data ) {

          console.log(data);
          document.getElementById('print_area').style.backgroundImage = "url(generated.png?dummy="+Math.random()+")";
      });
    }
  });


  $( "#create" ).click(function() {
    console.log("etiqueta.php?reference="+document.getElementById('in_ref').value+"&print=0&price="+document.getElementsByName('price').item(0).checked);
    var price = 1;
    if(document.getElementsByName('price').item(0).checked) price = 0;

    $.get( "etiqueta.php?reference="+document.getElementById('in_ref').value+"&print=0&price="+price, { }).done(function( data ) {

        console.log(data);
        document.getElementById('print_area').style.backgroundImage = "url(generated.png?dummy="+Math.random()+")";
    });

  });

  $("[name='price']").bootstrapSwitch();

  $( "#preview" ).click(function() {

    var size_paper = document.getElementById('size_paper').value;
    size_paper = size_paper.replace("mm","");
    //console.log(size_paper);

    var font_picker = document.getElementById('font_picker').value;
    //console.log(font_picker);

    var size_picker = document.getElementById('size_picker').value;
    size_picker = size_picker.replace("px","");
    //console.log(size_picker);

    var text_area = document.getElementById('text_area').value;
    text_area = text_area.replaceAll("\n","<br>");
    //console.log(text_area);


    $.get( "texto.php?text="+text_area+"&print=0&font="+font_picker+"&size_font="+size_picker+"&size_paper="+size_paper, { }).done(function( data ) {

        console.log(data);
        document.getElementById('print_area').style.backgroundImage = "url(generated.png?dummy="+Math.random()+")";
    });

  });

  $( "#print" ).click(function() {
    var size_paper = document.getElementById('size_paper').value;
    size_paper = size_paper.replace("mm","");
    $.get( "print.php?print=1"+"&size_paper="+size_paper, { }).done(function( data ) {

        console.log(data);
    });
  });


});

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};
