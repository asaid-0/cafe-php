console.log('test');

function checkLogin() {
  let form = document.getElementById('myForm');
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    
    let login = document.getElementById('login').value;
    let pass = document.getElementById('password').value;
    
    console.log(login, pass);
    
  
    
  });
}

checkLogin();