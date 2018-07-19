
/*
document.getElementById('adverse').addEventListener('keypress', function(event) {
if (event.keyCode == 13) {
event.preventDefault();
}
});
*/
var id = "";
var obj = "";
var joueur = [];
var selected = "";
var equipeId = undefined;

 

$('#formulaire').submit(function(){
  var i = 0;
  $(".selectJoueur").each(function(){
    selected = $(this).find("option:selected").attr("data-id");
    joueur.push(selected);
    if (equipeId == undefined) {
      equipeId = $(this).find("option:selected").attr("data-equipe");
    }
  });
  while (joueur.length < 16) {
    joueur.push(null);
  }
var adverse = $('#adverse').val();
  $.post("envoisClavier",{adverse: adverse, equipe : equipeId, joueur1: joueur[0],joueur2: joueur[1],joueur3: joueur[2],joueur4: joueur[3],joueur5: joueur[4],joueur6: joueur[5],joueur7: joueur[6],joueur8: joueur[7],joueur9: joueur[8],joueur10: joueur[9],joueur11: joueur[10],joueur12: joueur[11],joueur13: joueur[12],joueur14: joueur[13],joueur15: joueur[14],joueur16: joueur[15]});
});

$("select").change( function (){
  id = $("select option:selected").val();
  $("ul").html("");
  $(".lancezmatch").html("");


  $.ajax({
    url: "joueurByEquipe/" + id,

    success : function(code_html, statut){
      obj = JSON.parse(code_html);

      var i =0;



      obj.forEach(function(element) {
        if (i <=16) {
          i++;
          $("ul").append("<li class='col-xs-6'><select class='selectJoueur' name='joueur"+i+"' ><option data-equipe='"+element.equipe+"' data-id='"+element.id+"' name='maillot' value='"+element.numMaillot+"'>"+element.nom+" "+element.prenom+"</option></option><option></select></li>");
        }
      });
      obj.forEach(function(element) {

        $(".selectJoueur").append("<option data-equipe='"+element.equipe+"' data-id='"+element.id+"' name='maillot' value='"+element.numMaillot+"'>"+element.nom+" "+element.prenom+"</option>");
      });
      $(".lancezmatch").append("<button class='btn btn-style btn-align'  type='submit';' name='lancezmatch'>Lancez le match</button>");


    }
  });

});
