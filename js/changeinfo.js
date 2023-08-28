var headerArr = ['acasa', 'despre', 'servicii', 'contact', 'login', 'programare'];

document.body.innerHTML = document.body.innerHTML.replace('header1', headerArr[0]);
document.body.innerHTML = document.body.innerHTML.replace('header2', headerArr[1]);
document.body.innerHTML = document.body.innerHTML.replace('header3', headerArr[2]);
document.body.innerHTML = document.body.innerHTML.replace('header4', headerArr[3]);
document.body.innerHTML = document.body.innerHTML.replace('header5', headerArr[4]);
document.body.innerHTML = document.body.innerHTML.replace('header6', headerArr[5]);

document.body.innerHTML = document.body.innerHTML.replace('footer_info', '<span>2023 &copy; Cabinetul Medical Arges.</span><a href="#" >Termeni si Conditii</a> | <a href="#" >Privacy Policy</a>')

document.body.innerHTML = document.body.innerHTML.replace('contact_info', '<h3>contact</h3><ul><li><span class="address">address</span><ul><li>Cabinel Medical Arges</li><li>Centru Diagnostic</li><li>Strada 123</li></ul></li><li><span class="phone">telephone</span><ul><li>0712345678</li></ul></li><li><span class="email">email</span><ul><li><a href="#">cma@gmail.com</a></li></ul></li><li><span class="twitter">twitter</span><ul><li><a href="#">@cabinetmedicalarges</a></li></ul></li><li><span class="facebook">facebook</span><ul><li><a href="#">www.fb.com/cabinetmedicalarges</a></li></ul></li></ul>')

var logged_user = fs.readFile('../php/logged.user');