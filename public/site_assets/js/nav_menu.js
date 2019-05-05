(function(){
  var animenuToggle = document.querySelector('.animenu_toggle'),
      animenuNav    = document.querySelector('.animenu_nav'),
      hasClass = function( elem, className ) {
        return new RegExp( ' ' + className + ' ' ).test( ' ' + elem.className + ' ' );
      },
      toggleClass = function( elem, className ) {
        var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, ' ' ) + ' ';
        if( hasClass(elem, className ) ) {
          while( newClass.indexOf( ' ' + className + ' ' ) >= 0 ) {
            newClass = newClass.replace( ' ' + className + ' ' , ' ' );
          }
          elem.className = newClass.replace( /^\s+|\s+$/g, '' );
        } else {
          elem.className += ' ' + className;
        }
      },           
      animenuToggleNav =  function (){        
        toggleClass(animenuToggle, "animenu_toggle-active");
        toggleClass(animenuNav, "animenu_nav-open");        
      }

  if (!animenuToggle.addEventListener) {
      animenuToggle.attachEvent("onclick", animenuToggleNav);
  }
  else {
      animenuToggle.addEventListener('click', animenuToggleNav);
  }
})()