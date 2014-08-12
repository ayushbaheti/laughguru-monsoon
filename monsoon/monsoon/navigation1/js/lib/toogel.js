function toggleMenu(type,type1,type2)
{
$("#"+type).toggle("slow");
$("#"+type1).slideUp('slow');
$("#"+type2).slideUp('slow');
$("#"+type+"1").toggle("slow");
$("#"+type1+"1").slideUp('slow');
$("#"+type2+"1").slideUp('slow');

document.getElementById(type+"Image").src = 'images/arrow_down.png';
document.getElementById(type1+"Image").src = 'images/arrow_Side.png';
document.getElementById(type2+"Image").src = 'images/arrow_Side.png';
document.getElementById(type+"1Image").src = 'images/arrow_down.png';
document.getElementById(type1+"1Image").src = 'images/arrow_Side.png';
document.getElementById(type2+"1Image").src = 'images/arrow_Side.png';

}

