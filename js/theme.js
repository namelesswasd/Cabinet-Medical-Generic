function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

var r = document.querySelector(':root');

function theme_setlight(){
    r.style.setProperty('--body_color', 'white');
    r.style.setProperty('--featured_color', '#a2d6bd');
    r.style.setProperty('--header_text_color', '#588181');
    r.style.setProperty('--header_text_hovered_color', '#254c4c');
    r.style.setProperty('--featured_h2_color', '#588181');
    r.style.setProperty('--featured_p_color', '#767676');
    r.style.setProperty('--featured_p_hover_color', '#333');
    r.style.setProperty('--sidebar_bg_color', '#94acb3');
    setCookie('theme', 'light', 999);
}

function theme_setdark(){
    r.style.setProperty('--body_color', '#363636');
    r.style.setProperty('--featured_color', '#264134');
    r.style.setProperty('--header_text_color', '#6bd9a7');
    r.style.setProperty('--header_text_hovered_color', '#98fdd0');
    r.style.setProperty('--featured_h2_color', '#92d3c3');
    r.style.setProperty('--featured_p_color', '#dfdfdf');
    r.style.setProperty('--featured_p_hover_color', '#fff');
    r.style.setProperty('--sidebar_bg_color', '#474747');
    setCookie('theme', 'dark', 999);
}

var theme = getCookie('theme');
if(theme == 'dark') {
    theme_setdark();
}
if(theme == 'light') {
    theme_setlight();
}

/*dark mode*/
/*
--body_color: #363636;
--featured_color: #264134;
--header_text_color: #6bd9a7; 
--header_text_hovered_color: #98fdd0;
--featured_h2_color: #92d3c3;
--featured_p_color: #dfdfdf;
--featured_p_hover_color: #fff;
--sidebar_bg_color: #474747;
*/

/*light mode*/
/*
--body_color: white;
--featured_color: #a2d6bd;
--header_text_color: #588181;
--header_text_hovered_color: #254c4c;
--featured_h2_color: #588181;
--featured_p_color: #767676;
--featured_p_hover_color: #333;
--sidebar_bg_color: #94acb3;
*/