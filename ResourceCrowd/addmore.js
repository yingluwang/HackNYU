$(document).ready(function(){
  $("#addSection").click(function(){
    $("table").append("\
    <tr class='add'>\
      <td class='level'>Resource Level</td>\
      <td id='level'>\
        <input type='checkbox' name='level' id='entry' value='entry'>Entry Level&nbsp;&nbsp;\
        <input type='checkbox' name='level' id='mid' value='mid'>Intermediate Level&nbsp;&nbsp;\
        <input type='checkbox' name='level' id='adv' value='adv'>Advanced Level\
      </td>\
    <br><br>\
      <td class='subject'>Subject</td>\
      <td><input required type='text' name='subject' id='subject' size='20'>\
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
