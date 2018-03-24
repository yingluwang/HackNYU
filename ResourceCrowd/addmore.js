$(document).ready(function(){
  

var resource_itter = 1;

$("#addSection").click(function(){
    $("table").append("\
    <tr class='add'>\
      <td class='subject'>Subject</td>\
      <td style='text-align:center'><input required type='text' name='subject[]' id='subject'>\
      </td>\
      <br><br>\
      <td class='level'>Resource Level</td>\
      <td id='level'>\
        <input type='checkbox' name=level[" + resource_itter + "][]' id='entry' value='entry'>Entry Level<br>\
        <input type='checkbox'  name=level[" + resource_itter + "][]' id='mid' value='mid'>Intermediate Level<br>\
        <input type= 'checkbox' name=level[" + resource_itter + "][]' id='adv' value='adv'>Advanced Level\
      </td>\
    </tr>\
    ")
resource_itter +=1; 
}



)
  $("#delSection").click(function(){
    if($(".add")[0]){
      $("table").children().last().remove()
    }
  })
})

var input = document.getElementByID('email');
input.oninvalid = function(event){
  event.target.setCustomValidity("Please enter your university email.")
}
