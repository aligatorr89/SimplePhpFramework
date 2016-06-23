
/*function first() {
    window.alert('first');
    //this.onclick = second;
    //el.setAttribute('onclick', 'second()');
}
function second() {
    window.alert('second');
    //this.onclick = first;
    //el.setAttribute('onclick', 'first()');
}
var el = document.getElementsByTagName('body')[0];
el.addEventListener('click', first, false);
el.addEventListener('click', second, false);
*/
/*
jQuery.fn.extend({
   first: function() {
       $('#but').on('click', function(e) {
          alert('first'); 
       }, false);
   } 
});






/*window.onload = function () {
 var el = document.getElementById('but');
 el.addEventListener("click", changeDate);
 //el.addEventListener('click', changeBack);
 }*/
/*var el = document.getElementById('but');
 document.addEventListener('DOMContentLoaded', function () {
 el.addEventListener('click', changeDate, false)
 }
 );
 */

/*function changeDate() {
 changeDate = function () {changeBack();};
 var x = document.getElementsByName('date');
 for (i = 0; i < x.length; i++) {
 var y = x[i].innerHTML;
 var a = [];
 a[i] = y;
 var d = String([y.substring(0, 5), y.substring(8, 11), y.substring(5, 8), y.substring(11, 14), y.substring(14, 17, y.substring(17, 20))]);
 var d = String(new Date(d)).substring(0, 10);
 x[i].innerHTML = d;
 }
 return a;
 
 }
 
 function changeBack() {
 //changeBack = function () {changeDate();};
 var a = changeDate();
 var x = document.getElementsByName('date');
 for (i = 0; i < x.length; i++) {
 x[i].innerHTML = a[i];
 console.log(a[i]);
 console.log(x[i].innerHTML);
 }
 
 }*/
