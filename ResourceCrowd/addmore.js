$(document).ready(function(){
  $("#addSection").click(function(){
    $("table").append("\
    <tr class='add'>\
      <td class='subject'>Subject</td>\
      <td style='text-align:center'><input required type='text' name='subject[]' id='subject'>\
      </td>\
      <br><br>\
      <td class='level'>Resource Level</td>\
      <td id='level'>\
        <input type='checkbox' name='level[]' id='entry' value='entry'>Entry Level<br>\
        <input type='checkbox' name='level[]' id='mid' value='mid'>Intermediate Level<br>\
        <input type='checkbox' name='level[]' id='adv' value='adv'>Advanced Level\
      </td>\
    </tr>\
    ")
  })
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
