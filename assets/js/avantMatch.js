
  console.log("test");
var id = "";

/*
$("lancezmatch").click( function () {

  $.ajax({
    url: "joueurByEquipe/" + id,

    success : function(code_html, statut){

    };
  });
}

*/



$("select").change( function () {


  id = $("select option:selected").val();
  console.log(id);
  $("ul").html("");
  $(".lancezmatch").html("");


  $.ajax({
    url: "joueurByEquipe/" + id,

    success : function(code_html, statut){
      var obj = JSON.parse(code_html);
      var i =0;
      obj.forEach(function(element) {
        i++;
        $("ul").append("<li class='col-xs-4 col-md-3'><select class='selectJoueur' name='joueur"+i+"' ><option></option></select></li>");
      });
      obj.forEach(function(element) {
          console.log("my object: %o", element);
        $(".selectJoueur").append("<option name='maillot' value='"+element.numMaillot+"'>"+element.nom+" "+element.prenom+"</option>");
      });
        $(".lancezmatch").append("<button class='btn-style' type='submit' name='lancezmatch'>Lancez le match</button>");
    }
  });
});

$(".selectJoueur").change( function () {
  // find the other selects
  var otherSelects = $('.selectJoueur').not(this);
  console.log(otherSelects);
  // get the old value of this select
  var oldValue = $(this).data('old');
  //remove disabled from the other selects option for the old value
  if (oldValue)
    otherSelects.find('option[value=' + oldValue + ']').removeAttr('disabled');
  //add disabled for the other selects option for the new value
  if (this.value)
    otherSelects.find('option[value=' + this.value + ']').attr('disabled', 'disabled');
  // store the new value as old
  $(this).data('old', this.value);

});
