var dash = document.getElementById('dash');
var acc = document.getElementById('acc');


function show(e) {
    if (e===1) {
        acc.classList.remove('show');
        acc.classList.add('hide')
        dash.classList.add('show');
    } else {
        dash.classList.remove('show');
        dash.classList.add('hide')
        acc.classList.add('show');
    }
}